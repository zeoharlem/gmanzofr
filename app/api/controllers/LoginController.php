<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Controllers;

use Multiple\Frontend\Models\Register;

class LoginController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
    }
    
    
    public function indexAction(){
        if($this->request->isPost()){
            $email      = $this->request->getPost('username');
            $password   = $this->request->getPost('password');
            
            $register   = \Multiple\Backend\Models\Admin::findFirstByEmail($email);
            //var_dump($this->request->getPost('email')); exit;
            //var_dump($register); exit;
            if($register != false){
                if($this->security->checkHash($password, $register->password)){
                    $this->__registerSession($register);
                    $this->flash->success('You are welcome! '.$register->email);
                    $this->response->redirect('backend/dashboard?token='.uniqid());
                    return $this->view->disable();
                }
            }
            else{
                $this->flash->error('Not a valid user. Register Now');
                $this->response->redirect('backend/index?task=loginFail');
                return;
            }
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        $this->response->redirect('backend/index?task=redirect&'.uniqid());
        return;
    }
    
    private function __registerSession(\Multiple\Backend\Models\Admin $register){
        $this->session->set('auth', array(
            'role'          => $register->role,
            'email'         => $register->email,
            'register_id'   => $register->admin_id,
            //'name'          => $register->display_name,
            'name'          => "netmartng",
            'active'        => true
        ));
    }
}
