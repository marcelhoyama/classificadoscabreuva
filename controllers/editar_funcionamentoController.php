<?php

class editar_funcionamentoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'lojacliente' => '');


       
        
        $id_loja = $_GET['id_loja'];
        $c = new clientes();
        $l = new lojas();
        $f = new funcionamento();
   
       $dados['funcionamentoLoja'] = $f->funcionamentoLoja($id_loja);



        if (isset($_SESSION['lgCliente']) && !empty($_SESSION['lgCliente'])) {
            $id= addslashes($_SESSION['lgCliente']);
            $dados['lojacliente'] = $c->getIdLojaCliente($id);
            $dados['nomeCliente'] = $c->getName($id);
            $dados['id_cliente'] = $_SESSION['lgCliente'];
        }

        if (isset($_POST['funcionamento']) && !empty($_POST['funcionamento'])) {

            $id_loja = addslashes(($_GET['id_loja']));
$funcionamento= addslashes(trim($_POST['funcionamento']));


                    if ($dados['erro'] = $f->cadastrarFunc($id_loja, $funcionamento)==true) {
                        header("Location:".BASE_URL."menuprincipal_loja");
                       // header("Location:".BASE_URL."editar_funcionamento?id_loja=".$id_loja);
                   }else{
                       $dados['erro']='confira o campo, tente novamente';
                   }
            }
            
            
            
            
            
            
            
                    


        
        $this->loadTemplate_3('editar_funcionamento', $dados);
    }

}
