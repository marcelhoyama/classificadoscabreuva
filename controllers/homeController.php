<?php

class homeController extends controller{
    
    public function __construct() {
        parent::__construct();
//    $u = new usuarios();
//    $u->verificarLogin();
        }
    
    public function index(){
        $dados=array();
        
       
        $this->loadTemplate('home', $dados);
    }
}

