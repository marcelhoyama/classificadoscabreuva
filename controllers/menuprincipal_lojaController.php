<?php

class menuprincipal_lojaController extends controller {

    public function __construct() {
      $c=new clientes();
      $c->verificarLogin();
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       
$c= new clientes();
$id=$_SESSION['lgCliente'];

$dados['info']=$c->getDados($_SESSION['lgCliente']);



$dados['totalloja']=$c->qtdLojaCliente($id);
$dados['lojas']=$c->getLojaCliente($id);

       
        $this->loadTemplate_3('menuprincipal_loja', $dados);
    }
    
    
    public function sairCliente() {
    
    unset($_SESSION['lgCliente']);
    
    header("Location:".BASE_URL);
    exit;
}

}
