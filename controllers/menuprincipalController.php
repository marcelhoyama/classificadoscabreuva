<?php

class menuprincipalController extends controller {

    public function __construct() {
     parent::__construct();
    $u = new usuarios();
    $u->verificarLogin();
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       

     

        $this->loadTemplate_3('menuprincipal', $dados);
    }

}
