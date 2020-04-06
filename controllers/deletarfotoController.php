<?php

class deletarfotoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '');
        $c = new clientes();
     //   $c->setLogado();
//        $dados['usuario_nome'] = $co->getNome($_SESSION['dmrlogin']);

        $f = new foto();


        if (isset($_GET['id_loja']) && !empty($_GET['id_loja'])) {

            $id_foto = addslashes($_GET['id_loja']);
            $cliente= addslashes($_GET['id_cliente']);


            $id_loja = $f->excluirFoto($id_foto);
        }
        if (isset($id_loja)) {
            header("Location:" . BASE_URL . "editarloja?id_loja=" . $id_loja."&id_cliente=".$cliente);
        } else {
            header("Location:" . BASE_URL . "menuprincipal_loja");
        }


        $this->loadView('deletarfoto', $dados);
    }

}
