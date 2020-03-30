
<title>Menu Principal Comerciante/Prestador Serviço</title>
<br>
<br>

<div class="container-fluid">

<?php $totalloja = $viewData['totalloja']; ?>
    <div class="row" >
        <div class="col-sm-2">
            <div class="thumbnail ">
                <a href="<?php BASE_URL; ?>cadastrar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>">
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="cadastre seu comercio" width="128" height="128">

                </a>  
                <div class="h6">Vamos Cadastrar seu comercio/serviço</div>  
            </div>
        </div>

<!--        <div class="col-sm-2">
            <div class="thumbnail ">
                <a href="#" data-toggle="modal" data-target="#editarloja">
                    <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="atualizar seu comercio" width="128" height="128">

                </a>  
                <div class="h6">Vamos Editar seu comercio/serviço</div>  
            </div>
        </div>
<?php $loja=$viewData['lojas'];?>
     
        <div class="modal fade" id="editarloja">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h4">
                            Qual vai atualizar? </div>
                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                       
                    </div>
                    <div class="modal-body">
                        
                            
                            <?php foreach ($loja as $lojas) { ?>
                        <a href="<?php BASE_URL; ?>editar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>&id_loja=<?php echo $lojas['id_loja']; ?>" class="btn btn-primary"><?php echo $lojas['nome_fantasia']; ?></a>
                             
                           <?php }?>
                           
                        
                    </div>
                
                </div>

            </div>
        </div>
-->
             <div class="col-sm-2">
                    <div class="thumbnail" >
                        <a href="<?php BASE_URL; ?>cadastrar_funcionamento?id_cliente=<?php echo $_SESSION['lgCliente']; ?>" >
                            <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar imoveis" width="128" height="128">
                        </a>
                        <div class="h6"> Cadastrar Horario de Funcionamento</div>  
                    </div>
                </div>
        
                <div class="col-sm-2">
                    <div class="thumbnail">
                        <a href="<?php BASE_URL; ?>cadastrar_ramo">
                            <img class="img-responsive" src="<?php BASE_URL; ?>assets/images/sem-imagem.gif" alt="pesquisar interessados" width="128" height="128">
                        </a>
                        <div class="h6"> Cadastrar Tipo de Ramo</div>  
                    </div>
                </div>  

    </div>



    <hr class="divider">
    <div class="row">

        <ul class="list-group">
            <li class="list-group-item">
                
                <label>Total de Loja Cadastrado: </label><span class="badge"> <?php echo $totalloja['quantidade']; ?></span>
            </li>

            <!--          <li class="list-group-item">
            <?php $totalimovel = $viewData['totalvenda']; ?>
                         <label>Total de Pagantes: </label><span class="badge"> <?php // echo $totalvenda['total'];  ?></span>
                     </li>
                     <div class="col-sm-2">
            <?php $totalimovel = $viewData['totalaluga']; ?>
         
                         <label>Total de Não Pagantes: </label><span class="badge "> <?php // echo $totalaluga['total'];  ?></span>
                     </div>
         
                     <div class="col-sm-2">
            <?php $totalstatuslivre = $viewData['totallivre']; ?> 
                         <label>Total Anúnciado: </label><span class="badge"> <?php // echo $totalstatuslivre['total'];  ?></span>
                     </div>
                     <div class="col-sm-2">
            <?php $totalstatusbloqueado = $viewData['totalbloqueado']; ?> 
                         <label>Total Bloqueado: </label><span class="badge"> <?php // echo $totalstatusbloqueado['total'];  ?></span>-->
    </div>
      
<div class="h1 text-center"> Seu Comercio</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Loja</th>
                        
                        <th scope="col">Endereço</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
<?php foreach ($viewData['lojas']as $value) { ?>
                
           
  
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php echo $value['nome_fantasia'] ?></td>
                        
                         <td><?php echo $value['endereco'] ?></td>
                         
                        
                         <td><a href="<?php BASE_URL;?>"class="btn btn-warning">Visitar</a>
                         <a href="<?php BASE_URL; ?>editar_loja?id_cliente=<?php echo $_SESSION['lgCliente']; ?>&id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar loja</a>
                         <a href="<?php BASE_URL; ?>editar_funcionamento?id_loja=<?php echo $value['id_loja']; ?>" class="btn btn-warning">Editar Horario</a></td>
                    </tr>
               
                    
                </tbody>
                    <?php }?>
            </table>
       
        
</ul>
</div>
</div>




