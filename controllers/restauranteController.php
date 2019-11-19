<?php

class restauranteController extends controller{
    
    public function __construct() {
        parent::__construct();
    $u = new usuarios();
//    $u->verificarLogin();
        }
    
    public function index(){
        $dados=array('lista_palavra'=>'');
        
      
       
        $this->loadTemplate('restaurante', $dados);
    }
}

