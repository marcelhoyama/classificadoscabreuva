<div class="container">
    
    <div id="">

            <form method="POST">
               
                <div class="form-group">
                    <div class="h1">  Buscar Cliente</div>
                    <input type="text" name="buscar" placeholder="Nome " class="form-control form-control-lg"/>
                </div>
         
                <?php if (isset($erro) && !empty($erro)): ?>
                <div class="alert alert-danger">
                     
                
                <strong> Não foi possivel encontrar o que digitou!</strong> 
                 
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Buscar"/>
                </div>
              
            </form>  
           
         
        </div>
    <div class="row">
   
        <div class="form-group">
            <a href="<?php BASE_URL?>cadastrar_clientes"  class="btn btn-primary">Cadastrar Clientes</a>
                </div>
    <br>
    <div class="table-responsive">
    <table class="table">
        <thead>

            <tr>
                <th>Nome do Cliente</th>
                <th>Status</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Total de Loja</th>
                 <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
             <?php
             
              
         if($viewData['listarClientes'] == ''){ 
             
         }else{
         
               foreach ($viewData['listarClientes'] as $value): {
        
   ?>
                
            
            <tr>
                <td>
             <?php echo $value['nome'];?>
                    </td>
                    <td><?php echo $value['situacao']; ?></td>
                <td><?php echo $value['telefone'] ?> </td>
                <td><?php echo $value['email'] ?></td>
                <td><span class="badge"></span></td>
                <td><a href="<?php BASE_URL;?>editar_clientes?id=<?php echo $value['id_clientes'];?> "><button class="btn btn-warning">Editar</button></a>
                    <a href="<?php BASE_URL; ?>menuprincipalcliente?id=<?php echo $value['id_clientes'];?>"><button class="btn btn-primary">Ver loja</button></a>
               <a href="<?php BASE_URL; ?>cadastrar_outra_loja?id=<?php echo $value['id_clientes'];?>"><button class="btn btn-primary">+ Loja</button></a>
              
                </td>
            </tr>
         
      
               <?php }
         
         endforeach;
         } ?>
       
        </tbody>
    </table>
    </div>
     <div class="danger">
            <?php if (isset($erro) && !empty($erro)): ?>
                <div class="alert alert-danger"><?php echo $erro; ?></div> 
            <?php endif; ?>
        </div>
    
</div>
</div>

