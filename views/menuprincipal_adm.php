
<title>Menu Principal Administrador</title>
<br>
<br>

<div class="container-fluid">

<?php $totalloja = $viewData['totalloja']; ?>
    <div class="row" >
        <div class="col-sm-2">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning">Cadastrar seu comercio/serviço
<!--                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastre seu comercio" width="128" height="128">-->

                </a>  
                
            </div>
        </div>
        
<!--<div class="col-sm-2 mt-3">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning">Cadastrar seu Horario
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastre seu comercio" width="128" height="128">

                </a>  
                
            </div>
        </div>-->

    </div>



    <hr class="divider">
    <div class="row">

        <ul class="list-group">
            <li class="list-group-item">
                
                <label>Total de Loja sua Cadastrado: </label><span class="badge"> <?php echo $totalloja['quantidade']; ?></span>
            </li>

          
    </div>
      
<div class="h1 text-center"> Seu Comercio</div>
           


<?php if($viewData['lojas']==''): ?>

<div class="jumbotron">
     <div class="col" align="center">
    <div class="h2">
        Vamos cadastrar seu comercio ou Prestador de Serviço?  
    </div>
    <div class="h3"> Clique no botão "cadastrar seu Comercio/Serviço"!</div>
   
    <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" class="btn btn-warning" align="center">Cadastrar seu comercio/serviço
                

                </a>  
        </div>
</div>

<?php else:?>
<table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Loja</th>
                        
                        <th scope="col">Endereço</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                
                    <?php foreach ($viewData['lojas'] as $value) { ?>
                
           
  
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $value['nome_fantasia'] ?></td>
                        
                         <td><?php echo $value['endereco'] ?></td>
                         
                        
                         <td><a href="<?php BASE_URL;?>"class="btn btn-warning disabled" >Visitar</a>
                         <a href="<?php BASE_URL; ?>editar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>&id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar loja</a>
                         <a href="<?php BASE_URL; ?>editar_funcionamento?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Horário</a>
                          <a href="<?php BASE_URL; ?>cadastrar_foto?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Fotos</a></td>
                    </tr>
               
                    
                </tbody>
                    <?php }?>
            </table>
       
       <?php endif; ?>
</ul>
</div>
</div>




