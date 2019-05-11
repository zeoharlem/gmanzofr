<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;
use Multiple\Frontend\Models\Sales;
use Phalcon\Mvc\View;

/**
 * Description of DashboardController
 *
 * @author Theophilus
 */
class DashboardController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle("Dashboard");
    }
    
    public function indexAction(){
        $this->view->setVars(array(
            "subtotal"      => $this->__setTotalAmount(),
            "totalWithD"    => $this->__setTotalAmount(300),
            "intTotalWith"  => $this->__setIntTotalAmount(300),
            "firstname"     => $this->session->get('auth')['fullname'],
            "lastname"      => $this->session->get('auth')['lastname'],
            "phone"         => $this->session->get('auth')['phone_number'],
            "email"         => $this->session->get('auth')['email'],
        ));
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    public function beforeExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher){
        
    }


    public function paysuccessAction(){
        if($this->request->hasQuery("reference")){
            $reference  = $this->request->getQuery("reference");
            $checkRef   = Sales::findFirstByTrans_id($reference);
            if(!$checkRef){
                $message    = "Transaction Done!";
            }
            else{
                $message    = "Transaction Reference Not Found!";
            }
        }
        $this->view->setVar("messageFound", $message);
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function payfailAction(){
        return $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }

    public function orderAction(){
        if($this->request->isGet() && $this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            $register   = $this->session->get('auth')['register_id'];
            $jobBuilder = $this->modelsManager->createBuilder()
                    ->from(['r' => 'Multiple\Frontend\Models\Jobs'])
                    ->where('r.register_id = "'.$register.'"')
                    ->getQuery()->execute();
            
            foreach($jobBuilder as $keyJobs => $valuesJobs){
                $row    = $this->__getRow($valuesJobs->sales->item_sold);
                $stackflow[]    = array(
                    "sales_id"  => $valuesJobs->sales->sales_id,
                    "trans_id"  => $valuesJobs->trans_id,
                    "item_sold" => $row,
                    "dateorder" => $valuesJobs->sales->date_of_order,
                    "delivery"  => $valuesJobs->sales->delivery_time,
                    "status"    => $valuesJobs->sales->status,
                    "amount"    => $this->__taskAmount($row),
                    "tracking"  => $valuesJobs->tracking_link
                );
            }
            
            $dataTables->fromArray($stackflow)->sendResponse();
            $this->view->disable(); exit();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    public function trackAction(){
        if($this->request->isPost() && $this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            $register   = $this->session->get('auth')['register_id'];
            $jobBuilder = $this->modelsManager->createBuilder()
                    ->from(['r' => 'Multiple\Frontend\Models\Jobs'])
                    ->where('r.register_id = "'.$register.'"')
                    ->getQuery()->execute();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }

    public function successAction(){
        $message    = "";
        if($this->request->hasQuery("reference")){
            $reference  = $this->request->getQuery("reference",'int');
            $checkRef   = Sales::findFirstByTrans_id($reference);
            if($checkRef){
                $message    = "Transaction Completed!";
            }
            else{
                $message    = "Transaction Reference Not Found!";
            }
        }
        $this->view->setVar("messageFound", $message);
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        return;
    }

    private function __setTotalAmount($d = 0){
        foreach($this->session->get('cart_item') as $key => $value){
            $totalRow[] = (int)$value['price'] * $value['qty'];
        }
        return number_format(array_sum($totalRow)+$d, 2);
    }

    private function __setIntTotalAmount($d = 0){
        foreach($this->session->get('cart_item') as $key => $value){
            $totalRow[] = (int)$value['price'] * $value['qty'];
        }
        return array_sum($totalRow)+$d;
    }

    private function __getRow($orderString){
        $jsonDecodeRow  = json_decode($orderString);
        foreach($jsonDecodeRow as $keyOrderRow => $valueOrderRow){
            $stringTask[]   = $valueOrderRow;
        }
        return $stringTask;
    }
    
    private function __taskAmount($array){
        foreach ($array as $key => $value){
            if(!empty($value)) {
                $total[]    = @$value->price * @$value->qty;
            }
        }
//        foreach($array as $key => $value){
//            $total[]    = $value->price * $value->qty;
//        }
        return array_sum($total);
    }
}
