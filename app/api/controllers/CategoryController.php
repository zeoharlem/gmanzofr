<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Backend\Controllers;

/**
 * Description of CategoryController
 *
 * @author Theophilus
 */
class CategoryController extends BaseController{
    //put your code here
    public function initialize(){
        parent::initialize();
        \Phalcon\Tag::appendTitle('Category');
    }
    
    public function indexAction(){
        if($this->request->isPost()){
            $category   = new \Multiple\Backend\Models\Category();
            if($category->create($this->request->getPost())){
                $this->flash->success("Category Created Successfully");
                $this->response->redirect("category/?task=success");
                return;
            }
        }
        $this->view->setVars(array("categories" => $this->__getListCategory()));
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    private function __getListCategory(){
        $categories = \Multiple\Backend\Models\Category::find();
        return $categories;
    }
}
