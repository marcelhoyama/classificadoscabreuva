<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top ">
            <a class="navbar-brand" href="https://www.facebook.com/denilsonmacielps">   
                <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a><a class="navbar-brand" href="<?php BASE_URL;?>home">Buscador Cabreúva</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a href="<?php BASE_URL; ?>home" class="nav-link">Home</a></li>
                     <li class="nav-item"><a href="<?php BASE_URL; ?>denilsonmaciel" class="nav-link">Denilson Maciel</a></li>
                    <li class="nav-item">  <a href="<?php BASE_URL; ?>contato" class="nav-link">Contato</a></li>
                  <li class="nav-item">  <a href="<?php BASE_URL; ?>login_entrar" class="nav-link">Entrar</a></li>
         <!--             <li class="nav-item">  <a href="login/cadastrar" class="nav-link">Cadastrar-se</a></li>-->

                </ul>
            </div> 

        </nav> 
  
    



    
      <h1>Seja Bem vindo ao Buscador Cabreuva!</h1>
        <h2>Versao 1.0</h2>
        
        
    <p class="h1 text-center">Entrar</p>
       <div class="danger">
        <?php if (isset($erro) && !empty($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div> 
        <?php endif; ?>
    </div>
   

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login Usuário</h3>
                    <form method="POST" id="login">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Seu Email *" name="email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Sua Senha *" name="senha" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Esqueceu a senha?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Login Cliente</h3>
                    <h5 class="text-center text-white">comerciantes /prestadores de serviço</h5>
                    <form method="POST" id="login">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Seu Email *" name="email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Sua Senha *" name="senha" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Esqueceu a senha?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


     <div class="footer-copyright">
            <a href="#" id="link"><p class="text-center text-primary " >@BuscadorCabreuva 2019</p></a>
        </div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>