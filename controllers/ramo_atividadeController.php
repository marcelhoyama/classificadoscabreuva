<?php

class ramo_atividadeController extends controller{
    
    public function index() {

$dados=array();



$this->loadTemplate('ramo_atividade', $dados);
        
    }
}

