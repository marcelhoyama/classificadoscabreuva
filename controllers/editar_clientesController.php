<?php

class editar_clientesController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '');

        $f = new funcionarios();
        $id = $_SESSION['lg'];
        $dados['nomefunc'] = $f->getNome($id);
        $dados['id_funcionario'] = $id;
        $c = new clientes();

if(isset($_GET['id']) && !empty($_GET['id'])){
    
$id_cliente= addslashes($_GET['id']);
$dados['dadosCliente']=$c->getDados($id);

       }else{
    $dados['erro']="Cliente não encontrado! Tente Novamente.";
}

 if (isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])&& isset($_POST['email']) && !empty($_POST['email'])) {
            $nome = addslashes(trim($_POST['nome']));
            $telefone = addslashes(trim($_POST['telefone']));
            $email = addslashes(trim($_POST['email']));
            $cpf = addslashes(trim($_POST['cpf']));
            

            $cpf = explode('.', $cpf);
            foreach ($cpf as $value) {
                echo $cpf = str_replace("-", "", $value);
            }

           



            $dados['erro'] = $c->editar($id_cliente, $nome, $email, $telefone, $cpf);
        }

        $this->loadTemplate_1('editar_clientes', $dados);
    }

}
