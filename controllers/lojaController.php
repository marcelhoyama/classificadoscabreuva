<?php 

class lojaController extends controller{
public function __construct(){
         parent::__construct();
}


public function index() {


  
$dados=array(''=>'');

$l = new lojas();
$f=new foto();
 $id_loja=$_GET['id_loja'];

$dados['getdados']=$l->getDados($id_loja);
$dados['fotosambiente']=$f->listFotosAmbiente($id_loja);

$this->loadTemplate_loja('loja',$dados);

}


}