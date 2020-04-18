<?php

class cadastrar_lojaController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'listarRamo' => '', 'listarCliente' => '','listarBairros'=>'');

//        $f = new funcionarios();
//        $id = $_SESSION['lg'];
//        $dados['nomefunc'] = $f->getName($id);
//        $dados['id_funcionario'] = $id;
        $c = new clientes();
        $l = new lojas();
        $dados['listarRamo'] = $c->listarRamo();
       $b=new bairros();
       $dados['listarBairros']=$b->listarBairros();
        
        if (isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];
            $c = new clientes();
            $dados['nomeCliente'] = $c->getName($id_cliente);
            $dados['id_cliente'] = $id_cliente;
//        $dados['lojacliente']=$c->getIdLojaCliente($id_cliente);
            
        }
    
        if (isset($_POST['anuncio_site']) && !empty($_POST['anuncio_site']) && (isset($_POST['whatsapp1']) && !empty($_POST['whatsapp1'])) && (isset($_POST['tipo_categoria']) && !empty($_POST['tipo_categoria'])) && (isset($_POST['nome_fantasia']) && !empty($_POST['nome_fantasia'])) && (isset($_POST['endereco']) && !empty($_POST['endereco']))) {

            //  variavel $id é do funcionario
            // variavel $id_cliente é do cliente
            $anuncio_site = addslashes(trim($_POST['anuncio_site']));
            $id_ramo = addslashes(trim($_POST['tipo_categoria']));
            $nome_fantasia = addslashes(trim($_POST['nome_fantasia']));
            $razao_social = addslashes(trim($_POST['razao_social']));
            $endereco = addslashes(trim($_POST['endereco']));
            $bairro = addslashes(trim($_POST['bairro']));
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
            $cpfcnpj = addslashes(trim($_POST['cpfcnpj']));
//            $cpf = addslashes(trim($_POST['cpf']));
            $cpfcnpj= explode('.',$cpfcnpj);
            $cpfcnpj=implode("",$cpfcnpj);
            $cpfcnpj= explode('-',$cpfcnpj);
            $cpfcnpj=implode("",$cpfcnpj);
             $cpfcnpj= explode('/',$cpfcnpj);
            $cpfcnpj=implode("",$cpfcnpj);
            $delivery= addslashes($_POST['delivery']);
              $funcionamento= addslashes($_POST['funcionamento']);
//            $descricao = addslashes(trim($_POST['descricao']));
//            $chamada = addslashes(trim($_POST['chamada']));
//            $prova = addslashes(trim($_POST['prova']));
//            $apresentacao = addslashes(trim($_POST['apresentacao']));
//            $produtos = addslashes(trim($_POST['produtos']));
//            $acao = addslashes(trim($_POST['acao']));
            $status='0';
            $palavrachave= addslashes(trim($_POST['palavrachave']));
            $titulo=$nome_fantasia;



            $id_funcionario = 1;

        //     $semanaescolhidas=$_REQUEST['ck'];
            
            
//            // $id_dia= addslashes($_POST['id_dia_semana']);
//          for($i=0;$i< count($semanaescolhidas);$i++){
//           
//              if($i < count($semanaescolhidas)-1)
////        if (isset($_POST['ckSegunda']) && !empty($_POST['ckSgunda'])) {
//            echo  $ckSegunda= $semanaescolhidas[$i]; 
//               
//            $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//            $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//        
//
////        if (isset($_POST['ckTerça']) && !empty($_POST['ckSTerça'])) {
//           echo    $ckTerca =$semanaescolhidas[$i]; 
//               $hinicioTerca = addslashes($_POST['hinicioTerça']);
//            $hfinalTerca = addslashes($_POST['hfinalTerça']);
//        
//        
////        if (isset($_POST['ckQuarta']) && !empty($_POST['ckQuarta'])) {
//           echo  $ckQuarta = $semanaescolhidas[$i]; 
//              $hinicioQuarta = addslashes($_POST['hinicioQuarta']);
//            $hfinalQuarta = addslashes($_POST['hfinalQuarta']);
//        
//        
//       // if (isset($_POST['ckQuinta']) && !empty($_POST['ckQuinta'])) {
//           
//            echo   $ckQuinta = $semanaescolhidas[$i]; 
//               $hinicioQuinta = addslashes($_POST['hinicioQuinta']);
//            $hfinalQuinta = addslashes($_POST['hfinalQuinta']); 
//            
//        
//        
//     //   if (isset($_POST['ckSexta']) && !empty($_POST['ckSexta'])) {
//         echo    $ckSexta = $semanaescolhidas[$i]; 
//            $hinicioSexta = addslashes($_POST['hinicioSexta']);
//            $hfinalSexta = addslashes($_POST['hfinalSexta']);
//        
//        
//    //    if (isset($_POST['ckSabádo']) && !empty($_POST['ckSabádo'])) {
//        echo     $ckSabado = $semanaescolhidas[$i]; 
//             $hinicioSabado = addslashes($_POST['hinicioSabádo']);
//            $hfinalSabado = addslashes($_POST['hfinalSabádo']);
//        
//        
//     //   if (isset($_POST['ckDomingo']) && !empty($_POST['ckDomingo'])) {
//        echo     $ckDomingo =$semanaescolhidas[$i]; 
//              $hinicioDomingo = addslashes($_POST['hinicioDomingo']);
//            $hfinalDomingo = addslashes($_POST['hfinalDomingo']);
        
            
               //envio de imagem foto principal do imovel;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
//
//                if (isset($_FILES['arquivo1'])) {
//            $foto = $_FILES['arquivo1'];
//        } else {
//            $foto = array();
//        }
//        
//        //envio fotos da loja
//        if (isset($_FILES['arquivos'])) {
//            
//            $fotos = $_FILES['arquivos'];
//           
//               
//            }else{
//
//            $fotos = array();
//            }
//               //envio fotos da equipe
//        if (isset($_FILES['arquivos2'])) {
//            
//            $fotos2 = $_FILES['arquivos2'];
//           
//               
//            }else{
//
//            $fotos2 = array();
//            }
// fim do envio de imagem;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
            

            $l = new lojas();
            
//            $l->cadastrar($id_funcionario, $id_cliente, $anuncio_site ,$nome_fantasia, $razao_social, $endereco, $bairro,$cidade,$telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube,$instagram, $site,$tipo_categoria, $descricao, $chamada, $prova, $foto,$fotos,$fotos2, $apresentacao, $produtos, $acao,$palavrachave,$titulo);
            
           if($dados['erro']=$l->cadastrar($id_funcionario, $id_cliente, $anuncio_site ,$nome_fantasia, $razao_social, $endereco, $bairro,$cidade,$telefone1, $telefone2, $status, $whatsapp1, $whatsapp2, $email, $facebook, $youtube,$instagram, $site,$id_ramo ,$palavrachave,$titulo,$cpfcnpj,$delivery,$funcionamento)){
      
               
           }else{
               header("Location:".BASE_URL."menuprincipal_loja");
               exit;
           }
        }
            $this->loadTemplate_3('cadastrar_loja', $dados);
        }

           
        }
    
    