<title>Esqueci Senha</title>
<link href="<?php echo BASE_URL; ?>assets/css/login.css" rel="stylesheet">
   
      <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css"/>
        <link href="<?php echo BASE_URL; ?>assets/css/normalize.css" rel="stylesheet" type="text/css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
<div class="container">
  <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    	<div class="form-gap">
    <div class="row">
        <div class="col" align="center">
            <h3 class="text-center"><i class="fa fa-lock fa-4x "></i></h3>
                  <h2 class="text-center">Esqueceu a senha?</h2>
                  <p>Voce pode redefinir a senha aqui.</p>
                  <div class="panel-body">
    
                  
                      <div class="form-group">
                       
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="seu email cadastrado" class="form-control"  type="email" required="">
                        </div>
                     
                      <div class="form-group">
                        <input name="redefinir_senha" class="btn btn-lg btn-primary btn-block" value="Redefinir" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                       <?php if (!empty($erro)): ?>
     <div class="warning"><?php echo $erro; ?></div> 
       <?php endif; ?>
    
                  </div>
                </div>
           </div>
	</div>
         
      </form>
</div>
 <style>
     .form-gap {
    padding-top: 70px;
}
 </style>


     
  
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      

       
<!--        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>-->

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages_pt_BR.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validarcampos.js"></script>
