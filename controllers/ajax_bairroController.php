<?php

class ajax_bairroController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'lojacliente' => '');

        $c = new clientes();
        $l = new lojas();
        $f = new funcionamento();
        $id = $_SESSION['lgCliente'];
        $dados['lojacliente'] = $c->getIdLojaCliente($id);
        $dados['nomeCliente'] = $c->getName($id);
//        $dados['listaRamo'] = $l->listarRamo();

      
       

        $this->loadView('ajax_bairro', $dados);
    }
    
  
  
  
  
  
    public function cadastrarBairro() {
      
      $dados=array('bairro'=>'');
     
        $b = new bairros();


           $nome = addslashes(trim($_POST['nome']));

           $dados['bairro'] = $b->cadastrarBairro($nome);
                
            echo json_encode($dados['bairro']);
           
      
   
  }
  
   public function CarregaBairro(){
   
   $dados=array('listarbairro'=>'');
   
       $b = new bairros();
  
  $dados['listarbairro']=$b->listarBairros();
  
  echo json_encode($dados['listarbairro']);
  }
}


