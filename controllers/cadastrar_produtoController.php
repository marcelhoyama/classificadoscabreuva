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
$p=new produtos();
$dados['listarCategoria']=$p->listarCategoria();
        $id_loja = addslashes(trim($_GET['id_loja']));
//        $dados['fotoPrincipal'] = $f->listFotoPrincipal($id_loja);
//$dados['listFotosAmbiente']=$f->listFotosAmbiente($id_loja);
//$dados['listFotoEquipe']=$f->listFotoEquipe($id_loja);



        //envio de imagem foto principal do imovel;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

       
        
        
        
        
        
        //envio fotos da loja
//        if (isset($_FILES['arquivos'])) {
//
//            $fotos = $_FILES['arquivos'];
//         
//            
//        } else {
//
//            $fotos = array();
//        }
//        
        
        
        
        
        
        
        //envio fotos da equipe
//        if (isset($_FILES['arquivo2'])) {
//
//            print_r($fotos2 = $_FILES['arquivo2']);
//        } else {
//
//            $fotos2 = array();
//        }
// fim do envio de imagem;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;




//  if ($f->cadastrarUrlPrincipalImagem($id_loja, $foto, $fotos,$fotos2) == TRUE) {
//                header("Location:" . BASE_URL . "cadastrar_produto?id_loja=" . $id_loja);
//                exit;
//            } else {
//                $dados['erro'] = "Não possivel incluir!";
//            }




if(isset($_POST['codigo']) && !empty($_POST['codigo']) || isset($_POST['nome']) && !empty($_POST['nome']) || isset($_POST['cor']) && !empty($_POST['cor']) || isset($_POST['valor']) && !empty($_POST['valor']) || isset($_POST['desconto']) && !empty($_POST['desconto']) || isset($_POST['qtd']) && !empty($_POST['qtd']) || isset($_POST['tipo_categoria']) && !empty($_POST['tipo_categoria']) || isset($_POST['descricao']) && !empty($_POST['descricao']) || isset($_POST['devolucao']) && !empty($_POST['devolucao'])  ){
    
     if (isset($_FILES['arquivo'])) {
            $foto = $_FILES['arquivo'];
          
        } else {
            $foto = array();
        }

    
    $id_loja= addslashes(trim($_GET['id_loja']));
    $codigo= addslashes(trim($_POST['codigo']));
    $nome= addslashes(trim($_POST['nome']));
    $cor= addslashes(trim($_POST['cor']));
    $valor= addslashes(trim($_POST['valor']));
    $desconto= addslashes(trim($_POST['desconto']));
    $qtd= addslashes(trim($_POST['qtd']));
    $id_categoria= addslashes(trim($_POST['tipo_categoria']));
    $descricao= addslashes(trim($_POST['descricao']));
    $devolucao= addslashes(trim($_POST['devolucao']));
    $tamanho= addslashes(trim($_POST['tamanho']));
    $peso= addslashes(trim($_POST['peso']));
    
    
    $p=new produtos();
    $p->cadastrar($id_loja, $codigo,$foto, $nome, $cor, $tamanho, $valor, $desconto, $qtd, $peso, $id_categoria, $descricao, $devolucao);
    
}



        $this->loadTemplate_3('cadastrar_produto', $dados);
    }

   

}
