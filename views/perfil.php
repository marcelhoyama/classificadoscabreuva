

<form method="POST">
    <div class="container">
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
            <label for="senha">Senha:</label><label for="senha">Se for alterar preencha!</label>
		<input type="password" class="form-control" name="senha" id="senha" />
	</div>

	<div class="form-group">
		<strong>E-mail</strong><br/>
		<?php echo $info['email']; ?>
	</div>

	<div class="radio">
		<strong>Sexo:</strong><br/>
		<?php
		if($info['sexo'] == '0') {
			echo 'Feminino';
		} else {
			echo 'Masculino';
		}
		?>
	</div>

	<button type="submit" class="btn btn-success">Salvar</button>

</form>
</div>