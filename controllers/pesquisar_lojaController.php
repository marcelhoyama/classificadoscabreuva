<?php

class pesquisar_lojaController extends controller{
    
    public function index() {

$dados=array('listarlojas'=>'');



$this->loadTemplate_1('pesquisar_loja', $dados);
        
    }
}

