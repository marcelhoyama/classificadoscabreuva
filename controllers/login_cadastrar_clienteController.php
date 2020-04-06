<?php

class login_cadastrar_clienteController extends controller{
    
   public function __construct() {
     parent::__construct();
    
       
    }
    
    public function index(){
    
        
        $dados=array();
        
        if(isset($_POST['email']) && !empty($_POST['email']) || isset($_POST['senha']) && !empty($_POST['senha'])) {
            $ramo= addslashes($_POST['ramo']);
            $nome= addslashes(trim($_POST['nome']));
            $sexo= addslashes($_POST['sexo']);
            $email= addslashes(trim($_POST['email']));
            $senha= md5(trim($_POST['senha']));
            $telefone= addslashes(trim($_POST['telefone']));
            
           $c=new clientes();
           if($c->cadastrar($ramo,$nome,$sexo,$email, $senha, $telefone) != TRUE){
               $dados['erro']= "Senha e ou Email não conferi!! Tente novamente!";
            
        }
        
           }
        $this->loadTemplate('login_cadastrar_cliente',$dados);
   
    
  
    
}

}