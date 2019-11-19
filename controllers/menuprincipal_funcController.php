<?php

class menuprincipal_funcController extends controller {

    public function __construct() {
       
       $f= new funcionarios();
       $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '');
       
       

     

        $this->loadTemplate_func('menuprincipal_func', $dados);
    }

}
