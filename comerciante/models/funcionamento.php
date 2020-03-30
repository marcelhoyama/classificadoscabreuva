<?php

class funcionamento extends model {

   

    public function listaSemana() {
        try {
            $total = array();
            $sql = "SELECT * FROM dia_semana ";
            $sql = $this->db->prepare($sql);
       
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetchAll();
                return $total;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }
    
    public function funcionamentoLoja($id_loja) {
        try{
            $array=array();
            $sql="SELECT * from loja inner join dia_semana hora on loja.id_loja=hora.id_loja Where loja.id_loja=:id_loja";
            
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
    
    public function cadastrar($id_loja,$descricao_func) {
        try{
            $sql="INSERT INTO dia_semana SET id_loja=:id_loja,nome=:descricao_func  ";
            $this->db->prepare($sql);
            $sql->bindValue(':id_loja',$id_loja);
            $sql->bindValue(':descricao_func',$descricao_func);
            $sql->execute();
            if($sql->rowCount()>0){
                
            }else{
                return "Não foi possivel salvar, verifique os campos !";
            }
                    
        } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
        }
    }

}
