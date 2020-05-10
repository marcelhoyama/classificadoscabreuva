<?php

class funcionamento extends model {

   

    public function listaSemana() {
        try {
            $total = array();
            $sql = "SELECT * FROM semanas ";
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
            $sql="SELECT * from lojas LEFT JOIN funcionamentos f ON lojas.id_loja=f.lojas_id_loja"
                    . " LEFT JOIN funcionamentos_has_semanas fs ON fs.funcionamentos_id_funcionamento=f.id_funcionamento "
                    . " LEFT JOIN semanas ON semanas.id_semana=fs.semanas_id_semana"
                    . " LEFT JOIN intervalos ON intervalos.funcionamentos_id_funcionamento=f.id_funcionamento  Where id_loja=:id_loja";
            
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
    
   

    
    public function cadastrarFunc($id_loja,$funcionamento) {
        try{
          
             $sql="UPDATE lojas SET funcionamento=:funcionamento WHERE id_loja=:id_loja";
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
