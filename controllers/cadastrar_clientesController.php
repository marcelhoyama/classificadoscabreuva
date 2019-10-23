<?php

class cadastrar_clientesController extends controller {

    public function __construct() {
        parent::__construct();
//        $f = new funcionarios();
//        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '');

        $f = new funcionarios();
        $id = $_SESSION['lg'];
        $dados['nomefunc'] = $f->getNome($id);
        $dados['id_funcionario'] = $id;
        $c = new clientes();



        if (isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])) {
            $nome = addslashes(trim($_POST['nome']));
            $telefone = addslashes(trim($_POST['telefone']));
            $email = addslashes(trim($_POST['email']));
            $cpf = addslashes(trim($_POST['cpf']));

            $cpf = explode('.', $cpf);
            foreach ($cpf as $value) {
                echo $cpf = str_replace("-", "", $value);
            }

            $id_funcionario = addslashes(trim($_POST['id']));



            $dados['erro'] = $c->cadastrar($id_funcionario, $nome, $email, $telefone, $cpf);
        }





        $this->loadTemplate_1('cadastrar_clientes', $dados);
    }

}
