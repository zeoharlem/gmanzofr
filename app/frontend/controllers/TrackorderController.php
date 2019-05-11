<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of TrackorderController
 *
 * @author Theophilus
 */
class TrackorderController extends BaseController {
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle("Track Order");
    }
    
    public function indexAction(){
        if($this->request->isPost()){
            $jobId      = $this->request->getPost("id");
            $email      = $this->request->getPost("email");
            $getJobs    = $this->modelsManager->createBuilder()
                    ->from(
                            [
                                's' => 'Multiple\Frontend\Models\Order',
                                'j' => 'Multiple\Frontend\Models\Jobs',
                            ]
                        )
                    ->where('j.job_id = :jobid:', array("jobid" => $jobId))
                    ->andWhere('s.email = :email:', array("email" => $email))
                    ->andWhere('s.trans_id = j.trans_id')
                    ->getQuery()
                    ->execute();
            
            if($getJobs != false){
                foreach($getJobs as $keyJobs => $valueJobs){
                    $orderRow   = $valueJobs->s->getSales()->item_sold;
                    $stackflow[]    = array(
                        "j_id"      => $valueJobs->j->j_id,
                        "job_id"    => $valueJobs->j->job_id,
                        "customer"  => $valueJobs->j->customer_name,
                        "address"   => $valueJobs->j->customer_address,
                        "trackLink" => $valueJobs->j->tracking_link,
                        "jobToken"  => $valueJobs->j->job_token,
                        "orderId"   => $valueJobs->j->trans_id,
                        "jobHash"   => $valueJobs->j->job_hash,
                        "content"   => $this->__getRow($orderRow),
                        "dateOrder" => $valueJobs->s->date_of_order
                    );
                }
                $this->view->setVars(array(
                    "jobs"  => $stackflow
                ));
            }
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        return;
    }
    
    private function __getRow($orderString){
        $jsonDecodeRow  = json_decode($orderString);
        foreach($jsonDecodeRow as $keyOrderRow => $valueOrderRow){
            $stringTask[]   = $valueOrderRow;
        }
        return $stringTask;
    }
}
