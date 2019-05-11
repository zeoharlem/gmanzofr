<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author Theophilus Alamu <theophilus.alamu at gmail.com>
 */
namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;
class BaseController extends Controller{
    //put your code here
    public function initialize(){
        //var_dump($this->mailer); exit;
        \Phalcon\Tag::setTitleSeparator(' | ');
        \Phalcon\Tag::prependTitle('NetMartNg');
        //var_dump($this->session->get('auth')['dataImage']); exit;
        $this->assets->collection('headers')->addCss('assets/back/css/root.css');
        
        //Cascading style sheet for the login interface
        $this->assets->collection('login')
                ->addCss('assets/back/css/root.css');
        
        $this->assets->collection('loginfooters')
                ->addJs('assets/back/js/vendors.min.js');
        
        //Create | add the javascript script link
        $this->assets->collection('footers')
                ->addJs('assets/back/js/jquery.min.js')
                ->addJs('assets/back/js/bootstrap/bootstrap.min.js')
                ->addJs('assets/back/js/plugins.js')
                ->addJs('assets/back/js/bootstrap-select/bootstrap-select.js')
//                ->addJs('assets/back/js/bootstrap-toggle/bootstrap-toggle.min.js')
//                ->addJs('assets/back/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js')
//                ->addJs('assets/back/js/summernote/summernote.min.js')
//                ->addJs('assets/back/js/flot-chart/flot-chart.js')
//                ->addJs('assets/back/js/flot-chart/flot-chart-time.js')
//                ->addJs('assets/back/js/flot-chart/flot-chart-stack.js')
//                ->addJs('assets/back/js/flot-chart/flot-chart-pie.js')
//                ->addJs('assets/back/js/flot-chart/flot-chart-plugin.js')
//                ->addJs('assets/back/js/chartist/chartist.js')
//                ->addJs('assets/back/js/chartist/chartist-plugin.js')
//                ->addJs('assets/back/js/easypiechart/easypiechart.js')
//                ->addJs('assets/back/js/easypiechart/easypiechart-plugin.js')
//                ->addJs('assets/back/js/sparkline/sparkline.js')
//                ->addJs('assets/back/js/sparkline/sparkline-plugin.js')
//                ->addJs('assets/back/js/rickshaw/d3.v3.js')
//                ->addJs('assets/back/js/rickshaw/rickshaw.js')
//                ->addJs('assets/back/js/rickshaw/rickshaw-plugin.js')
                ->addJs('assets/back/js/datatables/datatables.min.js')
                ->addJs('assets/back/js/sweet-alert/sweet-alert.min.js')
                ->addJs('assets/back/js/kode-alert/main.js')
                ->addJs('assets/back/js/jquery-ui/jquery-ui.min.js')
                ->addJs('assets/back/js/moment/moment.min.js')
                ->addJs('assets/back/js/full-calendar/fullcalendar.js')
                ->addJs('assets/back/js/date-range-picker/daterangepicker.js')
                ->addJs('assets/back/js/custom.js');
        
        //create active for view on side bar menus
        $this->view->setVar('setActive', $this->component->helper);
    }
    
    public function __dataTableJsCss(){
        $this->assets->collection('headers')->addCss(
                'assets/js/datatables/datatables.css');
        $this->assets->collection('footers')->addJs(
                'assets/js/datatables/jquery.dataTables.js');
    }
    
    protected function __crossOriginPolicy(){
        $response   = new Phalcon\Http\Response();
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');
        $response->setHeader('Access-Control-Allow-Headers', 'Authorization');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST');
        $response->sendHeaders();
    }


    protected function __dataTableFlow($builder){
        if($this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            return $dataTables->fromBuilder($builder)->sendResponse();
        }
    }
    
    protected function __dataTable($builder){
        if($this->request->isGet() || $this->request->isPost()){
            $dataTables = new \DataTables\DataTable();
            return $dataTables->fromBuilder($builder)->sendResponse();
        }
    }
    
    protected function __dataTableArray($builder){
        if($this->request->isAjax()){
            $dataTables = new \DataTables\DataTable();
            return $dataTables->fromArray($builder)->sendResponse();
        }
    }
    
    public function __setActiveLink($string=''){
        $urlStringArray = preg_split("/\//",$_SERVER['REQUEST_URI']);
        $currentNameCtr = empty($string) ? $this->dispatcher->getControllerName() : $string;
        return in_array($currentNameCtr, $urlStringArray) ? 'active' : '';
    }
    
    //This method should be used for associative array
    /**
     * @param type $array
     * @return type array;
     */
    public function __buildRequest($array = array()){
        if($this->request->isPost()){
            $_POST   = $this->request->getPost() + $array;
            return $getPost     = $this->request->getPost();
        }
        else{
            $_GET   = $this->request->getQuery() + $array;
            return $getQuery    = $this->request->getQuery();
        }
    }
    
    //Get Array Conditions to replace post or get Query
    //Note that the index 0 returned is array and 1 is strings
    //Use like this $getWhatever = $this->__getArrayCon($array);
    protected function __getArrayCon(array $array){
        $strings = '';
        $results = array();
        foreach($array as $key => $value){
            $results[$key] = $value;
            $strings .= $key.' = :'.$key.': AND ';
        }
        return array(
            $results, substr($strings,0,-4)
        );
    }
    
    //Remove empty getPost() | getQuery() request
    protected function __getPostRemoveEmpty(){
        if($this->request->isPost()){
            foreach($this->request->getPost() as $key => $value){
                if(empty($value) || is_null($value)){
                    unset($_POST[$key]);
                }
            }
        }
        else{
            foreach($this->request->getQuery() as $key => $value){
                if(empty($value) || is_null($value)){
                    unset($_GET[$key]);
                }
            }
        }
    }
    
    //This method create a binding value based
    //Empty post remooved from the getPost() returned
    protected function __bindAfterRemoveEmpty($type='post'){
        $results = array();
        switch ($type) {
            case 'post':
                foreach($this->request->getPost() as $key => $value){
                    $results[$key] = $value;
                }
                return $results;
                break;
                
            case 'get':
                foreach($this->request->getQuery() as $key => $value){
                    if($key !== '_url'){
                        $results[$key] = $value;
                    }
                }
                return $results;
                break;
        }
    }
    
    //This method creates queries of values for binding
    protected function __conditionsRemoveEmpty($type='post'){
        $strings = '';
        switch ($type) {
            case 'post':
                foreach($this->request->getPost() as $key => $value){
                    $strings .= $key.' = :'.$key.': AND ';
                }
                return substr($strings,0,-4);
                break;
                
            case 'get':
                foreach($this->request->getQuery() as $key => $value){
                    if($key !== '_url'){
                        $strings .= $key.' = :'.$key.': AND ';
                    }
                }
                return substr($strings,0,-4);
                break;
        }
    }
    
    /**
     * @return String
    //if session has cart_item
    */
    public function __getSubTotal(){
        $total  = array();
        if($this->session->has('cart_item') || isset($_SESSION['cart_item'])){
            foreach($this->session->get('cart_item') as $keys=>$values){
                $total[]    =           $values['qty'] * $values['price'];
            }
        }
        return array_sum($total);
    }
    
    //This method is for this query construction
    private function __locateString(){
        return $this->session->has('strLocation') ? 
                '?strLocation='.$this->session->get('strLocation'):'';
    }
}
