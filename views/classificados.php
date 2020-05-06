
  
 
    <?php $loja=$viewData['getdados'];?>

  <title>Buscador Cabreúva - Classificados </title>

  



<body>

  <!-- barra lateral e banner -->
 <div class="container">
<br>
    <br>
   
    <div class="row">
        <div class="col-sm-3"></div>
      

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            
              
<?php if($viewData['fotosambiente']==null): ?> 
              <div class="carousel-item active">
                <img class="d-block " src="assets/images/sem-imagem.gif" alt="First slide" height="350" width="900" ></div>
                 <div class="carousel-item">
                     <img class="d-block " src="assets/images/sem-imagem.gif" alt="First slide" height="350" width="900" ></div>
                      <div class="carousel-item">
                          <img class="d-block " src="assets/images/sem-imagem.gif" alt="First slide" height="350" width="900" ></div>
            
    <?php else: ?>
 <?php foreach ($viewData['fotosambiente'] as $value) { ?>
                                <div class="carousel-item active">
  
             
                <img class="d-block " src="upload/ambiente/<?php echo $value['url'] ?>" alt="First slide" height="350" width="900" >
            </div>
            <div class="carousel-item">
                 <?php  } ?>
                <img class="d-block " src="upload/equipes/<?php echo $loja['equipe'] ?>" alt="Second slide" height="350" width="900"></div>
         <?php endif;?>
            
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
 </div>
      <!-- /.col-lg-9 -->
  <!-- Page Content -->
  
      </div>
  
  <h4 class="text-center mb-3">Últimos Anuncios</h4>
        <div class="row">
            <div class="col-sm-3">

     <h4>Pesquisa Avançada</h4>
			<form method="GET">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option></option>
						<?php foreach($categorias as $cat): ?>
						<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$filtros['categoria'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco']=='0-50')?'selected="selected"':''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco']=='51-100')?'selected="selected"':''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco']=='101-200')?'selected="selected"':''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco']=='201-500')?'selected="selected"':''; ?>>R$ 201 - 500</option>
					</select>
				</div>

				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select id="estado" name="filtros[estado]" class="form-control">
						<option></option>
						<option value="0" <?php echo ($filtros['estado']=='0')?'selected="selected"':''; ?>>Ruim</option>
						<option value="1" <?php echo ($filtros['estado']=='1')?'selected="selected"':''; ?>>Bom</option>
						<option value="2" <?php echo ($filtros['estado']=='2')?'selected="selected"':''; ?>>Ótimo</option>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Buscar" />
				</div>
			</form>

     </div>
      <!-- /.col-lg-3 -->

      
          <div class="col-lg-3 col-md-6 mb-4">
       
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

          <div class="col-lg-3 col-md-6 mb-4">
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

          <div class="col-lg-3 col-md-6 mb-4">
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
      <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-lg-3 col-md-6 mb-4">
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

          <div class="col-lg-3 col-md-6 mb-4">
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

          <div class="col-lg-3 col-md-6 mb-4">
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
    
    
    
    <ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL; ?>?<?php
				$w = $_GET;
				$w['p'] = $q;
				echo http_build_query($w);
				?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>
  </div>
  <!-- /.container -->
</body>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Classificados - Buscador Cabreúva</p>
    </div>
    <!-- /.container -->
  </footer>

 






