   <?php// if (isset($_POST['cpf'])) {
//       $cpf=$_POST['cpf'];
//     file_put_contents("teste.txt", $cpf,FILE_APPEND);
//     header("Location:".BASE_URL."cadastrar_clientes"); 
//   }
//?>
<title>Editar Cliente</title>
<div class="container">
    
     <h2 class="text-center">Editar Cliente</h2>
    
      
    <form name="cadastrarclientes" id="editarcliente" class="form-group-sm" method="POST" autocomplete="off" >
     
        <?php $cliente=$viewData['dadosCliente'];?>
        <div class="form-group">
            <label for="id_cliente">ID </label>
            <input name="id_cliente"  id="id_cliente" class="form-control" value=" <?php echo $cliente['id_clientes']; ?>" disabled="" >  
       
        </div>
<!--        <div class="form-group">
              <label for="cpf">CPF*: </label> <label class="text-danger"> campo obrigatorio!</label>
              <input name="cpf" type="text" class="form-control" id="cpf" value="<?php echo $cliente['cpf']; ?>" >
        </div>-->
        <div class="form-group">
            <label for="nome">Nome*:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="nome" type="text" class="form-control" id="nome" value="<?php echo $cliente['nome']; ?>" >
        </div>
        <div class="row" > 
        <div class="form-group col-sm-6">
            
            <label for="telefone">Telefone Celular*:</label> <label class="text-danger"> campo obrigatorio!</label>
            <input name="telefone"  type="tel" class="form-control" id="telefone" value="<?php echo $cliente['telefone']; ?>" >
        </div>
        
        </div>
<div class="form-group">
    <label for="sexo">Sexo:</label>
    <select class="form-control" name="sexo">
        <?php if("1"== $cliente['sexo'])
            { ?> <option value="<?php echo $cliente['sexo']; ?>"> <?php echo 'Masculino';?> </option>
            <option value='0'>Feminino</option><?php }
            
            
            
            else{ ?> <option value="<?php echo $cliente['sexo']; ?>"> <?php echo 'Feminino';?> </option>
            <option value='1'>Masculino</option> <?php };  ?>
        
        
        
      
    </select>
</div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" type="email" class="form-control" id="email" value="<?php echo $cliente['email']; ?>" >
        </div>

      <div class="form-group">
    <label for="sexo">Status:</label>
    <select class="form-control" name="status">
        <?php if("1"== $cliente['status'])
            { ?> <option value="<?php echo $cliente['status']; ?>" selected=""> <?php echo 'Ativo';?> </option>
            <option value='2'>Inativo</option>
                <option value='3'>Bloqueado</option><?php }
            
            elseif("2"== $cliente['status'])
                { ?> <option value="<?php echo $cliente['status']; ?>" selected=""> <?php echo 'Inativo';?> </option>
            <option value='1'>Ativo</option>
                <option value='3'>Bloqueado</option><?php }
            
                else{ ?> <option value="<?php echo $cliente['status']; ?>" selected=""> <?php echo 'Bloqueado';?> </option>
            <option value='1'>Ativo</option>
<option value='2'>Inativo</option> <?php };  ?>
        
        
        
      
    </select>
</div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Atualizar">


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