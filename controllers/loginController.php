<?php

class loginController extends controller{
    
   public function __construct() {
     parent::__construct();
    
       
    }
    
    public function index(){
    
        $dados= array();
   
        
               
        $this->loadView('login',$dados);
    }
    
    public function entrar() {
          
        $dados=array();
        
        if(isset($_POST['email']) && !empty($_POST['email'])){
            
            $email= addslashes(trim($_POST['email']));
            $senha= md5(addslashes(trim($_POST['senha'])));
            
           $f=new funcionarios();
           if($f->logar($email, $senha) != TRUE){
               $dados['erro']= "Senha e ou Email não conferi!! Tente novamente!";
            
        }
        
           }
        $this->loadView('login_entrar',$dados);
    }
    
     public function cadastrar() {
        $dados=array();
        
        $this->loadView('login_cadastrar',$dados);
    }
    
}

