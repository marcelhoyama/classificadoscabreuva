
<title>Menu Principal</title>

<div class="container-fluid">

        <div class="row">
      
    
    <div class="col-sm-2">
        <div class="thumbnail ">
       <a href="<?php BASE_URL;?>pesquisar_clientes">
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastrar imoveis" width="128" height="128">
    
       </a>  
            <div class="h6"> Cliente</div>  
    </div>
        </div>
   
     
    <div class="col-sm-2">
        <div class="thumbnail" >
       <a href="<?php BASE_URL;?>pesquisar_loja"  >
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar imoveis" width="128" height="128">
    </a>
            <div class="h6">Loja</div>  
        </div>
        </div>
    
         <div class="col-sm-2">
        <div class="thumbnail">
       <a href="<?php BASE_URL;?>pesquisar_funcionario">
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar interessados" width="128" height="128">
    </a>
            <div class="h6">Funcionário</div>  
        </div>
        </div>  
    
    </div>
   
    

<!--    <hr class="divider">
    <div class="row" >
    <div class="col-sm-2">
        <div class="thumbnail ">
       <a href="<?php BASE_URL;?>cadastrar_clientes">
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastrar imoveis" width="128" height="128">
    
       </a>  
            <div class="h6"> Cadastrar cliente</div>  
    </div>
        </div>
   
     
    <div class="col-sm-2">
        <div class="thumbnail" >
       <a href="<?php BASE_URL;?>pesquisarimoveis"  >
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar imoveis" width="128" height="128">
    </a>
            <div class="h6"> Cadastrar Loja</div>  
        </div>
        </div>
    
         <div class="col-sm-2">
        <div class="thumbnail">
       <a href="<?php BASE_URL;?>pesquisarinteressados">
        <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar interessados" width="128" height="128">
    </a>
            <div class="h6"> Cadastrar Funcionário</div>  
        </div>
        </div>  
    
    </div>-->
    <hr class="divider">
<!--    <div class="row">
  
        <ul class="list-group">
            <li class="list-group-item">
   <?php $totalimovel=$viewData['totalimovel']; ?>
        <label>Total de Loja: </label><span class="badge"> <?php // echo $totalimovel['total'];?></span>
        </li>
     
        <li class="list-group-item">
        <?php $totalimovel=$viewData['totalvenda']; ?>
            <label>Total de Pagantes: </label><span class="badge"> <?php // echo $totalvenda['total'];?></span>
        </li>
        <div class="col-sm-2">
 <?php $totalimovel=$viewData['totalaluga']; ?>

            <label>Total de Não Pagantes: </label><span class="badge "> <?php // echo $totalaluga['total'];?></span>
            </div>
       
        <div class="col-sm-2">
            <?php $totalstatuslivre=$viewData['totallivre'];?> 
            <label>Total Anúnciado: </label><span class="badge"> <?php // echo $totalstatuslivre['total'];?></span>
        </div>
        <div class="col-sm-2">
            <?php $totalstatusbloqueado=$viewData['totalbloqueado'];?> 
            <label>Total Bloqueado: </label><span class="badge"> <?php // echo $totalstatusbloqueado['total'];?></span>
        </div>
        </ul>
    </div>-->
</div>
  </div>



