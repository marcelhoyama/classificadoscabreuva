<?php

class cadastrar_clientesController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '');


        $c = new clientes();

       

         
        if (isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])) {
            $nome = addslashes(trim($_POST['nome']));
            $telefone = addslashes(trim($_POST['telefone']));
            $email = addslashes(trim($_POST['email']));
            $cpf = addslashes(trim($_POST['cpf']));
            $id_funcionario= addslashes(trim($_POST['id_funcionario']));
            
            if($c->cadastrar($id_funcionario,$nome, $email, $telefone, $cpf)== TRUE){
                header("Location:".BASE_URL."pesquisar_clientes");
            }else{
                $dados['erro'] ="Não foi posssivel cadastrar! Verifique os campos e tente novamente!";
            }
        }
        




        $this->loadTemplate_1('cadastrar_clientes', $dados);
    }

}
