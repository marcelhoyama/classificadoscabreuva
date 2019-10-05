<?php

class contatoController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {


        $dados = array('erro' => '', 'ok' => '');
        $c = new contato();
        
        
        $dados['celular'] = $c->celular();
        $dados['email'] = $c->email();
        $dados['endereco'] = $c->endereco();
        $dados['horario'] = $c->horario();
      
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $nome = trim(addslashes($_POST['nome']));
            $email = trim(addslashes($_POST['email']));
            
            $celular = addslashes($_POST['telefone']);

            $tipo_assunto = trim(addslashes($_POST['assunto']));
         
            $mensagem = trim(addslashes($_POST['mensagem']));
            $para = "marecrisbr@gmail.com";
            $assunto = " Duvida do Contato";
            $corpo = "Nome do interessado: " . $nome . "</br>"
                   . "-Celular: " . $celular . "</br>"
                    . "- Email do interessado: " . $email . "</br>"
                    . "-Tipo de Assunto: " . $tipo_assunto . "</br>"
                    . "-Mensagem: " . $mensagem;
            $cabecalho = "From:" . $email . "\r\n" .
                    "Reply-To:" . $email . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();
            mail($para, $assunto, $corpo, $cabecalho);
            //$i->cadastrarInteresse($tipoimovel, $nome,$telefone,$celular, $email, $assunto);
            $dados['ok'] = "Enviado com sucesso";
        }



        $this->loadTemplate('contato', $dados);
    }

}

