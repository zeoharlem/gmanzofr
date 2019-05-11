<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Models;

use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
/**
 * Description of Products
 *
 * @author Theophilus
 */
class Products extends BaseModel{
    //put your code here
    public $display_name;
    public function initialize(){
        $this->belongsTo(
            "category", 
            "Multiple\\Frontend\\Models\\Category", 
            "category_id",
            array(
                "reusable"  => true
            )
        );
        
        $this->belongsTo(
            "vendor_id", 
            "Multiple\\Frontend\\Models\\Vendor", 
            "vendor_id",
            array(
                "reusable"  => true
            )
        );
    }

    public static function getPagingProductRow($params){
        //Query default values
        $sort = $params['sort'] ?: 'r.title';
        $order = $params['order'] ?: 'ASC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        //Create the builder paging query
        if($params['c']){
            $builder    = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\Products'))
                ->where('r.category = '.$params['c'])->orderBy("$sort $order");
        }
        else{
            $builder    = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\Products'))
                ->orderBy("$sort $order");
        }
        $paginator  = new PaginatorQueryBuilder(array(
            'builder' => $builder, 'limit' => $limit, 'page' => $page));
        return $paginator;
    }

    public static function getPagingProductStringRow($params){
        //Query default values
        $sort   = $params['sort'] ?: 'r.title';
        $order  = $params['order'] ?: 'ASC';
        $page   = (int) $params['page'] ?: 1;
        $limit  = $params['limit'] ?: 20;

        if($params['query'] && !$params['c'] && !$params['category']) {
            $builder = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\Products'))
                ->where("r.title LIKE '%" . $params['query'] . "%'")->orderBy("$sort $order");
        }
        elseif($params['query'] && $params['c'] && $params['category']){
            $builder = \Phalcon\Di::getDefault()
                ->getModelsManager()->createBuilder()
                ->from(array('r' => 'Multiple\Frontend\Models\Products'))
                ->where("r.title LIKE '%" . $params['query'] . "%'")
                ->andWhere("r.category = ".$params['c'])->orderBy("$sort $order");
        }
        $paginator  = new PaginatorQueryBuilder(array(
            'builder'   => $builder,
            'limit'     => $limit,
            'page'      => $page
        ));
        return $paginator;

    }
    
    public function getCategory(){
        return $this->getRelated("Multiple\Frontend\Models\Category");
    }
    
    public function getVendor(){
        return $this->getRelated("Multiple\Frontend\Models\Vendor");
    }
}
