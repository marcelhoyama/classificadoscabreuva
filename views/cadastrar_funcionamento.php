
<title>Horário de Funcionamento</title>


<div class="container">
    
    <div class="text-center h3">Horário de Funcionamento</div>
   
    <form id="cadastrarfuncionamento" method="POST" enctype="multipart/form-data">
          
        
   
        
         <?php  $lojas=$viewData['lojacliente'];?>
        
        
        
        <div class="row">
            
                <label>Descreva seu horario de funcionamento: </label>
                     
             
       <div class="col"> 
             
            <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="" for="inlineFormInput">Hora Inicio:</label>
      <input type="time" class="form-control mb-2" id="inlineFormInput" name="hinicioSegunda" >
    </div>
    <div class="col-auto">
      <label class="" for="inlineFormInputGroup">Hora Final:</label>
       
        <input type="time" class="form-control mb-2" id="inlineFormInputGroup" name="hfinalSegunda" >
      </div>
   
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Segunda">
        <label class="form-check-label" for="autoSizingCheck">
       Segunda
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
        <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="ck[]" value="Domingo">
        <label class="form-check-label" for="autoSizingCheck">
       Domingo
        </label>
      </div>
    </div>
                   
             </div> 
         </div> 
                
            
           
        </div>
            

        <input type="text" name="id_loja" value='<?php echo $lojas['id_loja'];?>' >   
                
                  
                    
                   </select>
     
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
   

</div>
