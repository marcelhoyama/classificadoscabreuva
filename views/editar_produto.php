
<title>Editar Produto</title>
    
<?php $getProduto=$viewData['getProduto']; ?>
<div class="container">

    <div class="text-center h3">Editar Produto</div>
   
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
        
      
        <div class="h6 text-danger">Fase de teste</div><br>
            
           <div class="form-group">
                  
                <label for="arquivo" class="form-group">Adicionar UMA Foto do produto</label>
                <input name="arquivo" type="file" class="form-control" />
                <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Foto do Produto
                </div>
                <div class="card-body">
                    <?php if($getProduto['produto_imagem']==null){ ?>
                               <img src="assets/images/sem-imagem.gif" class="img-fluid"/>
                    <?php }else{?>
                    <img src="assets/images/produtos/<?php echo $getProduto['produto_imagem'];?>" class="img-fluid"/>
                    <?php }?>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL;?>editar_produto/excluirFotoProduto?id_produto=<?php echo $_GET['id_produto']; ?>"   class="btn btn-danger">Excluir</a>
                </div>
            </div>
            </div> 
        
        
  
  <div class="form-group">
      <label for="codigo">Codigo</label><label class="text-danger">*obrigatorio</label>
      <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $getProduto['produto_codigo']; ?>">
  </div>
  <div class="form-group">
    <label for="nome">Nome do produto</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $getProduto['produto_nome']; ?>">
  </div>
         <div class="form-group">
    <label for="tamanho">Tamanho</label>
    <input type="text" class="form-control" id="tamanho" name="tamanho" value="<?php echo $getProduto['produto_tamanho']; ?>">
  </div>      
        <div class="form-group">
    <label for="cor">Cor</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $getProduto['produto_cor']; ?>">
  </div>      
       
 <div class="form-group">
    <label for="valor">Valor</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $getProduto['produto_valor']; ?>">
  </div>
         <div class="form-group">
    <label for="desconto">Desconto em porcentagem</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="desconto" name="desconto" value="<?php echo $getProduto['produto_desconto']; ?>">
  </div>
         <div class="form-group">
    <label for="quantidade">Quantidade</label><label class="text-danger">*obrigatorio</label>
    <input type="number" class="form-control" id="qtd" name="qtd" value="<?php echo $getProduto['produto_quantidade']; ?>">
  </div>   
          <div class="form-group">
    <label for="peso">Peso</label>
    <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $getProduto['produto_peso']; ?>">
  </div>
        <div class="form-group">
    <label for="categoria">Categoria</label><label class="text-danger">*obrigatorio</label>
    <select class="form-control" name="categoria">
        <option>Escolher...</option>
    </select>
   
  </div>      
       
  <div class="form-group">
    <label for="descricao">Descrição do produto</label><label class="text-danger">*obrigatorio</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo $getProduto['produto_descricao']; ?></textarea>
  </div>

     <div class="form-group">
    <label for="devolucao">Politica de Devolução/ Garantia</label><label class="text-danger">*obrigatorio</label>
    <textarea class="form-control" id="devolucao" name="devolucao" rows="3"><?php echo $getProduto['produto_devolucao']; ?></textarea>
  </div>       
  

 
            
            
            <hr>        
        
           
            
            <div class="">
           
            <button type="submit" class="btn btn-primary btn-lg btn-block">Atualizar</button>
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


