<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/19/2019
 * Time: 4:57 AM
 */
namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Category;
use Multiple\Backend\Models\Products;
use Multiple\Backend\Models\Subcategory;
use Phalcon\Mvc\View;

class ProductsController extends BaseController {

    public function initialize(){
        parent::initialize();
        \Phalcon\Tag::appendTitle("Products");
    }

    public function indexAction(){
        $this->view->setVars([
            "category"      => Category::find(),
            "subcategory"   => Subcategory::find(),
        ]);
        if($this->request->hasFiles()){
            $time           = time();
            $file           = $this->request->getUploadedFiles();
            $category_id    = $this->request->getPost('category');

            //Set the product models manager table
            $products       = new Products();
            $getRealType    = $file[0]->getRealType();

            $gdAdapter      = new \Phalcon\Image\Adapter\Gd($file[0]->getTempName());
            $resultAdpater  = $gdAdapter->resize(200, 200);

            if($getRealType != 'image/png' && $getRealType != 'image/jpeg'){
                $this->flash->error("Attention! Your  upload is not an Image.");
                $this->response->redirect('backend/products/?task=load&view=null');
                $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
                return;
            }
            if($gdAdapter->save('../public/assets/uploads/'.$time.'_'.$file[0]->getName())){
                $addedBy    = array('type' => 'admin','id' => $this->session->get('auth')['register_id']);
                $uploads    = array(
                    'added_by'      => json_encode($addedBy),
                    'front_image'   => $time.'_'.$file[0]->getName(),
                    'admin_id'      => $this->session->get('auth')['register_id']
                    //'category'      => $category_id
                );
                $mergeArr   = array_merge($uploads, $this->request->getPost());
                if($products->create($mergeArr)){
                    $this->flash->success('Product addded succesfully');
                    $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
                    $this->response->redirect('backend/products/?task=load&view=null');
                    return;
                }
                else{
                    $this->component->helper->getErrorMsgs($products, 'products');
                }
            }
            elseif(number_format($file[0]->getSize()/1048576, 2) > 1){
                $this->flash->error("File size is bigger than 1MB");
                $this->response->redirect('backend/products/?task=size_error');
                return;
            }
            else{
                $this->flash->error("Image Errors! ".$file[0]->getError());
                $this->response->redirect('backend/products/?task=image_error');
                return;
            }
        }
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    public function manageAction(){
        $this->view->setVars([
            "category"      => Category::find(),
            "subcategory"   => Subcategory::find(),
        ]);
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    public function getproductsAction(){
        $stackflow  = [];
        if($this->request->isAjax() && $this->request->isGet()){
            $dataTable  = new \DataTables\DataTable();

            $getBuilder = $this->modelsManager->createBuilder()
                ->from(['r' => 'Multiple\Backend\Models\Products']);
                //->where('r.vendor_id = "'.$this->session->get('auth')['register_id'].'"')
            $dataTable->fromBuilder($getBuilder);
            $stackRow   = $dataTable->getResponse();

            foreach($stackRow['data'] as $keyBuild => $valueBuild){
                //var_dump($valueBuild); exit();
                $stackflow[]    = array(
                    "key_num"       => $keyBuild + 1,
                    "brand"         => $valueBuild['brand'],
                    "product_id"    => $valueBuild['product_id'],
                    "price"         => $valueBuild['sale_price'],
                    "title"         => ucwords($valueBuild['title']),
                    "category"      => ucwords($this->getCategory($valueBuild['category'])->category_name),
                    "sub_category"  => @ucwords($this->getSubCategory($valueBuild['sub_category'])->sub_category_name),
                    "current_stock" => $valueBuild['current_stock'],
                    "date_created"  => $valueBuild['add_timestamp'],
                    "image"         => $valueBuild['front_image']
                );
            }
            $dataTable->fromArray($stackflow)->sendResponse();
        }
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    public function multipledAction(){

    }

    private function getCategory($id){
        return Category::findFirstByCategory_id($id);
    }

    private function getSubCategory($id){
        return Subcategory::findFirstBySub_category_id($id);
    }
}