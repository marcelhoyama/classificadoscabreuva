
<title>Cadastrar Foto</title>
    

<div class="container">

    <div class="text-center h3">Cadastrar Fotos</div>
   
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
        <div class="row">
            
       
  <?php $foto=$viewData['fotoPrincipal'];?>
       
        <div class="row">
            <div class="form-group">
                   <div class="h6 text-danger">Fase de teste</div><br>
                <label for="arquivo1" class="form-group">Adicionar UMA Foto da "logo" da sua loja</label>
                <input name="arquivo1" type="file" class="form-control" />
                <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>
   
            <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    foto principal
                </div>
                <div class="card-body">
                    <?php if($foto['url_imagem_principal']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/fotos_principais/<?php echo $foto['url_imagem_principal'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <button hre class="btn btn-danger">Excluir</button>
                </div>
            </div>
            </div> 
        </div>
       

       
            
            
            
            
            
            
            
<div class="row my-5">
    
        <div class="form-group">
              <div class="h6 text-danger">Fase de teste</div><br>
            <label for="arquivos" class="form-group">Adicionar no MAXIMO 35 Fotos do ambiente:</label>
            <input id="fotos" name="arquivos[]" type="file"  multiple="" class="form-control"/>
               <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>

        </div>
  <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Ambiente
                </div>
                <div class="card-body">
                    <?php if($foto['url_imagem_principal']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/fotos_principais/<?php echo $foto['url_imagem_principal'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <button hre class="btn btn-danger">Excluir</button>
                </div>
            </div>
            </div> 
</div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
      <div class="row">

        <div class="form-group">
            <div class="h6 text-danger">Fase de teste</div><br>
            <label for="arquivos2" class="form-group">Adicionar  Fotos de todos do time:</label>
            <input id="fotos2" name="arquivos2[]" type="file"  multiple="" class="form-control"/>
 <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
        </div>
  <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Time
                </div>
                <div class="card-body">
                    <?php if($foto['url_imagem_principal']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/fotos_principais/<?php echo $foto['url_imagem_principal'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <button hre class="btn btn-danger">Excluir</button>
                </div>
            </div>
            </div> 

      </div>
            <div class="row mt-5">
            
            <div class="form-group">
            <button type="submit" class="btn btn-primary upload form-control" >Cadastrar</button> 

</div>
        </div>
      <!--area de links de videos-->
<!--      <div class="h5 mt-5">Videos de apresentação, seus produtos/serviços, chamada de ação</div>
      <div class="h6">Post os links</div>
      <div class="row">
          
           <div class="form-group col-sm-3">
            
                <label for="apresentacao">Apresentação:</label>  <label class="text-danger"></label>
                <input name="apresentacao" type="text" class="form-control" id="apresentacao" />
            </div>
        <div class="form-group col-sm-3">
                <label for="produtos">Produtos:</label>  <label class="text-danger"></label>
                <input name="produtos" type="text" class="form-control" id="produtos" />
            </div>
        <div class="form-group col-sm-3">
                <label for="acao">Chamada de ação:</label>  <label class="text-danger"></label>
                <input name="acao" type="text" class="form-control" id="acao"/>
            </div>
      </div>-->
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


