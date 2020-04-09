<?php

class homeController extends controller{
    
    public function __construct() {
        parent::__construct();
    $u = new usuarios();
//    $u->verificarLogin();
        }
    
    public function index(){
        $dados=array('lista_palavra'=>'');
        
        $l=new lojas();
        $dados['listaPorRamo']=$l->listarPorRamo();
      
        
        if(isset($_POST['buscar']) && !empty($_POST['buscar'])){
           
            $palavra= addslashes(trim($_POST['buscar']));
            
            $p=new palavras();
             
            
            if($dados['lista_palavra']=$p->buscarPalavra($palavra)){
               
            }else{
                 $dados['erro']='Nada encontrado! indique comerciantes e Prestadores de serviços para se cadastrarem aqui! Ajude mais pessoas.';
            }
            
        }
       
        $this->loadTemplate('home', $dados);
    }
}

