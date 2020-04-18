<?php

class editar_lojaController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'dadosLoja' => '', 'listfotos' => '', 'fotoprincipal' => '');

        $c = new clientes();


        $l = new lojas();

        $dados['listarCategoria'] = $l->listarPorRamo();

        if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];

            $dados['nomeCliente'] = $c->getName($id_cliente);
            $dados['id_cliente'] = $id_cliente;
            $dados['lojacliente'] = $c->listarCliente($id_cliente);
        } 
       


        if (isset($_GET['id_loja']) && !empty($_GET['id_loja'])) {

            $id_loja = addslashes(trim($_GET['id_loja']));


            $dados['dadosLoja'] = $l->getDados($id_loja);

            $dados['totalFotos'] = $l->totalFotos($id_loja);
            $dados['listfotos'] = $l->listarFotos($id_loja);
             $b = new bairros();
        $dados['listarBairros'] = $b->listarBairros();
        }


        if ((isset($_POST['anuncio_site']) && !empty($_POST['anuncio_site'])) &&
                (isset($_POST['telefone1']) && !empty($_POST['telefone1'])) &&
                (isset($_POST['tipo_categoria']) && !empty($_POST['tipo_categoria'])) &&
                (isset($_POST['nome_fantasia']) && !empty($_POST['nome_fantasia'])) &&
                (isset($_POST['endereco']) && !empty($_POST['endereco']))) {

            //  variavel $id é do funcionario
            // variavel $id_cliente é do cliente
            $anuncio_site = addslashes(trim($_POST['anuncio_site']));
            $tipo_ramo = addslashes(trim($_POST['tipo_categoria']));
            $nome_fantasia = addslashes(trim($_POST['nome_fantasia']));
            $razao_social = addslashes(trim($_POST['razao_social']));
            $endereco = addslashes(trim($_POST['endereco']));
            $id_bairro = addslashes(trim($_POST['bairro']));
            $cidade = addslashes(trim($_POST['cidade']));
            $telefone1 = addslashes(trim($_POST['telefone1']));
            $telefone2 = addslashes(trim($_POST['telefone2']));
            $whatsapp1 = addslashes(trim($_POST['whatsapp1']));
            $whatsapp2 = addslashes(trim($_POST['whatsapp2']));
            $email = addslashes(trim($_POST['email']));
            $facebook = addslashes(trim($_POST['facebook']));
            $youtube = addslashes(trim($_POST['youtube']));
            $instagram = addslashes(trim($_POST['instagram']));
            $site = addslashes(trim($_POST['site']));

            $delivery = addslashes($_POST['delivery']);
            $funcionamento = addslashes($_POST['funcionamento']);
            //          $cnpj= addslashes(trim($_POST['cnpj']));
//            $descricao = addslashes(trim($_POST['descricao']));
//            $chamada = addslashes(trim($_POST['chamada']));
//            $prova = addslashes(trim($_POST['prova']));
//            $apresentacao = addslashes(trim($_POST['apresentacao']));
//            $produtos = addslashes(trim($_POST['produtos']));
//            $acao = addslashes(trim($_POST['acao']));

            $palavrachave = addslashes(trim($_POST['palavrachave']));
            $titulo = $nome_fantasia;

            $l = new lojas();

            //se esta dando retorno false, porque tipo de foto esta indo com error,
            //ainda continua com erro mesmo tirado foto
            $dados['erro'] = $l->editar($id_loja, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $id_bairro, $cidade, $telefone1, $telefone2, $whatsapp1, $whatsapp2, $email, $facebook, $youtube, $instagram, $site, $tipo_ramo, $palavrachave, $titulo, $delivery, $funcionamento);
        }
        $this->loadTemplate_3('editar_loja', $dados);
    }

}
