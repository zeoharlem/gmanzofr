<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Multiple\Backend\Controllers;

/**
 * Description of BlogController
 *
 * @author Theophilus
 */
class BlogController extends BaseController{
    //put your code here
    public function initialize() {
        parent::initialize();
        \Phalcon\Tag::appendTitle("Blog");
    }
}
