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
            
 
        <div class="col-md-4">
            <div class="card">
                 <?php if( $value['url_imagem_principal']==''){ ?>
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="">
                 <?php }else{?>
                <img class="card-img-top" src="<?php BASE_URL; ?>upload/fotos_principais/<?php echo $value['url_imagem_principal'];?>" alt="<?php echo $value['nome_fantasia'];?>">
                 <?php }?>
                <div class="card-body">
                    <h4><?php echo $value['nome_fantasia'];?></h4>
   <?php if( $value['delivery']=='0'){ ?>
                
                 <?php }else{?>
                    <h6 class="btn-warning">DELIVERY</h6>
                 <?php }?>
                    
                    <p class="card-text"><?php echo $value['nome_ramo'];?></p>
                    <p class="card-text">Horario: <?php echo $value['funcionamento'];?></p>
                    <p class="card-text">Contato principal: <?php echo $value['telefone1'];?></p>
                    <p class="card-text">Delivery: <?php echo $value['telefone1'];?></p>
                    <div class="w3-col s4 ">
                    <a href="<?php BASE_URL;?>food" class="btn btn-primary">Ver mais</a>
                    
    
                    </div>
                    <br>
                    <div class="w3-col ">
                        
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

