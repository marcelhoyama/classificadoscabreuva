<?php

class homeController extends controller{
    
    public function __construct() {
        parent::__construct();
    $u = new usuarios();
//    $u->verificarLogin();
        }
    
    public function index(){
        $dados=array('lista_palavra'=>'');
        
        
        if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
           
            $palavra= addslashes(trim($_POST['buscar']));
            
            $p=new palavras();
             echo "entrou controller-palavra foi=".$palavra;
            
            $dados['lista_palavra']=$p->buscarPalavra($palavra);
            
        }
       
        $this->loadTemplate('home', $dados);
    }
}

