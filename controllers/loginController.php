<?php

class loginController extends controller{
    
   public function __construct() {
     parent::__construct();
    
       
    }
    
    public function index(){
    
        
        $dados=array();
       
        $this->loadTemplate('login_entrar',$dados);
   
    
  
    
}

public function sair() {
    
    unset($_SESSION['lg']);
    
    header("Location:".BASE_URL);
    exit;
}

public function sairCliente() {
    
    unset($_SESSION['lgCliente']);
    
    header("Location:".BASE_URL);
    exit;
}
}
