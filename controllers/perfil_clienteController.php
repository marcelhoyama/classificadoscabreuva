<?php
class perfil_clienteController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array(
        	'usuario_nome' => '',
            'info'=>''
        );
        $u = new clientes();
   $id=$_GET['id'];
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
             $endereco = addslashes($_POST['endereco']);
             if(isset($_POST['senha']) && !empty($_POST['senha'])) {
            echo $senha = md5($_POST['senha']);
             $dados['erro']= $u->updatePerfilSenha($id, $nome, $telefone, $endereco,$senha);
             }else{
           
              $dados['erro']= $u->updatePerfil($id, $nome, $telefone, $endereco);
          
             }
           

        }

        if(!empty($_GET['id'])){
            $id=$_GET['id'];
        $dados['usuario_nome'] = $u->getName($_SESSION['lgname']);
        
        $dados['info'] = $u->getDados($id);
       
        }
        $this->loadTemplate_1('perfil', $dados);
    }

}