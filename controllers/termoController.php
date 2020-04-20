<?php 

class termoController extends controller{
public function __construct(){
    
}


public function index() {


  
$dados=array();


$this->loadTemplate('termo',$dados);

}


}