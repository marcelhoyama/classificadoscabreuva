<div class="container">
    
    <?php $lojas=$viewData['lojas'];?>
    <?php if($lojas==""): ?> 
        
    <div   style="background:#ffffcc !important" class="jumbotron" align="center">
        <div class="h3">Oops! Sem Comercio/Serviço no momento!</div>
        <div class="h5">Me ajude, comenta pro pessoal comerciante e prestadores de serviços, se cadastrarem aqui! É gratuito...</div>
    </div>
        
        
        
        
        <?php else:?>
    <div class="row">
         <?php foreach ($lojas as $value) { ?>
            
 
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
<button type="button" class="btn btn-lg btn-warning" data-toggle="tooltip" title="Ligue no<?php echo $value['telefone1'];?> peça que entregamos na sua casa." data-placement="bottom">DELIVERY</button>                    

                 <?php }?>
                    
                    <p class="card-text"><?php echo $value['nome_ramo'];?></p>
                    <p class="card-text">Horario: <?php echo $value['funcionamento'];?></p>
                    <p class="card-text">Contato principal: <?php echo $value['telefone1'];?></p>
                    <p class="card-text">Delivery: <?php echo $value['telefone1'];?></p>
                        <div class="row">
                    <div class="col">
                    <!--<a href="<?php BASE_URL;?>food" class="btn btn-primary">Ver mais</a>-->
                    
    
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
                        
                       
                                <a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Oi%20 achei%20você%20no%20BuscadorCabreúva%20tudo%20bem!" target="_blank"><img src="<?php BASE_URL; ?>assets/images/whatsapp.png" class="rounded-circle" width="24" height="24" alt="<?php echo $value['email']; ?>"></a>  
           
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
        
         <?php }  ?>
 

    
</div>
        <?php endif;?>
</div>

