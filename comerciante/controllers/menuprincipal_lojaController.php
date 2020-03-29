<?php

class menuprincipal_lojaController extends controller {

    public function __construct() {
       
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       
$c= new clientes();
$id=$_SESSION['lgCliente'];

$dados['info']=$c->getDados($_SESSION['lgCliente']);

$l=new lojas();

$dados['totalloja']=$c->qtdLojaCliente($id);
$dados['lojas']=$c->getIdLojaCliente($id);

       
        $this->loadTemplate_3('menuprincipal_loja', $dados);
    }

}
