<?php

class login_entrarController extends controller {

    public function __construct() {
//        parent::__construct();
    }

    public function index() {

        $dados = array();


        if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['user']) && !empty($_POST['user'])) {

            if ($_POST['user'] == 'usuario') {
                $email = addslashes(trim($_POST['email']));
                $senha = md5(addslashes(trim($_POST['senha'])));

                $u = new usuarios();
                if ($u->logar($email, $senha) != TRUE) {
                    $dados['erro'] = "Senha e ou Email não conferi!!";
                }
            } elseif ($_POST['user'] == 'cliente') {
                if (isset($_POST['email']) && !empty($_POST['email'])) {

                    $email = addslashes(trim($_POST['email']));
                    $senha = md5(addslashes(trim($_POST['senha'])));

                    $c = new clientes();
                    if ($c->logar($email, $senha) != TRUE) {
                        $dados['erro'] = "Senha e ou Email não conferi!!";
                    }
                }
            } else {

                if (isset($_POST['email']) && !empty($_POST['email'])) {

                  echo  $email = addslashes(trim($_POST['email']));
                  echo  $senha = md5(addslashes(trim($_POST['senha'])));

                    $f = new funcionarios();
                    if ($f->logar($email, $senha) != TRUE) {
                        $dados['erro'] = "Senha e ou Email não conferi!!";
                    }
                }
            }
        }
            $this->loadView('login_entrar', $dados);
        }
    }


