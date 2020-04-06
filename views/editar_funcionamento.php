
<title>Horário de Funcionamento</title>


<div class="container">
    <br>
    <div class="text-center h3 mt-5">Editar - Horário de Funcionamento</div>
   
    <form id="cadastrarfuncionamento" method="POST" enctype="multipart/form-data">
          
      
        
       
        
            
       
               
                
            
        <label class="text-center">Descreva seu horario de funcionamento: </label>
            
           <?php $semana=$viewData['funcionamentoLoja'];?>
            
           
                <div class="row"> 
        
             
             
             
       <div class="col"> 
             
            <div class="form-row align-items-center">
  
        <input type="text" name="funcionamento" class="form-control"value="<?php echo $semana['funcionamento'];?>"/>
                   
          
             
       
  
      
            <button type="submit" class="btn btn-primary ">Atualizar</button>
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