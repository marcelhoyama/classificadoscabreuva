

<form method="POST">
    <br>
        <h1>Editar Perfil</h1>
	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $info['nome']; ?>" />
	</div>

	<div class="form-group">
		<label for="telefone">Telefone:</label>
		<input name="telefone" id="celular" class="form-control" value="<?php echo $info['telefone']; ?>"/>
	</div>
    <div class="form-group">
		<label for="endereco">Endereço:</label>
		<input name="endereco" id="endereco" class="form-control" value="<?php echo $info['endereco']; ?>"/>
	</div>

	<div class="form-group">
            
		
            <label for="senha">Senha* (minimo 6 caracteres):</label> <label class="text-danger"> Se for alterar preencha!</label>
            <input name="senha" type="password" class="form-control" id="senha" maxlength="6" >
        </div>
        
        <div class="form-group">
            <label for="senha">Repita a Senha:</label> <label class="text-danger"> Se for alterar repreencha!</label></label>
            <input name="resenha" type="password" class="form-control" id="resenha" placeholder="repita a senha" maxlength="6">
        </div>

	<div class="form-group">
            <label class="form-group"><strong>E-mail</strong></label><br/>
		<?php echo $info['email']; ?>
	</div>

	<div class="radio form-group">
		<strong>Sexo:</strong><br/>
                <label>Feminino</label>
                <input type="radio" name="sexo"<?php
                if($info['sexo'] == '0'):?>
                       checked=""
                    <?php else: ?>
                >
                <?php endif ?>
                
                <label>Masculino</label>
                <input type="radio" name="sexo" <?php
                if($info['sexo'] == '1') :?>
                       checked=""
                             <?php else: ?>
                >
                <?php endif ?>
        </div><br>

	<button type="submit" class="btn btn-success">Salvar</button>
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
