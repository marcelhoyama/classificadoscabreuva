<?php

class menuprincipalController extends controller {

    public function __construct() {
     parent::__construct();
    $f = new funcionarios();
    $f->verificarLogin();
       
    }

    public function index() {
        $dados = array('erro' => '');
       
       

     

        $this->loadView('menuprincipal', $dados);
    }

}
