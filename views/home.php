

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
    
 <div class="h1 text-center mt-5"> Buscador Cabreúva</div>
 <div class="h5 text-center">Encontre Lojas e Serviços</div>
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
                    <input class=" btn-primary form-control-lg btn-lg btn-block" type="submit" value="Buscar"/>
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
       
        <?php if ($viewData['lista_palavra'] != ""): ?>
<div class="h1 text-center"> Resultado</div>
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Loja</th>
                      
                        <th scope="col">Horario</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">WhatsApp</th>
                    </tr>
                </thead>
<?php foreach ($viewData['lista_palavra']as $value) { ?>
                
           
  
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $value['id_loja'] ?></th>
                         <td><?php echo $value['nome_fantasia'] ?></td>
                           
                         <td><?php echo $value['funcionamento'] ?></td>
                         <td><?php echo $value['telefone1'] ?> </td>
                    <?php if($value['whatsapp1']==null):?>
                         
                         <td></td>
                         <?php else: ?>
                         <td><img src="<?php BASE_URL;?>assets/images/whatsapp.png" height="30"/>
                             
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
                             
                             
                             
                             <a href="https://api.whatsapp.com/send?phone=55<?php echo $whatsapp ?>&text=Oi%20 achei%20você%20no%20BuscadorCabreúva%20tudo%20bem!" class="alert-link"><?php echo $value['whatsapp1'] ?></a></td>
       <?php endif;?>                 
                         <!--<td><a href="<?php BASE_URL;?>"class="btn btn-warning disabled" title="Em manutenção" >Visitar/em manutenção</a></td>-->
                    </tr>
               
                    
                </tbody>
                <?php }?>
            </table>
           
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
Aqui você encontra desde profissionais qualificados, produtos variados a serviços para o seu negócio.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Faça sua escolha</h3>
            <p class="lead mb-0">
Depois de escolher o que precisa, leia atentamente as informações sobre o produto/serviço/loja.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Contrate o serviço</h3>
            <p class="lead mb-0">
Pronto! Agora é só entrar em contato com o fornecedor via telefone, e-mail, whatsApp ou redes sociais e fazer bons negócios!</p>
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

