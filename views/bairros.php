<div class="container">
    
    <?php $lojas=$viewData['lojas'];?>
    <?php if($lojas==""): ?> 
        
    <div   style="background:#ffffcc !important" class="jumbotron" align="center">
        <div class="h3">Oops! Sem Comercio/Serviço no momento!</div>
        <div class="h5">Me ajude, comenta pro pessoal comerciante e prestadores de serviços, se cadastrarem aqui! É gratuito...</div>
    </div>
        
        
        
        
        <?php else:?>
    
    
    <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
<?php $listbairro=$viewData['listabairros'];?>
        <h1 class="my-4">Bairro</h1>
        <div class="list-group">
            <?php foreach ($listbairro as $value) { ?>
         
   
          <a href="#" class="list-group-item" value="<?php echo $value['id_bairro'];?>"><?php echo $value['bairro_nome'];?></a>
           <?php  }?>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

<!--        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>-->
    
    
    <div class="row">
         <?php foreach ($lojas as $value) { ?>
            
 
        
             <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                 <?php if( $value['url_imagem_principal']==''){ ?>
               <a href="#">  <img class="card-img-top" src="http://placehold.it/700x400" alt="" ></a>
                 <?php }else{?>
                <img class="card-img-top" src="<?php BASE_URL; ?>upload/fotos_principais/<?php echo $value['url_imagem_principal'];?>" alt="<?php echo $value['nome_fantasia'];?>" height="275">
                 <?php }?>
            
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $value['nome_fantasia'];?></a>
                </h4>
                
   <?php if( $value['delivery']=='0'){ ?>
                
                 <?php }else{?>
                    <a type="button" class="btn btn-lg btn-info form-control-lg" data-toggle="tooltip" title="Ligue no<?php echo $value['telefone1'];?> peça que entregamos na sua casa." data-placement="bottom" href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Oi%20 achei%20você%20no%20BuscadorCabreúva%20tudo%20bem!" target="_blank"><img src="<?php BASE_URL; ?>assets/images/whatsapp.png" class="rounded-circle" width="24" height="24" alt="whastapp">DELIVERY</a>
<!--  <p class="card-text">Delivery: <?php echo $value['telefone1'];?></p>-->

                 <?php }?>
                    
                    <p class="card-text"><?php echo $value['nome_ramo'];?></p>
                    <p class="card-text "><strong>Horario:</strong><br> <?php echo $value['funcionamento'];?></p>
                    <p class="card-text"><strong>Contato principal:</strong> <br><?php echo $value['telefone1'];?></p>
                  
                        <div class="row">
                   
                    <a href="<?php BASE_URL;?>food" class="btn btn-primary form-control">Ver mais</a>
                    
    
                  
                    
                    
                   
                            
            
            
            <!--            <button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#exampleModalScrollable" title="Preços deixe seu email">Cardápio</button>-->
                   
<!--                    <a href="#" class="btn btn-warning rounded">Evento<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>                
                     <a href="#" class="btn btn-warning rounded">Promoção<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>
                         <a href="#" class="btn btn-warning rounded">Brinde<span class="badge badge-light">1</span>
                        <span class="sr-only">Mensagens não lidas</span>    </a>-->
                        </div>
                    <br>
      <div class="row"> 
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
            
             </div>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

         <?php }  ?>
 

    
</div>
        <?php endif;?>
</div>





        <div class="row">

         
                  
                  
                  
                  
                  
               
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->