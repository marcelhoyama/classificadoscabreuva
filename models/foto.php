<?php

class foto extends model {

    public function excluirFoto($id) {
        $id_imovel = 0;
        $url_imagem = 0;
        try {
            $sql = "SELECT * FROM url_imagens WHERE id_url_imagens='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_loja = $row['loja_id_loja'];
                $url_imagem = $row['url'];
            }


            $sql = "DELETE FROM url_imagens WHERE id_url_imagens='$id'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
            }
            if (is_file("upload/" . $url_imagem)) {

                unlink("upload/" . $url_imagem);
            }

            return $id_loja;
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function excluirFotoPrincipal($id) {
        $id_loja = 0;
        $url_principal = 0;
        try {
            $sql = "SELECT * FROM loja WHERE id_loja='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_loja = $row['id_loja'];
                $url_principal = $row['url_imagem_principal'];
            }


            $sql = "UPDATE loja SET url_imagem_principal=NULL WHERE id_loja='$id_loja'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
            }
            if (is_file("upload/fotos_principais/" . $url_principal)) {

                unlink("upload/fotos_principais/" . $url_principal);
            }

            return $id_loja;
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listFotos($id_loja) {
        try {
            $array = array();
            $sql = "SELECT * FROM url_imagens WHERE id_loja='$id_imovel' ORDER BY id_url_imagens ASC";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
            }
            return $array;
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function listFotosLoja($id_loja) {
        try {
            $array = array();
            $sql = "SELECT COUNT(url) as total FROM url_imagens WHERE id_url_imagens='$id_loja' ";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
            return $array;
        } catch (Exception $e) {
            echo "Falhou:" . $e->getMessage();
        }
    }

    public function listFotoPrincipal($id_loja) {
        try {
            $array = array();
            $sql = "SELECT id_loja,url_imagem_principal FROM loja WHERE id_loja='$id_loja' ";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_ASSOC);
            }
            return $array;
        } catch (Exception $e) {
            echo "Falhou:" . $e->getMessage();
        }
    }

//    public function listFotosPrincipaisLoja() {
//        try {
//            $array = array();
//            $sql = "SELECT f.id_imovel,f.url_principal,i.id_venda,i.id_aluguel,i.tipo_imovel,i.area_total FROM fotos f "
//                    . "join imoveis i ON i.id=f.id_imovel  WHERE url_principal AND id_venda IS NOT NULL  ";
//            $sql = $this->db->query($sql);
//            if ($sql->rowCount() > 0) {
//                $array = $sql->fetchAll();
//            }
//            return $array;
//        } catch (Exception $e) {
//            echo "Falhou:" . $e->getMessage();
//        }
//    }

    public function getTotal($id_loja) {
        try {

            $sql = "SELECT COUNT(url_imagens.url) as c FROM url_imagens WHERE loja_id_loja='$id_loja'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
            }
            return $sql['c'];
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }



    public function enviarUrlPrincipalImagem($id_loja, $foto) {
        try {

            //aqui eh tratar o nome das fotos enviados
            //se contagem as fotos for maior de 0 faça que o nome do arquivo seja mudado com o tempo(relogio) crie criptografia randomica
            // e salve no diretorio upload   com o comando especifico do PHP

            if (!empty($foto['tmp_name'][0])) {



                $tipo = $foto['type'];

                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                    $diretorio = "upload/fotos_principais/";

                    move_uploaded_file($foto['tmp_name'], $diretorio . $tmpname);


                    list($width_orig, $height_orig) = getimagesize($diretorio . $tmpname);
                    $ratio = $width_orig / $height_orig;
                    $width = 500;
                    $height = 500;
                    if ($width / $height > $ratio) {
                        $width = $height + $ratio;
                    } else {
                        $height = $width / $ratio;
                    }

                    $img = imagecreatetruecolor($width, $height);
                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg($diretorio . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng($diretorio . $tmpname);
                    }

                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, $diretorio . $tmpname, 80);
                    $sql = "UPDATE loja SET url_imagem_principal='$tmpname' WHERE id='$id_loja'";

                    $sql = $this->db->query($sql);
                    if ($sql->rowCount() > 0) {
                        return "Enviado com Sucesso!";
                    } else {

                        return false;
                    }
                }
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

}
