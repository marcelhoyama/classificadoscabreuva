<?php

class cadastrar_funcionamentoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
        
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'lojacliente' => '');


        $id = $_SESSION['lgCliente'];

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

          if (isset($_GET['id_loja']) && isset($_REQUEST['ck'])) {

            $id_loja = addslashes(($_GET['id_loja']));


            $semanaescolhidas = $_REQUEST['ck'];

            if (count($semanaescolhidas) == 1) {
                $escolheu = $semanaescolhidas[0];
                if ($escolheu == 'Segunda') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }

                if ($escolheu == 'Terça') {
                    $hinicioSegunda = addslashes($_POST['hinicioTerca']);
                    $hfinalSegunda = addslashes($_POST['hfinalTerca']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }


                if ($escolheu == 'Quarta') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }


                if ($escolheu == 'Quinta') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }


                if ($escolheu == 'Sexta') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }


                if ($escolheu == 'Sabado') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }


                if ($escolheu == 'Domingo') {
                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarSegunda($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
                        header('Location:', BASE_URL . "editar_funcionamento?id_loja" . $id_loja);
                    }
                }
            } else {
                // $id_dia= addslashes($_POST['id_dia_semana']);



                for ($i = 0; $i < count($semanaescolhidas); $i++) {


                    if ($i < count($semanaescolhidas) - 1) {
                        echo $semanaescolhidas[$i] . ",";
                    } else {
                        echo $semanaescolhidas[$i] . ",";
                    }




                    //  print_r($escolheu= explode(" ", $semanaescolhidas));
//                    if ($escolheu[$i] == 'Segunda') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                      
//                    }
//                }
//
//                if ($escolheu[$i] == 'Terça') {
//                    $hinicioSegunda = addslashes($_POST['hinicioTerca']);
//                    $hfinalSegunda = addslashes($_POST['hfinalTerca']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                        
//                    }
//                }
//
//
//                if ($escolheu[$i] == 'Quarta') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                       
//                    }
//                }
//
//
//                if ($escolheu[$i] == 'Quinta') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                       
//                    }
//                }
//
//
//                if ($escolheu[$i] == 'Sexta') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                      
//                    }
//                }
//
//
//                if ($escolheu[$i] == 'Sabado') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                       
//                    }
//                }
//
//
//                if ($escolheu[$i] == 'Domingo') {
//                    $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
//                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);
//
//                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $escolheu, $hinicioSegunda, $hfinalSegunda)) {
//                        
//                   }
                }
            }
        
            $semana = implode(",", $semanaescolhidas);
            $semana= explode(",", $semana);
            print_r($semana);
    echo   $conta= (count($semana));
            for($i=0;$i<count($semana);$i++){
           echo $semana[$i];
           if ($semana[$i] == 'Segunda') {
                  
              
               
               $hinicioSegunda = addslashes($_POST['hinicioSegunda']);
           
                    $hfinalSegunda = addslashes($_POST['hfinalSegunda']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $semana[$i], $hinicioSegunda, $hfinalSegunda)) {
                       
                       
                   }
            }
            
            
            
            
            
             if ($semana[$i] == 'Terça') {
                  
              
               
               $hinicioSegunda = addslashes($_POST['hinicioTerca']);
           
                    $hfinalSegunda = addslashes($_POST['hfinalTerca']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $semana[$i], $hinicioSegunda, $hfinalSegunda)) {
                        
                   }
            
       
            
            
            
            
            }
            
            
            
            
            
            
            
            
             if ($semana[$i] == 'Quarta') {
                    $hinicioSegunda = addslashes($_POST['hinicioQuarta']);
                    $hfinalSegunda = addslashes($_POST['hfinalQuarta']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja, $semana[$i], $hinicioSegunda, $hfinalSegunda)) {
                     
                    }
                }


                if ($semana[$i] == 'Quinta') {
                    $hinicioSegunda = addslashes($_POST['hinicioQuinta']);
                    $hfinalSegunda = addslashes($_POST['hfinalQuinta']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja,$semana[$i] , $hinicioSegunda, $hfinalSegunda)) {
                        
                    }
                }


                if ($semana[$i]  == 'Sexta') {
                    $hinicioSegunda = addslashes($_POST['hinicioSexta']);
                    $hfinalSegunda = addslashes($_POST['hfinalSexta']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja,$semana[$i] , $hinicioSegunda, $hfinalSegunda)) {
                        header("Location:".BASE_URL."menuprincipal_loja");
                        exit;
                    }
                }


                if ($semana[$i]  == 'Sabado') {
                    $hinicioSegunda = addslashes($_POST['hinicioSabado']);
                    $hfinalSegunda = addslashes($_POST['hfinalSabado']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja,$semana[$i] , $hinicioSegunda, $hfinalSegunda)) {
                    }
                }


                if ($semana[$i]  == 'Domingo') {
                    $hinicioSegunda = addslashes($_POST['hinicioDomingo']);
                    $hfinalSegunda = addslashes($_POST['hfinalDomingo']);

                    if ($dados['erro'] = $f->cadastrarArray($id_loja,$semana[$i] , $hinicioSegunda, $hfinalSegunda)) {
                          
                   }
            
                }
            
            
            }
          }
            

        $this->loadTemplate_3('cadastrar_funcionamento', $dados);
    }

}
