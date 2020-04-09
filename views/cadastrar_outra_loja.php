
<title>Cadastrar outra Loja</title>

<?php $cliente=$viewData['dadosCliente'];?>
<div class="container">
    
    <div class="text-center h3">Cadastrar uma ou Outra Loja do(a)<?php echo $cliente['nome'];?> </div>
   
    <form id="cadastrarimovel" method="POST" enctype="multipart/form-data">
        <div class="row">
            
        <div class="control-group col-sm-3">
                 <label for="">Nome do Usuário:</label> <label class="text-danger"></label></br>
               
                 <input type="text" class="form-control"  name="id_func" value="<?php echo $viewData['id_funcionario'];?> " disabled="">
        </div>
             <div class="control-group col-sm-6">
                 <label for="">Nome do Cliente:</label> <label class="text-danger"></label></br>
                     <input type="text" class="form-control"  name="nome_cliente" value="<?php echo $cliente['nome'];?> " disabled="">
                     
      
                     <input type="text" class="form-control"  name="id_cliente" value="<?php echo $cliente['id_clientes'];?> " hidden="">
      
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
  
      <br>
      <div class="row">
                     <div class="form-group col-sm-3">
                         <label for="status">Anunciar no site:</label> <label class="text-danger">obrigatorio*</label></br>
                <div class="checkbox-inline">
                    <label><input type="radio" name="situacao" id="status" value="0"  >Liberar</label> 
                    </div>

                    <div class="checkbox-inline">
                        <label><input type="radio" name="situacao" id="status" value="1" checked="checked">Bloquear</label>
                    </div>
              </div>
           <div class="form-group col-sm-3">
                <label for="chave1">Somente 5 Palavra chave separe por virgula nada mais:</label>  <label class="text-danger">campo obrigatorio*</label>
                <textarea name="chave1" class="form-control" id="chave1" rows="10"></textarea>

               
            </div>
           <div class="form-group col-sm-3">
                <label for="site">Site:</label>  <label class="text-danger"></label>
                <input name="site" class="form-control" id="site">

               
            </div>
          
            </div>
  
      

        <div class="row">
            <div class="form-group col-sm-4">
                <label for="id_tipo_ramo">Tipo de Ramo1:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info">ajuda ?</a></label>
                <select name="id_tipo_ramo1" class="form-control" id="id_tipo_ramo">
                    <option></option>
                    
                    <?php foreach ($viewData['listarRamo'] as $value) : { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nome'];?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="id_tipo_ramo">Tipo de Ramo2:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info">ajuda ?</a></label>
                <select name="id_tipo_ramo2" class="form-control" id="id_tipo_ramo">
                    <option></option>
                    
                    <?php foreach ($viewData['listarRamo'] as $value) : { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nome'];?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="id_tipo_ramo">Tipo de Ramo3:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info">ajuda ?</a></label>
                <select name="id_tipo_ramo3" class="form-control" id="id_tipo_ramo">
                    <option></option>
                    
                    <?php foreach ($viewData['listarRamo'] as $value) : { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nome'];?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="id_tipo_ramo">Tipo de Ramo4:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info">ajuda ?</a></label>
                <select name="id_tipo_ramo4" class="form-control" id="id_tipo_ramo">
                    <option></option>
                    
                    <?php foreach ($viewData['listarRamo'] as $value) : { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nome'];?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajuda no tipo de Ramo escolher!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>  O que vem antes, o ramo ou a atividade? Se você se encontra, agora, no momento da escolha pelo ramo de atividade, vamos te auxiliar a encontrar o ramo ideal para a sua atividade. Ficou confuso? A gente explica!</p>

<p>Ramos
    <strong>Empresas industriais:</strong> são aquelas que transformam matérias-primas, manualmente ou com auxílio de máquinas e ferramentas, fabricando mercadorias. Abrangem desde o artesanato até a moderna produção de instrumentos eletrônicos.
<li>Fábrica de móveis artesanais;</li>

<li> Fábrica de roupas;</li>

 <li>Fábrica de esquadrias;</li>

 <li>Fábrica de computadores.</li>
</p>
 <p><strong>Empresas comerciais:</strong> são aquelas que vendem mercadorias diretamente ao consumidor – no caso do comércio varejista – ou aquelas que compram do produtor para vender ao varejista – comércio atacadista.</p>
 <li>Restaurante;</li>

 <li>Supermercado;</li>

 <li>Atacado de laticínios;</li>

 <li>Armarinho;</li>

 <li>Loja de ferragem.</li>

 <p><strong>Empresas de prestação de serviços:</strong> são aquelas onde as atividades não resultam na entrega de mercadorias, mas da oferta do próprio trabalho ao consumidor.
 <li>Lavanderia;</li>

 <li>Cinema;</li>

 <li>Hospital;</li>

<li> Escola.</li>
      </p>

      <p> <strong>Atividades
              Dentro das atividades existem vários ramos</strong> que podem ser explorados por uma empresa, como por exemplo:

 

<li>gráfica;</li>
<li>calçado;</li>
<li>vestuário;</li>
<li>bebidas;</li>
<li>mobiliário;</li>
<li>couros;</li>
<li>metalurgia;</li>
<li>mecânica.</li>
 

<li>veículos;</li>
<li>tecidos;</li>

<li>combustíveis;</li>

<li>ferragens;</li>

<li>roupas;</li>

<li>acessórios.</li>



<li>alimentação;</li>

<li>transporte;</li>

<li>turismo;</li>

<li>saúde;</li>

<li>educação;</li>

<li>lazer.</li>
      </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>   
          
        </div>     

        <div class="form-group">
                <label for="nome_fantasia">Nome fantasia:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="nome_fantasia" class="form-control" id="nome_fantasia">

               
            </div>
            <div class="form-group ">
                <label for="razao_social">Razão Social:</label><label class="text-danger">Campo Obrigatorio*</label>
                <input name="razao_social" class="form-control" id="razao_social">
                  
            </div>
  <div class="form-group">
                <label for="cnpj">CNPJ :</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="cnpj" type="text" class="form-control" id="cnpj" placeholder="" />
            </div>
      
        
            <div class="form-group">
                <label for="endereco">Endereço:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="endereco" type="text" class="form-control" id="endereco" placeholder="" />
            </div>
            <div class="row">
            <div class="form-group col-sm-3">
                <label for="bairro">Bairro:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="bairro" type="text" class="form-control" id="bairro" placeholder="" />
            </div>

       
            <div class="form-group col-sm-3">
                <label for="cidade">Cidade:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="cidade" type="text" class="form-control" id="cidade" placeholder=""/>
            </div>
                  
        </div>
        <div class="row">
    
        <div class="form-group col-sm-3">
                <label for="telefone1">Telefone 1:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="telefone1" type="text" class="form-control" id="telefone1" placeholder=""/>
            </div>
        <div class="form-group col-sm-3">
                <label for="telefone2">Telefone 2:</label>  <label class="text-danger"></label>
                <input name="telefone2" type="text" class="form-control" id="telefone2" placeholder=""/>
            </div>
        <div class="form-group col-sm-3">
                <label for="whatsapp">Whatsapp(link api):</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="whatsapp" type="text" class="form-control" id="telefone1" placeholder=""/>
            </div>
        </div>
        <div class="row">
        <div class="form-group col-sm-3">
                <label for="email">E-mail (válido):</label>  <label class="text-danger"></label>
                <input name="email" type="text" class="form-control" id="email" placeholder=""/>
            </div>
        <div class="form-group col-sm-3">
                <label for="facebook">Facebook (link):</label>  <label class="text-danger"></label>
                <input name="facebook" type="text" class="form-control" id="facebook" placeholder=""/>
            </div>
        <div class="form-group col-sm-3">
                <label for="youtube">Youtube (link):</label>  <label class="text-danger"></label>
                <input name="youtube" type="text" class="form-control" id="youtube" placeholder=""/>
            </div>
        </div>
          <div class="form-group">
            <label for="descricao">Breve descrição do seu nicho:</label> 
            <a href="https://viverdeblog.com/nicho-de-mercado/" target="_blank" class="text-info" >ajuda?</a> 

            <textarea class="form-control" name="descricao" type="text" id="descricao" rows="15"></textarea>
        </div>

           <div class="form-group">
            <label for="chamada">Breve Chamada pra atrair clientes:</label> 

            <textarea class="form-control" name="chamada" type="text" id="chamada" rows="15"></textarea>
        </div>
       
        <div class="well">
            <div class="form-group">
                <label for="arquivo1">Adicionar UMA Foto da frente da Loja</label>
                <input name="arquivo1" type="file" />
            </div>

        </div>
       

       
<div class="well">

        <div class="form-group">
            <label for="arquivos">Adicionar no MAXIMO 35 Fotos do :</label>
            <input id="fotos" name="arquivos[]" type="file"  multiple=""/>

        </div>
</div>
     <div class="progress progress-striped active">
         <div class="progress-bar"  style="width: 0%">
             
         
         </div>
        
             
     </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary upload" >Cadastrar</button> 


        </div>
     <script type="text/javascript">
          $(function(){
              
          
            $('.cadastrarimovel').on('submit',function(e){
                 e.preventDefault();
                 var form =$('.cadastrarimovel')[0];
                 var data = new FormData(form);
                 
                 
                 
                 
                     $.ajax({
                        type:'POST',
                        url:'cadastrarimovelController',
                        data:data,
                        contentType:false,
                        processData:false,
                        success:function(msg){
                            alert(msg);
                        }
                        
                     });
              
                 
           
                  
             });
             });
             </script>

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
