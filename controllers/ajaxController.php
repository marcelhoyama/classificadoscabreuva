<?php

class ajaxController extends controller {

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

      
       

        $this->loadView('ajax', $dados);
    }
    
  public function cadastrarRamo() {
      
      $dados=array('ramo'=>'');
     
        $l = new lojas();


           $nome = addslashes(trim($_POST['nome']));

           $dados['ramo'] = $l->cadastrarRamo($nome);
                
            echo json_encode($dados['ramo']);
           
      
   
  }
  
  public function CarregaRamo(){
   
   $dados=array('listarramo'=>'');
   
       $l = new clientes();
  
  $dados['listarramo']=$l->listarRamo();
  
  echo json_encode($dados['listarramo']);
  }
}
