<?php

class pesquisar_clientesController extends controller{
    
    
    
     public function __construct() {
     parent::__construct();
    $f = new funcionarios();
    $f->verificarLogin();
       
    }
    public function index() {

$dados=array('erro'=>'','listarClientes'=>'');

  $c =new clientes();

  

if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
    
    $palavra= addslashes(trim($_POST['buscar']));
  
    if($c->pesquisarCliente($palavra)== false){
    
        $dados['erro']='Nada encontrado!';
    } else {
     $dados['listarClientes']= $c->pesquisarCliente($palavra);
     
     
    }
    
}else{
    $dados['listarClientes']=$c->listarClientes();
}


$this->loadTemplate_func('pesquisar_clientes', $dados);
        
    }
}

