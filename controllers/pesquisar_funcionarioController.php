<?php

class pesquisar_funcionarioController extends controller{
    
    public function index() {

$dados=array('lista_funcionario'=>'');



$this->loadTemplate_1('pesquisar_funcionario', $dados);
        
    }
}

