
<title>Cadastrar Vitrine</title>
    

<div class="container">

    <div class="text-center h3">Cadastrar Banner da sua Vitrine</div>
   
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
       <div class="row my-5">
    
        <div class="form-group">
              <div class="h6 text-danger">Fase de teste</div><br>
              <label for="arquivos" class="form-group"><strong>Adicionar no MAXIMO 3 Fotos de Banner: (900x350)</strong></label>
            <input id="fotos" name="arquivos[]" type="file"  multiple="" class="form-control"/>
               <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>

        </div>
     </div>   
            <div class="row">
                <?php $fotoambiente=$viewData['listFotosAmbiente'];?>
    <?php foreach ($fotoambiente as $value) {?>
        
            
  <div class="col-md mb-3">
            <div class="card-block">
                <div class="card-header">
                    Banner: (900x350) 1
                </div>
                <div class="card-body">
                    <?php if($value['url']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="upload/ambiente/<?php echo $value['url'];?>" class="img" width="450" height="175"/>
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
            <label for="arquivo2" class="form-group">Adicionar UMA foto de todos do time:  De preferência  Toda a equipe (900x350), publico gosta de fotos de pessoas</label>
            <input id="fotos2" name="arquivo2" type="file"   class="form-control"/>
 <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
        </div>
          
          <?php if($viewData['listFotoEquipe']==null): ?>
          
          <?php else: $fotoequipe=$viewData['listFotoEquipe'];?>
  <div class="col-md">
            <div class="card-block">
               
                <div class="card-body">
                    <?php if($fotoequipe['url']==NULL){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                               <img src="upload/equipes/<?php echo $fotoequipe['url'];?>" class="img" width="450" height="175"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL;?>cadastrar_foto/excluirFotoEquipe?id_loja=<?php echo $_GET['id_loja']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
          <?php endif;?>

      </div>
            <hr>
         
       
  <div class="form-group">
      <label for="descricao">Descrição sobre a loja <strong>*Dica(missão,visão,valores)</strong></label><label class="text-danger">*obrigatorio</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
  </div>

            

            <hr>        
         
           
           
            <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>

       
          
     
    
     
    

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



