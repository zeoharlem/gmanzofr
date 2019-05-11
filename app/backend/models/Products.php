<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/19/2019
 * Time: 4:35 AM
 */
namespace Multiple\Backend\Models;

use Phalcon\Validation\Validator;

class Products extends BaseModel {

    public function initialize() {
        $this->belongsTo(
            "category",
            "Multiple\\Backend\\Models\\Category",
            "category_id",
            array('reusable' => true));

        $this->hasOne(
            "sub_category",
            "Multiple\\Backend\\Models\\Subcategory",
            "sub_category_id",
            array(
                'reusable'  => true,
                "alias"     => "SubCategory"
            )
        );

        $this->allowEmptyStringValues(array('brand','category'));
        //$this->skipAttributesOnCreate(array('category'));
    }

    public function getCategory(){
        return $this->getRelated('Multiple\Backend\Models\Category');
    }

    public function getSubCategory(){
        return $this->getRelated("SubCategory");
    }

    public function beforeValidationOnCreate(){
        $this->add_timestamp    = new \Phalcon\Db\RawValue("NOW()");
    }

    public function validation(){
        $validator  = new \Phalcon\Validation();
        $validator->add('title', new Validator\Uniqueness(array(
            'models'    => 'Products',
            'message'   => 'Category already existed'
        )));
        $validator->add('title', new Validator\StringLength(array(
            'models'            => 'Products',
            'min'               => 2,
            'max'               => 100,
            'messageMaximun'    => 'Do not make the too long string',
            'messageMinimum'    => 'The category string is too small'
        )));
        return $this->validate($validator);
    }
}