
<title>Menu Principal Loja</title>
<br>
<br>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

    <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
        <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="Facebook Buscador Cabreuva">
        Buscador Cabreúva</a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto" >

            <li class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarimoveis">Meus Anúncios <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Interessados</a>
            </li> 

            <li class="nav-item" >
                <a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal_loja">Menu Principal <span class="sr-only"></span></a>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['lgname']; ?> </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>perfil_cliente?id=<?php echo $_SESSION['lgCliente']?>">Editar Perfil </a> 
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a>
               </div>
            </li>
        </ul> 

    </div> 

</nav>
<div class="container-fluid">


    <div class="row" >
        <div class="col-sm-2">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_clientes">
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastrar imoveis" width="128" height="128">

                </a>  
                <div class="h6"> Cadastrar Loja</div>  
            </div>
        </div>


        <div class="col-sm-2">
            <div class="thumbnail" >
                <a href="<?php BASE_URL; ?>pesquisarimoveis"  >
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar imoveis" width="128" height="128">
                </a>
                <div class="h6"> Cadastrar Promoção</div>  
            </div>
        </div>

        <div class="col-sm-2">
            <div class="thumbnail">
                <a href="<?php BASE_URL; ?>pesquisarinteressados">
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar interessados" width="128" height="128">
                </a>
                <div class="h6"> Cadastrar Evento</div>  
            </div>
        </div>  

    </div>



    <hr class="divider">
    <div class="row">

        <ul class="list-group">
            <li class="list-group-item">
                <?php $totalimovel = $viewData['totalimovel']; ?>
                <label>Total de Loja: </label><span class="badge"> <?php // echo $totalimovel['total']; ?></span>
            </li>

            <li class="list-group-item">
                <?php $totalimovel = $viewData['totalvenda']; ?>
                <label>Total de Pagantes: </label><span class="badge"> <?php // echo $totalvenda['total']; ?></span>
            </li>
            <div class="col-sm-2">
                <?php $totalimovel = $viewData['totalaluga']; ?>

                <label>Total de Não Pagantes: </label><span class="badge "> <?php // echo $totalaluga['total']; ?></span>
            </div>

            <div class="col-sm-2">
                <?php $totalstatuslivre = $viewData['totallivre']; ?> 
                <label>Total Anúnciado: </label><span class="badge"> <?php // echo $totalstatuslivre['total']; ?></span>
            </div>
            <div class="col-sm-2">
                <?php $totalstatusbloqueado = $viewData['totalbloqueado']; ?> 
                <label>Total Bloqueado: </label><span class="badge"> <?php // echo $totalstatusbloqueado['total']; ?></span>
            </div>
        </ul>
    </div>
</div>




