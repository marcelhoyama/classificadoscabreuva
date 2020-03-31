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
      
      
     
        $l = new lojas();


           $nome = addslashes(trim($_POST['nome']));

           $dados['erro'] = $l->cadastrarRamo($nome);
                
            
           
      
   
  }    
}
