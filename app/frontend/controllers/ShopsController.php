<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of ShopsController
 *
 * @author Theophilus
 */
class ShopsController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        $url    = new \Phalcon\Mvc\Url();
        \Phalcon\Tag::appendTitle("Shops");
        //var_dump($url->getBasePath()); exit;
    }
    
    public function indexAction(){
        if($this->request->hasQuery("s")){
            $stringState    = trim($this->request->getQuery("s"));
            if(!empty($stringState)){
                $this->session->set('states', strtolower($stringState));
                $getStateQuery  = \Multiple\Frontend\Models\Vendor::find(array(
                    "address1='".$stringState."'",
                    "order" => "display_name DESC"
                    )
                )->toArray();
                $this->view->setVar("vendorList", $getStateQuery);
            }
        }
        else{
            if($this->session->has("states")){
                $getStateQuery  = \Multiple\Frontend\Models\Vendor::find([
                    "address1='".$this->session->get('states')."'",
                    "order" => "display_name DESC"
                ]);
            }
            else{
                $getStateQuery  = \Multiple\Frontend\Models\Vendor::find([
                    "order" => "display_name ASC"
                ]);
            }
            $this->view->setVar("vendorList", $getStateQuery->toArray());
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        return;
    }
    
    public function viewAction(){
        $builder    = $this->modelsManager->createBuilder()
                ->from(['r' => 'Multiple\Frontend\Models\Products'])
                ->where("r.vendor_id = '".$this->request->getQuery('d')."'")
                ->getQuery()->execute();
        
        if($builder != false){
            foreach($builder as $keyBuilder => $valueBuilder){
                $stackOverflow[]    = array(
                    'title'         => $valueBuilder->title,
                    'sale_price'    => $valueBuilder->sale_price,
                    'front_image'   => $valueBuilder->front_image,
                    'location'      => $valueBuilder->getVendor()->address1,
                    'category'      => $valueBuilder->getCategory()->category_name,
                    'product_id'    => $valueBuilder->product_id
                );
            }
            $this->view->setVar("productList", $stackOverflow);
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $this->view->setVar("name", $this->request->getQuery('name'));
        return;
    }
    
    public function browseAction(){
        $builder    = "";
        if($this->request->hasQuery('c') && $this->request->hasQuery('d')){
            $shop_id    = $this->request->getQuery('d');
            if(!empty($shop_id)){
                $category   = $this->request->getQuery("c",'int');
                $shopRow    = $this->request->getQuery("d", "int");
                $builder    = $this->modelsManager->createBuilder()
                        ->from(["r" => "Multiple\Frontend\Models\Products"])
                        ->where("r.category = '".$category."'")
                        ->andWhere("r.vendor_id = '".$shopRow."'")
                        ->getQuery()->execute();
            }
        }
        else{
            $category   = $this->request->getQuery("c",'int');
            $builder    = $this->modelsManager->createBuilder()
                    ->from(["r" => "Multiple\Frontend\Models\Products"])
                    ->where("r.category = '".$category."'")
                    ->getQuery()->execute();
        }
        if($builder != false){
            foreach($builder as $keyBuilder => $valueBuilder){
                $stackOverflow[]    = array(
                    'title'         => $valueBuilder->title,
                    'sale_price'    => $valueBuilder->sale_price,
                    'front_image'   => $valueBuilder->front_image,
                    'location'      => $valueBuilder->getVendor()->address1,
                    'category'      => $valueBuilder->getCategory()->category_name,
                    'shop'          => $valueBuilder->getVendor()->display_name,
                    'product_id'    => $valueBuilder->product_id
                );
            }
            $this->view->setVar("productList", $stackOverflow);
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $this->view->setVar("category", $this->request->getQuery('category'));
        return;
    }
    
    public function beforeExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher){
        $action     = $dispatcher->getActionName();
        $controller = $dispatcher->getControllerName();
        if($controller == "shops" && $action == "reset"){
            $this->session->remove("states");
            $dispatcher->forward(array(
                "controller"    => "shops",
                "action"        => "index"
            ));
            return;
        }
    }
    
    public function resetAction(){
        
    }
}
