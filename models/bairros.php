<?php

class bairros extends model {

    public function listarBairros() {
        try {
            $array = array();
            $sql = "SELECT * FROM bairros ORDER BY bairro_nome";

            //  $sql = "SELECT * FROM bairros b INNER JOIN loja_has_bairros lb ON b.id_bairro=lb.id_bairros GROUP BY b.id_bairro";
            $sql = $this->db->prepare($sql);

            $sql->execute();

            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function getBairro($bairro) {
        try {

            $array = array();
            $sql = "SELECT * ,loja.funcionamento FROM lojas"
                    . " LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                    . " left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                    . " LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                    . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                    . " LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades WHERE loja.status =0 AND loja.anuncio_site=1 AND b.id_bairro=:bairro";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':bairro', $bairro);

            $sql->execute();
            if ($sql->rowCount() > 0) {


                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function cadastrarBairro($bairro,$cidade) {
        try {

//remove acentos,numero,virgula, espaço por traço e tudo minusculo
            //    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
            $bairro = ucfirst(trim(strtolower($bairro)));
            $sql = "INSERT INTO bairros SET bairro_nome=:bairro ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':bairro', $bairro);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                
            } else {
                return "Não foi possivel cadastrar, verifique o campo!";
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function pesquisarBairro($palavra) {
        try {
            $array = array();
            $sql = "SELECT bairro_nome FROM lojas "
                    . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                     ." LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                      ." LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                     ." WHERE bairro LIKE :palavra";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra . "%");
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

   

    public function slugNotRepetir($titulo, $id_loja) {
        try {
            if (isset($titulo) && !empty($titulo)) {

                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                $sql = "SELECT loja_slug FROM lojas WHERE loja_slug='$slug' AND id_loja !='$id_loja' ";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                if ($sql->rowCount() == 0) {



                    return $slug;
                }
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarClientes() {

        try {
            $sql = "SELECT * FROM clientes INNER JOIN lojas ON lojas.clientes_id_clientes=clientes.id_clientes";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarCliente($id) {
        $array = array();
        try {
            $sql = "SELECT * FROM clientes WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function getName($id) {

        try {
            $sql = "SELECT cliente_nome FROM clientes WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();
                $nome = $array['cliente_nome'];
                return $nome;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarPorRamo() {
        try {
            $array = array();
            $sql = "SELECT * FROM ramos ORDER BY ramos_nome ASC";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function buscarLoja($palavra) {
        try {


            $array = array();
            echo $sql = "SELECT * FROM lojas WHERE loja_nome_fantasia LIKE '%$palavra%'";
            $sql = $this->db->prepare($sql);

            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            } else {
                echo 'nao foi';
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarLojas() {
        $array = array();
        $sql = "SELECT * FROM lojas "
                . " LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                      ."left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                      ."LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                      ."LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                      ."LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                     ." LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades WHERE loja_situacao =0 AND loja_anunciar=1 ";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        }
        //verificar arquivo
    }

    public function getDados($id_loja) {
        try {
            $array = array();
            $sql = "SELECT * FROM lojas l LEFT JOIN url_imagens_lojas u ON l.id_loja= u.lojas_id_loja "
                         . "WHERE l.id_loja=:id_loja GROUP BY l.id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function totalFotos($id_loja) {
        try {

            $sql = "SELECT COUNT(lojas_id_loja)as total FROM url_imagens_loja WHERE lojas_id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetch();
                return $total['total'];
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listarFotos($id_loja) {
        try {
            $total = array();
            $sql = "SELECT * FROM url_imagens_lojas WHERE lojas_id_loja=:id_loja ORDER BY id_imagem_loja ASC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $total = $sql->fetchAll();
                return $total;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

}
