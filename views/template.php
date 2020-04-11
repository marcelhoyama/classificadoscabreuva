<!DOCTYPE html> 
<html lang="pt-br">

    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/2c2e52caea.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>

        <title>Buscador Cabreúva </title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mb-5">
            <a class="navbar-brand" href="https://www.facebook.com/denilsonmacielps">   
                <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a><a class="navbar-brand" href="<?php BASE_URL;?>home">Buscador Cabreúva</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a href="<?php BASE_URL; ?>home" class="nav-link">Home</a></li>
                     <li class="nav-item"><a href="<?php BASE_URL; ?>home_1" class="nav-link">Comerciante/Prestador de Serviço</a></li>
<!--                    <li class="nav-item">  <a href="<?php BASE_URL; ?>prestacao-servico" class="nav-link">Prestador de Serviço</a></li>-->
                  <li class="nav-item">  <a href="<?php BASE_URL; ?>login_entrar" class="nav-link">Entrar</a></li>
         <!--             <li class="nav-item">  <a href="login/cadastrar" class="nav-link">Cadastrar-se</a></li>-->

                </ul>
            </div> 

        </nav> 
       
        <div class="row mb-5">.</div> <!-- espaçamento entre nav e banner-->




        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
          </body>
        <footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="" style="color:#d1ecf1;"> Apoiadores</h5>
         
                <a href="https://psmaciel.buscadorcabreuva.com.br/" id="link" target="_blank"> <p>PS-Maciel Publicidade e Propaganda</p></a>
                <a href="http://devmg.pe.hu/centrodigital/" id="link" target="_blank"> <p>Centro Digital de Informática</p></a>
<!--                <a href="https://pt-br.facebook.com/guguilicasadefraldas/" id="link"> <p>Guguili Baby</p></a>
                <a href="https://pt-br.facebook.com/oticauniart/" id="link" > <p>Ótica Uniart</p></a>-->
                <a href="#" id="link" > <p>Marisa Romão (Sebrae)</p></a>
                <a href="https://www.cabreuva.sp.gov.br/" id="link" > <p>Prefeitura de Cabreúva</p></a>
           
<!--                <a href="https://www.dmrimoveiscabreuva.com.br" id="link">  <p>DMR Imoveis em Cabreúva</p></a>
                <a href="http://www.didipedras.com.br" id="link">  <p>Didipedras Cabreúva</p></a>-->
            </div>
            <div class="col ">
                <h5 class="" style="color:#d1ecf1;">Mais Informações:</h5>
                
                    <a href="#" id="link">marecrisbr@gmail.com</a>
                    <a href="https://api.whatsapp.com/send?phone=5511976726576&text=Quero%20Saber%20do%20Site%20Buscador%20Cabre%C3%BAva!" id="link"> <p>11-97672-6576 Marcel</p> </a>
                
            </div>

        </div>
        <div class="footer-copyright">
            <a href="http://www.devmg.pe.hu" id="link"><p class="text-center text-warning " >@BuscadorCabreuva 2020</p></a>
        </div>
    </div>
</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      

       
<!--        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>-->

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>




</html>

