

    <div class="container my-5">
        <div class="row">
            <div class="col mt-3">
        <div class="form-group">
            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Quero Ver Todos</button></a>
            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Quero Ver as Promoções</button></a>
            <a href="<?php BASE_URL; ?>comercio"><button  class="btn btn-warning">Quero Ver os Eventos</button></a>

        </div>
                </div>
            </div>
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

 <div class="h1 text-center mt-5"> Buscador Cabreúva</div>
 <div class="h5 text-center">Encontre Lojas e Serviços</div>
        <div id="buscador">

            <form method="POST">
                <div class="form-group">
                   
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
        <?php if ($viewData['lista_palavra'] != ""): ?>
  <div class="h1 text-center"> Resultado</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Loja</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><a class="btn btn-warning">Visitar</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><a class="btn btn-warning">Visitar</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td><a class="btn btn-warning">Visitar</a></td>
                    </tr>
                    
                </tbody>
            </table>
        <?php endif; ?>
        <div class="row">
            <div id="linha" class="h3 text-center "></div> 
        </div>
        <div class="row">
            <div class="col-md">
                <a href="<?php BASE_URL;?>food"> <img src="assets/images/fastfood-cabreuva.jpg" id="icone" class="img-thumbnail"/></a>
                FASTFOOD <span class="badge badge-dark">3</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/drink-cabreuva.jpg" id="icone"  class="img-thumbnail"/></a>
                DRINK'S<span class="badge badge-dark">8</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/diversao-cabreuva.png" id="icone"  class="img-thumbnail"/></a>
                DIVERSÃO<span class="badge badge-dark">9</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/evento-cabreuva.jpg" id="icone"  class="img-thumbnail"/></a>
                EVENTOS<span class="badge badge-dark">Dark</span>
            </div>
            <div class="col-md">

                <a href=""> <img src="assets/images/restaurante-cabreuva.png" id="icone"  class="img-thumbnail"/></a>
                RESTAURANTES<span class="badge badge-dark">Dark</span>
            </div>
        </div>
        

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


    </div>
    <br>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

