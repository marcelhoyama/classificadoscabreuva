<?php

class pesquisar_clientesController extends controller{
    
    public function index() {

$dados=array();



$this->loadTemplate_1('pesquisar_clientes', $dados);
        
    }
}

