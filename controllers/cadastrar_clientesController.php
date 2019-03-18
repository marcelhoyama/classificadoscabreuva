<?php

class cadastrar_clientesController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
//        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '');
        $f = new funcionarios();
//        $f->setLogado();
//        $dados['usuario_nome'] = $co->getNome($_SESSION['dmrlogin']);


        $c = new clientes();

       

         
        if (isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])) {
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $cpf = addslashes($_POST['cpf']);
            $id_funcionario= addslashes($_POST['id_funcionario']);
            
            if($c->cadastrar($nome, $email, $telefone, $cpf, $id_funcionario)== TRUE){
                header("Location:".BASE_URL."pesquisar_clientes");
            }else{
                $dados['erro'] ="Não foi posssivel cadastrar! Verifique os campos e tente novamente!";
            }
        }
        




        $this->loadTemplate_1('cadastrar_clientes', $dados);
    }

}
