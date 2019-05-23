<?php

class pesquisar_lojaController extends controller{
    
    public function index() {
$p= new palavras_buscada();
$dados=array('listarlojas'=>'','listarlojas'=>'');

if(isset($_POST['buscar']) && !empty($_POST['buscar']) ){
$palavra= addslashes(trim($_POST['buscar']));

$p->cadastrarPalavra($palavra);
$dados['listarlojas']=$p->buscarPalavra($palavra);
}
$this->loadTemplate_1('pesquisar_loja', $dados);
        
    }
}

