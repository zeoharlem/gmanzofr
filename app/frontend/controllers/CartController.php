<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Frontend\Controllers;

/**
 * Description of CartController
 *
 * @author Theophilus
 */
class CartController extends BaseController{
    //put your code here
    public $url;
    const __ZERO    = 0;
    
    public function initialize() {
        parent::initialize();
        $this->url    = new \Phalcon\Mvc\Url();
//        $this->url->setBasePath("http://gmanzo.com/");
        $this->url->setBasePath("http://localhost/gmanzofr/");
        \Phalcon\Tag::appendTitle("Cart Basket");
        //echo date("Y-m-d H:i:s", strtotime('01/18/2018 1:32 PM')); exit;
    }
    
    public function indexAction(){
        if($this->request->isAjax()) {
            $typeResp = new \Phalcon\Http\Response();
            //var_dump($this->__fixKeyTask("vendor_rid")); exit;
            $this->__cartQtyTask($this->request->getPost('item_product'));

            $serverHost = $_SERVER['SERVER_NAME'] == "localhost" ?
                $_SERVER['SERVER_NAME'] . '/gmanzofr' : $_SERVER['SERVER_NAME'];

            $typeResp->setHeader("Content-Type", "application/json");
            $typeResp->setJsonContent(array(
                "cart_item" => count($this->session->get('cart_item')),
                "total_amt" => $this->__grandtotalTaskQuery(),
                "taskQuery" => $this->__showTaskQueryString($serverHost)
            ));
            $this->view->disable();
            $typeResp->send();
        }
        else{
            $this->response->redirect("index?task=MULTI_PAGE");
        }
    }
    
    public function beforeExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher){
        $action     = $dispatcher->getActionName();
        $controller = $dispatcher->getControllerName();
        if($controller == "cart" && $action == "empty"){
            $this->session->remove('cart_item');
            $this->session->remove('total_cart');
            
            $dispatcher->forward(array(
                "controller"    => "index",
                "action"        => "index"
            ));
            return;
        }
    }
    
    public function showcartAction() {
        $serverHost = $_SERVER['SERVER_NAME'];
        
        if($this->request->hasPost('showcart')){
            $stringBuilt    = ''; 
            $counter        = 0; 
            $subTotal       = [];
            if(empty($_SESSION['cart_item'])){
                exit('Empty Shopping Basket');
            }
            $stringBuilt    = $this->__showTaskQueryString($serverHost);
            echo !empty($stringBuilt) ? $stringBuilt : 'Empty Shopping Basket(s)';
            $this->view->disable();
            exit;
        }
    }
    
    public function __grandtotalTaskQuery(){
        return number_format($this->__getsubtotal(), 2);
    }
    
    public function __getsubtotal(){
        $total  = array();
        if($this->session->has('cart_item')){
            foreach($this->session->get('cart_item') as $keys=>$values){
                $total[]    =           $values['qty'] * $values['price'];
            }
        }
        return array_sum($total);
    }
    
    public function showAction(){
        foreach($this->session->get('cart_item') as $keys=>$values){
            $total[]    = $values['qty'] * $values['price'];
        }
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $this->view->setVar("totalAmount", array_sum($total));
        return;
    }
    
    public function updateAction(){
        $typeRes    = new \Phalcon\Http\Response();
        $typeRes->setHeader("Content-Type", "application/json");
        if($this->request->isPost() && $this->request->isAjax()){
            $getPostIds = $this->request->getPost('update');
            $getQtyRows = $this->request->getPost('qtyRow');
            foreach($getPostIds as $keys => $values){
                if($getQtyRows[$keys] != 0){
                    $this->__updateItemRow($values, $getQtyRows[$keys]);
                }
                elseif($getQtyRows[$keys] == 0){
                    $this->__removeItemRow($values);
                }
            }
            $typeRes->setJsonContent(array(
                "response"  => "OK"
            ));
        }
        $typeRes->send();
        $this->view->disable(); 
        exit();
    }
    
    public function removeAction(){
        $typeRes    = new \Phalcon\Http\Response();
        $typeRes->setHeader("Content-Type", "application/json");
        if($this->request->isPost() && $this->request->isAjax()){
            $getItemProduct = $this->request->getPost("id");
            if($this->session->has('cart_item') || !empty($_SESSION['cart_item'])){
                foreach ($this->session->get('cart_item') as $keys => $values){
                    if($getItemProduct == $keys){
                        unset($_SESSION['cart_item'][$keys]);
                        $this->session->set('total_cart', $this->__grandtotalTaskQuery());
                        $typeRes->setJsonContent(array(
                            "response"  => "OK"
                        ));
                        $typeRes->send(); exit();
                    }
                    if(empty($_SESSION['cart_item'])){
                        $this->session->remove('cart_item');
                        $this->session->set('total_cart', $this->__grandtotalTaskQuery());
                        $typeRes->setJsonContent(array(
                            "response"  => "OK"
                        ));
                        $typeRes->send(); exit();
                    }
                }
            }
        }
        $this->view->disable();
    }
    
    public function emptyAction(){
        
    }
    
    private function __showTaskQueryString($serverHost){
        $stringBuilt        = '
			<li>
				<div class="widget_shopping_cart_content">

					<ul class="cart_list product_list_widget ">';
            foreach($this->session->get('cart_item') as $key => $value){
                $subTotal[]     = $value['qty'] * $value['price'];
                $stringBuilt    .= '
                    
                                        <li class="mini_cart_item">
							<a href="single-product.html">
								<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="'.$this->url->getBasePath().'/assets/uploads/'.$value['image'].'" alt="">'.ucwords($value['name']).'&nbsp;
							</a>
                                                        <br/><small>'.ucwords($value['category']).'</small>
							<span class="quantity">'.$value['qty'].' × <span class="amount">&#8358;'.$value['price'].'</span></span>
						</li>';
            }
            $stringBuilt    .= '</ul><!-- end product list -->


					<p class="total"><strong>Subtotal:</strong> <span class="amount">&#8358;'.number_format($value['price'] * $value['qty'], 2).'</span></p>


					<p class="buttons">
						<a class="button wc-forward" href="http://'.$serverHost.'/cart/show">View Cart</a>
						<a class="button checkout wc-forward" href="http://'.$serverHost.'/dashboard/">Checkout</a>
					</p>


				</div>
			</li>
		';
            return $stringBuilt;
    }
    
    /**
     * Set the Cart Task Row
     * @param type $id
     */
    private function __cartQtyTask($id,$qty=""){
        $getItemProduct = $id;
        if($this->request->isPost() && $this->request->isAjax()){
            $product    = \Multiple\Frontend\Models\
                    Products::findFirstByProduct_id($getItemProduct);
            $tQty       = empty($qty) ? 1 : $qty;
            //Set Item Array Values
            $itemTray   = array(
                $getItemProduct => array(
                    'qty'   => $tQty, 
                    'name'  => $product->title, 
                    'id'    => $getItemProduct, 
                    'price' => $product->sale_price,
                    'option' => '', 

                    //product->added_by returns objects
                    //'vendor_id' => $product->added_by,
                    //'vendor_rid'=> $product->vendor_id,
                    //_____ ______ ______ _____ _____ ____
                    'shipping' => 0, 'tax' => 0, 'coupon' => '', 
                    'subtotal'  => $product->sale_price * $tQty,
                    //'address'   => $product->getVendor()->address2,
                    'image'     => $product->front_image,
                    'category'   => $product->getCategory()->category_name,
                    //'location'  => $product->getVendor()->address1
                )
            );
            if($this->session->has('cart_item') || !empty($_SESSION['cart_item'])){
                if(array_key_exists($getItemProduct, $this->session->get('cart_item'))){
                    foreach($this->session->get('cart_item') as $keys => $values){
                        if($getItemProduct == $keys){
                            //Calculate the total price and assign to the session var
                            
                            $pTaskCounter   = (int)$this->session->get('cart_item')[$getItemProduct]['qty'] + 1;
                            $_SESSION['cart_item'][$keys]['qty']                                = $pTaskCounter;
                        }
                    }
                }
                else{
                    //Do not use array_merge() cos it will reassign the key value(index);
                    
                    $this->session->set('cart_item',$this->session->get('cart_item') + $itemTray);
                    $this->session->set('total_cart', $this->__grandtotalTaskQuery());
                }
            }
            else{
                $this->session->set('cart_item', $itemTray);
            }
        }
        $this->session->set('total_cart', $this->__grandtotalTaskQuery());
    }
    
    private function __updateItemRow($id, $qty){
        if($this->session->has('cart_item') || !empty($_SESSION['cart_item'])){
            if(array_key_exists($id, $this->session->get('cart_item'))){
                foreach($this->session->get('cart_item') as $keys => $values){
                    if($id == $keys){
                        //Calculate the total price and assign to the session var
                        $pTaskCounter                           = (int)$qty;
                        $_SESSION['cart_item'][$keys]['qty']    = $pTaskCounter;
                    }
                }
            }
        }
        $this->session->set('total_cart', $this->__grandtotalTaskQuery());
    }
    
    private function __removeItemRow($id){
        if($this->session->has('cart_item') || !empty($_SESSION['cart_item'])){
            foreach ($this->session->get('cart_item') as $keys => $values){
                if($id == $keys){
                    unset($_SESSION['cart_item'][$keys]);
                }
            }
        }
        $this->session->set('total_cart', $this->__grandtotalTaskQuery());
    }
    
    /**
     * Readjust the Total Amount
     */
    private function __adjustTotalRow(){
        foreach($this->session->get('cart_item') as $keys=>$values){
            $total[]    = $values['qty'] * $values['price'];
        }
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
