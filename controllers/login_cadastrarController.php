<?php

class login_cadastrarController extends controller{
    
   public function __construct() {
     parent::__construct();
    
       
    }
    
    public function index(){
    
        
        $dados=array();
        
        if(isset($_POST['email']) && !empty($_POST['email']) || isset($_POST['senha']) && !empty($_POST['senha'])) {
            
            $nome= addslashes(trim($_POST['nome']));
            $telefone= addslashes(trim($_POST['telefone']));
            $email= addslashes(trim($_POST['email']));
            $senha= md5(addslashes(trim($_POST['senha'])));
            $sexo= addslashes($_POST['sexo']);
            
            
           $u=new usuarios();
           if($u->cadastro($nome,$telefone,$email, $senha,$sexo) != TRUE){
               $dados['erro']= "Confira todos os campos se estão corretos!! Tente novamente!";
            
        }
        
           }
        $this->loadTemplate('login_cadastrar',$dados);
   
    
  
    
}

}