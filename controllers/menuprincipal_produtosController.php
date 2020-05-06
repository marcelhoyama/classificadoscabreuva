<?php

class menuprincipal_produtosController extends controller {

    public function __construct() {
      $c=new clientes();
      $c->verificarLogin();
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       
$c= new clientes();
$p=new produtos();

$id=$_SESSION['lgCliente'];
$id_loja=  $_SESSION['id_loja'];
$dados['info']=$c->getDados($_SESSION['lgCliente']);



$dados['totalloja']=$c->qtdLojaCliente($id);
$dados['lojas']=$c->getLojaCliente($id);
$dados['countProdutosLoja']=$p->countProdutosLoja($id_loja);
$dados['listarProdutos']=$p->listarProdutos($id_loja);
       
        $this->loadTemplate_3('menuprincipal_produtos', $dados);
    }
    
    
    public function sairCliente() {
    
    unset($_SESSION['lgCliente']);
    
    header("Location:".BASE_URL);
    exit;
}

}
