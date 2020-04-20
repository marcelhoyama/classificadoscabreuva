
<title>Cadastrar Produtos</title>
    

<div class="container">

    <div class="text-center h3">Cadastrar Produtos</div>
   
    <form id="cadastrarloja" method="POST" enctype="multipart/form-data">
          
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
        
         <?php // $cliente=$viewData['lojacliente'];?>
        <div class="h6 text-danger">Fase de teste</div><br>
            
       
  <?php print_r($foto=$viewData['fotoPrincipal']);?>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Foto do Produto
                </div>
                <div class="card-body">
                    <?php if($foto['url_imagem_principal']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/fotos_principais/<?php echo $foto['url_imagem_principal'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL;?>cadastrar_foto/excluirFotoPrincipal?id_loja=<?php echo $_GET['id_loja']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
        
            <div class="form-group">
                  
                <label for="arquivo" class="form-group">Adicionar UMA Foto do produto</label>
                <input name="arquivo" type="file" class="form-control" />
                <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>
  
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="">
  </div>
  <div class="form-group">
    <label for="nome">Nome do produto</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
  </div>
 <div class="form-group">
    <label for="valor">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor" placeholder="">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição do produto</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
  </div>

           
        
       

       
            
            
            <hr>        
        
           
            
            <div class="">
           
            <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
</div>
       
          
     
      <!--progresso de preenchimento-->
     <div class="progress progress-striped active">
         <div class="progress-bar"  style="width: 0%">
             
         
         </div>
        
             
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


