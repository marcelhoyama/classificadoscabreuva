<?php

class foodController extends controller{
    
    public function __construct() {
        parent::__construct();
    $u = new usuarios();
//    $u->verificarLogin();
        }
    
    public function index(){
        $dados=array('lista_palavra'=>'');
        
      
       
        $this->loadTemplate_3('food', $dados);
    }
}

