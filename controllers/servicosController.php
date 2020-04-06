<?php 

class servicosController extends controller{
public function __construct(){
    
}


public function index() {


  
$dados=array();


$this->loadTemplate_func('servicos',$dados);

}


}