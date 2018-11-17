<?php

class comercioController extends controller{
    
    public function index() {

$dados=array();



$this->loadTemplate('comercio', $dados);
        
    }
}

