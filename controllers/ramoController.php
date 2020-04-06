<?php

class ramoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
        
    }

    public function index() {
        $dados = array();






        $this->loadView('ramo', $dados);
    }

}
