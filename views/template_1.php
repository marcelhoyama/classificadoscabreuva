

<head>

   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/w3.css"/>
    <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<title>Sistema de Anuncios</title>



<body>
   <br>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
           <button class="w3-bar-item btn btn-default w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">  <span class="navbar-toggler-icon"></span></button>
     
        <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
            <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Buscador Cabreúva</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto" >
               
                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarimoveis">Anúnciados <span class="sr-only"></span></a></li>
                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Interessados</a></li> 

                <li class="nav-item" ><a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal">Menu Principal <span class="sr-only"></span></a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>login/sair">Sair<span class="sr-only"></span> </a></li>
<!--                <li class="nav-item dropdown">

                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"> <?php echo $_SESSION['lgname']; ?>
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link"><a class="nav-item" href="<?php echo BASE_URL; ?>perfil">Editar Perfil </a></li> 
                        <li class="nav-link"> <a class="nav-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a></li>
                    </ul>


                </li>-->
                
            </ul>
        </div> 

    </nav> 
    <!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <br>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4 ">
      <img src="<?php echo BASE_URL; ?>assets/images/sem-imagem.gif" class="w3-circle w3-margin-right " style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bem vindo, <strong> <?php echo $_SESSION['lgname']; ?></strong></span><br>
     
      <a href="<?php echo BASE_URL; ?>perfil" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Painel de Controle</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?php BASE_URL;?>pesquisar_clientes" class="w3-bar-item w3-button w3-padding active"><i class="fa fa-users fa-fw"></i>  Clientes</a>
    <a href="<?php BASE_URL;?>pesquisar_funcionario" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Funcionários</a>
    <a href="<?php BASE_URL;?>pesquisar_loja" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Lojas</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <!--  aqui onde vai o corpo das paginas do sistema -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>





</body>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>

