
<title>Horário de Funcionamento</title>


<div class="container">
    <br>
    <div class="text-center h3 mt-5">Editar - Horário de Funcionamento</div>
   
    <form id="cadastrarfuncionamento" method="POST" enctype="multipart/form-data">
          
      
        
       
        <div class="row">
            
       
               
                
            
             <label>Descreva seu horario de funcionamento: </label>
            
           <?php print_r($semana=$viewData['funcionamentoLoja']);?>
            
             <?php foreach ($semana as $value) { ?>
                 
        
             <?php echo $value['hora_inicio'];?>
             
             
       <div class="col"> 
             
            <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioSegunda" value="<?php echo $value['hora_inicio'];?>" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalSegunda" value="<?php echo $value['hora_final'];?>" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="<?php echo $value['semana'];?>"   <?php ($value['semana']==$value['semana'])?'checked=""':''; ?>>
        <label class="form-check-label" for="autoSizingCheck">
       <?php echo $value['semana'];?>
        </label>
      </div>
    </div>
                   
             </div> 
             
             
             
             
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioTerca" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalTerca" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Terça">
        <label class="form-check-label" for="autoSizingCheck">
       Terça
        </label>
      </div>
    </div>
                   
             </div> 
             
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioQuarta" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalQuarta" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Quarta">
        <label class="form-check-label" for="autoSizingCheck">
       Quarta
        </label>
      </div>
    </div>
                   
             </div> 
             
             
             
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioQuinta" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalQuinta" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Quinta">
        <label class="form-check-label" for="autoSizingCheck">
       Quinta
        </label>
      </div>
    </div>
                   
             </div> 
             
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioSexta" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalSexta" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Sexta">
        <label class="form-check-label" for="autoSizingCheck">
       Sexta
        </label>
      </div>
    </div>
                   
             </div> 
             
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioSabado" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalSabado" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Sabado">
        <label class="form-check-label" for="autoSizingCheck">
       Sabádo
        </label>
      </div>
    </div>
                   
             </div> 
                <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioDomingo" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalDomingo" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Domingo"  <?php ($value['semana']=='Domingo')?'checked':''; ?>>
        <label class="form-check-label" for="autoSizingCheck">
       Domingo
        </label>
      </div>
    </div>
                   
             </div> 
         </div> 
             
          <?php   }?>
         
            <?php ($semana['semana']=='Domingo')?'value="Domingo" checked':''; ?>
            
            
               
       


      
            <button type="submit" class="btn btn-primary">Atualizar</button>
             </div>
          </form>
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
   
        

  
</div>