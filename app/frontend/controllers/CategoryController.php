<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 1/12/2019
 * Time: 1:20 AM
 */

namespace Multiple\Frontend\Controllers;


use Multiple\Frontend\Models\Category;
use Multiple\Frontend\Models\Products;
use Phalcon\Mvc\View;

class CategoryController extends BaseController {

    public function indexAction(){
        $categoryStack  = [];
        $category   = Category::find();
        foreach ($category as $key => $value){
            $products   = $value->getProducts()->toArray();
            if(array_key_exists(0, $products)) {
                $categoryStack[] = [
                    "title"         => $value->category_name,
                    "category_id"   => $value->category_id,
                    "img" => $value->getProducts()->toArray()[0]['front_image']
                ];
            }
        }
        $this->view->setVars(array(
            "catSimple" => $categoryStack
        ));
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }

    public function browseAction(){
        $params = $this->request->getQuery();
        if($this->request->hasQuery("c") && $this->request->hasQuery("category")) {
            $catSimpleId    = $this->request->getQuery('c', 'int');
            $catTitle       = $this->request->getQuery("category", "string");

            //Find products with category
            $this->view->setVars([
                "catId"     => $catSimpleId,
                "catTitle"  => strtoupper($catTitle),
                "pager"     => Products::getPagingProductRow($params)
            ]);
        }
        else{
            $this->view->setVars([
                "catId"     => "",
                "catTitle"  => "",
                "pager"     => Products::getPagingProductRow($params)
            ]);
        }
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function searchAction(){
        $params     = $this->request->getQuery();
        $this->view->setVars([
            "searchTitle"   => $this->request->getQuery("query","string"),
            "pager"         => Products::getPagingProductStringRow($params),
            "catTitle"      => @trim($this->request->getQuery("category", "string")),
        ]);
        return $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
}