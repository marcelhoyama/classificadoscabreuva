<div class="container">

    <div id="">

            <form method="POST">
               
                <div class="form-group">
                    <div class="h1">  Buscar Lojas</div>
                    <input type="text" name="buscar" placeholder="Nome " class="form-control form-control-lg"/>
                </div>
         
            
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Buscar"/>
                </div>
              
            </form>  
           
         
        </div>
    <div class="row">
<!--       <form method="GET" >
    <div class="input-group">
        <select id="pesquisar" name="pesquisar" class="form-control">
            <option></option>
            <?php foreach ($viewData['listclientes'] as $value): {?>


 
            <option value="<?php echo $value['nome'];?>"> <?php echo $value['nome'];?></option>
 <?php }endforeach; ?>
        </select>
        
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Pesquisar
            </button>
        </span>
    </div>
        </form>-->
        <div class="form-group">
            <a href="<?php BASE_URL?>cadastrar_loja_nova"  class="btn btn-primary">Cadastrar Loja</a>
                </div>
    <br>
    <div class="table-responsive">
    <table class="table">
        <thead>

            <tr>
                <th>Nome da Loja</th>
                <th>Status</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Categoria</th>
                 <th>Anunciar no site</th>
                 <th>Dono da loja</th>
                 <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
             <?php
             
              
         if($viewData['listarlojas'] == ''){ 
             
         }else{
         
               foreach ($viewData['listarlojas'] as $value): {
        
   ?>
                
            
            <tr>
                <td>
             <?php echo $value['nome_fantasia'];?>
                    </td>
                    <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['telefone1'] ?> </td>
                <td><?php echo $value['email'] ?></td>
                <td><span class="badge"><?php echo $value['categoria'] ?></span></td>
                 <td><span class="badge"><?php echo $value['anuncio_site'] ?></span></td>
                    <td><span class="badge"><?php echo $value['clientes_id_clientes'] ?></span></td>
                <td><a href="<?php BASE_URL;?>editarloja?id=<?php echo $value['id_loja'];?> "><button class="btn btn-warning">Editar</button></a>
                    <a href="<?php BASE_URL; ?>menuprincipalcliente?id=<?php echo $value['id'];?>"><button class="btn btn-primary">Ver loja</button></a>
               <a href="<?php BASE_URL; ?>cadastrar_loja?id=<?php echo $value['id'];?>"><button class="btn btn-primary">+ Loja</button></a>
              
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

