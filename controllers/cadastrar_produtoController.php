<?php

class cadastrar_produtoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'fotoPrincipal' => '', 'listFotosAmbiente' => '');

        $c = new clientes();
        $id = $_SESSION['lgCliente'];


        $f = new foto();

        $id_loja = addslashes(trim($_GET['id_loja']));
        $dados['fotoPrincipal'] = $f->listFotoPrincipal($id_loja);
$dados['listFotosAmbiente']=$f->listFotosAmbiente($id_loja);
$dados['listFotoEquipe']=$f->listFotoEquipe($id_loja);



        //envio de imagem foto principal do imovel;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

        if (isset($_FILES['arquivo1'])) {
            $foto = $_FILES['arquivo1'];
          
        } else {
            $foto = array();
        }

        
        
        
        
        
        //envio fotos da loja
        if (isset($_FILES['arquivos'])) {

            $fotos = $_FILES['arquivos'];
         
            
        } else {

            $fotos = array();
        }
        
        
        
        
        
        
        
        //envio fotos da equipe
        if (isset($_FILES['arquivo2'])) {

            print_r($fotos2 = $_FILES['arquivo2']);
        } else {

            $fotos2 = array();
        }
// fim do envio de imagem;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;




  if ($f->cadastrarUrlPrincipalImagem($id_loja, $foto, $fotos,$fotos2) == TRUE) {
                header("Location:" . BASE_URL . "cadastrar_foto?id_loja=" . $id_loja);
                exit;
            } else {
                $dados['erro'] = "Não possivel incluir!";
            }








        $this->loadTemplate_3('cadastrar_produto', $dados);
    }

    public function excluirFotoPrincipal() {

        $id_loja = $_GET['id_loja'];
        $f = new foto();
        $f->excluirFotoPrincipal($id_loja);
        header("Location:" . BASE_URL . "cadastrar_foto?id_loja=" . $id_loja);
        exit;
    }

}
