<title>Buscador cabreúva, aqui você encontra produtos, lojas, prestadores de serviços, autônomos </title> 

    <div class="container">
       
<!--        <div id="carouselSite" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 active" src="<?php BASE_URL; ?>assets/images/banner-1.jpg" alt="Imagem responsiva" width="100%" height="250">


                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"src="<?php BASE_URL; ?>assets/images/banner-2.jpg"  alt="Imagem responsiva" width="100%" height="250">


                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php BASE_URL; ?>assets/images/vista-cabreuva.jpg" alt="Imagem responsiva" width="100%" height="250">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Buscador Cabreúva</h3>
                        <p>Valorizando o comercio local</p>
                    </div>

                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>-->
<div class="jumbotron">
    
 <h1 class="text-center mt-5"> Buscador Cabreúva</h1>
 <h2 class="text-center">Encontre Lojas, Serviços  e  produtos em Cabreúva</h2>
        <div id="buscador">

            <form method="POST">
                <div class="form-group">
                   
                    <input type="text" name="buscar" placeholder="Ex: Carro, lanche ou Nome da loja " class="form-control form-control-lg"/>
                </div>

                <?php if (isset($erro) && !empty($erro)): ?>
                    <div class="alert alert-warning alert-dismissible">

                        <?php echo $erro; ?>

                    </div>
                <?php endif; ?>
                <div class="row">
                    <button class="btn btn-primary form-control-lg btn-lg btn-block" type="submit"> Buscar</button>
                </div>

            </form>  
            </div>
</div>

 <div class="row">
            <div class="col mt-3">
        <div class="form-group">
            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Ver Todos</button></a>
<!--            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Quero Ver as Promoções</button></a>
            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Quero Ver os Eventos</button></a>-->
<a href="<?php BASE_URL; ?>bairros"><button  class="btn btn-warning">Ver por Bairros</button></a>
        </div>
                </div>
            </div>
       <div class="row">
        <?php if ($viewData['lista_palavra'] != ""): ?>
            
<?php foreach ($viewData['lista_palavra']as $value) { ?>
<div class="col-md-4 mb-5">
            <div class="card">
                 <?php if( $value['url_imagem_principal']==''){ ?>
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="" height="275">
                 <?php }else{?>
                <img class="card-img-top" src="<?php BASE_URL; ?>upload/fotos_principais/<?php echo $value['url_imagem_principal'];?>" alt="<?php echo $value['nome_fantasia'];?>" height="275">
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
                    <div class="col">
                    <a href="<?php BASE_URL;?>loja?id_loja=<?php echo $value['id_loja'];?>" class="btn btn-primary">Ver Loja</a>
                    
    
                    </div>
                    
                    
                   
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


                
           
  
               
                <?php }?>
          </div> 
           <?php endif; ?> 
      
        <div class="row">
            <div id="linha" class="h3 text-center "></div> 
        </div>
<!--        <div class="row">
            <?php $viewData['listaPorRamo']; ?>
            <div class="col-md">
                <a href="<?php BASE_URL;?>food"> <img src="assets/images/fastfood-cabreuva.jpg" id="icone" class="img-thumbnail"/></a>
                Comidas <span class="badge badge-dark">3</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/drink-cabreuva.jpg" id="icone"  class="img-thumbnail"/></a>
                Serviços<span class="badge badge-dark">8</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/diversao-cabreuva.png" id="icone"  class="img-thumbnail"/></a>
                Diversão<span class="badge badge-dark">9</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/evento-cabreuva.jpg" id="icone"  class="img-thumbnail"/></a>
                Eventos<span class="badge badge-dark">Dark</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/restaurante-cabreuva.png" id="icone"  class="img-thumbnail"/></a>
                Outros<span class="badge badge-dark">Dark</span>
            </div>
        </div>-->
        

<!--        <div class="row">
            <div id="linha" class="h3 text-center "> Novos Comercios</div> 
        </div>
        <div class="row">

            <div class="col-md">
                <span class="badge-danger" data-toggle="modal" data-target=".bs-example-modal-lg">3</span>
                <a href="#"> <img src="assets/images/sem-imagem.gif" id="icone"   class="img-thumbnail"/></a>
                comercio 1    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"   class="img-thumbnail"/></a>
                comercio 2    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                comercio 3    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"   class="img-thumbnail"/></a>
                comercio 4    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                comercio 5    
            </div>


        </div>
        <hr>
        <div class="row">
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                comercio 6    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"   class="img-thumbnail"/></a>
                comercio 7    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                comercio 8   
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"   class="img-thumbnail"/></a>
                comercio 9    
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                comercio 10    
            </div>


        </div>-->

<!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary" style="height: 80px"></i>
            </div>
            <h3>Encontre o que você precisa</h3>
            <p class="lead mb-0">
Aqui você encontra desde prestadores de serviços, produtos variados , para a sua necessidade.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Faça sua escolha</h3>
            <p class="lead mb-0">
Depois de escolher o que precisa, leia atentamente as informações sobre o produto/serviço/loja ou entre em contato de seus respectivos responsaveis.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Contate o serviço</h3>
            <p class="lead mb-0">
Pronto! Agora é só entrar em contato com o comerciante/prestador de serviço/vendedor via telefone, e-mail, whatsApp ou redes sociais e fazer bons negócios/compras!</p>
          </div>
        </div>
      </div>
    </div>
  </section>



    </div>
    <br>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
    

