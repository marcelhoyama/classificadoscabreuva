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
            $sql = "SELECT * FROM loja  WHERE (loja.palavrachave LIKE :palavra OR loja.nome_fantasia LIKE :palavra)AND anuncio_site = '1' AND loja.status='0' ORDER BY loja.nome_fantasia";
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
