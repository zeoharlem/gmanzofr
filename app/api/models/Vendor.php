<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendor
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Models;

class Vendor extends BaseModel{
    //put your code here
    public function initialize(){
        $this->belongsTo(
            "vendor_id", 
            "Multiple\\Frontend\\Models\\Sales", 
            "vendor_id",
            array(
                "reusable"  => true,
                "alias"     => "AliasSales"
            )
        );
        
        $this->belongsTo(
            "vendor_id", 
            "Multiple\\Frontend\\Models\\Order", 
            "vendor_id",
            array(
                "reusable"  => true,
                "alias"     => "AliasOrder"
            )
        );
        
        $this->belongsTo(
            "trans_id", 
            "Multiple\\Frontend\\Models\\Jobs", 
            "trans_id",
            array(
                "reusable"  => true,
                "alias"     => "AliasJobs"
            )
        );
        
        $this->hasManyToMany(
                "vendor_id", 
                "Multiple\\Frontend\\Models\\Sales", 
                "trans_id", 
                "vendor_id", 
                "Multiple\\Frontend\\Models\\Order", 
                "vendor_id",
                array(
                    "reusable"  => true,
                    "alias"     => "AliasSalesOrder"
            )
        );
    }
    
    public function getAliasSalesOrder(){
        return $this->getRelated('AliasSalesOrder');
    }
    
    public function getJobs(){
        return $this->getRelated('AliasJobs');
    }
    
    public function getOrder(){
        return $this->getRelated('AliasOrder');
    }
    
    public function getSales(){
        return $this->getRelated('AliasSales');
    }
}
