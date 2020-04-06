<!DOCTYPE html>

<html lang="pt-br">
<head>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php BASE_URL; ?>home">
         <img src="<?php BASE_URL; ?>assets/images/logo.png" width="80" height="60" class="d-inline-block " alt="Buscador Cabreúva">
  Buscador Cabreúva</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php BASE_URL; ?>home_1">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php BASE_URL; ?>login_entrar_1">Já sou Cadastrado</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-danger" href="<?php BASE_URL;?>login_comerciante">Fazer parte</a>
      </li>
<!--      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contato
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Orçamento</a>
          <a class="dropdown-item" href="#">Parceria</a>
          
        </div>
      </li>-->
    </ul>
  </div>
</nav>
    </div>
<body>
    <?php $this->loadViewInTemplate($viewName,$viewData);?>
</body>
    <!-- Footer -->
   
<footer class="container-fluid footer"> 
    <div class="row footer-conteudo">
        <div class="col-6">
            <h6>Endereço</h6>
            <li>Rua Fernando Nunes, nº 793 </li>
            <li>Jacaré - Cabreúva/SP.</li>

        </div>
          <div class="col-6">
            <h6>Contato:</h6>
            <li>Marcel (site e Informática) : (11) 9.7672-6576 whatsApp</li>
            <li>Email: marecrisjp@hotmail.com</li>
            <li>Denilson (publicidade, propaganda): (11) 9.7462-9961 whastApp</li>
            <li>Email: macieldenilson@gmail.com</li>

        </div>
    </div>
  <div class="footer-conteudo2 mt-5">
      <a href="https://www.facebook.com/denilsonmacielps" target="_blank"> <i class="fa fa-facebook-official" style="width: 60px;"></i></a> 
      <i class="fa fa-instagram w3-hover-opacity" style="width: 60px;"></i>
<!--    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>-->
 
    <p class="text-white mt-5">Buscador Cabreúva </p>
    <p class="text-white"> Desenvolvido por <a class="text-white" href="https://www.buscadorcabreuva.com.br" target="_blank" title="Marcel Hoyama">PS-maciel</a></p>
</div>
</footer>
    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
     
</html>


