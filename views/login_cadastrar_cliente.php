
<title>Cadastro Cliente</title>

<div class="container">
    <br><br>
   <h2 class="text-center">Cadastro Cliente (Comercio/prestação de serviço)</h2>
    
       
    <form name="cadastrarusuarios" id="cadastrarusuarios" class="form-group-sm" method="POST" autocomplete="off" >
       <div class="radio">
            <strong>Ramo:</strong>
            <br>
            <label><input type="radio" name="ramo" value="0" checked="checked">Produto</label>
            <br>
             <label><input type="radio" name="ramo" value="1"/>Serviço</label>
           
        </div>

        
        <div class="form-group">
            <label for="nome">Seu Nome*:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="nome" type="text" class="form-control" id="nome" placeholder="digite seu nome completo">
        </div>
        
        <div class="form-group">
            
            <label for="telefone">Seu Telefone Celular:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="telefone"  type="text" class="form-control" id="telefone" placeholder="DDD + numero">
        </div>
        
      

        <div class="form-group">
            <label for="email">Seu Email:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="digite seu email">
        </div>
        <div class="radio">
            <strong>Sexo:</strong>
            <br>
            <label><input type="radio" name="sexo" value="0" checked="checked">Mulher</label>
            <br>
             <label><input type="radio" name="sexo" value="1"/>Homem</label>
           
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
  



