<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min_1.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/slidebar.css"/>
  
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/index.scss"/>
      <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/spec/index.scss"/>
    <title>Dashboard</title>

    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
  </head>
 
  <body class="app mt-5">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>

    <!-- @App Content -->
    <!-- =================================================== -->
    <div class="row">
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            
              
                <a class="nav-link" href="<?php BASE_URL;?>menuprincipal">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="<?php BASE_URL;?>assets/images/sem-imagem.gif" alt="Buscador Cabreuva">
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">Classificados</h5>
                    </div>
                  </div>
                </a>
              
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
          
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="navbar-nav ">
            <li class="nav-item actived">
              <a class="nav-link" href="index.html">
               
               Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="email.html">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-email"></i>
                </span>
                <span class="title">Restaurante</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="compose.html">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-share"></i>
                </span>
                <span class="title">FastFood</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="calendar.html">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Roupas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="chat.html">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Celulares</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="charts.html">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Computadores</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="forms.html">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-pencil"></i>
                </span>
                <span class="title">Calçados</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="sidebar-link" href="ui.html">
                <span class="icon-holder">
                    <i class="c-pink-500 ti-palette"></i>
                  </span>
                <span class="title">Automoveis</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                <span class="title">Mecanica</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="basic-table.html">Basic Table</a>
                </li>
                <li>
                  <a class='sidebar-link' href="datatable.html">Data Table</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="c-purple-500 ti-map"></i>
                  </span>
                <span class="title">Eletrica</span>
                <span class="arrow">
                    <i class="ti-angle-right"></i>
                  </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="google-maps.html">Google Map</a>
                </li>
                <li>
                  <a href="vector-maps.html">Vector Map</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="c-red-500 ti-files"></i>
                  </span>
                <span class="title">Alugueis</span>
                <span class="arrow">
                    <i class="ti-angle-right"></i>
                  </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="blank.html">Blank</a>
                </li>                 
                <li>
                  <a class='sidebar-link' href="404.html">404</a>
                </li>
                <li>
                  <a class='sidebar-link' href="500.html">500</a>
                </li>
                <li>
                  <a class='sidebar-link' href="signin.html">Sign In</a>
                </li>
                <li>
                  <a class='sidebar-link' href="signup.html">Sign Up</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-teal-500 ti-view-list-alt"></i>
                </span>
                <span class="title">Multiple Levels</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>Menu Item</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>Menu Item</span>
                    <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="javascript:void(0);">Menu Item</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">Menu Item</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- #Main ============================ -->
      <div class="col mt-5">
        <!-- ### $Topbar ### -->
        
          <div class="row">
              <div class="col"><div class="card" style="width: 18rem;">
  <img src="<?php BASE_URL; ?>assets/images/allfood-cabreuva.jpg" width="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Título do card</h5>
    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    <a href="#" class="btn btn-primary">Visitar</a>
  </div>
</div></div>
  <div class="col"><div class="card" style="width: 18rem;">
  <img src="<?php BASE_URL; ?>assets/images/allfood-cabreuva.jpg" width="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Título do card</h5>
    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    <a href="#" class="btn btn-primary">Visitar</a>
  </div>
</div></div>
  <div class="col"><div class="card" style="width: 18rem;">
  <img src="<?php BASE_URL; ?>assets/images/allfood-cabreuva.jpg" width="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Título do card</h5>
    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    <a href="#" class="btn btn-primary">Visitar</a>
  </div>
</div></div>
  <div class="col"><div class="card" style="width: 18rem;">
  <img src="<?php BASE_URL; ?>assets/images/allfood-cabreuva.jpg" width="200" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Título do card</h5>
    <p class="card-text">Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.</p>
    <a href="#" class="btn btn-primary">Visitar</a>
  </div>
</div></div>
</div>
        

        <!-- ### $App Screen Content ### -->
        

      
      </div>
    </div>
 
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/scripts/index.js"></script>