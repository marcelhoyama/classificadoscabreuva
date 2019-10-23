<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">

    <a class="navbar-brand" href="<?php BASE_URL; ?>home">   
        <img src="<?php BASE_URL; ?>assets/images/facebookcolor.png" width="30" height="30" class="d-inline-block align-top" alt="Facebook Buscador Cabreuva">
        Buscador Cabreúva</a>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto" >

            <li class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarimoveis">Meus Anúncios <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php echo BASE_URL; ?>pesquisarinteressados">Interessados</a>
            </li> 

            <li class="nav-item" >
                <a class="nav-link "href="<?php echo BASE_URL; ?>menuprincipal_loja">Menu Principal <span class="sr-only"></span></a>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['lgname']; ?> </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>perfil_usuario">Editar Perfil </a> 
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>login/sair">Sair </a>
               </div>
            </li>
        </ul> 

    </div> 

</nav>

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