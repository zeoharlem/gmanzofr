<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Models;

use Phalcon\Mvc\Model\Validator;

class Admin extends BaseModel{
    //put your code here
    public function initialize(){
        
    }
    
    public function beforeValidationOnCreate(){
        $this->role     = "user";
        $this->codename = $this->getDI()->get('component')->helper->makeRandomInts(11);
    }
    
    public function validation(){
        $security   = new \Phalcon\Security();
        $validation = new \Phalcon\Validation();
        $validation->add('username',new \Phalcon\Validation\Validator\Uniqueness(array(
            "model"     => $this,
            "message"   => "User already existed"
        )));
        $validation->add('email',new \Phalcon\Validation\Validator\Uniqueness(array(
            "model"     => $this,
            "message"   => "User email already existed"
        )));
        $this->password = $security->hash($this->password);
        return $this->validate($validation);
    }
    
//    public function validation(){
//        $this->validate(new Validator\Uniqueness(array(
//            "field"    => "username",
//            "message"   => "Username Already Existed"
//        )));
//        
//        $this->validate(new Validator\Uniqueness(array(
//            "field"    => "email",
//            "message"   => "Email Already Existed"
//        )));
//        
//        $security         = new \Phalcon\Security();
//        $this->password   = $security->hash($this->password);
//        if($this->validationHasFailed()){
//            return false;
//        }
//    }
}
