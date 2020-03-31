<?php

class comercioController extends controller{
    
    public function index() {

$dados=array('lojas'=>'');
$l =new lojas();
$dados['lojas']=$l->listarLojas();

$this->loadTemplate('comercio', $dados);
        
    }
}

