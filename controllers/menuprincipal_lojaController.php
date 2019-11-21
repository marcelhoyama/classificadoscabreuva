<?php

class menuprincipal_lojaController extends controller {

    public function __construct() {
       
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       
//$c= new clientes();
//$id=$_SESSION['lgCliente'];
//
//$dados['info']=$c->getDados($_SESSION['lgCliente']);

     

        $this->loadTemplate_func('menuprincipal_loja', $dados);
    }

}
