<?php

class cadastrar_outra_lojaController extends controller {

    public function __construct() {
        parent::__construct();
        $f = new funcionarios();
        $f->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'listarRamo' => '', 'dadosCliente' => '');

        $f = new funcionarios();
        $id = $_SESSION['lg'];
        $dados['nomefunc'] = $f->getNome($id);
        $dados['id_funcionario'] = $id;
        $c = new clientes();

        $dados['listarRamo'] = $c->listarRamo();

        if (isset($_GET['id']) && !empty($_GET['id'])) {


           $id_cliente= addslashes(trim($_GET['id']));
            $dados['dadosCliente'] = $c->getDados($id_cliente);
         
        }
        if (isset($_POST['nome_fantasia']) && !empty($_POST['nome_fantasia']) && isset($_POST['endereco']) && !empty($_POST['endereco']) && isset($_POST['telefone1']) && !empty($_POST['telefone1'])) {
            echo"FANTASIA <br>" . $nome = addslashes(trim($_POST['nome_fantasia']));
            echo"<br>R SOCIAL<br>" . $razao_social = addslashes(trim($_POST['razao_social']));
            echo"<br>CNPJ<br>" . $cnpj = addslashes(trim($_POST['cnpj']));
            echo "<br>end<br>" . $endereco = addslashes(trim($_POST['endereco']));
            echo"<br>bairro<br>" . $bairro = addslashes(trim($_POST['bairro']));
            echo"<br>Cidade<br>" . $cidade = addslashes(trim($_POST['cidade']));
            echo "<br>tel1<br>" . $telefone1 = addslashes(trim($_POST['telefone1']));
            echo "<br>Tel2<br>" . $telefone2 = addslashes(trim($_POST['telefone2']));
            echo "<br>situacao<br>" . $status = addslashes(trim($_POST['situacao']));
            echo "<br>whats<br>" . $whatsapp = addslashes(trim($_POST['whatsapp']));
            echo "<br>email<br>" . $email = addslashes(trim($_POST['email']));
            echo "<br>facebook<br>" . $facebook = addslashes(trim($_POST['facebook']));
            echo "<br>youtube<br>" . $youtube = addslashes(trim($_POST['youtube']));
            echo "<br>descricao<br>" . $descricao = addslashes(trim($_POST['descricao']));
            echo "<br>chamada<br>" . $chamada = addslashes(trim($_POST['chamada']));
            echo "<br>site<br>" . $site = addslashes(trim($_POST['site']));
            echo "<br>chave<br>".$chave1 = addslashes(trim($_POST['chave1']));
           
           

//            echo "<br>chave2<br>".$chave2 = addslashes(trim($_POST['chave2']));

            echo"<br>idcliente<br>" . $id_cliente = addslashes(trim($_POST['id_cliente']));

            echo "<br>id func<br>" . $id_funcionario = $id;
            echo "<br>tipo ramo1<br>" . $id_ramo1 = addslashes(trim($_POST['id_tipo_ramo1']));
            echo "<br>tipo ramo2<br>" . $id_ramo2 = addslashes(trim($_POST['id_tipo_ramo2']));
            echo "<br>tipo ramo3<br>" . $id_ramo3 = addslashes(trim($_POST['id_tipo_ramo3']));
            echo "<br>tipo ramo4<br>" . $id_ramo4 = addslashes(trim($_POST['id_tipo_ramo4']));
$url_imagem_principal='';


          
            $loja = new lojas();
            //senao existe vai cadastrar
            if ($loja->verificarCnpj($cnpj) == FALSE) {
                if ($id_loja=$loja->cadastrar($id_funcionario, $id_cliente, $nome, $razao_social, $cnpj, $endereco, $telefone1, $telefone2,
                        $status, $whatsapp, $email, $facebook, $youtube, $site, $descricao, $chamada, $chave1, $url_imagem_principal,$id_ramo1,$id_ramo2,
                        $id_ramo3,$id_ramo4) == TRUE) {
//                   $id_loja= $loja->cadastrar($id_funcionario, $id_cliente, $nome_fantasia, $razao_social, $cnpj, $endereco, $telefone1, $telefone2, $situacao, $whatsapp, $email, $facebook, $youtube, $site, $descricao, $chamada, $url_imagem_principal);
//                   
//loja pode ter mais de um tipo de atividade(ramo) limite 4
//                    if ($loja->cadastrarRamo($id_loja, $id_ramo1) == TRUE) {
//                        if ($loja->cadastrarRamo($id_loja, $id_ramo2) == TRUE) {
//                            if ($loja->cadastrarRamo($id_loja, $id_ramo3) == TRUE) {
//                                if ($loja->cadastrarRamo($id_loja, $id_ramo4) == TRUE) {
//                                    
//                                }
//                            }
//                        }
//                    }
                    
                     header("Location:" . BASE_URL . "pesquisar_clientes");
                } else {
                    $dados['erro'] = "Não foi posssivel cadastrar! Verifique os campos e tente novamente!";
                }
            } else {
                $dados['erro'] = 'CNPJ já existe em nosso dados!!';
            }
        }





        $this->loadTemplate_1('cadastrar_outra_loja', $dados);
    }

}
