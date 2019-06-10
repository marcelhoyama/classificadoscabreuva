<!DOCTYPE html> 
<html lang="pt-br">

    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Buscador Cabreúva </title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
            <a class="navbar-brand" href="https://www.facebook.com/buscadorcabreuva">   
                <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Buscador Cabreúva</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a href="<?php BASE_URL; ?>home" class="nav-link">Home</a></li>
                     <li class="nav-item"><a href="http://psmaciel.buscadorcabreuva.com.br" class="nav-link">Publicidade</a></li>
                    <li class="nav-item">  <a href="<?php BASE_URL; ?>contato" class="nav-link">Contato</a></li>
                    <li class="nav-item">  <a href="login/entrar" class="nav-link">Entrar</a></li>
                    <li class="nav-item">  <a href="login/cadastrar" class="nav-link">Cadastrar-se</a></li>

                </ul>
            </div> 

        </nav> 
        <br>
        <br>
        <br>





        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    </body>



</html>

