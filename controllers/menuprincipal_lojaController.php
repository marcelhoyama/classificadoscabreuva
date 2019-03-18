<?php

class menuprincipal_lojaController extends controller {

    public function __construct() {
       
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       

     

        $this->loadTemplate_1('menuprincipal_loja', $dados);
    }

}
