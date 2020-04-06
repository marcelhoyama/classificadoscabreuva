<?php

class redefinirController extends controller {

    public function index() {
        $dados = array();


        if (!empty($_GET['token'])) {

            $token = trim($_GET['token']);
        }
        if (!empty($_POST['senha']) && !empty($_POST['resenha'])) {
        
            if (strlen($_POST['senha']) == 6 && strlen($_POST['resenha']) == 6) {
  
                if ($_POST['senha'] == $_POST['resenha']) {
             
  $senha = md5(trim($_POST['senha']));
            
                    $c = new clientes();
                    $dados['ok'] = $c->redefinirSenha($token, $senha);
                }else{
                    $dados['erro']="Não conferir a senha com a outra!";
                }
            }else{
                $dados['erro']="As quantidade de caracteres não conferi!!";
            }
        }else{
            $dados['erro']="Conferir os campos se estão preenchidos corretos!";
        }

        $this->loadView('redefinir', $dados);
    }

}
