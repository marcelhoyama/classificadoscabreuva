<!DOCTYPE html>

<html lang="pt-br">
    <head>

        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/landing-page.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mb-5">
        <a class="navbar-brand" href="https://www.facebook.com/denilsonmacielps">   
            <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a><a class="navbar-brand" href="<?php BASE_URL; ?>home">Buscador Cabreúva</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item"><a href="<?php BASE_URL; ?>classificados" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="<?php BASE_URL; ?>home_1" class="nav-link">Comerciante/Prestador de Serviço</a></li>
<!--                    <li class="nav-item">  <a href="<?php BASE_URL; ?>prestacao-servico" class="nav-link">Prestador de Serviço</a></li>-->
                <li class="nav-item">  <a href="<?php BASE_URL; ?>login_entrar" class="nav-link">Entrar</a></li>
                <!--             <li class="nav-item">  <a href="login/cadastrar" class="nav-link">Cadastrar-se</a></li>-->

            </ul>
        </div> 

    </nav> 

    

        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
   

    <!-- Footer -->

    <footer class="container-fluid footer" id="conteudo1"> 
        <div class="row text-white ">

            <div class="col-6 text-right">
                <h6>Escritório</h6>
                <li>Rua Fernando Nunes, nº 793 </li>
                <li>Jacaré - Cabreúva/SP.</li>
                <br>
                <li><a href="<?php BASE_URL; ?>termo" class="link text-white">Termo de uso e Privacidade</a></li>
            </div>
            <div class="col-6">
                <h6>Contato:</h6>
                <li>Marcel (site e Informática) : (11) 9.7672-6576 whatsApp</li>
                <li>Email: suporte@buscadorcabreuva.com.br</li>
                <li>Denilson (publicidade, propaganda): (11) 9.7462-9961 whastApp</li>
                <li>Email: publicidade@buscadorcabreuva.com.br</li>

            </div>
        </div>
        <div class="footer-conteudo2 mt-5 " align="center">
            <a href="https://www.facebook.com/denilsonmacielps" target="_blank"> <i class="text-white fa fa-facebook-official" style="width: 60px;"></i></a> 
            <a href="https://www.instagram.com/locutor_denilson" target="blank"><i class="text-white fa fa-instagram w3-hover-opacity" style="width: 60px;"></i></a>
      <!--    <i class="fa fa-snapchat w3-hover-opacity"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity"></i>
          <i class="fa fa-twitter w3-hover-opacity"></i>
          <i class="fa fa-linkedin w3-hover-opacity"></i>-->

            <p class="text-white mt-5">Buscador Cabreúva &copy; </p>
            <p class="text-white"> Desenvolvido por <a class="text-white" href="http://www.devmg.pe.hu" target="_blank" title="Marcel Hoyama">Marcel Hoyama</a></p>
        </div>

    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 

</html>


