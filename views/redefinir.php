<title>Buscador Cabreúva - Redefinir a Senha</title>
<link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/2c2e52caea.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php BASE_URL; ?>assets/css/style.css"/>
<div class="container">

    <div class="row" align="center">
        <h2 class="text-center mt-5">Buscador Cabreúva - Redefinir senha</h2>
    </div>

    <form  method="POST" >
        <div class="form-group">


            <label class="form-group">* maximo 6 caracteres</label>
            <input name="senha" type="password"  class="form-control"  placeholder="Digite a Nova senha"/>
        </div>
        <div class="form-group">
             <label class="form-group">* maximo 6 caracteres</label>
            <input name="resenha" type="password"   class="form-control" placeholder="Digite Novamente"/>
        </div>
        <div class="form-group">

            <button class="btn btn-success"  type="submit"> Redefinir Senha</button></br>

        </div>




        <div class="form-group">
            <?php if (!empty($erro)): ?>
            <div class="alert alert-danger" role="alert"><?php echo $erro; ?>  
            <?php endif; ?>
             <?php if (!empty($ok)): ?>
            <div class="alert alert-success" role="alert"><?php echo $ok; ?>  
            <?php endif; ?>
        </div>
        </div>
    </form>

</div>
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