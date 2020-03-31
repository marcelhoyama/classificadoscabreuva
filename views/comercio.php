<div class="container">
    <?php $lojas=$viewData['lojas'];?>
    
    <div class="row">
         <?php foreach ($lojas as $value) { ?>
            
     <?php //()?'':''; ?>
        <div class="col-md">
            <div class="card">
                 <?php if( $value['url_imagem_principal']==''){ ?>
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="">
                 <?php }else{?>
                <img class="card-img-top" src="<?php BASE_URL; ?>upload/fotos_principais/<?php echo $value['url_imagem_principal'];?>" alt="<?php echo $value['nome_fantasia'];?>">
                 <?php }?>
                <div class="card-body">
                    <h4><?php echo $value['nome_fantasia'];?></h4>
                    <p class="card-text"><?php echo $value['nome_ramo'];?></p>
                    <p class="card-text">Horario: <?php echo $value['funcionamento'];?></p>
                    <p class="card-text">Contato principal: <?php echo $value['telefone1'];?></p>
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
        
          <?php } ?>
        
        
        
        
        
        
        
        
        
        
        
<!--    modelos de grade     
         <div class="col-md">
            <div class="card">
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="">
                <div class="card-body">
                    <h4>comercio</h4>
                    <p class="card-text">Pedreiro</p>
                    <p class="card-text">Horario:</p>
                    <p class="card-text">Contato:</p>
                    <a href="#" class="btn btn-primary">Ver mais</a>
                </div>
            </div> 
        </div>
        
         <div class="col-md">
            <div class="card">
                <img class="card-img-top" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="">
                <div class="card-body">
                    <h4>comercio</h4>
                    <p class="card-text">Padaria</p>
                    <p class="card-text">Horario:</p>
                    <p class="card-text">Contato:</p>
                    <a href="#" class="btn btn-primary">Ver mais</a>
                </div>
            </div> 
        </div>
    </div>
    -->
    
</div>

