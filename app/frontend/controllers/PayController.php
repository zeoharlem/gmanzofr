<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 1/17/2019
 * Time: 7:38 PM
 */

namespace Multiple\Frontend\Controllers;


use Phalcon\Mvc\View;

class PayController extends BaseController {

    public function indexAction(){
        $event  = Yabacon\Paystack\Event::capture();
        $myKeys = [
            "test"  => $this->config->paystack->secret
        ];
        $owner  = $event->discoverOwner($myKeys);
        if(!$owner){
            $this->response->redirect("dashboard/payfail?task=noKeysMatch");
        }
        switch ($event->obj->event){
            case 'charge.success':
                if('success' === $event->obj->data->status){

                }
                break;
        }
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        return;
    }

    public function checkAction(){
        $reference  = isset($_GET['reference']) ? $_GET['reference'] : '';
        if(!$reference){
            die('no reference');
        }
        try{
            $transaction    = $this->paystack->transaction->verify([
                'reference' => $reference
            ]);
        }
        catch (\Yabacon\Paystack\Exception\ApiException $apiException){
            var_dump($apiException->getResponseObject());
            die($apiException->getMessage());
        }
        if('success' === $transaction->data->status){
            $this->response->redirect("order/paysuccess?reference=".$transaction->data->reference);
        }
    }

    private function successPayPostRow($referenceId, $transactId){

    }
}