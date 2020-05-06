<?php

class ajax_categoriaController extends controller {

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

      
       

        $this->loadView('ajax_categoria', $dados);
    }
    
  
  
  
  
public function cadastrarCategoria() {
      
      $dados=array('categoria'=>'');
     
        $l = new lojas();


           $nome = addslashes(trim($_POST['nome']));

           $dados['categoria'] = $l->cadastrarCategoria($nome);
                
            echo json_encode($dados['categoria']);
           
      
   
  }
  
  public function CarregaCategoria(){
   
   $dados=array('listarcategoria'=>'');
   
       $p = new produtos();
  
  $dados['listarcategoria']=$p->listarCategoria();
  
  echo json_encode($dados['listarcategoria']);
  }
}


