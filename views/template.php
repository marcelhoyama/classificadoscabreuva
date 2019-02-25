<!DOCTYPE html> 
<html lang="pt-br">
    
    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
        
        <title>Buscador Cabreúva </title>
    </head>
    <body>
        
       <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
    <a class="navbar-brand" href="<?php BASE_URL;?>home">   
        <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Buscador Cabreúva</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto" >
             <li class="nav-item"><a href="<?php BASE_URL;?>home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link ">Anunciar</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Serviços</a></li>
            <li class="nav-item">  <a href="<?php BASE_URL;?>contato" class="nav-link">Contato</a></li>
        </ul>
    </div> 

</nav> 
        <br>
        <br>
        home
        
        
        
        
        
        <?php $this->loadViewInTemplate($viewName, $viewData);?>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    </body>
    
    
   
</html>

