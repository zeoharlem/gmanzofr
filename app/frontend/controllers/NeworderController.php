<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 1/17/2019
 * Time: 11:46 AM
 */

namespace Multiple\Frontend\Controllers;


use Phalcon\Mvc\View;
use Phalcon\Tag;

class NeworderController extends BaseController {

    public function initialize(){
        parent::initialize();
        Tag::appendTitle("Order Now");
    }

    public function indexAction(){
        var_dump($this->getItemCartRow());
        if($this->request->isPost() && $this->request->isAjax()){
            $dateTimeRow    = date("Y-m-d H:i:s", strtotime(
                $this->request->getPost("delivery_time")));

            $tookanTime     = date("m/d/Y H:i:s", strtotime(
                $this->request->getPost("delivery_time")));
        }
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        return;
    }

    private function getItemCartRow(){
        return $this->session->get('cart_item');
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

    public function index2Action(){
        $returnType     = "";
        $stackRowType   = [];
        $getErrorMsg    = "";
        $taskFixRow     = FALSE;
        $typeRes        = new \Phalcon\Http\Response();
        $typeRes->setHeader("Content-Type", "application/json");
        if($this->request->isPost() && $this->request->isAjax()){
            //Assign and Collate every vendor's transaction
            $vendorRow      = $this->__fixKeyTask("vendor_rid");
            $keyVendorRow   = json_encode(array_keys($vendorRow));

            $dateTimeRow    = date("Y-m-d H:i:s", strtotime(
                $this->request->getPost("delivery_time")));

            $tookanTime     = date("m/d/Y H:i:s", strtotime(
                $this->request->getPost("delivery_time")));

            foreach($vendorRow as $keyRowTask => $valueRowTask){
                $transId    = $this->component->helper->makeRandomInts(10);

                $orderRowArray  = array(
                    "trans_id"      => $transId,
                    "vendor"        => $keyRowTask,
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
        exit();
        return;
    }
}