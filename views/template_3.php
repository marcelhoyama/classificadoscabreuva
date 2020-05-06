<!DOCTYPE html>
<html lang="pt-br">

    <!-- template func -->
    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/2c2e52caea.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/vendor/css/simple-line-icons.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/vendor/css/all.min.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/landing-page.min.css"/>
  <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/menulateral.css"/>
    <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/card-horizontal.css"/>

    </head>
    <!-- menu top -->
    
<!--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5" style="margin-left: auto">
      

        <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
                                                                                                                                                                                                        <div class="h3">Buscador Cabreúva</div><img src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" width="45" height="45" class="d-inline-block align-top" alt="">
        </a><div class="text-center text-white align-content-center">Painel de controle</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto" >

                <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisar_clientes">Pesquisar Clientes <span class="sr-only"></span></a></li>
 <li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Interessados</a></li> 
<li class="nav-item"><a class="nav-link " href="<?php echo BASE_URL; ?>pesquisar_loja">Pesquisar Loja/Serviço</a></li> 

                <li class="nav-item" ><a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal_loja">Menu Principal <span class="sr-only"></span></a></li>

                <li class="nav-item dropdown">

                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"> <?php echo $_SESSION['lgname']; ?>
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link"><a class="nav-item" href="<?php echo BASE_URL; ?>perfil_cliente?id=<?php echo $_SESSION['lgCliente']; ?>">Editar Perfil </a></li> 
                        <li class="nav-link"> <a class="nav-item" href="<?php echo BASE_URL; ?>menuprincipal_loja/sairCliente">Sair </a></li>
                    </ul>


                </li>

            </ul>
        </div> 

    </nav>-->

    <!-- fim menu top -->

               <!-- Menu lateral --------------Overlay effect when opening sidebar on small screens -->

   <!--  fim do menu lateral -->

   <div class="container">
      
            <!--  margem lateral  <div class="" style="margin-left:200px;margin-top:-200px; "></div> -->
            <body>
                <div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="<?php BASE_URL; ?>home">Buscador Cabreúva</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $_SESSION['lgname']; ?></strong>
          </span>
          <span class="user-role">Administrador</span>
          <span class="user-status">
            <!--<i class="fa fa-circle"></i>-->
            <!--<span>Online</span>-->
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
<!--      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>-->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Menu</span>
          </li>
<!--          <li class="//sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php echo BASE_URL; ?>menuprincipal_loja">Menu Principal
                    <span class="badge badge-pill badge-success"></span>
                  </a>
                </li>
                <li>
                  <a href="#">Dashboard 2</a>
                </li>
                <li>
                  <a href="#">Dashboard 3</a>
                </li>
              </ul>
            </div>
          </li>-->
          <li class="//sidebar-dropdown">
<!--            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Pedido</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>-->
<!--            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div>-->
          </li>
          <li class="//sidebar-dropdown">
            <a href="<?php BASE_URL; ?>menuprincipal_loja">
              <i class="far fa-gem"></i>
              <span>Sua Loja</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
<!--                <li>
                  <a href="<?php echo BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>">Cadastrar + loja</a>
                </li>-->
                <li>
                  <a href="<?php BASE_URL; ?>editar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>&id_loja=<?php echo $value['id_loja']; ?>">Editar</a>
                </li>
              <li>
                  <a href="<?php BASE_URL; ?>cadastrar_foto?id_loja=<?php echo $_SESSION['id_loja']; ?>">Fotos</a>
                </li>
                 <li>
                  <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_loja=<?php echo $_SESSION['id_loja']; ?>">Horário</a>
                </li>
       <!--          <li>
                  <a href="#">Forms</a>
                </li>-->
              </ul>
            </div>
          </li>
          <li class="//sidebar-dropdown">
            <a href="<?php BASE_URL; ?>menuprincipal_produtos?id_loja=<?php echo  $_SESSION['id_loja'];
             ?>">
              <i class="fa fa-chart-line"></i>
              <span>Seus produtos</span>
           <span class="badge badge-pill badge-warning">Novo</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $_SESSION['id_loja']; ?>">Cadastrar</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="//sidebar-dropdown">
            <a href="<?php BASE_URL; ?>cadastrar_vitrine?id_loja=<?php echo $_SESSION['id_loja'];?>">
              <i class="fa fa-globe"></i>
              <span>Fotos da Vitrine</span>
           <span class="badge badge-pill badge-warning">Novo</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li>
<!--          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
          </li>-->
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="<?php echo BASE_URL; ?>perfil_cliente?id=<?php echo $_SESSION['lgCliente']; ?>">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="<?php echo BASE_URL; ?>menuprincipal_loja/sairCliente">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
            <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">    
            
            
                <!--  aqui onde vai o corpo das paginas do sistema -->
<?php $this->loadViewInTemplate($viewName, $viewData); ?>

  </main>      
   </div>
 </body>  
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <!--        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
                <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script> 
                 <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/menulateral.js"></script>
          

      
  




    <!-- Footer -->
<!--    <footer class="text-center ">
        <p>Desenvolvido por <a href="http://devmg.pe.hu" title="ps-maciel publicidade" target="_blank" class="w3-hover-text-green">Marcel Hoyama</a></p>
        <?php
// mostra por exemplo 'Versão Atual do PHP: 4.1.1'
        echo 'Versão Atual do PHP: ' . phpversion();

// mostra e.g. '2.0' ou nada se a extensão não está habilitada
        echo phpversion('tidy');
        ?>
    </footer>
  -->
</html>
