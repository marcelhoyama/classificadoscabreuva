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
        <div class="form-group">
              <label for="cpf">CPF*: </label> 
              <label><?php echo $viewData['cpf']; ?></label>
        </div>
        <div class="form-group">
            <label for="nome">Nome*:</label> 
            <label><?php echo $viewData['nome']; ?></label>
        </div>
        <div class="row" > 
        <div class="form-group col-sm-6">
            
            <label for="fone">Telefone Celular*:</label> 
            <label><?php echo $viewData['telefone']; ?></label>
        </div>
        
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
             <label><?php echo $viewData['email']; ?></label>
        </div>

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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
                </form>

</div>