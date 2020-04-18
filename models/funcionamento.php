<?php

class funcionamento extends model {

   

    public function listaSemana() {
        try {
            $total = array();
            $sql = "SELECT * FROM dia_semana ";
            $sql = $this->db->prepare($sql);
       
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $total;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }
    
    public function funcionamentoLoja($id_loja) {
        try{
            $array=array();
            $sql="SELECT funcionamento from loja Where id_loja=:id_loja";
            
             $sql = $this->db->prepare($sql);
     $sql->bindValue(':id_loja',$id_loja);      
            $sql->execute();
            if ($sql->rowCount() > 0) {
            $array=$sql->fetch(PDO::FETCH_ASSOC);
            return $array;
            }
        } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
        }
    }
    
    public function cadastrar($id_loja, $hinicioSegunda='', $hfinalSegunda='', $hinicioTerca='', $hfinalTerca='', $hinicioQuarta='', $hfinalQuarta='', $hinicioQuinta='', $hfinalQuinta=''
                    , $hinicioSexta='', $hfinalSexta='', $hinicioSabado='', $hfinalSabado='', $hinicioDomingo='', $hfinalDomingo='', $ckSegunda='', $ckTerca='', $ckQuarta='', $ckQuinta=''
                    , $ckSexta='', $ckSabado='', $ckDomingo='') {
        try{
            
            
            if(!empty($ckDomingo)){
            $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckDomingo);
                $sql->bindValue(':inicio',$hinicioDomingo);
                   $sql->bindValue(':final',$hfinalDomingo);
            $sql->execute();
            }
            if(!empty($ckSegunda)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckSegunda);
                $sql->bindValue(':inicio',$hinicioSegunda);
                   $sql->bindValue(':final',$hfinalSegunda);
            $sql->execute();
            }
            if(!empty($ckTerca)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckTerca);
                $sql->bindValue(':inicio',$hinicioTerca);
                   $sql->bindValue(':final',$hfinalTerca);
            $sql->execute();
            }
            
            if(!empty($ckQuarta)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckQuarta);
                $sql->bindValue(':inicio',$hinicioQuarta);
                   $sql->bindValue(':final',$hfinalQuarta);
            $sql->execute();
            }
            
            if(!empty($ckQuinta)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckQuinta);
                $sql->bindValue(':inicio',$hinicioQuinta);
                   $sql->bindValue(':final',$hfinalQuinta);
            $sql->execute();
            }
            
            if(!empty($ckSexta)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckSexta);
                $sql->bindValue(':inicio',$hinicioSexta);
                   $sql->bindValue(':final',$hfinalSexta);
            $sql->execute();
            }
            
            if(!empty($ckSabado)){
             $sql="INSERT INTO hora_func SET id_loja=:id_loja, id_dia_semana=:id_dia_semana,hora_inicio=:inicio,hora_fim=:final";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':id_dia_semana',$ckSabado);
                $sql->bindValue(':inicio',$hinicioSabado);
                   $sql->bindValue(':final',$hfinalSabado);
            $sql->execute();
            }
            
        if($sql->rowCount()>0){
         
                return $id_loja;
        }  
                    
        } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
        }
    }
    
    
    public function cadastrarSegunda($id_loja,$escolheu, $hinicio='', $hfinal='') {
        try{
            
            $sql="SELECT * FROM funcionamento WHERE semana=:semana AND id_loja=:id_loja AND hora_inicio=:inicio AND hora_final=:final";
            $sql= $this->db->prepare($sql);
            $sql->bindValue('semana',$escolheu);
            $sql->bindValue('inicio',$hinicio);
            $sql->bindValue('final',$hfinal);
            $sql->bindValue('id_loja',$id_loja);
            $sql->execute();
            if ($sql->rowCount() >0){
                return 'Esse horario e dia já existe!'.$escolheu."/".$hinicio."/".$hfinal;
           exit;
                }
            
             $sql="INSERT INTO funcionamento SET semana=:semana, hora_inicio=:inicio,hora_final=:final,id_loja=:id_loja";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':semana',$escolheu);
                $sql->bindValue(':inicio',$hinicio);
                   $sql->bindValue(':final',$hfinal);
            $sql->execute();
            
            
        if($sql->rowCount()>0){
         
                  header("Location:".BASE_URL."menuprincipal_loja");
                        exit;
        } else{
            return $erro;
        } 
                    
        } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
        }
    }

    
    
    public function cadastrarArray($id_loja,$escolheu, $hinicio='', $hfinal='') {
        try{
            
            $sql="SELECT * FROM funcionamento WHERE semana=:semana AND id_loja=:id_loja AND hora_inicio=:inicio AND hora_final=:final";
            $sql= $this->db->prepare($sql);
            $sql->bindValue('semana',$escolheu);
            $sql->bindValue('inicio',$hinicio);
            $sql->bindValue('final',$hfinal);
            $sql->bindValue('id_loja',$id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0){
                return 'Esse horario e dia já existe !'.$escolheu."/".$hinicio."/".$hfinal;
           exit;
                }
            
            
             $sql="INSERT INTO funcionamento SET semana=:semana, hora_inicio=:inicio,hora_final=:final,id_loja=:id_loja";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(':id_loja',$id_loja);
             $sql->bindValue(':semana',$escolheu);
                $sql->bindValue(':inicio',$hinicio);
                   $sql->bindValue(':final',$hfinal);
            $sql->execute();
            
         
        if($sql->rowCount()>0){
         
             header("Location:".BASE_URL."menuprincipal_loja");
                        exit;
        }else{
            return $erro;
        }  
                    
        } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
        }
    }
    
    public function verificarSemanaHora($escolheu,$hinicio,$hfinal,$id_loja) {
        try{
            $sql="SELECT * FROM funcionamento WHERE semana=:semana AND id_loja=:id_loja AND hora_inicio=:inicio AND hora_final=:final";
            $sql= $this->db->prepare($sql);
            $sql->bindValue('semana',$escolheu);
            $sql->bindValue('inicio',$hinicio);
            $sql->bindValue('final',$hfinal);
            $sql->bindValue('id_loja',$id_loja);
            $sql->execute();
            if ($sql->rowCount() ==0){
                return 'Esse horario e dia já existe!';
           exit;
                }
        } catch (Exception $ex) {
echo "Falhou:" . $ex->getMessage();
        }
    }

    public function cadastrarFunc($id_loja,$funcionamento) {
        try{
          
             $sql="UPDATE loja SET funcionamento=:funcionamento WHERE id_loja=:id_loja";
            $sql= $this->db->prepare($sql);
            $sql->bindValue(':funcionamento',$funcionamento);
         
            $sql->bindValue(':id_loja',$id_loja);
            $sql->execute();
            if ($sql->rowCount() >0){
              
           
                }else{
                    return 'Confira o campo, tente novamente';
                }
        } catch (Exception $ex) {
echo "Falhou:" . $ex->getMessage();
        }
    }
}
