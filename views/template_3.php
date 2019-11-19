<!DOCTYPE html>
<html lang="pt-br">
    

<head>
  <meta charset="UTF=8"/>
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>

    <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5>
           <button class="w3-bar-item btn btn-default w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">  <span class="navbar-toggler-icon"></span></button>
     
        <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
            <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Buscador Cabreúva</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto" >
               
                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>promocao">Promoções <span class="sr-only"></span></a></li>
                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Horarios</a></li> 

                <li class="nav-item" ><a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal">Menu Principal <span class="sr-only"></span></a></li>
              
                <li class="nav-item dropdown">

                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"> <?php echo $_SESSION['lgname']; ?>
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link"><a class="nav-item" href="<?php echo BASE_URL; ?>perfil_usuario?id=<?php echo $_SESSION['lgUsuario'];?>">Editar Perfil </a></li> 
                        <li class="nav-link"> <a class="nav-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a></li>
                    </ul>


                </li>
                
            </ul>
        </div> 

    </nav>
<body>

  <!--  aqui onde vai o corpo das paginas do sistema -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>


<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Desenvolvido por <a href="http://www.devmg.pe.hu" title="Marcel Hoyama" target="_blank" class="w3-hover-text-green">Marcel Hoyama</a></p>
</footer>

</body>
</html>
