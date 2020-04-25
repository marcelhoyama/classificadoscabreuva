<?php

class bairrosController extends controller{
    
    public function index() {

$dados=array('lojas'=>'');
$b =new bairros();
$l =new lojas();
$dados['lojas']=$l->listarLojas();
$dados['listabairros']=$b->listarBairros();





if(isset($_GET['id_bairro']) && !empty($_GET['id_bairro'])){
    
    $id_bairro= addslashes(trim($_GET['id_bairro']));
    $b=new bairros();
    $dados['listabairros']=$b->listarBairros();
    $dados['lojas']=$b->ListarObairro($id_bairro);

    
    
}
$this->loadTemplate('bairros', $dados);
        
    }
}

