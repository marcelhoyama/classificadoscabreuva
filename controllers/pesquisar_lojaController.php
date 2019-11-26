<?php

class pesquisar_lojaController extends controller{
    
    public function index() {

$dados=array('listarlojas'=>'');
$l = new lojas();
if(isset($_POST['buscar']) && !empty($_POST['buscar']) ){
$palavra= addslashes(trim($_POST['buscar']));


$dados['listarlojas']=$l->buscarLoja($palavra);

        
    }else{
        $dados['listarlojas']=$l->listarLojas();
    }
    $this->loadTemplate_func('pesquisar_loja', $dados);
}
}


