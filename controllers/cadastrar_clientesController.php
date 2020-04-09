<?php

class cadastrar_clientesController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '');

        $c = new clientes();
        $id = $_SESSION['lg'];
        $dados['lgCliente'] = $f->getName($id);
        $dados['id_cliente'] = $id;
        $c = new clientes();



        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])) {
            $nome = addslashes(trim($_POST['nome']));
            $telefone = addslashes(trim($_POST['telefone']));
            $email = addslashes(trim($_POST['email']));
            $sexo = addslashes(trim($_POST['sexo']));
            $status='1';
            //legenda status:  1=ativo , 2 inativo, 3 bloqueado

//            $cpf = explode('.', $cpf);
//            foreach ($cpf as $value) {
//                echo $cpf = str_replace("-", "", $value);
//            }

            //$id_funcionario = addslashes(trim($_POST['id']));



            $dados['erro'] = $c->cadastrar($nome, $email, $telefone, $sexo, $status);
        }





        $this->loadTemplate_1('cadastrar_clientes', $dados);
    }

}
