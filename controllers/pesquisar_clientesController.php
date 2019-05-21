<?php

class pesquisar_clientesController extends controller{
    
    
    
     public function __construct() {
     parent::__construct();
    $f = new funcionarios();
    $f->verificarLogin();
       
    }
    public function index() {

$dados=array('erro'=>'');

  $c =new clientes();
  
  $dados['listarClientes']=$c->listarClientes();

if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
    
    $palavra= addslashes(trim($_POST['buscar']));
  
    if($c->pesquisarCliente($palavra)== false){
    
        $dados['erro']='Nada encontrado!';
    } else {
       $dados['listarClientes']= $c->pesquisarCliente($palavra);
    }
    
}


$this->loadTemplate_1('pesquisar_clientes', $dados);
        
    }
}

