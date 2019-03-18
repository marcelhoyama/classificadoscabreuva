<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
<title>Cadastrar-se</title>

<div class="container">
    
   <h2 class="text-center">Cadastrar-se</h2>
    
       <br><br>
    <form name="cadastrarusuarios" id="cadastrarusuarios" class="form-group-sm" method="POST" autocomplete="off" >
      
        
        <div class="form-group">
            <label for="nome">Nome*:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="nome" type="text" class="form-control" id="nome" placeholder="digite seu nome completo">
        </div>
        
        <div class="form-group">
            
            <label for="fone">Telefone Celular:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="telefone"  type="tel" class="form-control" id="fone" placeholder="DDD + numero">
        </div>
        
      

        <div class="form-group">
            <label for="email">Email:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="digite seu email">
        </div>

      <div class="form-group">
            <label for="senha">Senha:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="senha" type="password" class="form-control" id="senha" >
        </div>
        
        <div class="form-group">
            <label for="senha">Repita a Senha:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="resenha" type="password" class="form-control" id="resenha" placeholder="repita a senha">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Cadastrar">


        </div>
        <div class="danger">
            <?php if (isset($erro) && !empty($erro)): ?>
                <div class="alert alert-danger"><?php echo $erro; ?></div> 
            <?php endif; ?>
        </div>
        <div class="danger">
            <?php if (isset($ok) && !empty($ok)): ?>
                <div class="alert alert-success"><?php echo $ok; ?></div> 
            <?php endif; ?>
        </div>

                </form>


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


