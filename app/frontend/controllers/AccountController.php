<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of AccountController
 *
 * @author Theophilus
 */
class AccountController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Account');
    }
    
    public function indexAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        return;
    }
    
    public function beforeExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher){
        $action     = $dispatcher->getActionName();
        $controller = $dispatcher->getControllerName();
        
        $getRole    = $this->session->get('auth')['role'];
        if($controller == "account"){
            if(!empty($getRole) && $getRole == "user"){
                $dispatcher->forward(array(
                    "controller"    => "dashboard",
                    "action"        => "index"
                ));
            }
        }
    }
}
