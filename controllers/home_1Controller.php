<?php 

class home_1Controller extends controller{
public function __construct(){
    
}


public function index() {


  
$dados=array();


$this->loadTemplate_func('home_1',$dados);

}


}