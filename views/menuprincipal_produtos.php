
<title>Menu Principal Produtos</title>


<div class="container-fluid">
<?php if($viewData['lojas']==''): ?>

<div class="jumbotron">
     <div class="col" align="center">
    <div class="h2">
        Vamos cadastrar seu comercio ou Prestador de Serviço?  
    </div>
    <div class="h3"> Clique no botão "cadastrar seu Comercio/Serviço"!</div>
   
    <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning" align="center">Cadastrar seu comercio/serviço
                

                </a>  
        </div>
</div>
<?php print_r($viewData['countProdutosLoja']); 
//
//
//?>
//<?php // elseif($qtd['qtd']==0):?>
    
 
<!--<div class="jumbotron">
     <div class="col" align="center">
    <div class="h2">
        Vamos cadastrar seu produtos ou Serviços?  
    </div>
    <div class="h3"> Clique no botão "cadastrar produtos"!</div>
   
    <a href="//<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $_SESSION['id_loja']; ?>" class="btn btn-warning" align="center">Cadastrar produtos
                

                </a>  
        </div>
</div>-->

<?php else: ?> 
    
       

   <div class="row"> 
    <div class="h3">Faltou completar</div>
        <div class="col-sm">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $_SESSION['id_loja']; ?>" class="btn btn-warning">Cadastrar Produtos
<!--                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastre seu comercio" width="128" height="128">-->

                </a>  
                
            </div>
        </div>
        
<div class="col-sm">
            <div class="thumbnail ">
<!--                <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_loja=<?php echo $_SESSION['id_loja']; ?>" class="btn btn-warning">Cadastrar seu Horario
                   

                </a>  -->
                
            </div>
        </div>
<!--<div class="col-sm">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_loja=<?php echo $_SESSION['id_loja']; ?>" class="btn btn-warning">Cadastrar Fotos
                   

                </a>  
                
            </div>
        </div>-->
    </div>



    <hr class="divider">
    <div class="row">

        <ul class="list-group">
            <li class="list-group-item">
                
                <label>Total de Produtos Cadastrado: </label><span class="badge"> <?php $qtd=$viewData['countProdutosLoja']; 
                echo $qtd['qtd'];?></span>
            </li>

          
    </div>
      

           



<?php if($viewData['listarProdutos']==''): ?>
<div class="jumbotron">
     <div class="col" align="center">
    <div class="h2">
        Vamos cadastrar seu Produtos?  
    </div>
    <div class="h3"> Clique no botão "cadastrar Produtos"!</div>
   
    <a href="<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning" align="center">Cadastrar Produtos
                

                </a>  
        </div>
</div>
<?php else:?>

                <div class="h1 text-center"> Seus Produtos visto na busca</div> 
       <div class="row">
 <?php foreach ($viewData['listarProdutos'] as $value) { ?>


          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
          <?php      if($value['produto_imagem'] ==''): ?>
                <a href="#"><img class="card-img-top" src="http://placehold.it/500x500" alt="" height="300"></a>
            <?php    else: ?>
                <a href="#"><img class="card-img-top" src="<?php BASE_URL;?>assets/images/produtos/<?php echo $value['produto_imagem'];?>" alt=""  width="350"></a>
       
                
              <?php  endif; ?>
              <div class="card-body">
                <h4 class="card-title">
                  
                </h4>
                
                <p class="card-text"><?php echo $value['produto_descricao'];?></p>
              </div>
              <div class="card-footer">
                <h5>R$ <?php echo $value['produto_valor'];?></h5>
                <a href="#"><?php echo $value['produto_nome'];?></a>
<!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
              <a href="<?php BASE_URL; ?>editar_produto?id_produto=<?php echo $value['id_produtos']; ?>" class="btn btn-warning">Editar produto</a>
          </div>

          
     
       
         <?php }?>
    
    
       </div>
        <!-- /.row -->
       <?php endif; ?>

    
    <?php endif; ?>


</div>
