<?php
class perfilController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array(
        	'usuario_nome' => '',
            'info'=>''
        );
        $f = new funcionarios();
$id=$_GET['id'];
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $endereco = addslashes($_POST['endereco']);
            $sexo = addslashes($_POST['sexo']);

          
            

            if(isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $f->updatePerfilSenha($id,$senha);
                
            }else{
                  $f->updatePerfil($id,$nome,$telefone,$endereco,$sexo);
            }

        }

        if(!empty($_GET['id'])){
            $id=$_GET['id'];
           
        $dados['usuario_nome'] = $f->getName($_SESSION['lgname']);
        
       $dados['info'] = $f->getDados($id);
      
        }
        $this->loadTemplate_1('perfil', $dados);
    }

}