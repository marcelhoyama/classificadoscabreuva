
<title>Editar Loja</title>


<div class="container">
    
    <div class="text-center h3">Editar Loja</div>
   
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
        
         <?php $cliente=$viewData['dadosLoja'];?>
        <?php $dadoscliente=$viewData['lojacliente'];?>
        <div class="row">
            
        <div class="control-group col-sm">
                 <label for="">CNPJ:</label> <label class="text-danger"></label></br>
               
                 <input type="text" class="form-control"  name="cnpj" value="<?php echo $cliente['cnpj']; ?>" disabled="" >
                  <label for="">CPF:</label> <label class="text-danger"></label></br>
               
                  <input type="text" class="form-control"  name="cpf" value="<?php echo $dadoscliente['cpf']; ?>" disabled="" >
     
        </div>
<!--             <div class="control-group col-sm">
                 <label for="">Razão Social:</label> <label class="text-danger"></label></br>
               
            <input type="text" class="form-control"  name="rsocial" >
               <label for="">Nome Fantasia:</label> <label class="text-danger"></label></br>
               <input type="text" class="form-control"  name="fantasia">
        </div>-->
        </div>
    
 
      <br>
      <div class="row">
                     <div class="form-group col-sm-3">
                         <label for="status">Anunciar loja/serviço no site:</label> <label class="text-danger">obrigatorio*</label></br>
                <div class="checkbox-inline">
                    <label>
                        <input type="radio" name="anuncio_site" id="status" value="0" <?php echo ($cliente['anuncio_site'] == "0")? 'checked':''; ?> >
                        Liberar
                    </label> 
                       
   
                </div>
                 
                    <div class="checkbox-inline">
                        <label><input type="radio" name="anuncio_site" id="status" value="1" <?php echo ($cliente['anuncio_site'] == "1")? 'checked':''; ?> >Bloquear</label>
                    </div>
                        
              </div>
           <div class="form-group col">
               <div class="h6">Detalhes dos produtos ou serviço que você tem, separe por virgula cada palavra!</div>
                <label for="palavrachave">Palavra chave:</label>  <label class="text-danger">campo obrigatorio*</label>
                <textarea name="palavrachave" class="form-control" id="palavrachave" rows="15"><?php echo $cliente['palavrachave'];?></textarea>

               
       
            </div>
          
            </div>
  
      

        <div class="row">
            <div class="form-group col-sm-4">
                <label for="tipo_categoria">Tipo de Categoria:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info">ajuda ?</a></label>
                <select name="tipo_categoria" class="form-control" id="tipo_categoria">
                   
                    
                    <?php foreach ($viewData['listarCategoria'] as $value) : { ?>
                            <option value="<?php echo $value['id_categorias']; ?>" <?php echo ($cliente['id_categorias'] == $value['id_categorias'] )? 'selected="selected"':''; ?>     ><?php echo $value['nome'];?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajuda no tipo de Categoria escolher!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>  O que vem antes, o ramo ou a atividade? Se você se encontra, agora, no momento da escolha pelo ramo de atividade, vamos te auxiliar a encontrar o ramo ideal para a sua atividade. Ficou confuso? A gente explica!</p>

<p>Categoria
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
 <li>acessórios.</li>

 <p><strong>Empresas de prestação de serviços:</strong> são aquelas onde as atividades não resultam na entrega de mercadorias, mas da oferta do próprio trabalho ao consumidor.
 <li>Lavanderia;</li>

 <li>Cinema;</li>

 <li>Hospital;</li>

<li> Escola.</li>
<li>mobiliário;</li>
<li>gráfica;</li>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>   
          
        </div>     

        <div class="form-group">
                <label for="nome_fantasia">Nome fantasia:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="nome_fantasia" class="form-control" id="nome_fantasia" value="<?php echo $cliente['nome_fantasia'] ?>">
<!--vai ser o titulo tambem no slug-->
               
            </div>
            <div class="form-group ">
                <label for="razao_social">Razão Social:</label><label class="text-danger">Campo Obrigatorio*</label>
                <input name="razao_social" class="form-control" id="razao_social" value="<?php echo $cliente['razao_social'];?>">
                  
            </div>

      
        
            <div class="form-group">
                <label for="endereco">Endereço:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="endereco" type="text" class="form-control" id="endereco" value="<?php echo $cliente['endereco'];?>" />
            </div>
            <div class="row">
            <div class="form-group col-sm-3">
                <label for="bairro">Bairro:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="bairro" type="text" class="form-control" id="bairro" value="<?php echo $cliente['bairro'];?>" />
            </div>

       
            <div class="form-group col-sm-3">
                <label for="cidade">Cidade:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="cidade" type="text" class="form-control" id="cidade" value="<?php echo $cliente['cidade'];?>"/>
            </div>
                  
        </div>
      <div class="h5 mt-5">Seus contatos e canais de redes sociais </div>
        <div class="row">
    
       <div class="form-group col-sm-6">
                <label for="telefone1">Telefone 1:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="telefone1" type="text" class="form-control" id="telefone1" value="<?php echo $cliente['telefone1'];?>"/>
            </div>
        <div class="form-group col-sm-6">
                <label for="telefone2">Telefone 2:</label>  <label class="text-danger"></label>
                <input name="telefone2" type="text" class="form-control" id="telefone2" value="<?php echo $cliente['telefone2'];?>"/>
            </div>
        <div class="form-group col-sm-6">
                <label for="whatsapp">Whatsapp:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="whatsapp" type="text" class="form-control" id="telefone1" value="<?php echo $cliente['whatsapp'];?>"/>
            </div>
        </div>
        <div class="row">
      <div class="form-group col-sm-6">
            
                <label for="email">E-mail:</label>  <label class="text-danger"></label>
                <input name="email" type="text" class="form-control" id="email" value="<?php echo $cliente['email'];?>"/>
            </div>
      <div class="form-group col-sm-6">
                <label for="facebook">Facebook:</label>  <label class="text-danger"></label>
                <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo $cliente['facebook'];?>"/>
            </div>
        <div class="form-group col-sm-6">
                <label for="youtube">Youtube:</label>  <label class="text-danger"></label>
                <input name="youtube" type="text" class="form-control" id="youtube" value="<?php echo $cliente['youtube'];?>"/>
            </div>
        </div>
      <div class="row">
        <div class="form-group col-sm-6">
                <label for="instagram">Instagram:</label>  <label class="text-danger"></label>
                <input name="instagram" type="text" class="form-control" id="instagram" value="<?php echo $cliente['instagram'];?>"/>
            </div>
        <div class="form-group col-sm-6">
                <label for="site">Site:</label>  <label class="text-danger"></label>
                <input name="site" type="text" class="form-control" id="site" value="<?php echo $cliente['site'];?>"/>
            </div>
      </div>
<!--      <div class="h4 mt-5">Tenha em mente em UM produto ou serviço para cada solução que você tem! Para cada tipos de pessoas! </div>
          <div class="form-group">
            <label for="descricao">Breve descrição do seu nicho:</label> 
           
            <a href="https://viverdeblog.com/nicho-de-mercado/" target="_blank" class="text-info" >ajuda?</a> 
 <div class="h5">o seu possivel cliente (generalizar - aqueles mais procurados) ,tem uma dor que encaixe na sua solução?</div>
 <textarea class="form-control" name="descricao" type="text" id="descricao" rows="15" placeholder="crie no maximo em 140 caracteres"><?php echo $cliente['descricao'];?></textarea>
        </div>

           <div class="form-group">
            <label for="chamada">Breve Chamada pra atrair clientes:</label> 
 <div class="h5">Diferencie-se dos seus concorrentes, qual são as suas particulariedades?</div>
            <textarea class="form-control" name="chamada" type="text" id="chamada" rows="15"><?php echo $cliente['chamada'];?></textarea>
        </div>
       
      precisa ver como fica no banco de dados
        <div class="form-group">
            <label for="chamada">Conte com provas concretas ou evidencias de seus resultados:</label> 
            <div class="h5">Fotos,videos, comentarios</div><div class="h6">coloque os link onde estão.</div>
            <textarea class="form-control" name="prova" type="text" id="chamada" rows="15"><?php echo $cliente['prova'];?></textarea>
        </div>-->
       
        <div class="well">
            <div class="form-group">
                <label for="arquivo1">Adicionar UMA Foto da frente da Loja</label>
                <input name="arquivo1" type="file" />
            </div>

        </div>
       

       
<!--<div class="well">
precisa ver como fica no banco de dados
        <div class="form-group">
            <label for="arquivos">Adicionar no MAXIMO 35 Fotos do ambiente:</label>
            <input id="fotos" name="arquivos[]" type="file"  multiple=""/>

        </div>
</div>
      <div class="well">
precisa ver como fica no banco de dados
        <div class="form-group">
            <label for="arquivos2">Adicionar  Fotos de cada um do(s) funcionarios e donos:</label>
            <input id="fotos2" name="arquivos2[]" type="file"  multiple=""/>

        </div>
</div>-->
      <!--area de links de videos-->
<!--      <div class="h5 mt-5">Videos de apresentação, seus produtos/serviços, chamada de ação</div>
      <div class="h6">Post os links</div>
      <div class="row">
          
           <div class="form-group col-sm-3">
            
                <label for="apresentacao">Apresentação:</label>  <label class="text-danger"></label>
                <input name="apresentacao" type="text" class="form-control" id="apresentacao" value="<?php echo $cliente['link_apresentacao'];?>"/>
            </div>
        <div class="form-group col-sm-3">
                <label for="produtos">Produtos:</label>  <label class="text-danger"></label>
                <input name="produtos" type="text" class="form-control" id="produtos" value="<?php echo $cliente['link_produto'];?>"/>
            </div>
        <div class="form-group col-sm-3">
                <label for="acao">Chamada de ação:</label>  <label class="text-danger"></label>
                <input name="acao" type="text" class="form-control" id="acao" value="<?php echo $cliente['link_acao'];?>"/>
            </div>
      </div>-->
      <!--progresso de preenchimento-->
     <div class="progress progress-striped active">
         <div class="progress-bar"  style="width: 0%">
             
         
         </div>
        
             
     </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary upload" >Atualizar</button> 


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
