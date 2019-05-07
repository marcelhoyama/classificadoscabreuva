<?php

class palavras_buscada extends model {

    public function cadastrarPalavra($palavra) {
        try {
            $sql = "INSERT INTO palavras_buscada SET (palavra) VALUES (:palavra)";
            $sql->$this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return TRUE;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function buscarLoja($palavra) {
        try{
            $array=array();
            $sql="SELECT * FROM loja WHERE nome LIKE :palavra";
            $sql->$this->db->prepare($sql);
            $sql->bindValue(":palavra",$palavra."%");
            $sql->execute();
            if($sql->rowCount()>0){
               $array=$sql->fetchAll();
                return $array;
            }
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
        
    }
    
    public function buscarPalavra($palavra) {
        try{
            $array=array();
            $sql="SELECT * FROM loja WHERE palavra_chave1 LIKE :palavra OR palavra_chave2 LIKE :palavra";
            $sql->$this->db->prepare($sql);
            $sql->bindValue(":palavra",$palavra."%");
            $sql->execute();
            if($sql->rowCount()>0){
                
                $array=$sql->fetchAll();
                return $array;
            } elseif (true) {
                        
                buscarLoja($palavra);
            }else{
                cadastrarPalavra($palavra);
            }
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();        }
    }
    
}
