<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Backend\Controllers;

/**
 * Description of ProductsController
 *
 * @author Theophilus
 */
class ProductsController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Products');
    }
    
    public function indexAction(){
        $time    = time();
        if($this->request->hasFiles() == true){
            $file           = $this->request->getUploadedFiles();
            $category_id    = $this->request->getPost('category');
            
            //Set the product models manager table
            $products       = new \Multiple\Backend\Models\Products();
            $getRealType    = $file[0]->getRealType();
            
            $gdAdapter      = new \Phalcon\Image\Adapter\Gd($file[0]->getTempName());
            $resultAdpater  = $gdAdapter->resize(200, 200);

            if($getRealType != 'image/png' && $getRealType != 'image/jpeg'){
                $this->flash->error("Attention! Your  upload is not an Image.");
                $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
                return;
            }
            if($gdAdapter->save('../public/assets/uploads/'.$time.'_'.$file[0]->getName())){
                $addedBy    = array('type' => 'vendor','id' => $this->session->get('auth')['register_id']);
                $uploads    = array(
                    'added_by'      => json_encode($addedBy),
                    'front_image'   => $time.'_'.$file[0]->getName(),
                    'vendor_id'     => $this->session->get('auth')['register_id']
                    //'category'      => $category_id
                );
                $mergeArr   = array_merge($uploads, $this->request->getPost());
                if($products->create($mergeArr)){
                    $this->flash->success('Product addded succesfully');
                    $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
                    $this->response->redirect('backend/products/show?task=load&view=null');
                    return;
                }
                else{
                    $this->component->helper->getErrorMsgs($products, 'products');
                }
            }
            elseif(number_format($file[0]->getSize()/1048576, 2) > 1){
                $this->flash->error("File size is bigger than 1MB");
                $this->response->redirect('backend/products/show?task=size_error');
                return;
            }
            else{
                $this->flash->error("Image Errors! ".$file[0]->getError());
                $this->response->redirect('backend/products/show?task=image_error');
                return;
            }
        }
        if($this->request->hasQuery("category_id")){
            $category_id    = $this->request->getQuery("category_id","int");
            if(!empty($category_id) && strlen($category_id) > 0){
                $this->view->setVar("selectedCategory", $category_id);
                $this->view->setVar("categoryName", $this->request->getQuery("n"));
            }
        }
        else{
            $this->view->setVar('categories', \Multiple\Backend\Models\Category::find());
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    public function showAction(){
        if($this->request->isPost() && $this->request->isAjax()){
            $getBuilder = $this->modelsManager->createBuilder()
                    ->from(['r' => 'Multiple\Backend\Models\Products'])
                    ->where('r.vendor_id = "'.$this->session->get('auth')['register_id'].'"')
                    ->getQuery()->execute();
            foreach($getBuilder as $keyBuild => $valueBuild){
                $stackflow[]    = array(
                    "product_id"    => $valueBuild->product_id,
                    "price"         => $valueBuild->sale_price,
                    "title"         => ucwords($valueBuild->title),
                    "category"      => ucwords($valueBuild->getCategory()->category_name),
                    "current_stock" => $valueBuild->current_stock,
                    "date_created"  => $valueBuild->add_timestamp,
                    "image"         => $valueBuild->front_image
                );
            }
            $dataTable  = new \DataTables\DataTable();
            $dataTable->fromArray($stackflow)->sendResponse();
            $this->view->disable();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
}
