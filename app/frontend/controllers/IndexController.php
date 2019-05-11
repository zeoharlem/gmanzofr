<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;
use Multiple\Frontend\Models\Products;
use Phalcon\Mvc\Model\Resultset;

/**
 * Description of IndexController
 *
 * @author Theophilus
 */
class IndexController extends BaseController{
    //put your code here
    const __LIMIT = 6;

    public function indexAction(){
        $counter    = 0;
        $category   = \Multiple\Frontend\Models\Category::find(array(
            "limit" => self::__LIMIT
        ));
        foreach($category as $keyCateg => $valCatego){
            //$arrayStack = $valCatego->getProducts()->toArray();
            $buildQuery = $this->modelsManager->createBuilder()->from(['r'=>'Multiple\Frontend\Models\Products'])
                ->where("r.category=".$valCatego->category_id)->limit(8)->orderBy("RAND()")
                ->getQuery()->execute()->setHydrateMode(Resultset::HYDRATE_ARRAYS)->toArray();
            //$arrayShops = $valCatego->getAliasVendorPro()->toArray();
            $stackflow[$valCatego->category_name] = $buildQuery+["unique_id" => time()+$counter];
            //$stackVend[$valCatego->category_name] = $arrayShops;
            $counter++;
        }
        //var_dump($stackflow); exit;
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT);
        $this->view->setVar("category", $stackflow);
        return;
    }
    
    private function __getShop($id){
        $vendor = \Multiple\Frontend\Models\Vendor::findFirstByVendor_id($id);
        return $vendor;
    }
}
