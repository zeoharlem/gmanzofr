<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of LoginController
 *
 * @author Theophilus
 */
class LoginController extends BaseController{
    //put your code here
    public function indexAction(){
        if($this->request->isPost()){
            $username   = $this->request->getPost("username");
            $password   = $this->request->getPost("password");
            $getTaskQue = \Multiple\Frontend\Models\Register::findFirstByEmail($username);
            if($getTaskQue != false){
                if($this->security->checkHash($password, $getTaskQue->password)){
                    $this->__registerWithTaskSession($getTaskQue);
                    $this->flash->success('Welcome !'.$getTaskQue->firstname);
                    $this->response->redirect('dashboard/?token='.uniqid());
                    return;
                }
                else{
                    $this->security->hash(rand());
                    $this->flash->error('Error: !Email and Password Combination');
                    $this->response->redirect('account/?task=USER_PASS_FAILED');
                    return;
                }
            }
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        return;
    }
    
    private function __registerWithTaskSession($Register){
        //var_dump($Register->Providehelp->balance); exit;
        $this->session->set('auth', array(
            'lastname'              => $Register->lastname,
            'fullname'              => $Register->firstname,
            'email'                 => $Register->email,
            'phone_number'          => $Register->phonenumber,
            'codename'              => $Register->codename,
            'address'               => $Register->address,
            'role'                  => $Register->role,
            'register_id'           => $Register->register_id,
            //'last_balance'          => @$Register->Providehelp->balance
        ));
    }
}
