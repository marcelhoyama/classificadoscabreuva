
<title>Menu Principal Comerciante/Prestador Serviço</title>




           


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

<?php else:?>

<?php $totalloja = $viewData['totalloja']; ?>
<div id="container-menuprincipal"   >

<!--        <div class="col-sm">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning">Cadastrar seu comercio/serviço
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastre seu comercio" width="128" height="128">

                </a>  
                
            </div>
        </div>-->


    

      
<div class="h1 text-center"> Seu Comercio visto na busca</div>
<hr class="divider">
  <?php foreach ($viewData['lojas'] as $value) { ?>
<div class="row"> 
    <div class="h3">Faltou completar</div>
<div class="col-sm">
    <?php if($value['funcionamento']==null): ?>
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Cadastrar seu Horario
                  

                </a>  
                
            </div>
     <?php endif;?>
        </div>
<div class="col-sm">
     <?php if($value['url_imagem_principal']==null): ?>
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_foto?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Cadastrar Fotos
                   

                </a>  
                
            </div>
      <?php endif;?>
        </div>
    

                          
<!--                          <a href="<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Cadastrar Produtos</a>
    </div>-->

</div>
    <hr class="divider">
        <div class="col-md-6 mb-5">
            <div class="card">
                 <?php if( $value['url_imagem_principal']==''){ ?>
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="" height="250">
                 <?php }else{?>
                <img class="card-img-top" src="<?php BASE_URL; ?>upload/fotos_principais/<?php echo $value['url_imagem_principal'];?>" alt="<?php echo $value['nome_fantasia'];?>" height="275" width="470">
                 <?php }?>
                <div class="card-body">
                    <h4><?php echo $value['nome_fantasia'];?></h4>
   <?php if( $value['delivery']=='0'){ ?>
                
                 <?php }else{?>
                    
                    
                         <?php $whatsapp=explode('-',$whatsapp=$value['whatsapp1']);
                                        $whatsapp= implode(" ", $whatsapp);
                                     $whatsapp= explode(")", $whatsapp);
                                      $whatsapp= implode(" ", $whatsapp);
                                        $whatsapp= explode("(", $whatsapp);
                                         $whatsapp= implode("", $whatsapp);
                                           $whatsapp= explode(" ", $whatsapp);
                                         $whatsapp= implode("", $whatsapp);
                                        $whatsapp=trim($whatsapp);
                                     
                                     ?>
                    <a type="button" class="btn btn-lg btn-info" data-toggle="tooltip" title="Ligue no<?php echo $value['telefone1'];?> peça que entregamos na sua casa." data-placement="bottom" href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Oi%20 achei%20você%20no%20BuscadorCabreúva%20tudo%20bem!" target="_blank"><img src="<?php BASE_URL; ?>assets/images/whatsapp.png" class="rounded-circle" width="24" height="24" alt="whastapp">TEMOS DELIVERY</a>
  <p class="card-text">Delivery: <?php echo $value['telefone1'];?></p>

                 <?php }?>
                    
                    <p class="card-text"><?php echo $value['nome_ramo'];?></p>
                    <p class="card-text">Horario: <?php echo $value['funcionamento'];?></p>
                    <p class="card-text">Contato principal: <?php echo $value['telefone1'];?></p>
                  
                        <div class="row">
<!--                    <div class="col">
                    <a href="<?php BASE_URL;?>loja?id_loja=<?php echo $value['id_loja'];?>" class="btn btn-primary">Ver Loja</a>
                    
    
                    </div>-->
                    
                    
                   
                            <div class="col"> 
                                  <?php if($value['facebook']==null):?>
                         
                         
                         <?php else: ?>
                                <a href="https://facebook.com/<?php echo $value['facebook'];?>" target="_blank"><img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" class="rounded-circle"alt=""></a>                <?php endif; ?>
                                <?php if($value['instagram']==null):?>
                         
                         
                         <?php else: ?>  
                                <a href="https://instagram.com/<?php echo $value['instagram'];?>" target="_blank"><img src="<?php BASE_URL; ?>assets/images/instagram-cabreuva.png" class="rounded-circle" width="24" height="24" alt=""></a>       
                   <?php endif; ?>     
                        
                                
                                      <?php if($value['whatsapp1']==null):?>
                         
                         
                         <?php else: ?>  
                         <?php $whatsapp=explode('-',$whatsapp=$value['whatsapp1']);
                                        $whatsapp= implode(" ", $whatsapp);
                                     $whatsapp= explode(")", $whatsapp);
                                      $whatsapp= implode(" ", $whatsapp);
                                        $whatsapp= explode("(", $whatsapp);
                                         $whatsapp= implode("", $whatsapp);
                                           $whatsapp= explode(" ", $whatsapp);
                                         $whatsapp= implode("", $whatsapp);
                                        $whatsapp=trim($whatsapp);
                                     
                                     ?>
                        
                       
                                <a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Oi%20 achei%20você%20no%20BuscadorCabreúva%20tudo%20bem!" target="_blank"><img src="<?php BASE_URL; ?>assets/images/whatsapp.png" class="rounded-circle" width="24" height="24" ></a>  
           
                  <?php endif; ?>                 
                                  <?php if($value['email']==null):?>
                         
                         
                         <?php else: ?>  
                                
                                <a href="#"><img src="<?php BASE_URL; ?>assets/images/mail-cabreuva.png" class="rounded-circle" width="24" height="24" alt="<?php echo $value['email']?>" data-toggle="tooltip" title="Esse é o nosso email: <?php echo $value['email'];?>." data-placement="bottom"></a>
            
              <?php endif; ?>  
                  <?php if($value['youtube']==null):?>
                         
                         
                         <?php else: ?>  
            <a href="https://youtube.com/<?php echo $value['youtube'];?>" target="_blank"><img src="<?php BASE_URL; ?>assets/images/youtube-cabreuva.png" class="rounded-circle" width="24" height="24" alt=""></a>

           <?php endif; ?>    
            
            
            
            
            <!--            <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#exampleModalScrollable" title="Preços deixe seu email">Cardápio</button>-->
                    </div>
<!--                    <a href="#" class="btn btn-warning rounded">Evento<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>                
                     <a href="#" class="btn btn-warning rounded">Promoção<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>
                         <a href="#" class="btn btn-warning rounded">Brinde<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>-->
                        </div>
                </div>
            </div> 
        </div>

                         <a href="<?php BASE_URL; ?>editar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>&id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar loja</a>
                         <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar Horário</a>
                          <a href="<?php BASE_URL; ?>cadastrar_foto?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar Foto</a>
<!--                          <a href="<?php BASE_URL; ?>cadastrar_produto?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar Produtos</a>-->
   <?php }?>
    <?php endif; ?>

 

</div>





