<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of ContactsController
 *
 * @author Theophilus
 */
class ContactController extends BaseController{
    //put your code here
    
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle("Contact Us");
    }
    
    public function indexAction(){
        if($this->request->isPost()){
            $register   = new \Multiple\Frontend\Models\Register();
            $recaptcha  = $this->request->getPost("g-recaptcha-response");
//            $secretKey  = '6Le910EUAAAAAKJGNwsrZ7htLxyIK-S6szoQhxhP';
            //Captcha Registered to Gmanzo
            $secretKey  = '6Lev2EEUAAAAACMbRWXnO1kRv2hKXunqClHvYhYY';
            $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".
                    $secretKey."&response=".$recaptcha);
            
            $getObject  = json_decode($request);
            
            if($getObject->success == true){
                try{
                    $fullname   = $this->request->getPost("fullname");
                    $email      = $this->request->getPost("email");
                    $subject    = $this->request->getPost("subject");
                    $message    = $this->request->getPost("message");
                    $taskMsgs   = $this->mailer->createMessage()
                            ->to("ikpideao@gmail.com", "Gmanzo")
                            ->subject("Notification | ".$subject)
                            ->content($fullname." | ".$email."<hr/>".$message);
                    $taskMsgs->bcc($email, $fullname);
                    if($taskMsgs->send()){
                        $this->flash->success("Message sent! You will contacted. Thanks");
                    }
                    else{
                        throw new \Exception("Mail cannot be sent");
                    }
                } catch (\Exception $ex) {
                    $this->flash->error($ex->getMessage());
                }
//                $this->mailer->clearAddresses();
//                $this->mailer->clearReplyTos();
            }
            else{
                $this->flash->error("Seems Captcha has failed. Try again Later");
            }
        }
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
}
