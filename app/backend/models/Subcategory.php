<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/20/2019
 * Time: 2:38 PM
 */
namespace Multiple\Backend\Models;

class Subcategory extends BaseModel {

    public function initialize(){
        $this->belongsTo(
            "category_id",
            "Multiple\Backend\Models\Category",
            "category_id",
            array('reusable' => true));

        $this->setSource('sub_category');
    }

    //A fix for the namespacing attributes
    public function getCategory(){
        return $this->getRelated('Multiple\Backend\Models\Category');
    }
}