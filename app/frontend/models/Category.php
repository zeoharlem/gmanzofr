<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Models;

/**
 * Description of Category
 *
 * @author Theophilus
 */
class Category extends BaseModel{
    //put your code here
    public function initialize(){
        $this->hasMany(
            "category_id", 
            "Multiple\\Frontend\\Models\\Products", 
            "category",
            array(
                "reusable"  => true
            )
        );
        
        $this->hasManyToMany(
                "category_id", 
                "Multiple\\Frontend\\Models\\Products", 
                "category", 
                "vendor_id", 
                "Multiple\\Frontend\\Models\\Vendor", 
                "vendor_id",
                array(
                    "reusable"  => true,
                    "alias"     => "AliasVendorPro"
            )
        );
    }
    
    public function getProducts(){
        return $this->getRelated("Multiple\Frontend\Models\Products");
    }
    
    public function getAliasVendorPro(){
        return $this->getRelated("AliasVendorPro");
    }
}
