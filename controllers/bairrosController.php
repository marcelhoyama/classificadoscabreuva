<?php

class bairrosController extends controller{
    
    public function index() {

$dados=array('lojas'=>'');
$l =new lojas();
$dados['listabairros']=$l->listarBairro();

$this->loadTemplate('bairros', $dados);
        
    }
}

