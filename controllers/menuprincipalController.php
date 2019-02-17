<?php

class menuprincipalController extends controller {

    public function __construct() {
       
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       

     

        $this->loadTemplate_1('menuprincipal', $dados);
    }

}
