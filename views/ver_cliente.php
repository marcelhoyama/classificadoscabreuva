   <?php// if (isset($_POST['cpf'])) {
//       $cpf=$_POST['cpf'];
//     file_put_contents("teste.txt", $cpf,FILE_APPEND);
//     header("Location:".BASE_URL."cadastrar_clientes"); 
//   }
//?>
<title>Dados do Cliente</title>
<div class="container">
    
     <h2 class="text-center">Dados do Cliente</h2>
    
      
    <form name="cadastrarclientes" id="cadastrarclientes" class="form-group-sm" method="POST" autocomplete="off" >
        <div class="row">
        <div class="form-group">
            <label for="id">ID funcionario:</label>
            <label><?php echo $viewData['id_funcionario']; ?></label>  
       
        </div>
        </div>
          <?php $cliente=$viewData['dadosCliente'];?>
        <div class="row">
        <div class="form-group">
            <label for="nome">Nome*:</label> 
            <label class=""><?php echo $cliente['nome']; ?></label>
        </div>
        </div>
        <div class="row" > 
        <div class="form-group col-sm-6">
            
            <label for="fone">Telefone Celular*:</label> 
            <label><?php echo $cliente['telefone']; ?></label>
        </div>
        
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
             <label><?php echo $cliente['email']; ?></label>
        </div>
        <div class="h6">Tem no total de loja: <?php echo $cliente['quantidade'] ?></div>

        </div>

        <div class="form-group">
            <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $cliente['id_clientes']; ?>" class="btn btn-primary">Cadastrar Loja</a> 


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

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Loja</th>
      <th scope="col">Telefone</th>
      <th scope="col">Status</th>
    </tr>
  </thead>

  <tbody>
     <?php $lojas=$viewData['qtdLojas'];
    { ?>
         <tr>
      <th scope="row">1</th>
      <td><?php echo $viewData['nome_fantasia'] ?></td>
      <td><?php echo $lojas['telefone1'] ?></td>
      <td><?php echo $lojas['status'] ?></td>
    </tr>  
     <?php  }?>
   
    
  </tbody>
</table>
                </form>

</div>