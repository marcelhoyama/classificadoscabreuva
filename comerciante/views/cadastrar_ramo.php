
<title>Cadastrar Ramo </title>


<div class="container">
    
    <div class="text-center h3">Cadastrar tipo de ramo</div>
   
    <form id="cadastrarfuncionamento" method="POST" enctype="multipart/form-data">
          
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
        
         <?php  $lojas=$viewData['lojacliente'];?>
        
        
        
        <div class="row">
            
                <label>Tipo de Ramo: </label>
                <input name="ramo" class="form-control" type="text">
                
                
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
<!--        <div class="row">
            
        <div class="control-group col-sm">
               
                 
                 
                   <label for="">Qual comercio/serviço?</label> <label class="text-danger"></label></br>
                   <select name="id_loja">             
  <?php foreach ($lojas as $loja) { ?>
     <option value='<?php echo $loja['id_loja'];?>' ><?php echo $loja['nome_fantasia'];?></option>    
                 <?php  }?>
                  
                    
                   </select>
        </div>

        </div>
    
  
      <br>
      <?php $semana=$viewData['listaSemana'];?>
                     
                         <label for="status">Semana de funcionamento:</label> <label class="text-danger"></label></br>
              
                         <form>
         <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_domingo_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
        <select name="hora_domingo_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class="mr-sm-2">
        <input type="checkbox" class="" name="domingo"  value="7">
        <label class="label" for="customControlAutosizing">domingo</label>
      </div>
    </div> 
         </div>
                         
                         
<div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_segunda_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_segunda_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class=" mr-sm-2">
        <input type="checkbox" class="" name="segunda"  value="1">
        <label class="label" for="customControlAutosizing">Segunda</label>
      </div>
    </div>
</div>    
            

                             <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_terca_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_segunda_fim"class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class="mr-sm-2">
        <input type="checkbox" class="" name="terca" value="2">
        <label class="label" for="customControlAutosizing">Terça</label>
      </div>
    </div>
</div> 
                             
                             <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_quarta_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_quarta_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class=" mr-sm-2">
        <input type="checkbox" class="" name="quarta" id="status" value="3">
        <label class="label" for="customControlAutosizing">Quarta</label>
      </div>
    </div>
</div> 
                             
                             <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_quinta_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_quinta_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class="mr-sm-2">
        <input type="checkbox" class="" name="quinta" id="status" value="4">
        <label class="label" for="customControlAutosizing">Quinta</label>
      </div>
    </div>
</div> 
                             
                             <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_sexta_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_sexta_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class=" mr-sm-2">
        <input type="checkbox" class="" name="sexta" id="status" value="5">
        <label class="label" for="customControlAutosizing">Sexta</label>
      </div>
    </div>
</div> 
                             
                             
                             <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 " for="inlineFormCustomSelect">Inicio</label>
      <select name="hora_sabado_inicio" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
        <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      
      </select>
    </div>
      <div class="col-auto my-1">
        <label class="mr-sm-2 " for="inlineFormCustomSelect">Fim</label>
      <select name="hora_sabado_fim" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Escolher...</option>
              <option >00:00</option>
        <option >00:30</option>
        <option >01:00</option>
        <option >01:30</option>
        <option >02:00</option>
        <option >02:30</option>
        <option >03:00</option>
        <option >03:30</option>
        <option >04:00</option> 
        <option >04:30</option>
        <option >05:00</option> 
        <option >05:30</option>
        <option >06:00</option>
        <option >06:30</option>
        <option >07:00</option>
        <option >07:30</option>
        <option >08:00</option>
        <option >08:30</option>
        <option >09:00</option>
        <option >09:30</option>
        <option >10:00</option> 
        <option >10:30</option>
        <option >11:00</option> 
        <option >11:30</option>
        <option >12:00</option>
        <option >12:30</option>
        <option >13:00</option>
        <option >13:30</option>
        <option >14:00</option>
        <option >14:30</option>
        <option >15:00</option>
        <option >15:30</option>
        <option >16:00</option> 
        <option >16:30</option>
        <option >17:00</option> 
        <option >17:30</option>
        <option >18:00</option>
        <option >18:30</option>
        <option >19:00</option>
        <option >19:30</option>
        <option >20:00</option>
        <option >20:30</option>
        <option >21:00</option>
        <option >21:30</option>
        <option >22:00</option> 
        <option >22:30</option>
        <option >23:00</option> 
        <option >23:30</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <div class=" mr-sm-2">
        <input type="checkbox" class="" name="sabado" id="status" value="6">
        <label class="label" for="customControlAutosizing">Sabádo</label>
      </div>
    </div>
</div> 
        <div class="form-group">
            <button type="submit" class="btn btn-primary upload" >Cadastrar</button> 


        </div>
                              </form>
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
             </script>-->
 </form>
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
   


