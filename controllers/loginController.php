<?php

class loginController extends controller{
    
   public function __construct() {
     parent::__construct();
    
       
    }
    
    public function index(){
    
        
        $dados=array();
        
        if(isset($_POST['email']) && !empty($_POST['email']) || isset($_POST['senha']) && !empty($_POST['senha'])) {
            
            $email= addslashes(trim($_POST['email']));
            $senha= md5(addslashes(trim($_POST['senha'])));
            
           $f=new funcionarios();
           if($f->logar($email, $senha) != TRUE){
               $dados['erro']= "Senha e ou Email não conferi!! Tente novamente!";
            
        }
        
           }
        $this->loadTemplate('login_entrar',$dados);
   
    
  
    
}

