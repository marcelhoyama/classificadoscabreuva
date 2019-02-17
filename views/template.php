<!DOCTYPE html> 
<html itemscope itemtype=”http://schema.org/Article”>
<!--    
    <meta name=”description” content=”Descrição da página. No máximo 155 caracteres.” />

<!– Código para Google Authorship e Publisher–>
<link rel=”author” href=”https://plus.google.com/(Google+_Profile)/posts“/>
<link rel=”publisher” href=”https://plus.google.com/(Google+_Page_Profile)“/>

<!– Código do Schema.org também para o Google+ –>
<meta itemprop=”name” content=”Título ou nome“>
<meta itemprop=”description” content=”Descrição da página“>
<meta itemprop=”image” content=”http://www.example.com/image.jpg“>

<!– para o Twitter Card–>
<meta name=”twitter:card” content=”summary_large_image”>
<meta name=”twitter:site” content=”Conta do Twitter do site (incluindo arroba)“>
<meta name=”twitter:title” content=”Título da página“>
<meta name=”twitter:description” content=”Descrição da página. No máximo 200 caracteres“>
<meta name=”twitter:creator” content=”Conta do Twitter do autor do texto (incluindo arroba)“>
<– imagens largas para o Twitter Summary Card precisam ter pelo menos 280x150px –>
<meta name=”twitter:image” content=”http://www.example.com/image.jpg“>

<!– para o sistema Open Graph–>
<meta property=”og:title” content=”Título da página” />
<meta property=”og:type” content=”article” />
<meta property=”og:url” content=”http://www.example.com/” />
<meta property=”og:image” content=”http://example.com/image.jpg” />
<meta property=”og:description” content=”Descrição da Página” />
<meta property=”og:site_name” content=”Nome do site” />
<meta property=”article:published_time” content=”2013-09-17T05:59:00+01:00” />
<meta property=”article:modified_time” content=”2013-09-16T19:08:47+01:00” />
<meta property=”article:section” content=”Seção do artigo” />
<meta property=”article:tag” content=”Tags do artigo” />
<meta property=”fb:admins” content=”Facebook numeric ID” />[/box]-->
    <head>
        <meta charset="UTF=8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
        
        <title>Guia de classificados 2019 - Buscador Cabreúva </title>
    </head>
    <body>
        
       <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
    <a class="navbar-brand" href="<?php BASE_URL;?>home">   
        <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Buscador Cabreúva</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto" >
             <li class="nav-item"><a href="<?php BASE_URL;?>home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link ">Anunciar</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Serviços</a></li>
            <li class="nav-item">  <a href="<?php BASE_URL;?>contato" class="nav-link">Contato</a></li>
        </ul>
    </div> 

</nav> 
        <br>
        <br>
        home
        
        
        
        
        
        <?php $this->loadViewInTemplate($viewName, $viewData);?>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" scr="<?php BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    </body>
    
    
   
</html>

