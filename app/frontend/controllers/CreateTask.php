<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of CreateTask
 *
 * @author Theophilus
 */
class CreateTask {
    //put your code here
    /**
     * The Detail variable is the details of order
     * In the custom template on Tookan DeliveryDetails is table type with 5 columns
     * @param type $customer
     * @param type $time
     * @param type $detail
     * @param type $json_decode
     * @return type
     */
    private function __createTaskRow($customer, $time, $detail,$json_decode = false){
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
                        \"custom_field_template\": \"Order_Gmanzo\",
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
                            \"label\": \"DeliveryDetails\",
                            \"data\": ".json_encode($detail)."
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
}
