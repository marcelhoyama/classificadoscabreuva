<!DOCTYPE html> 
<html lang="pt-br">

    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min_1.css"/>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/2c2e52caea.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>

        <title>Buscador Cabreúva </title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
            <a class="navbar-brand" href="https://www.facebook.com/denilsonmacielps">   
                <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a><a class="navbar-brand" href="<?php BASE_URL;?>home">Buscador Cabreúva</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a href="<?php BASE_URL; ?>home" class="nav-link">Home</a></li>
                     <li class="nav-item"><a href="<?php BASE_URL; ?>denilsonmaciel" class="nav-link">Denilson Maciel</a></li>
                    <li class="nav-item">  <a href="<?php BASE_URL; ?>contato" class="nav-link">Contato</a></li>
                  <li class="nav-item">  <a href="<?php BASE_URL; ?>login_entrar" class="nav-link">Entrar</a></li>
         <!--             <li class="nav-item">  <a href="login/cadastrar" class="nav-link">Cadastrar-se</a></li>-->

                </ul>
            </div> 

        </nav> 
       





        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="" style="color:#d1ecf1;"> Redes Sociais dos parceiros</h5>
                <a href="http://www.urbanoveiculos.com.br" id="link" > <p>Urbano Veiculos</p></a>
                <a href="#" id="link"> <p>Casa Ração Santos</p></a>
                <a href="#" id="link"> <p>Guguili Baby</p></a>
                <a href="#" id="link" > <p>Ótica Uniart</p></a>
                <a href="#" id="link"> <p>Rádio Japi</p></a>
                <a href="#" id="link">  <p>DMR Imoveis em Cabreúva</p></a>
            </div>
            <div class="col ">
                <h5 class="" style="color:#d1ecf1;">Mais Informações:</h5>
                <ul>
                    <li><a href="#" id="link">marecrisbr@gmail.com</a></li>
                    <li><a href="#" id="link">11-97672-6576</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-copyright">
            <a href="#" id="link"><p class="text-center text-warning " >@BuscadorCabreuva 2019</p></a>
        </div>
    </div>
</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      

        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/script.js"></script>
    </body>



</html>

