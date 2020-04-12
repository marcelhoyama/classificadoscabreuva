
<title>Cadastrar Loja</title>


<div class="container">
    <br>
    <div class="text-center h3 mt-5">Cadastrar Loja</div>
   
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
            
        <div class="control-group col-sm">
                 <label for="">CNPJ/CPF:</label> <label class="text-danger">se não tiver registro CNPJ use seu CPF</label></br>
               
                 <input type="text" class="form-control" id="cpfOuCnpj" name="cpfcnpj"  placeholder="somente numeros" >
                  
     
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
                         <label for="">Anunciar a loja/serviço no site:</label> <label class="text-danger">obrigatorio*</label></br>
                <div class="checkbox-inline">
                    <label><input type="radio" name="anuncio_site" value="1" >Liberar</label>
                    </div>

                    <div class="checkbox-inline">
                        <label><input type="radio" name="anuncio_site" value="2" checked="" >Bloquear</label>
                    </div>
              </div>
          <div class="form-group col-sm-3">
              <label for="status">Delivery:</label> <label class="text-danger">obrigatorio*</label></br>
                <div class="checkbox-inline">
                    <label>
                        <input type="radio" name="delivery" id="status" value="1" >
                        Sim
                    </label> 


                </div>

                <div class="checkbox-inline">
                    <label><input type="radio" name="delivery" id="status" value="0" checked="" >Não</label>
                </div>
          </div>
           <div class="form-group col">
               <div class="h6">Detalhes dos produtos ou serviço que você tem, separe por virgula cada palavra!</div>
                <label for="palavrachave">Palavra chave:</label>  <label class="text-danger">campo obrigatorio*</label>
                <textarea name="palavrachave" class="form-control" id="palavrachave" rows="15" placeholder="Ex: palavra,palavra,..."></textarea>

               
       
            </div>
          
            </div>
  
      
      <div class="row form-group">
     
        <div class="form-inline">
            <div class="form-group mb-2">
                <label for="tipo_categoria">Tipo de Ramo de Atividade:</label><label class="text-danger">Campo Obrigatorio* <a data-toggle="modal" data-target="#exampleModalLong" href="<?php BASE_URL?>ramo_atividade" class="text-info"></a></label>
                <select name="tipo_categoria" class="form-control" id="tipo_categoria">
                    <option></option>
                    
                    <?php foreach ($viewData['listarRamo'] as $value) : { ?>
                            <option value="<?php echo $value['id_ramo']; ?>"><?php echo $value['nome']; ?></option>

                        <?php  } endforeach; ?>  
                 </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                
                <button type="button" class="btn btn-primary btn-lg" href="javascript;:" onclick="cadastrarRamo()">Cadastre seu ramo aqui:</button>
            </div>
             </div>
        </div>   
<!-- Modal ajuda Categoria -->
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
          
  

        <div class="form-group">
                <label for="nome_fantasia">Nome fantasia:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="nome_fantasia" class="form-control" id="nome_fantasia" >
<!--vai ser o titulo tambem no slug-->
               
            </div>
            <div class="form-group ">
                <label for="razao_social">Razão Social:</label><label class="text-danger">Campo Obrigatorio*</label>
                <input name="razao_social" class="form-control" id="razao_social" >
                  
            </div>

      
        
            <div class="form-group">
                <label for="endereco">Endereço:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="endereco" type="text" class="form-control" id="endereco" placeholder="endereço do comercio" />
            </div>
            <div class="row">
            <div class="form-group col-sm-3">
                <label for="bairro">Bairro:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="bairro" type="text" class="form-control" id="bairro"  />
            </div>

       
            <div class="form-group col-sm-3">
                <label for="cidade">Cidade:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="cidade" type="text" class="form-control" id="cidade" />
            </div>
                  
        </div>
      
      
         <div class="row">         
             <div class="h5"> Horario de Funcionamento</div>
             <label class="label "> Descreva aqui:</label>
             
           
             <input type="text" class="form-control is-invalid" name="funcionamento" />
               
       


         </div>
            <div class="row"> 
          
      </div>
      <div class="h5 mt-5">Seus contatos e canais de redes sociais </div>
        <div class="row">
    
        <div class="form-group col-sm-6">
                <label for="telefone1">Delivery:</label>  <label class="text-danger"></label>
                <input name="telefone1" type="text" class="form-control" id="tel" placeholder="DDD+somente numeros" />
            </div>
        <div class="form-group col-sm-6">
                <label for="telefone2">fixo 2:</label>  <label class="text-danger"></label>
                <input name="telefone2" type="text" class="form-control" id="telefone" placeholder="DDD+somente numeros" />
            </div>
        <div class="form-group col-sm-6">
                <label for="whatsapp">Whatsapp 1:</label>  <label class="text-danger">campo obrigatorio*</label>
                <input name="whatsapp1" type="text" class="form-control" id="celular" placeholder="DDD+numeros"/>
            </div>
            <div class="form-group col-sm-6">
                <label for="whatsapp">Whatsapp 2:</label>  <label class="text-danger"></label>
                <input name="whatsapp2" type="text" class="form-control" id="celular" placeholder="DDD+numeros"/>
            </div>
                 <div class="form-group col-sm-6">
                <label for="email">E-mail:</label>  <label class="text-danger"></label>
                <input name="email" type="text" class="form-control" id="email" placeholder="exemplo: comercio@email.com"/></div>
            
             <div class="form-group col-sm-6">
                <label for="site">Site:</label>  <label class="text-danger"></label>
                <input name="site" type="text" class="form-control" id="site" placeholder="https://example.com/users/"/>
            </div>
        </div>
      </div>
       
      
       <label for="facebook">Complete sua URL</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://facebook.com/</span>
  </div>
    <input type="text" class="form-control" id="facebook" aria-describedby="basic-addon3" name="facebook">
</div> 
              <label for="youtube">Complete sua URL</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://youtube.com/</span>
  </div>
    <input type="text" class="form-control" id="youtube" aria-describedby="basic-addon3" name="youtube">
</div> 
      
            <label for="instagram">Complete sua URL</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
  </div>
    <input type="text" class="form-control" id="instagram" aria-describedby="basic-addon3" name="instagram">
</div> 
     
       
<!--      <div class="h4 mt-5">Tenha em mente em UM produto ou serviço para cada solução que você tem! Para cada tipos de pessoas! </div>
          <div class="form-group">
            <label for="descricao">Breve descrição do seu nicho:</label> 
           
            <a href="https://viverdeblog.com/nicho-de-mercado/" target="_blank" class="text-info" >ajuda?</a> 
 <div class="h5">o seu possivel cliente (generalizar - aqueles mais procurados) ,tem uma dor que encaixe na sua solução?</div>
 <textarea class="form-control" name="descricao" type="text" id="descricao" rows="15" placeholder="crie no maximo em 140 caracteres"></textarea>
        </div>

           <div class="form-group">
            <label for="chamada">Breve Chamada pra atrair clientes:</label> 
 <div class="h5">Diferencie-se dos seus concorrentes, qual são as suas particulariedades?</div>
            <textarea class="form-control" name="chamada" type="text" id="chamada" rows="15"></textarea>
        </div>
       
      precisa ver como fica no banco de dados
        <div class="form-group">
            <label for="chamada">Conte com provas concretas ou evidencias de seus resultados:</label> 
            <div class="h5">Fotos,videos, comentarios</div><div class="h6">coloque os link onde estão.</div>
            <textarea class="form-control" name="prova" type="text" id="chamada" rows="15"></textarea>
        </div>-->
       
<!--        <div class="well">
            <div class="form-group">
                <label for="arquivo1">Adicionar UMA Foto da "logo" ou da frente da Loja "placa"</label>
                <input name="arquivo1" type="file" />
                <label>Somente tipo de arquivo de JPEG, PNG E JPG</label>
            </div>

        </div>-->
       

       
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
    <div class="row">
      <div class="form-group">
            <button type="submit" class="btn btn-primary upload" >Cadastrar</button> 


        </div>
     <script type="text/javascript">
  
     

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


<!-- Modal tipo de ramo  id=modaltiporamo-->
<div class="modal fade" id="modaltiporamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar tipo de Ramo de Atividade!</h5>
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