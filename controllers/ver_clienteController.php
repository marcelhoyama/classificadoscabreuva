<?php

class ver_clienteController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '','qtdLojas'=>'');

$f=new funcionarios();
$id=$_SESSION['lg'];
    $dados['nomefunc']=$f->getName($id);
   $dados['id_funcionario']=$id;     
$c =new clientes();
     

       
        if (isset($_GET['id']) && !empty($_GET['id'])) {
       
            $id_cliente=$_GET['id'];
            $dados['dadosCliente']=$c->getDados($id_cliente);
       
            
            $dados['qtdLojas']=$c->qtdLojaCliente($id_cliente);
            
            
        }
        




        $this->loadTemplate_func('ver_cliente', $dados);
    }

}
