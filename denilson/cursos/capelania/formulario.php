<?php
$erro='';
$ok='';
$array=array();
 //$db = new PDO("mysql:dbname=denilsonmaciel;host=localhost", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) && !empty($_POST['telefone']) && isset($_POST['endereco']) && !empty($_POST['endereco']) && isset($_POST['email']) && !empty($_POST['email'])) {

    $nome = addslashes(trim($_POST['nome']));
    $telefone = addslashes(trim($_POST['telefone']));
    $endereco = addslashes(trim($_POST['endereco']));
    $email = addslashes(trim($_POST['email']));

    try {


        $db = new PDO("mysql:dbname=u708362941_psmac;host=localhost", "u708362941_psmac", "4D3$/5/>",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

       



        $sql = $db->prepare("SELECT id FROM alunos WHERE email=:email OR telefone=:telefone");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":telefone", $telefone);
        $sql->execute();
        if ($sql->rowCount() == 0) {
             $sql = "INSERT INTO alunos SET nome=:nome,telefone=:telefone,endereco=:endereco,email=:email,data_cadastro=NOW()";


            $sql = $db->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":telefone", $telefone);

            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":email", $email);

          

            $sql->execute();


            if ($sql->rowCount() > 0) {
                $ok= "cadastro com sucesso! Se encontramos na aula!  ";
                        $para = "macieldenilson@gmail.com";
            $assunto = " Contato pelo site Curso de Capelania";
            $corpo = "Nome do interessado: " . $nome . "<br><br>"
                   . "-Celular: " . $telefone . "<br><br>"
                   . "- Email do interessado: " . $email . "<br><br>"
                    . "-Tipo de Assunto: Quero fazer curso de capelania <br><br>"
                    . "-Endereço: " . $endereco;
            $cabecalho = "From:" . $email . "\r\n" .
                    "Reply-To:" . $email . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();
            mail($para, $assunto, $corpo, $cabecalho);
            } else {
               $erro= "Preencha todos os campos!";
            }
        }else{
            $erro= "Você já tem o cadastro!";
        }
    } catch (PDOException $e) {
        echo "ERRO:" . $e->getMessage();
    }
}
//$sql=$db->prepare("SELECT * FROM alunos");
//$sql->execute();
//$array=$sql->fetchAll(PDO::FETCH_ASSOC);
//
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="Curso de Capelania" content="">
        <meta name="Denilson Maciel" content="">
        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        
        <!-- Theme CSS -->
        <link href="css/freelancer.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row"> 
                <img src="img/portfolio/logo-ipc.png" class="img-fluid" width="200">
                <H1 class="text-center my-5">Cadastro do Curso de Capelania Básica</H1>
            </div>
                         <p class="text-center text-danger">*Esses dados serão para confirmar sua vaga e atraves dele entraremos em contato para o processo das aulas!</p>
                <div class=" h4 text-center text-danger">FORMA DE PAGAMENTO</div>
      <p class="text-center">À Vista no local ou por depósito bancário Banco: Itau </p>
      <p class="text-center">Ag: 7883 </p>
          <p class="text-center">Conta Corrente: 25909-0 
              <p class="text-center">Denilson Maciel  CNPJ 32.235.778/0001-76
              </p><p class="text-center">R$ 400,00 sem/material ou R$ 435,00 com/material</p>
            <h5 class=" text-center text-danger mb-3">Todos os campos são obrigatorio*</h5>
            <form method="POST" id="cadastrarusuarios">
                <div class="form-group">
                    <label for="nome">Nome Completo*</label>
                    <input type="text" class="form-control" id="nome" placeholder="" name="nome" required="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Seu email*</label>
                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="nome@exemplo.com" name="email" required="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Endereço Completo* (Rua - bairro - cidade - estado)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="" name="endereco" required="">
                </div>
                <div class="form-group">
                    <label for="celular">Telefone whastapp*</label>
                    <input type="text" class="form-control" id="celular" placeholder="numero DDD + numeros" name="telefone">
                </div>

                <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
                
                <?php if($erro==''){}else{ ?>
                <div class="alert alert-danger mt-3"><?php echo $erro ?></div> <?php } ?>
                
              <?php if($ok==''){}else{ ?>
                <div class="alert alert-success mt-3"><?php echo $ok?></div> <?php } ?>

   
<h5 class=" text-center text-danger">E NÃO ESQUEÇA de enviar a copia do comprovante pelo email ou whatsapp</h5>
                <h5 class="text-center mt-3">Duvidas!  Ligue 11-97462-9961 / E-mail: macieldenilson@gmail.com </h5>

            </form>
        </div>
    </body>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>
      <script src="js/jquery.mask.js"></script>
      <script src="js/jquery.validate.js"></script>
      <script src="js/messages_pt_BR.min.js"></script>
      <script src="js/validarcampos.js"></script>

</html>