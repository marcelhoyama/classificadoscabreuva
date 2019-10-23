<?php
class perfil_usuarioController extends controller {

    public function __construct() {
        parent::__construct();
       $u = new usuarios();
       $u->verificarLogin();
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
            $bairro = addslashes($_POST['bairro']);
             $cidade = addslashes($_POST['cidade']);
              $telefone = addslashes($_POST['telefone']);
              $endereco= addslashes($_POST['endereco']);
              $sexo= addslashes($_POST['sexo']);
              

            
            

            if(isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $u->updatePerfilSenha($id, $nome,$bairro, $cidade,$telefone, $endereco,$sexo,$senha);
               
            }else{
                $u->updatePerfil($id, $nome,$bairro, $cidade,$telefone, $endereco,$sexo);
            }

        }

        if(!empty($_GET['id'])){
            $id=$_GET['id'];
        $dados['usuario_nome'] = $u->getNome($_SESSION['lgname']);
        
        $dados['info'] = $u->getDados($id);
       
        }
        $this->loadTemplate_1('perfil', $dados);
    }

}