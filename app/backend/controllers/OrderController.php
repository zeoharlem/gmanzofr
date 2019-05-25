<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 5/22/2019
 * Time: 7:12 AM
 */

namespace Multiple\Backend\Controllers;


use Phalcon\Mvc\View;

class OrderController extends BaseController{

    public function initialize() {
        parent::initialize();
        $this->tag->appendTitle("Order");
    }

    public function indexAction(){
        if($this->request->isAjax() && $this->request->isGet()){
            $orderRow   = $this->modelsManager->createBuilder()
                ->from(['r' => "Multiple\\Backend\\Models\\Order"]);
            $dataTable  = new \DataTables\DataTable();
            $dataTable->fromBuilder($orderRow)->sendResponse();
            return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        }
        $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
    }
}