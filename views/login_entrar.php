<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
 
  
    
        
        
    <p class="h1 text-center">Bem-vindo ao Buscador Cabreúva</p>
       <div class="danger">
        <?php if (isset($erro) && !empty($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div> 
        <?php endif; ?>
    </div>
   

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 ml-auto login-form-2">
                    <h1>Falta pouco para buscar que precisa!</h1>
                    <h3>Entre com seus dados</h3>
                    <form method="POST" id="login">
                        <input type="text" name="user" value="usuario" hidden="hidden"/>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Seu Email *" name="email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Sua Senha *" name="senha" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Entrar" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Esqueceu a senha?</a><a href="<?php BASE_URL;?>login_cadastrar" class="ForgetPwd" >  Cadastrar-se</a>
                        </div>
                    </form>
                </div>
            
            </div>
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