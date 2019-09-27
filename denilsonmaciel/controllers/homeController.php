<?php

class homeController extends controller{

    function __construct() {
        parent::__construct();
    }

    
    public function index(){
        
        $dados=array();
        
        
    
    
    
     $this->loadTemplate('home', $dados);
}

}