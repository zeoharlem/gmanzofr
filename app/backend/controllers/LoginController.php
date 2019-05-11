<?php
/**
 * Created by PhpStorm.
 * User: Theophilus
 * Date: 2/18/2019
 * Time: 3:39 PM
 */
namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Admin;

class LoginController extends BaseController {

    public function initialize(){

    }

    public function indexAction(){
        if($this->request->isAjax()){
            $username   = trim($this->request->getPost("username"));
            $password   = trim($this->request->getPost("password"));
            $emailTask  = Admin::findFirstByEmail($username);

            if($emailTask != false){
                $checkHashRow   = $this->security->checkHash($password, $emailTask->password);
                if($checkHashRow != false){
                    $this->setAccessPageAccount($emailTask);
                    //$this->response->redirect("dashboard/?token=".uniqid());
                    $this->response->setJsonContent([
                        "status"    => "OK"
                    ])->send();
                }
                else{
                    $this->response->setJsonContent([
                        "status"    => "FAILED",
                    ])->send();
                }
            }
            else{
                $this->response->setJsonContent([
                    "status"    => "FAILED"
                ])->send();
            }
        }
        return $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
    }

    private function setAccessPageAccount(Admin $register){
        $this->session->set("auth", array(
            'fullname'              => ucwords($register->firstname),
            'email'                 => $register->email,
            'phone'                 => $register->phone,
            'codename'              => $register->codename,
            'register_id'           => $register->admin_id,
            'role'                  => $register->role,
        ));
    }
}