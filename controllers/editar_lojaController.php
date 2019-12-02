<?php

class editar_lojaController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'listarRamo' => '', 'listarCliente' => '');

        $f = new funcionarios();
        $id = $_SESSION['lg'];
        $dados['nomefunc'] = $f->getName($id);
        $dados['id_funcionario'] = $id;
        $c = new clientes();
        $l = new lojas();
        $dados['listarRamo'] = $c->listarRamo();
        $dados['listarCategoria'] = $l->listarCategoria();
        
        if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];
            
            $dados['nomeCliente'] = $c->getName($id_cliente);
            $dados['id_cliente'] = $id_cliente;
        }
        
        if(isset($_GET['id_loja']) && !empty($_GET['id_loja'])){
         
            $id_loja = addslashes(trim($_GET['id_loja']));
            
        
            $dados['dadosLoja']=$l->getDados($id_loja);
            
            $dados['totalFotos']=$l->totalFotos($id_loja);
            $dados['listfotos']=$l->listarLojas($id_loja);
        }

        if (isset($_POST['anuncio_site']) && !empty($_POST['anuncio_site']) && (isset($_POST['telefone1']) && !empty($_POST['telefone1'])) && (isset($_POST['tipo_categoria']) && !empty($_POST['tipo_categoria'])) && (isset($_POST['nome_fantasia']) && !empty($_POST['nome_fantasia'])) && (isset($_POST['endereco']) && !empty($_POST['endereco'])) && (isset($_POST['descricao']) && !empty($_POST['descricao'])) && (isset($_POST['chamada']) && !empty($_POST['chamada']))) {

            //  variavel $id é do funcionario
            // variavel $id_cliente é do cliente
            $anuncio_site = addslashes(trim($_POST['anuncio_site']));
            $tipo_categoria = addslashes(trim($_POST['tipo_categoria']));
            $nome_fantasia = addslashes(trim($_POST['nome_fantasia']));
            $razao_social = addslashes(trim($_POST['razao_social']));
            $endereco = addslashes(trim($_POST['endereco']));
            $bairro = addslashes(trim($_POST['bairro']));
            $cidade = addslashes(trim($_POST['cidade']));
            $telefone1 = addslashes(trim($_POST['telefone1']));
            $telefone2 = addslashes(trim($_POST['telefone2']));
            $whatsapp = addslashes(trim($_POST['whatsapp']));
            $email = addslashes(trim($_POST['email']));
            $facebook = addslashes(trim($_POST['facebook']));
            $youtube = addslashes(trim($_POST['youtube']));
            $instagram = addslashes(trim($_POST['instagram']));
            $site = addslashes(trim($_POST['site']));
            $descricao = addslashes(trim($_POST['descricao']));
            $chamada = addslashes(trim($_POST['chamada']));
            $prova = addslashes(trim($_POST['prova']));
            $apresentacao = addslashes(trim($_POST['apresentacao']));
            $produtos = addslashes(trim($_POST['produtos']));
            $acao = addslashes(trim($_POST['acao']));
            $status='0';
            $palavrachave= addslashes(trim($_POST['palavrachave']));
            $titulo=$nome_fantasia;

//            $cpf=explode('.', $cpf);
//            foreach ($cpf as $value) {
//             echo   $cpf= str_replace("-", "", $value);
//            }

            $id_funcionario = $id;
//            ainda nao vai usar CPF
//               if($c->verificarCPF($cpf)==TRUE){
//            if($c->cadastrar($id_funcionario,$nome, $email, $telefone, $cpf)== TRUE){
//                header("Location:".BASE_URL."pesquisar_clientes");
//            }else{
//                $dados['erro'] ="Não foi posssivel cadastrar! Verifique os campos e tente novamente!";
//            }
//        }else{
//            $dados['erro']='CPF já existe em nosso dados!!';
//        }
//        }
               //envio de imagem foto principal do imovel;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

                if (isset($_FILES['arquivo1'])) {
            $foto = $_FILES['arquivo1'];
        } else {
            $foto = array();
        }
        
        //envio fotos da loja
        if (isset($_FILES['arquivos'])) {
            
            $fotos = $_FILES['arquivos'];
           
               
            }else{

            $fotos = array();
            }
               //envio fotos da equipe
        if (isset($_FILES['arquivos2'])) {
            
            $fotos2 = $_FILES['arquivos2'];
           
               
            }else{

            $fotos2 = array();
            }
// fim do envio de imagem;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;


            $l = new lojas();
           if($l->editar($id_loja,$id_funcionario, $id_cliente, $anuncio_site ,$nome_fantasia, $razao_social, $endereco, $bairro,$cidade,$telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube,$instagram, $site,$tipo_categoria, $descricao, $chamada, $prova, $foto,$fotos,$fotos2, $apresentacao, $produtos, $acao,$palavrachave,$titulo)==TRUE){
      // $dados['ok'] ="Atualizado com Sucesso!";
                 header("Location:".BASE_URL."editar_loja?id_loja=".$id_loja."&id_cliente=".$id_cliente);
           }else{
               $dados['erro'] ="Confira todos os campos!";
           }
        }

            $this->loadTemplate_func('editar_loja', $dados);
        }
    }
    