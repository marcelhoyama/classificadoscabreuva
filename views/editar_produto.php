
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
    <label for="tamanho">Tamanho(s) disponivel(is)</label>
    <input type="text" class="form-control" id="tamanho" name="tamanho" value="<?php echo $getProduto['produto_tamanho']; ?>">
  </div>      
        <div class="form-group">
    <label for="cor">Core(s) disponivel(is)</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $getProduto['produto_cor']; ?>">
  </div>      
       
 <div class="form-group">
    <label for="valor">Valor</label><label class="text-danger">*obrigatorio</label>
     <div class="input-group-prepend">
          <div class="input-group-text">R$</div>
    <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $getProduto['produto_valor']; ?>">
  </div>
 </div>
         <div class="form-group">
    <label for="desconto">Desconto em porcentagem</label><label class="text-danger">*obrigatorio</label>
     <div class="input-group-prepend">
          <div class="input-group-text">%</div>
    <input type="text" class="form-control" id="desconto" name="desconto" value="<?php echo $getProduto['produto_desconto']; ?>">
  </div>
         </div>
         <div class="form-group">
    <label for="quantidade">Quantidade</label><label class="text-danger">*obrigatorio</label>
    <input type="number" class="form-control" id="qtd" name="qtd" value="<?php echo $getProduto['produto_quantidade']; ?>">
  </div>   
          <div class="form-group">
    <label for="peso">Peso</label>
    <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $getProduto['produto_peso']; ?>">
  </div>
        <div class="form-inline">
            <label for="categoria">Categoria</label><label class="text-danger">*obrigatorio</label>
        <div class="form-group mx-sm-3 mb-2">
    
    <select class="form-control" name="categoria">
        <option>Escolher...</option>
    </select>
   
  </div>  
            <button type="button" class="btn btn-primary mb-2" href="javascript;:" onclick="cadastrarCategoria()">Cadastrar outra categoria</button>
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


<!-- Modal tipo de ramo  id=modaltiporamo-->
<div class="modal fade" id="modaltipocategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar tipo de categoria!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>