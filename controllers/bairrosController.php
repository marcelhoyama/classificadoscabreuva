<?php

class bairrosController extends controller{
    
    public function index() {

$dados=array('lojas'=>'');
$b =new bairros();
$l =new lojas();
$dados['lojas']=$l->listarLojas();
$dados['listabairros']=$b->listarBairros();

$this->loadTemplate('bairros', $dados);
        
    }
}

