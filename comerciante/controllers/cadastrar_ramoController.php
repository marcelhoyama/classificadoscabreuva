<?php

class cadastrar_ramoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
        
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'lojacliente' => '');


        $id = $_SESSION['lgCliente'];
//        $dados['nomefunc'] = $f->getName($id);
//        $dados['id_funcionario'] = $id;
        
        $c = new clientes();
        $l = new lojas();
        $f = new funcionamento();
        $dados['listaSemana'] = $f->listaSemana();


        if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];
            $dados['lojacliente'] = $c->getIdLojaCliente($id);
            $dados['nomeCliente'] = $c->getName($id_cliente);
            $dados['id_cliente'] = $id_cliente;
        }

        if (isset($_POST['ramo']) && !empty($_POST['ramo'])) {


            $ramo= addslashes(trim($_POST['ramo']));
            
            if($dados['erro']=$l->cadastrarRamo($ramo)){
                
            }else{
            
                $dados['ok']="Cadastrado com sucesso";
            }
            

        }

        $this->loadTemplate_3('cadastrar_ramo', $dados);
    }

}
