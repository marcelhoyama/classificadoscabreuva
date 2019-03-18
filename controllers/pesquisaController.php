<?php

class pesquisaController extends controller{
    
    public function index() {

$dados=array();



$this->loadTemplate('pesquisa', $dados);
        
    }
}

