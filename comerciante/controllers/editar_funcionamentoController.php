<?php

class editar_funcionamentoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
        
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'lojacliente' => '');


        $id = $_SESSION['lgCliente'];
//        $dados['nomefunc'] = $f->getName($id);
//        $dados['id_funcionario'] = $id;
        $id_loja=$_GET['id_loja'];
        $c = new clientes();
        $l = new lojas();
        $f = new funcionamento();
        $dados['listaSemana'] = $f->listaSemana();
$dados['funcionamentoLoja']=$f->funcionamentoLoja($id_loja);

        if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];
            $dados['lojacliente'] = $c->getIdLojaCliente($id);
            $dados['nomeCliente'] = $c->getName($id_cliente);
            $dados['id_cliente'] = $id_cliente;
        }

        if (isset($_POST['id_loja']) && !empty($_POST['id_loja'])) {

            $id_loja = addslashes(trim($_POST['id_loja']));
            if (empty($_POST['domingo'])) {
                $hora_domingo_inicio = '';
                $hora_domingo_fim = '';
                $domingo = '';
            } else {
                $id_loja = addslashes(trim($_POST['id_loja']));
                $hora_domingo_inicio = (addslashes(trim($_POST['hora_domingo_inicio'])));
                $hora_domingo_inicio = explode(':', $hora_domingo_inicio);
                $hora_domingo_inicio = implode('', $hora_domingo_inicio);

                $hora_domingo_fim = addslashes(trim($_POST['hora_domingo_fim']));
                $hora_domingo_fim = explode(':', $hora_domingo_fim);
                $hora_domingo_fim = implode('', $hora_domingo_fim);
                $domingo = addslashes(trim($_POST['domingo']));
            }

            if (empty($_POST['segunda'])) {
                $hora_segunda_inicio = '';
                $hora_segunda_fim = '';
                $segunda = '';
            } else {
                $hora_segunda_inicio = addslashes(trim($_POST['hora_segunda_inicio']));
                $hora_segunda_inicio = explode(':', $hora_segunda_inicio);
                $hora_segunda_inicio = implode('', $hora_segunda_inicio);
                $hora_segunda_fim = addslashes(trim($_POST['hora_segunda_fim']));
                $hora_segunda_fim = explode(':', $hora_segunda_fim);
                $hora_segunda_fim = implode('', $hora_segunda_fim);
                $segunda = addslashes(trim($_POST['segunda']));
            }

            if (empty($_POST['terca'])) {
                $hora_terca_inicio = '';
                $hora_terca_fim = '';
                $terca = '';
            } else {
                $hora_terca_inicio = addslashes(trim($_POST['hora_terca_inicio']));
                $hora_terca_inicio = explode(':', $hora_terca_inicio);
                $hora_terca_inicio = implode('', $hora_terca_inicio);
                $hora_terca_fim = addslashes(trim($_POST['hora_terca_fim']));
                $hora_terca_fim = explode(':', $hora_terca_fim);
                $hora_terca_fim = implode('', $hora_terca_fim);
                $terca = addslashes(trim($_POST['terca']));
            }

            if (empty($_POST['quarta'])) {
                $hora_quarta_inicio = '';
                $hora_quarta_fim = '';
                $quarta = '';
            } else {

                $hora_quarta_inicio = addslashes(trim($_POST['hora_quarta_inicio']));
                $hora_quarta_inicio = explode(':', $hora_quarta_inicio);
                $hora_quarta_inicio = implode('', $hora_quarta_inicio);
                $hora_quarta_fim = addslashes(trim($_POST['hora_quarta_fim']));
                $hora_quarta_fim = explode(':', $hora_quarta_fim);
                $hora_quarta_fim = implode('', $hora_quarta_fim);
                $quarta = addslashes(trim($_POST['quarta']));
            }

            if (empty($_POST['quinta'])) {
                $hora_quinta_inicio = '';
                $hora_quinta_fim = '';
                $quinta = '';
            } else {
                $hora_quinta_inicio = addslashes(trim($_POST['hora_quinta_inicio']));
                $hora_quinta_inicio = explode(':', $hora_quinta_inicio);
                $hora_quinta_inicio = implode('', $hora_quinta_inicio);
                $hora_quinta_fim = addslashes(trim($_POST['hora_quinta_fim']));
                $hora_quinta_fim = explode(':', $hora_quinta_fim);
                $hora_quinta_fim = implode('', $hora_quinta_fim);
                $quinta = addslashes(trim($_POST['quinta']));
            }

            if (empty($_POST['sexta'])) {
                $hora_sexta_inicio = '';
                $hora_sexta_fim = '';
                $sexta = '';
            } else {
                $hora_sexta_inicio = addslashes(trim($_POST['hora_sexta_inicio']));
                $hora_sexta_inicio = explode(':', $hora_sexta_inicio);
                $hora_sexta_inicio = implode('', $hora_sexta_inicio);
                $hora_sexta_fim = addslashes(trim($_POST['hora_sexta_fim']));
                $hora_sexta_fim = explode(':', $hora_sexta_fim);
                $hora_sexta_fim = implode('', $hora_sexta_fim);
                $sexta = addslashes(trim($_POST['sexta']));
            }

            if (empty($_POST['sabado'])) {
                $hora_sabado_inicio = '';
                $hora_sabado_fim = '';
                $sabado = '';
            } else {
                $hora_sabado_inicio = addslashes(trim($_POST['hora_sabado_inicio']));
                $hora_sabado_inicio = explode(':', $hora_sabado_inicio);
                $hora_sabado_inicio = implode('', $hora_sabado_inicio);
                $hora_sabado_fim = addslashes(trim($_POST['hora_sabado_fim']));
                $hora_sabado_fim = explode(':', $hora_sabado_fim);
                $hora_sabado_fim = implode('', $hora_sabado_fim);
                $sabado = addslashes(trim($_POST['sabado']));
            }




            if ($dados['erro'] = $l->cadastrarFuncionamento($id_loja, $hora_domingo_inicio, $hora_domingo_fim, $domingo, $hora_segunda_inicio, $hora_segunda_fim, $segunda, $hora_terca_inicio, $hora_terca_fim, $terca, $hora_quarta_inicio, $hora_quarta_fim, $quarta, $hora_quinta_inicio, $hora_quinta_fim, $quinta, $hora_sexta_inicio, $hora_sexta_fim, $sexta, $hora_sabado_inicio, $hora_sabado_fim, $sabado)) {
                
            } else {
                $dados['ok'] = "Cadastrado com Sucesso! Pode cadastrar mais um novo. Ou voltar no menu <a href='<?php echo" . BASE_URL . "menuprincipal_loja?>'>Principal </a>";
            }
        } else {
            
        }

        $this->loadTemplate_3('editar_funcionamento', $dados);
    }

}
