<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Backend\Controllers;

/**
 * Description of CustomersController
 *
 * @author Theophilus
 */
class CustomersController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Customers');
    }
    
    public function indexAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    public function showAction(){
        if($this->request->isPost() && $this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            $customers  = $this->modelsManager->createBuilder()
                    ->from(['r' => 'Multiple\Backend\Models\Order'])
                    ->where('r.vendor = "'.$this->session->get('auth')['register_id'].'"')
                    ->groupBy('r.register_id')
                    ->getQuery()
                    ->execute()
                    ->setHydrateMode(\Phalcon\Mvc\Model\Resultset::HYDRATE_ARRAYS)
                    ->toArray();
            $dataTables->fromArray($customers)->sendResponse();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        return;
    }
}
