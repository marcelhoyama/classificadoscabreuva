<div class="container">
    <br>
    <br>
    <div id="">

            <form method="POST">
               
                <div class="form-group">
                    <div class="h1">  Buscar Lojas</div>
                    <input type="text" name="buscar" placeholder="Nome " class="form-control form-control-lg"/>
                </div>
         
                <?php if (isset($erro) && !empty($erro)): ?>
                <div class="alert alert-warning alert-dismissible">
                     
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong> Não foi possivel encontrar o que digitou!</strong> Deixei seu comentario <a href="#" class="alert-link">aqui</a>
                 
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Buscar"/>
                </div>
              
            </form>  
           
         
        </div>
    <div class="row">
       <form method="GET" >
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
        </form>
        <div class="form-group">
            <a href="<?php BASE_URL?>cadastrar_clientes"  class="btn btn-primary">Cadastrar Loja</a>
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
                <th>Total de Promoção</th>
                 <th>Total de Eventos</th>
                 <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
             <?php
             
              
         if($viewData['lista'] == ''){ 
             
         }else{
         
               foreach ($viewData['lista'] as $value): {
        
   ?>
                
            
            <tr>
                <td>
             <?php echo $value['nome'];?>
                    </td>
                    <td><?php echo $value['situacao']; ?></td>
                <td><?php echo $value['telefone'] ?> </td>
                <td><?php echo $value['email'] ?></td>
                <td><span class="badge"><?php echo $value['totalimovel'] ?></span></td>
                 <td><span class="badge"><?php echo $value['totalimovel'] ?></span></td>
                <td><a href="<?php BASE_URL;?>editarclientes?id=<?php echo $value['id'];?> "><button class="btn btn-warning">Editar</button></a>
                    <a href="<?php BASE_URL; ?>menuprincipalcliente?id=<?php echo $value['id'];?>"><button class="btn btn-primary">Ver loja</button></a>
               <a href="<?php BASE_URL; ?>cadastrarloja?id=<?php echo $value['id'];?>"><button class="btn btn-primary">+ Loja</button></a>
              
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

