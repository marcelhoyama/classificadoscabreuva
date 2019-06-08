<!DOCTYPE html>
<html lang="pt-br">
    

<head>
  <meta charset="UTF=8"/>
   <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/w3.css"/>
    <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!--  aqui onde vai o corpo das paginas do sistema -->
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>


<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Desenvolvido por <a href="https://www.devmg.pe.hu" title="Marcel Hoyama" target="_blank" class="w3-hover-text-green">Marcel Hoyama</a></p>
</footer>

</body>
</html>
