<?php

class cadastrar_fotoController extends controller {

    public function __construct() {
        parent::__construct();
        $c = new clientes();
        $c->verificarLogin();
    }

    public function index() {
        $dados = array('erro' => '', 'ok' => '', 'listarRamo' => '', 'dadosCliente' => '');

        $c = new clientes();
        $id = $_SESSION['lgCliente'];
        
      
     $f=new foto();

         $id_loja= addslashes(trim($_GET['id_loja']));
           $dados['fotoPrincipal'] = $f->listFotoPrincipal($id_loja);

      
        
      
       
             //envio de imagem foto principal do imovel;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;

                if (isset($_FILES['arquivo1'])) {
            $foto = $_FILES['arquivo1'];
            if($f->cadastrarUrlPrincipalImagem($id_loja, $foto)==TRUE){
    header("Location:".BASE_URL."cadastrar_foto?id_loja=".$id_loja);
    exit;
}else{
    $dados['erro']="Não possivel incluir!";
}
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
      
           


          
  
        


        
        
        


        $this->loadTemplate_3('cadastrar_foto', $dados);
    }

}
