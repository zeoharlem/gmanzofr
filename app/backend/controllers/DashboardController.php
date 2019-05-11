<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 3:34 PM
 */

namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Order;
use Multiple\Backend\Models\Products;
use Multiple\Backend\Models\Sales;

class DashboardController extends BaseController {

    public function initialize(){
        parent::initialize();
        \Phalcon\Tag::appendTitle("Dashboard");
    }

    public function indexAction(){
        $this->view->setVars([
            "totalSalesRow" => $this->getTotalSalesRow(),
            "totalProducts" => $this->getTotalProductRow(),
            "totalOrderRow" => $this->getTotalOrderRow()
        ]);
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    public function taskAction(){
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
    }

    private function getTotalSalesRow(){
        return Sales::count();
    }

    private function getTotalProductRow(){
        return Products::count();
    }

    private function getTotalOrderRow(){
        return Order::count();
    }
}