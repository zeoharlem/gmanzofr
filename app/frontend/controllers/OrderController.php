<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;
use Phalcon\Exception;
use Phalcon\Mvc\View;

/**
 * Description of OrderController
 *
 * @author Theophilus
 */
class OrderController extends BaseController{
    //put your code here
//    const ACESS_TOKEN = 'df6bb34d1342938032946e88cce350dcce17d58c2267a0c74474b933be45823a';
    //This Key Belongs to GMANZO Company not to be used anytime by another company
    const ACESS_TOKEN = '29f741c22519903ae0428adaef01b0de23d2e0307626d82470ccf74fccb6d05b';
    const PARAMETER_MISSING = 100, ACTION_COMPLETE = 200, SHOW_ERROR_MESSAGE = 201;
    const INVALID_ACCESS_TOKEN = 101, ERROR_IN_EXECUTION = 404; 
    public $_agent  = 22206;
    private $__arrayRowTask;

    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle('Order');
        $this->__arrayRowTask   = [];
    }
    
    public function indexAction(){
        $transId        = $this->component->helper->makeRandomInts(10);
        $totalPayment   = (int)$this->request->getPost("amount") * 100;
        $this->session->set("savedBillingTask", $this->request->getPost());
        $payStackRow    = $this->paystackRow($totalPayment, $transId, $this->request->getPost("email"));
        $this->response->setJsonContent($payStackRow)->send();
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        return;
    }
    public function paysuccessAction(){
        $returnType     = "";
        $getErrorMsg    = "";
        $stackRowType   = [];
        $taskFixRow     = FALSE;
        $keyRowTask     = 1;
        if($this->request->hasQuery("reference")){
            $transId    = $this->request->getQuery("reference");
            if(!empty($transId) && !is_null($transId)){
                $savedBillingTask   = $this->session->get("savedBillingTask");
                $dateTimeRow    = date("Y-m-d H:i:s", strtotime($savedBillingTask["delivery_time"]));
                //$tookanTime     = date("m/d/Y H:i:s", strtotime($this->request->getPost("delivery_time")));
                $tookanTime     = date("Y-m-d H:i:s", strtotime($savedBillingTask["delivery_time"]));

                $orderRowArray  = array(
                    "trans_id"      => $transId,
                    'delivery_time' => $dateTimeRow,
                    "firstname"     => $savedBillingTask["firstname"],
                    "lastname"      => $savedBillingTask["lastname"],
                    "phonenumber"   => $savedBillingTask["phonenumber"],
                    "register_id"   => $this->session->get('auth')['register_id'],
                    "address"       => $savedBillingTask["address"],
                    "email"         => $savedBillingTask["email"],
                );

                $salesRowArray  = array(
                    "trans_id"      => $transId,
                    'delivery_time' => $dateTimeRow,
                    "item_sold"     => json_encode($this->session->get("cart_item")),
                    'register_id'   => $this->session->get('auth')['register_id'],
                    'status'        => 'pending',
                    "vendor_id"     => $keyRowTask
                );

                //Check Whether the reference Already Existed;
                $checkRef   = \Multiple\Frontend\Models\Order::findFirstByTrans_id($transId);
                if($checkRef != false){
                    $this->response->redirect("dashboard/?task=used_trans_id&r=".uniqid("xLm"));
                    return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
                }

                $returnType = $this->__createTaskRow($orderRowArray, $tookanTime);
                $stackRowType[] = $returnType;
                $jsonRowRaw     = json_decode($returnType);
                $decoded        = json_decode(json_encode($jsonRowRaw->data), TRUE);

                if($jsonRowRaw->status == self::ACTION_COMPLETE){
                    try{
                        $manager        = new \Phalcon\Mvc\Model\Transaction\Manager();
                        $transaction    = $manager->get();
                        $orderRow       = new \Multiple\Frontend\Models\Order();
                        $orderRow->setTransaction($transaction);
                        if(!$orderRow->create($orderRowArray)){
                            $transaction->rollback("Order: ".implode(", ",$orderRow->getMessages()));
                        }

                        $salesRow   = new \Multiple\Frontend\Models\Sales();
                        $salesRow->setTransaction($transaction);
                        if(!$salesRow->create($salesRowArray)){
                            $transaction->rollback("Sales: ".implode(", ",$salesRow->getMessages()));
                        }

                        $jobs       = new \Multiple\Frontend\Models\Jobs();
                        $jobs->setTransaction($transaction);
                        $stackflow  = array(
                            "job_id"            => $decoded['job_id'],
                            "customer_name"     => $decoded['customer_name'],
                            "customer_address"  => $decoded['customer_address'],
                            "tracking_link"     => $decoded['tracking_link'],
                            "register_id"       => $this->session->get('auth')['register_id'],
                            "job_token"         => $decoded['job_token'],
                            "trans_id"          => $decoded['order_id'],
                            "job_hash"          => $decoded['job_hash'],
                        );

                        if(!$jobs->create($stackflow)){
                            $transaction->rollback("Job: ".implode(", ",$jobs->getMessages()));
                        }
                        $transaction->commit();
                        $this->response->redirect("dashboard/success?reference=".$transId);
                    }
                    catch (\Phalcon\Mvc\Model\Transaction\Failed $ex){
                        $getErrorMsg    = "Reason: ".$ex->getMessage();
                        $this->response->redirect("dashboard/payfail?task=noKeysMatch&error=".$getErrorMsg);
                    }
                }
            }
            else{
                return $this->response->redirect("dashboard/payfail?task=emptyRef&error=".$getErrorMsg);
            }
        }
        else{
            return $this->response->redirect("dashboard/payfail?task=norefenceKey&error=".$getErrorMsg);
        }
        return $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    }

    public function doAction(){
        $returnType     = "";
        $stackRowType   = [];
        $getErrorMsg    = "";
        $taskFixRow     = FALSE;
        $typeRes        = new \Phalcon\Http\Response();
        $typeRes->setHeader("Content-Type", "application/json");
        $dateTimeRow    = date("Y-m-d H:i:s", strtotime($this->request->getPost("delivery_time")));
        $tookanTime     = date("m/d/Y H:i:s", strtotime($this->request->getPost("delivery_time")));

        //Perform the Order Action for Posting Data into the pay
        //Paystack info should be used here now
        $transId    = $this->component->helper->makeRandomInts(10);
        $payStackRow    = $this->paystackRow(2000, $transId, $this->request->getPost("email"));
        foreach($this->session->get("cart_item") as $keyRowTask => $valueRowTask){
            $orderRowArray  = array(
                "trans_id"      => $transId,
                'delivery_time' => $dateTimeRow,
                "firstname"     => $this->request->getPost("firstname"),
                "lastname"      => $this->request->getPost("lastname"),
                "phonenumber"   => $this->request->getPost("phonenumber"),
                "register_id"   => $this->session->get('auth')['register_id'],
                "address"       => $this->request->getPost("address"),
                "email"         => $this->request->getPost("email"),
            );
            $salesRowArray  = array(
                "trans_id"      => $transId,
                'delivery_time' => $dateTimeRow,
                "item_sold"     => json_encode($valueRowTask),
                'register_id'   => $this->session->get('auth')['register_id'],
                'status'        => 'pending',
                "vendor_id"     => $keyRowTask
            );
            $returnType = $this->__createTaskRow($orderRowArray, $tookanTime);
            $stackRowType[]   = $returnType;
            $jsonRowRaw = json_decode($returnType);
            $decoded    = json_decode(json_encode($jsonRowRaw->data), TRUE);

            if($jsonRowRaw->status == self::ACTION_COMPLETE){
                try{
                    $manager        = new \Phalcon\Mvc\Model\Transaction\Manager();
                    $transaction    = $manager->get();
                    $orderRow       = new \Multiple\Frontend\Models\Order();
                    $orderRow->setTransaction($transaction);
                    if(!$orderRow->create($orderRowArray)){
                        $transaction->rollback("Order: ".implode(", ",$orderRow->getMessages()));
                    }

                    $salesRow   = new \Multiple\Frontend\Models\Sales();
                    $salesRow->setTransaction($transaction);
                    if(!$salesRow->create($salesRowArray)){
                        $transaction->rollback("Sales: ".implode(", ",$salesRow->getMessages()));
                    }

                    $jobs       = new \Multiple\Frontend\Models\Jobs();
                    $jobs->setTransaction($transaction);
                    $stackflow  = array(
                        "job_id"            => $decoded['job_id'],
                        "customer_name"     => $decoded['customer_name'],
                        "customer_address"  => $decoded['customer_address'],
                        "tracking_link"     => $decoded['tracking_link'],
                        "register_id"       => $this->session->get('auth')['register_id'],
                        "job_token"         => $decoded['job_token'],
                        "trans_id"          => $decoded['order_id'],
                        "job_hash"          => $decoded['job_hash'],
                    );
                    if(!$jobs->create($stackflow)){
                        $transaction->rollback("Job: ".implode(", ",$jobs->getMessages()));
                    }
                    $transaction->commit();
                    $taskFixRow = TRUE;
                }
                catch (\Phalcon\Mvc\Model\Transaction\Failed $ex){
                    //$this->flash->error("Reason: ".$ex->getMessage());
                    $getErrorMsg    = "Reason: ".$ex->getMessage();
                    $taskFixRow     = FALSE;
                }
            }
            $typeRes->setJsonContent(array(
                "data"      => $stackRowType,
                "message"   => $getErrorMsg,
                "tMsgError" => $jsonRowRaw->message,
                "task"      => $taskFixRow
            ));
            $typeRes->send();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        return;
    }

    public function historyAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    public function trackAction(){
        $typeRes    = new \Phalcon\Http\Response();
        $typeRes->setHeader("Content-Type", "application/json");
        if($this->request->isPost() && $this->request->isAjax()){
            $track_id   = $this->request->getPost("track_id");
            $getTracks  = \Multiple\Frontend\Models\Jobs::find([
                "conditions"    =>"job_id = ?1",
                "bind"          => array(1 => $track_id)
            ]);
            if($getTracks){
                $typeRes->setJsonContent(array(
                    "response"  => "OK",
                    "data"      => $getTracks->toArray()
                ));
            }
            else{
                $typeRes->setJsonContent(array(
                    "response"  => "ERROR",
                    "data"      => []
                ));
            }
            $typeRes->send();
            $this->view->disable();
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_AFTER_TEMPLATE);
        return;
    }
    
    private function __triggerTaskRow($customer, $vendor, $time, $testKey){
        $arrayRowTask   = [];
        $returnRowTask  = [];
        $stringRow      = "";
        foreach($vendor as $keyRow => $valueRow){
            if($testKey == $valueRow['vendor_rid']){
                $arrayRowTask  = array(
                    $valueRow["name"], 
                    $valueRow['address'],
                    $valueRow['qty'], 
                    $valueRow['price'],
                    $valueRow['subtotal']
                );
                $returnRowTask[]    = $this->__createTaskRow(
                        $customer, $time, $arrayRowTask);
            }
            if($testKey != $valueRow['vendor_rid']){
                $arrayRowTask[]  = array(
                    $valueRow["name"], 
                    $valueRow['address'],
                    $valueRow['qty'], 
                    $valueRow['price'],
                    $valueRow['subtotal']
                );
                $returnRowTask[]    = $this->__createTaskRow(
                        $customer, $time, $arrayRowTask);
            }
        }
        $this->__arrayRowTask[]   = $arrayRowTask;
        return $returnRowTask;
    }

    private function paystackRow($amount, $ref, $email){
        try{
            $transaction    = $this->paystack->transaction->initialize([
                'amount'    => $amount,
                'reference' => $ref,
                'email'     => $email
            ]);
            return $transaction->data;
        }
        catch (\Yabacon\Paystack\Exception\ApiException $exception){
            return $exception->getResponseObject();
        }
    }
    
    private function __createTaskRow($customer, $time,$json_decode = false){
        $typeRespo  = new \Phalcon\Http\Response();
        $jsonString = "{
                        \"api_key\": \"".self::ACESS_TOKEN."\",
                        \"order_id\": \"".$customer['trans_id']."\",
                        \"team_id\": \"\",
                        \"auto_assignment\": \"0\",
                        \"job_description\": \"Groceries Delivery\",
                        \"customer_email\": \"".$customer['email']."\",
                        \"customer_username\": \"".$customer['lastname']." ".$customer['firstname']."\",
                        \"customer_phone\": \"".$customer['phonenumber']."\",
                        \"customer_address\": \"".$customer['address']."\",
                        \"custom_field_template\": \"\",
                        \"latitude\": \"\",
                        \"longitude\": \"\",
                        \"job_delivery_datetime\": \"".$time."\",
                        \"has_pickup\": \"0\",
                        \"has_delivery\": \"1\",
                        \"layout_type\": \"0\",
                        \"tracking_link\": 1,
                        \"timezone\": \"+1\",
                        \"meta_data\": [
                          {
                            \"label\": \"\",
                            \"data\": \"\"
                          }
                        ],
                        \"fleet_id\": \"17769\",
                        \"ref_images\": [
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\",
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\"
                        ],
                        \"notify\": 1,
                        \"tags\": \"\",
                        \"geofence\": 0
                    }";
        $curlRespo  = $this->__curlRequestTask("https://api.tookanapp.com/v2/create_task", $jsonString);
        return $json_decode ? json_decode($curlRespo) : $curlRespo;
    }
    
    /**
     * Create Task to Manage Tookan Order
     * @param type $customer
     * @param type $vendor
     * @param type $order
     * @param type $json_decode
     * @return type
     */
    private function __createPickDelTaskRow($customer, $vendor, $order, $json_decode = false){
        $typeRespo  = new \Phalcon\Http\Response();
        $jsonString = "{
                        \"api_key\": \"".self::ACESS_TOKEN."\",
                        \"order_id\": \"".$customer['trans_id']."\",
                        \"team_id\": \"\",
                        \"auto_assignment\": \"0\",
                        \"job_description\": \"Groceries Pick Up / Delivery\",
                        \"job_pickup_phone\": \"".$vendor->phone."\",
                        \"job_pickup_name\": \"".$vendor->display_name."\",
                        \"job_pickup_email\": \"\",
                        \"job_pickup_address\": \"".$vendor->address2."\",
                        \"job_pickup_latitude\": \"".$vendor->latitude." \"\",
                        \"job_pickup_longitude\": \"".$vendor->longitude."\"\",
                        \"job_pickup_datetime\": \"".date('m/d/Y H:i:s', strtotime(('+1 hour')))."\",
                        \"customer_email\": \"".$customer['email']."\",
                        \"customer_username\": \"".$customer['lastname']." ".$customer['firstname']."\",
                        \"customer_phone\": \"".$customer['phonenumber']."\",
                        \"customer_address\": \"".$customer['address']."\",
                        \"latitude\": \"\",
                        \"longitude\": \"\",
                        \"job_delivery_datetime\": \"".$customer['delivery_time']." \",
                        \"has_pickup\": \"1\",
                        \"has_delivery\": \"1\",
                        \"layout_type\": \"0\",
                        \"tracking_link\": 1,
                        \"timezone\": \"+1\",
                        \"custom_field_template\": \"\",
                        \"meta_data\": [
                          {
                            \"label\": \"Product\",
                            \"data\": \"".$order['product_title']."\"
                          },
                          {
                            \"label\": \"Quantity\",
                            \"data\": \"".$order['total_quantity']."\"
                          },
                          {
                            \"label\": \"Price\",
                            \"data\": \"".$order['total_price']."\"
                          },
                          {
                            \"label\": \"Price\",
                            \"data\": \"".$vendor['address1']."\"
                          }
                          
                        ],
                        \"pickup_custom_field_template\": \"\",
                        \"pickup_meta_data\": [
                          {
                            \"label\": \"Product\",
                            \"data\": \"".$order['product_title']."\"
                          },
                          {
                            \"label\": \"Quantity\",
                            \"data\": \"".$order['total_quantity']."\"
                          },
                          {
                            \"label\": \"Price\",
                            \"data\": \"".$order['total_price']."\"
                          },
                          {
                            \"label\": \"Store Address\",
                            \"data\": \"".$vendor['address1']."\"
                          }
                        ],
                        \"fleet_id\": \"\",
                        \"p_ref_images\": [
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\",
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\"
                        ],
                        \"ref_images\": [
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\",
                          \"http://tookanapp.com/wp-content/uploads/2015/11/logo_dark.png\"
                        ],
                        \"notify\": 1,
                        \"tags\": \"\",
                        \"geofence\": 0
                    }";
        $curlRespo  = $this->__curlRequestTask("https://api.tookanapp.com/v2/create_task", $jsonString);
        return $json_decode ? json_decode($curlRespo) : $curlRespo;
    }
    
    /**
     * 
     * @param type $url
     * @param string $token
     * @param string $jsonString
     * @return string
     */
    private function __curlRequestTask($url, $jsonString){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    /**
     * @param string $key
     * @return array
     * Group array with the same value together
     */
    private function __fixKeyTask($key=''){
        $return = array();
        foreach($this->session->get('cart_item') as $keys=>$values){
            $return[$values[$key]][]   = $values;
        }
        return $return;
    }
}
