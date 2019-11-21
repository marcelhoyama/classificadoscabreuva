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
        $dados['nomefunc'] = $f->getName($id);
        $dados['id_funcionario'] = $id;
        $c = new clientes();

if(isset($_GET['id']) && !empty($_GET['id'])){
    
$id_cliente= addslashes($_GET['id']);
$dados['dadosCliente']=$c->getDados($id);

       }else{
    $dados['erro']="Cliente não encontrado! Tente Novamente.";
}

 if (isset($_POST['sexo']) && !empty($_POST['sexo']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone'])&& isset($_POST['email']) && !empty($_POST['email'])) {
            $nome = addslashes(trim($_POST['nome']));
            $telefone = addslashes(trim($_POST['telefone']));
            $email = addslashes(trim($_POST['email']));
            $sexo = addslashes(trim($_POST['sexo']));
            $status= addslashes(trim($_POST['status']));
            

//            $cpf = explode('.', $cpf);
//            foreach ($cpf as $value) {
//                echo $cpf = str_replace("-", "", $value);
//            }

           



            $dados['erro'] = $c->editar($id_cliente, $nome, $email, $telefone, $sexo, $status);
            
            if(isset($_POST['senha']) && !empty($_POST['senha']) ){
                $senha=md5($_POST['senha']);
                
                //$this->editar($senha); 
                
            }
        }

        $this->loadTemplate_func('editar_clientes', $dados);
    }

}
