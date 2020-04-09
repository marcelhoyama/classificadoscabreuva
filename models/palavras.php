<?php

class palavras extends model {

    public function cadastrarPalavra($palavra) {
        try {
            $sql = "INSERT INTO palavras_buscadas (palavra) VALUES (:palavra)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra);
            $sql->execute();
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function buscarLoja($palavra) {
        try {

            $array = array();
            $sql = "SELECT * FROM loja WHERE nome LIKE :palavra";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra . "%");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function buscarPalavra($palavra) {
        try {

            $sql = "INSERT INTO palavras_buscadas SET palavra=:palavra,data=now()";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                
            }

            $array = array();
            $sql = "SELECT * FROM loja inner JOIN ramo ON ramo.id_ramo=loja.ramo" 
." INNER JOIN palavra_chave p ON p.id_loja=loja.id_loja"
." WHERE (loja.palavrachave LIKE :palavra OR loja.nome_fantasia LIKE :palavra OR ramo.nome LIKE :palavra OR p.pchave_nome LIKE :palavra)AND anuncio_site = '1' AND loja.status='0'" 
." GROUP BY loja.id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra . "%");
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    
    
    
}
