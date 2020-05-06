
<title>Cadastrar Foto</title>
    

<div class="container">

    <div class="text-center h3">Cadastrar Foto da Loja (na pesquisa)</div>
   
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
            <div class="form-group">
                   <div class="h6 text-danger">Fase de teste</div><br>
                <label for="arquivo1" class="form-group">Adicionar UMA Foto da "logo" da sua loja (500x500)</label>
                <input name="arquivo1" type="file" class="form-control" />
                <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>
            </div>
    <?php if($viewData['fotoPrincipal']==NULL):?>
    
            <?php else: $foto=$viewData['fotoPrincipal']; ?>
            <div class="col-md">
            <div class="card">
                <div class="card-header">
                    foto principal
                </div>
                <div class="card-body">
                    <?php if($foto['url_imagem_principal']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-responsive"/>
                    <?php }else{?>
                    <img src="upload/fotos_principais/<?php echo $foto['url_imagem_principal'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                  <a href="<?php BASE_URL;?>cadastrar_foto/excluirFotoPrincipal?id_loja=<?php echo $_GET['id_loja']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
            <?php endif; ?>
        
       

       
            
            
            <hr>        
            
              <?php $fotoambiente=$viewData['listFotosAmbiente'];?>
          
            
<!--<div class="row my-5">
    
        <div class="form-group">
              <div class="h6 text-danger">Fase de teste</div><br>
            <label for="arquivos" class="form-group">Adicionar no MAXIMO 3 Fotos de Banner: (900x350)</label>
            <input id="fotos" name="arquivos[]" type="file"  multiple="" class="form-control"/>
               <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>

        </div>
     </div>   -->
<!--            <div class="row">
    <?php foreach ($fotoambiente as $value) {?>
        
            
  <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    Banner: (900x350) 1
                </div>
                <div class="card-body">
                    <?php if($value['url']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/ambiente/<?php echo $value['url'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                     <a href="<?php BASE_URL;?>cadastrar_foto/excluirFotoAmbiente?id_url_imagens=<?php echo $value['id_url_imagens']; ?>&url_imagem=<?php echo $value['url']; ?>&id_loja=<?php echo $_GET['id_loja']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
            
    <?php }?>
    
            </div>    
            
            
            
            
            
        
            
            <hr>
            
            
            
            
            
            
            
            
            
            
            
      <div class="row">

        <div class="form-group">
            <div class="h6 text-danger">Fase de teste</div><br>
            <label for="arquivo2" class="form-group">Adicionar UMA foto de todos do time:</label>
            <input id="fotos2" name="arquivo2" type="file"   class="form-control"/>
 <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
        </div>
          
          <?php if($viewData['listFotoEquipe']==null): ?>
          
          <?php else: $fotoequipe=$viewData['listFotoEquipe'];?>
  <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                  De preferência  Toda a equipe (900x350)
                </div>
                <div class="card-body">
                    <?php if($fotoequipe['url']==NULL){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/equipes/<?php echo $fotoequipe['url'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL;?>cadastrar_foto/excluirFotoEquipe?id_loja=<?php echo $_GET['id_loja']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
          <?php endif;?>

      </div>-->
            <hr>
            
           
           
            
            <div class="">
           
            <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
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

    
    




