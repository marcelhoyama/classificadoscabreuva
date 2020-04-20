
  
 
    <?php $loja=$viewData['getdados'];?>

  <title>Buscador Cabreúva - <?php echo $loja['nome_fantasia'] ?> </title>

  



<body>

  <!-- barra lateral e banner -->
 <div class="container">
<br>
    <br>
   
    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4"><?php echo $loja['nome_fantasia'] ?></h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Ambiente</a>
          <a href="<?php BASE_URL; ?>produtos?id_loja=<?php echo $loja['id_loja'] ?>" class="list-group-item">Mais Produtos</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <?php foreach ($viewData['fotosambiente'] as $value) { ?>
                    
             
                <img class="d-block img-fluid" src="upload/ambiente/<?php echo $value['url'] ?>" alt="First slide"  width="350" >
            </div>
            <div class="carousel-item">
                 <?php  } ?>
              <img class="d-block img-fluid" src="upload/equipes/<?php echo $loja['equipe'] ?>" alt="Second slide">
         
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
        </div>

  <!-- Page Content -->
  

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>Um pouco sobre Nós</h2>
        <hr>
        <p><?php echo $loja['descricao'] ?> descricao Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        <a class="btn btn-success btn-lg" href="#">WhatsApp &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Contatos</h2>
        <hr>
        <address>
          <strong>Endereço:</strong>
          <br><?php echo $loja['bairro_nome'] ?>
          <br><?php echo $loja['endereco'] ?>
          <br><?php echo $loja['funcionamento'] ?>
          <br>
        </address>
        <address>
          <abbr title="Phone">TEL:</abbr>
          <br><?php echo $loja['telefone1'] ?>
          <br><?php echo $loja['telefone2'] ?>
          <br><?php echo $loja['whatsapp1'] ?>
          <br><?php echo $loja['whatsapp2'] ?>
          <br>
          <abbr title="Email">E-MAIL:</abbr>
          <a href="mailto:#"><?php echo $loja['email'] ?></a>
        </address>
      </div>
    </div>
    <!-- /.row -->

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item One</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Two</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Three</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Four</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Five</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit agggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggmet.</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
  </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</body>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white"><?php echo $loja['razao_social'] ?> - Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

 






