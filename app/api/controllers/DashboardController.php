<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DashboardController
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Controllers;

class DashboardController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Dashboard');
    }
    
    public function indexAction(){
        $this->view->setVars(array(
            "weekRow"   => $this->__getWeeksRow(),
            "dayRow"    => $this->__getTodaysRow(),
            "monthRow"  => $this->__getMonthRow()
        ));
        $categories = $this->__getListCategory();
        $this->view->setVars(array(
            "categories" => $categories,"catCount" => count($categories->toArray())));
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
    
    private function __getTodaysRow(){
        $salesBuilder   = $this->modelsManager->createBuilder()
                ->columns([
                    'WEEK(r.date_of_order)',
                    'r.item_sold','r.status',
                    'r.date_of_order','r.register_id',
                    'r.vendor_id','r.trans_id','r.sales_id'
                ])
                ->from(['r' => '\Multiple\Backend\Models\Sales'])
                //->where('r.vendor_id = "'.$this->session->get('auth')['register_id'].'"')
                ->andWhere('DATE(r.date_of_order) = CURDATE()')
                ->getQuery()
                ->execute()
                ->setHydrateMode(\Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS)
                ->toArray();
        foreach($salesBuilder as $keySaleBuild => $valueSaleBuild){
            $stackflow[]  = $this->__itemRow($valueSaleBuild['item_sold']);
            //var_dump($valueSaleBuild);
        }
        return array_sum($stackflow);
    }
    
    private function __getWeeksRow(){
        $salesBuilder   = $this->modelsManager->createBuilder()
                ->columns([
                    'WEEK(r.date_of_order)',
                    'r.item_sold','r.status',
                    'r.date_of_order','r.register_id',
                    'r.vendor_id','r.trans_id','r.sales_id'
                ])
                ->from(['r' => '\Multiple\Backend\Models\Sales'])
                //->where('r.vendor_id = "'.$this->session->get('auth')['register_id'].'"')
                ->getQuery()
                ->execute()
                ->setHydrateMode(\Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS)
                ->toArray();
        foreach($salesBuilder as $keySaleBuild => $valueSaleBuild){
            $stackflow[]  = $this->__itemRow($valueSaleBuild['item_sold']);
            //var_dump($valueSaleBuild);
        }
        return array_sum($stackflow);
    }
    
    private function __getMonthRow(){
        $salesBuilder   = $this->modelsManager->createBuilder()
                ->columns([
                    'MONTH(r.date_of_order)',
                    'r.item_sold','r.status',
                    'r.date_of_order','r.register_id',
                    'r.vendor_id','r.trans_id','r.sales_id'
                ])
                ->from(['r' => '\Multiple\Backend\Models\Sales'])
                //->where('r.vendor_id = "'.$this->session->get('auth')['register_id'].'"')
                ->andWhere('MONTH(r.date_of_order) = MONTH(NOW())')
                ->getQuery()
                ->execute()
                ->setHydrateMode(\Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS)
                ->toArray();
        foreach($salesBuilder as $keySaleBuild => $valueSaleBuild){
            $stackflow[]  = $this->__itemRow($valueSaleBuild['item_sold']);
            //var_dump($valueSaleBuild);
        }
        return array_sum($stackflow);
    }

    private function __getListCategory(){
        $categories = \Multiple\Backend\Models\Category::find();
        return $categories;
    }
    
    private function __itemRow($string){
        //Convert to JSON for strings
        $kayRow = json_decode($string, true);
        return($kayRow[0]['subtotal']);
    }
}
