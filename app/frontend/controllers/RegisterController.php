<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegisterationController
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Register;

class RegisterController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Registration');
    }
    
    public function indexAction(){
        if($this->request->isPost()){
            $register   = new Register();
            $recaptcha  = $this->request->getPost("g-recaptcha-response");
//            $secretKey  = '6Le910EUAAAAAKJGNwsrZ7htLxyIK-S6szoQhxhP';
            //Captcha Registered to Gmanzo
            $secretKey  = '6Lev2EEUAAAAACMbRWXnO1kRv2hKXunqClHvYhYY';
            $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".
                    $secretKey."&response=".$recaptcha);
            
            $getObject  = json_decode($request);
            
            if($getObject->success == true){
                if($register->create($this->request->getPost())){
                    $this->flash->success('Registration Done Successfully');
                    $this->response->redirect('account/?token='.  uniqid());
                }
                else{
                    $this->component->helper->getErrorMsgs($register,'account/?error');
                    return;
                }
            }
            else{
                $this->flash->error('Seems incorrect captcah. Try again');
                $this->response->redirect('account/index?task=captcha&re!');
                return;
            }
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        return;
    }
    
    private function __taskAnswer($privateKey){
        $answer = \Multiple\Frontend\Recaptcha\Recaptcha::check(
                $privateKey, $_SERVER['REMOTE_ADDR'], 
                $this->request->getPost('recaptcha_challenge_field'), 
                $this->request->getPost('recaptcha_response_field'));
        return $answer;
    }
}
