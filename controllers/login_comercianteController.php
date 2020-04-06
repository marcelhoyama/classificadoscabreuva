<?php

class login_comercianteController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {


        $dados = array();

        $c = new clientes();
        if (!empty($_POST['senha']) && !empty($_POST['resenha'])) {

            if (strlen($_POST['senha']) == 6 && strlen($_POST['resenha']) == 6) {

                if ($_POST['senha'] == $_POST['resenha']) {
          
                    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['sexo']) && !empty($_POST['senha']) && !empty($_POST['resenha'])) {
                        
                         $nome = ucwords(strtolower(addslashes(trim($_POST['nome']))));
                        
                        $telefone = addslashes(trim($_POST['telefone']));
                        $email = addslashes(trim($_POST['email']));
                        $sexo = addslashes($_POST['sexo']);
                        $senha = md5(addslashes($_POST['senha']));
                        $resenha = md5(addslashes($_POST['resenha']));

                        $dados['erro'] = $c->cadastrar($nome, $email, $telefone, $sexo, $senha, $resenha);
                    } else {
                        $dados['erro'] = "Conferir os campos se estão corretos!";
                    }
                } else {
                    $dados['erro'] = "Não confere a senha! Tente novamente! Por favor.";
                }
            }else{
                $dados['erro']="Não esta na regra de limites de caracteres.";
            }
        }


        $this->loadView('login_comerciante', $dados);
    }

    public function sair() {

        unset($_SESSION['lg']);

        header("Location:" . BASE_URL);
        exit;
    }

    public function sairCliente() {

        unset($_SESSION['lgCliente']);

        header("Location:" . BASE_URL);
        exit;
    }

}
