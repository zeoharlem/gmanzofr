<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Models;

/**
 * Description of Order
 *
 * @author Theophilus
 */
class Order extends BaseModel{
    //put your code here
    public $date_of_order;
    
    public function initialize(){
        $this->belongsTo(
            "trans_id", 
            "Multiple\\Frontend\\Models\\Sales", 
            "trans_id",
            array(
                "reusable"  => true
            )
        );
        
        $this->belongsTo(
            "trans_id", 
            "Multiple\\Frontend\\Models\\Jobs", 
            "trans_id",
            array(
                "reusable"  => true
            )
        );
    }
    
    public function getJobs(){
        return $this->getRelated('Multiple\Frontend\Models\Jobs');
    }
    
    public function getSales(){
        return $this->getRelated('Multiple\Frontend\Models\Sales');
    }
    
    public function beforeValidationOnCreate(){
        $this->date_of_order    = new \Phalcon\Db\RawValue("NOW()");
    }
}
