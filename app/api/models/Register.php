<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Models;

use Phalcon\Validation\Validator;

class Register extends BaseModel{
    //put your code here
    public function initialize(){
        $this->belongsTo(
                'register_id',
                "Multiple\\Backend\\Models\\Studentone",
                'register_id',
                array('reusable' => true));
        
        $this->belongsTo(
                'register_id',
                "Multiple\\Backend\\Models\\Imagecaption",
                'register_id',
                array('reusable' => true));
        
        $this->belongsTo(
                'register_id',
                "Multiple\\Backend\\Models\\Account",
                'register_id',
                array('reusable' => true));
        
        $this->skipAttributesOnUpdate(array('password'));
    }
    
    public function beforeValidationOnCreate(){
        $this->role     = "user";
        $this->date_of_registration = new \Phalcon\Db\RawValue('NOW()');
        $this->codename = $this->getDI()->get('component')->helper->makeRandomInts(11);
    }
    
    public function getImagecaption(){
        return $this->getRelated('Multiple\Backend\Models\Imagecaption');
    }
    
    public function getAccount(){
        return $this->getRelated('Multiple\Backend\Models\Account');
    }
    
    public function validation(){
        $security   = new \Phalcon\Security();
        $validation = new \Phalcon\Validation();
        $validation->add('email', new Validator\Email(array(
            'model'     => $this,
            'message'   => 'Please enter correct email address'
        )));
        
        $validation->add('email', new Validator\Uniqueness(array(
            'model'     => $this,
            'message'   => 'Email address already existed'
        )));
        $this->password = $security->hash($this->password);
        return $this->validate($validation);
    }
    
//    public function validation(){
//        $security   = new \Phalcon\Security();
//        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
//            'field'     => 'email',
//            'message'   => 'Email address already existed'
//        )));
//        $this->validate(new \Phalcon\Mvc\Model\Validator\Email(array(
//            'field'     => 'email',
//            'message'   => 'Please enter correct email address'
//        )));
//        $this->password = $security->hash($this->password);
//        return $this->validationHasFailed() ? false : true;
//    }
}
