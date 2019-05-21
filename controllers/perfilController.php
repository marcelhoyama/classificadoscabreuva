<?php
class perfilController extends controller {

    public function __construct() {
        parent::__construct();
//        $u = new usuarios();
//        $u->verificarLogin();
    }

    public function index() {
        $dados = array(
        	'usuario_nome' => '',
            'info'=>''
        );
        $u = new funcionarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $bio = addslashes($_POST['bio']);

            $u->updatePerfil(array(
                'nome' => $nome,
                'bio' => $bio
            ));

            if(isset($_POST['senha']) && !empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $u->updatePerfil(array(
                    'senha' => $senha
                ));
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