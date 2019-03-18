

<head>

   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
    <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">

</head>

<title>Sistema de anuncios</title>



<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
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
                <li class="nav-item dropdown">

                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#"> <?php echo "fulano"; ?>
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li class="nav-link"><a class="nav-item" href="<?php echo BASE_URL; ?>perfil">Editar Perfil </a></li> 
                        <li class="nav-link"> <a class="nav-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a></li>
                    </ul>


                </li>
                
            </ul>
        </div> 

    </nav> 
    <br>

    <!--  aqui onde vai o corpo das paginas do sistema -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>





</body>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>

