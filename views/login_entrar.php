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
                            <a href="#" class="ForgetPwd">Esqueceu a senha?</a><a href="#"  class="ForgetPwd" data-toggle="modal" data-target="#janela" >  Cadastrar-se</a>
                        </div>
                   
                    
                    
                    </form>
                    
                        <div class="modal fade" id="janela">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Qual seu perfil?</h5>
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="<?php BASE_URL;?>login_comerciante" class="btn btn-primary">Comerciante/Serviço</a>
                                        <a href="<?php BASE_URL;?>" class="btn btn-primary">Consumidor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            
            </div>
        </div>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>