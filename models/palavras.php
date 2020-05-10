<?php

class palavras extends model {

    public function cadastrarPalavra($palavra) {
        try {
            $sql = "INSERT INTO palavras_buscadas (palavra_buscada_nome) VALUES (:palavra)";
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
            $sql = "SELECT * FROM lojas WHERE loja_nome_fantasia LIKE :palavra";
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

            $sql = "INSERT INTO palavras_buscadas SET palavra_buscada_nome=:palavra,data_cadastro=now()";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                
            }

            $array = array();
            $sql = "SELECT * FROM produtos LEFT JOIN lojas ON lojas.id_loja=produtos.lojas_id_loja" 
                     
                     ."LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                     ."LEFT JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                      ."LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                      ."LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                      ."LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                      ."LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                      ."LEFT JOIN palavraschaves p ON p.lojas_id_loja=lojas.id_loja"
                    ." LEFT JOIN subcategorias_prod ON id_subcategoria_prod=subcategorias_prod_id_subcategoria_prod"
                     ." LEFT JOIN categorias_prod ON id_cat_prod=categorias_prod_id_cat_prod"
." WHERE (palavra_chave_nome LIKE :palavra OR produto_nome LIKE :palavra OR subcategoria_nome LIKE :palavra)AND lojas_anunciar = '1' AND lojas_situacao='0'" 
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
