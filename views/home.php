
<section class="bannercapa">
    <div class="container">

 <div class="form-group">
                <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver Todos</button></a>
  <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver as Promoções</button></a>
      <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver os Eventos</button></a>
                             
 </div>

    <img src="<?php BASE_URL;?>assets/images/vista-cabreuva.jpg" class="" alt="Imagem responsiva" width="100%" height="250">
             
        <div id="buscador">

            <form method="POST">
               <div class="form-group">
                    <div class="h1">  Busca aqui em Cabreúva</div>
                    <input type="text" name="buscar" placeholder="Ex: Carro, lanche ou Nome da loja " class="form-control form-control-lg"/>
                </div>
         
                <?php if (isset($erro) && !empty($erro)): ?>
                <div class="alert alert-warning alert-dismissible">
                     
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> Não foi possivel encontrar o que digitou!</strong> Deixei seu comentario <a href="#" class="alert-link">aqui</a>
                 
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Buscar"/>
                </div>
              
            </form>  
           
         
        </div>
        <?php if($viewData['lista_palavra']!=""): ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
     <?php endif;   ?>
   <div class="row">
        <div id="linha" class="h3 text-center "> Categorias</div> 
    </div>
              <div class="row">
            <div class="col-md">
                <a href="#"> <img src="assets/images/sem-imagem.gif" id="icone" class="img-thumbnail"/></a>
                FASTFOOD <span>3</span>
            </div>
              <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                   DRINK'S
            </div>
             <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                  DIVERSÃO
            </div>
             <div class="col-md">

                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                    EVENTOS
            </div>
             <div class="col-md">
                  
                <a href=""> <img src="assets/images/sem-imagem.gif" id="icone"  class="img-thumbnail"/></a>
                  RESTAURANTES
            </div>
        </div>
             <hr>
     
       <div class="row">
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
            

        </div>


    </div>
    <br>
</section>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
<footer id="footer">
    <div class="container">
    <div class="row">
        <div class="col">
            <h5 class="" style="color:#d1ecf1;"> Redes Sociais dos parceiros</h5>
            <a href="#" id="link" > <p>Urbano Veiculos</p></a>
            <a href="#" id="link"> <p>Magazine Luiza</p></a>
           <a href="#" id="link"> <p>Guguili Baby</p></a>
           <a href="#" id="link" > <p>Ótica Uniart</p></a>
           <a href="#" id="link"> <p>Rádio Japi</p></a>
          <a href="#" id="link">  <p>DMR Imoveis em Cabreúva</p></a>
        </div>
        <div class="col ">
            <h5 class="" style="color:#d1ecf1;">Mais Informações:</h5>
            <ul>
                <li><a href="#" id="link">marecrisbr@gmail.com</a></li>
                 <li><a href="#" id="link">11-97672-6576</a></li>
            </ul>
        </div>
             
    </div>
    <div class="footer-copyright">
        <a href="#" id="link"><p class="text-center text-warning " >@BuscadorCabreuva 2019</p></a>
    </div>
  </div>
</footer>
  