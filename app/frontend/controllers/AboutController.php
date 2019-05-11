<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of AboutController
 *
 * @author Theophilus
 */
class AboutController extends BaseController{
    //put your code here
    
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle("About Us");
    }
    
    public function indexAction(){
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
    
    public function galleryAction(){
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
    
}
