<?php

class cadastrar_vitrineController extends controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index() {
        $dados=array();
        
        $f=new foto();
        
        $id_loja= addslashes(trim(($_GET['id_loja'])));
        $dados['listFotosAmbiente']=$f->listFotosAmbiente($id_loja);
        $dados['listFotoEquipe']=$f->listFotoEquipe($id_loja);
        
        $this->loadTemplate_3("cadastrar_vitrine", $dados);
    }
    
    
}


