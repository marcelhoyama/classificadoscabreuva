<!DOCTYPE html>
<html lang="pt-br">
    
<!-- template func -->
<head>
  <meta charset="UTF=8"/>
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
   
    <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

</head>
<!-- menu top -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
           <button class="w3-bar-item btn btn-default w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open()">  <span class="navbar-toggler-icon"></span></button>
     
        <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
            <img src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" width="45" height="45" class="d-inline-block align-top" alt="">
            </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto" >
               
<!--                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisar_clientes">Pesquisar Clientes <span class="sr-only"></span></a></li>
                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Interessados</a></li> 
  <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisar_loja">Pesquisar Loja/Serviço</a></li> -->

                <li class="nav-item" ><a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal_loja">Menu Principal <span class="sr-only"></span></a></li>
              
                <li class="nav-item dropdown">

                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"> <?php echo $_SESSION['lgname']; ?>
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link"><a class="nav-item" href="<?php echo BASE_URL; ?>perfil_cliente?id=<?php echo $_SESSION['lgCliente'];?>">Editar Perfil </a></li> 
                        <li class="nav-link"> <a class="nav-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a></li>
                    </ul>


                </li>
                
            </ul>
        </div> 

    </nav>
  
<!-- fim menu top -->
    
    
    <!-- Menu lateral --------------Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <br>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4 mt-5">
      <img src="<?php echo BASE_URL; ?>assets/images/sem-imagem.gif" class="w3-circle w3-margin-right " style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bem vindo, <strong> <?php echo $_SESSION['lgname']; ?></strong></span><br>
      <form method="GET">
          <a href="<?php echo BASE_URL; ?>perfil?id=<?php if(!empty($_SESSION['lg'])){echo $_SESSION['lg'];}elseif(!empty ($_SESSION['lgCliente'])){ echo $_SESSION['lgCliente'];}else{$_SESSION['lgUsuario'];} ?>" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </form>
    </div>
  </div>
  <hr>
 
    <h5>Painel de Controle</h5>
 
  <div class="w3-bar-block">
      <li><a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a></li>
    
      <li> <a href="<?php BASE_URL;?>pesquisar_clientes" class="w3-bar-item w3-button w3-padding active"><i class="fa fa-users fa-fw"></i>  Clientes</a></li>
      
      <li>  <a href="<?php BASE_URL;?>pesquisar_funcionario" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Funcionários</a></li>
      
      <li><a href="<?php BASE_URL;?>pesquisar_loja" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Lojas</a></li>
<!--    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
  </div>
</nav>
<!-- fim do menu lateral -->
 
 <div class="container">
     
    <div class="" style="margin-left:200px;margin-top:-200px; ">
            <body>
  <!--  aqui onde vai o corpo das paginas do sistema -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
 </body>
    </div>
       
 </div>
     
<!-- Footer -->
<footer class="text-center ">
  <p>Desenvolvido por <a href="https://www.buscadorcabreuva.com.br" title="ps-maciel publicidade" target="_blank" class="w3-hover-text-green">Marcel Hoyama</a></p>
</footer>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>   

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
</html>
