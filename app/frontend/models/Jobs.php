<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Models;

/**
 * Description of Jobs
 *
 * @author Theophilus
 */
class Jobs extends BaseModel{
    //put your code here
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
            "Multiple\\Frontend\\Models\\Order", 
            "trans_id",
            array(
                "reusable"  => true
            )
        ); 
    }
    
    public function getSales(){
        return $this->getRelated('Multiple\Frontend\Models\Sales');
    }
    
    public function getOrder(){
        return $this->getRelated('Multiple\Frontend\Models\Order');
    }
}
