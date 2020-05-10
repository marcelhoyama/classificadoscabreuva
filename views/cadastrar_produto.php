
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
            
           <div class="form-group">
                  
                <label for="arquivo" class="form-group">Adicionar UMA Foto do produto</label>
                <input name="arquivo" type="file" class="form-control" />
                <label class="form-group">*Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>

        
        
  
  <div class="form-group">
      <label for="codigo">Codigo de controle seu</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="">
  </div>
  <div class="form-group">
    <label for="nome">Nome do produto</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="">
  </div>
         <div class="form-group">
    <label for="tamanho">Tamanho(s) disponivel(is)</label>
    <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="">
  </div>      
        <div class="form-group">
    <label for="cor">Cor(es) disponivel(is)</label><label class="text-danger">*obrigatorio</label>
    <input type="text" class="form-control" id="cor" name="cor" placeholder="">
  </div>      
       
 <div class="form-group">
    <label for="valor">Valor</label><label class="text-danger">*obrigatorio</label>
     <div class="input-group-prepend">
          <div class="input-group-text">R$</div>
    <input type="text" class="form-control" id="valor" name="valor" placeholder="">
  </div>
 
</div>
         <div class="form-group">
    <label for="desconto">Desconto em porcentagem</label><label class="text-danger">*obrigatorio</label>
     <div class="input-group-prepend">
          <div class="input-group-text">%</div>
    <input type="text" class="form-control" id="desconto" name="desconto" placeholder="">
  </div>
         </div>
         <div class="form-group">
    <label for="quantidade">Quantidade</label><label class="text-danger">*obrigatorio</label>
    <input type="number" class="form-control" id="qtd" name="qtd" placeholder="">
  </div>   
          <div class="form-group">
    <label for="peso">Peso</label>
    <input type="text" class="form-control" id="peso" name="peso" placeholder="">
  </div>
           <div class="row form-group">
     
        <div class="form-inline">
            <label for="tipo_categoria" class="mx-sm-3 mb-2">Tipo de Categoria:</label><label class="text-danger mx-sm-3 mb-2">Campo Obrigatorio*</label>
            <div class="form-group mb-2">
               
                <select name="tipo_categoria" class="form-control" id="tipo_categoria">
                    <option>Escolher...</option>
                    
                    <?php foreach ($viewData['listarCategoria'] as $value) : { ?>
                            <option value="<?php echo $value['id_categoria']; ?>"><?php echo $value['categoria_nome']; ?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                
                <button type="button" class="btn btn-primary " href="javascript;:" onclick="cadastrarCategoria()">Cadastrar outra categoria</button>
            </div>
             </div>
        </div>      
       
  <div class="form-group">
    <label for="descricao">Descrição do produto</label><label class="text-danger">*obrigatorio</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
  </div>

     <div class="form-group">
    <label for="devolucao">Politica de Devolução/ Garantia</label><label class="text-danger">*obrigatorio</label>
    <textarea class="form-control" id="devolucao" name="devolucao" rows="3"></textarea>
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