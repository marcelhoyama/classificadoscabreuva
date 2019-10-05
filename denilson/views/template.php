<!DOCTYPE html> 
<html lang="pt-br">

    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_DENILSON; ?>assets/css/bootstrap.min.css"/>
         
       
        <link rel="stylesheet" href="<?php BASE_DENILSON; ?>assets/css/style.css"/>

        <title>Denilson Maciel </title>
    </head>
    <body>
        <div class="footer-copyright fixed-top">
            <p class="text-warning text-center"> Promoção dias das crianças</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mt-4 fixed-top  ">
           <a class="navbar-brand" href="<?php BASE_URL;?>home">Denilson Maciel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a href="<?php BASE_URL; ?>home" class="nav-link">Home</a></li>
                           <li class="nav-item"><a href="<?php BASE_URL; ?>serviço" class="nav-link">Serviços</a></li>
                     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a href="<?php BASE_URL; ?>curso" class="dropdown-item">Cursos</a>
                 <a href="<?php BASE_URL; ?>oportunidade" class="dropdown-item">Oportunidades</a>
        </div>
                     </li>
                 <li class="nav-item"><a href="<?php BASE_DENILSON; ?>../" class="nav-link">Buscador</a></li>
                    <li class="nav-item">  <a href="<?php BASE_URL; ?>contato" class="nav-link">Contato</a></li>
        
         

                </ul>
            </div> 

        </nav> 
       





        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
   
        <footer class="footer ">
    
        <div class="row">
            <div class="col ml-3">
                <h5 class="" style="color:#d1ecf1;"> Redes Sociais dos parceiros</h5>
                <a href="#" id="link" > <p>Urbano Veiculos</p></a>
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
        
       
    
</footer>
         <div class="footer-copyright">
            <a href="#" id="link"><p class="text-center text-warning " >@BuscadorCabreuva 2019</p></a>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      

        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/script.js"></script>
    </body>



</html>

