
<section class="bannercapa">
    <div class="container">

 <div class="form-group">
                <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver Todos</button></a>
  <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver as Promoções</button></a>
      <a href="<?php BASE_URL;?>comercio"><button  class="btn btn-warning">Quero Ver os Eventos</button></a>
                             
 </div>


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
        <div class="col" style="">
            <h5 class="" style="color:#d1ecf1;"> Redes Sociais dos parceiros</h5>
            <a href="#"  > <p>Urbano Veiculos</p></a>
            <a href="#" id="link" > <p id="link">Magazine Luiza</p></a>
           <a href="#" id="link"> <p>Guguili Baby</p></a>
           <a href="#" id="link"> <p>Ótica Uniart</p></a>
           <a href="#" id="link"> <p>Rádio Japi</p></a>
          <a href="#" id="link">  <p>DMR Imoveis em Cabreúva</p></a>
        </div>
        <div class="col " style="background-color: #138496;">
            <h5 class="white-text">Link</h5>
            <ul>
                <li><a id="link" href="#">link1</a></li>
            </ul>
        </div>
             
    </div>
    <div class="footer-copyright">
        <a href="#" ><p class="text-center text-warning " >@BuscadorCabreuva 2019</p></a>
    </div>
  </div>
</footer>
  