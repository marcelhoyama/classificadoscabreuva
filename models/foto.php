<?php

class foto extends model {

    public function excluirFotoImagens($id_loja,$id_url,$url) {
       
        try {
     
            
            $sql = "DELETE FROM url_imagens WHERE id_url_imagens='$id_url' AND url='$url'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
            
            if (is_file("upload/ambiente/" . $url)) {

                unlink("upload/ambiente/" . $url);
            }
            }
             header("Location:" . BASE_URL . "cadastrar_foto?id_loja=" . $id_loja);
        exit;
        
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function excluirFotoPrincipal($id) {
        $id_loja = 0;
        $url_principal = 0;
        try {
            $sql = "SELECT id_loja,url_imagem_principal FROM loja WHERE id_loja='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_loja = $row['id_loja'];
                $url_principal = $row['url_imagem_principal'];
            }


            $sql = "UPDATE loja SET url_imagem_principal=NULL WHERE id_loja='$id_loja'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
            
            if (is_file("upload/fotos_principais/" . $url_principal)) {

                unlink("upload/fotos_principais/" . $url_principal);
            }
           
            }
           
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

        public function excluirFotoEquipe($id) {
//        $id = 0;
//        $url = 0;
        try {
            $sql = "SELECT id, url FROM "
                    . "loja INNER JOIN url_equipes ON loja.id_loja=url_equipes.loja_id_loja WHERE loja.id_loja='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
            echo'id'.    $id = $row['id'];
            echo 'url'.   $url = $row['url'];
           
            }


            $sql = "DELETE FROM url_equipes WHERE id='$id'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
         
            if (is_file("upload/equipes/" . $url)) {

                unlink("upload/equipes/" . $url);
            }
           
            }
           
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }
    
    
        public function excluirFotoProduto($id) {
        $id_produto = 0;
        $produto_imagem = 0;
        try {
            $sql = "SELECT id_produtos,produto_imagem FROM produtos WHERE id_produtos='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_produto = $row['id_produtos'];
                $produto_imagem = $row['produto_imagem'];
            }


            $sql = "UPDATE produtos SET produto_imagem=NULL WHERE id_produtos='$id_produto'";

            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                
            
            if (is_file("assets/images/produtos/" . $produto_imagem)) {

                unlink("assets/images/produtos//" . $produto_imagem);
            }
           
            }
           
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
            $sql = "SELECT url_imagem_principal FROM loja WHERE id_loja='$id_loja' ";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
            return $array;
        } catch (Exception $e) {
            echo "Falhou:" . $e->getMessage();
        }
    }

    
       public function listFotosAmbiente($id_loja) {
        try {
            
            
            $array = array();
            $sql = "SELECT *,loja_id_loja,url FROM url_imagens INNER JOIN loja ON loja.id_loja=url_imagens.loja_id_loja WHERE url_imagens.loja_id_loja=$id_loja ";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            return $array;
        } catch (Exception $e) {
            echo "Falhou:" . $e->getMessage();
        }
    }
    
        public function listFotoEquipe($id_loja) {
        try {
            
            
            $array = array();
            $sql = "SELECT url_equipes.loja_id_loja,url_equipes.url FROM url_equipes INNER JOIN loja ON loja.id_loja=url_equipes.loja_id_loja WHERE loja.id_loja=:id_loja ";
              $sql = $this->db->prepare($sql);

                    $sql->bindValue(":id_loja", $id_loja);
                   
                    $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
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



    public function cadastrarUrlPrincipalImagem($id_loja, $foto,$fotos, $fotos2) {
        try {
           
         
//            $sql = "SELECT id_loja,url_imagem_principal FROM loja WHERE id_loja='$id_loja'";
//            $sql = $this->db->query($sql);
//            if ($sql->rowCount() > 0) {
//                $row = $sql->fetch();
//                $id_loja = $row['id_loja'];
//                $url_principal = $row['url_imagem_principal'];
            

//
//            $sql = "UPDATE loja SET url_imagem_principal=NULL WHERE id_loja='$id_loja'";
//
//            $sql = $this->db->query($sql);
//            if ($sql->rowCount() > 0) {}
//                
            
//            if (is_file("upload/fotos_principais/" . $url_principal)) {
//
//                unlink("upload/fotos_principais/" . $url_principal);
//            }
            if(isset($foto)){
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
// tem que liberar ou comentar no php configuração "extensaõ  gd ou gd2" 
                    $img = imagecreatetruecolor($width, $height);
                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg($diretorio . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng($diretorio . $tmpname);
                    }
    
                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, $diretorio . $tmpname, 80);
                    $sql = "UPDATE loja SET url_imagem_principal='$tmpname' WHERE id_loja='$id_loja'";

                    $sql = $this->db->query($sql);
                    
                    
                }
              }
            }
                    
                    
                   if(isset($fotos)){ 
                    
                         if (count($fotos) > 0) {

                        for ($q = 0; $q < count($fotos['tmp_name']); $q++) {

                            $tipo2 = $fotos['type'][$q];


                            if (in_array($tipo2, array('image/jpeg', 'image/png'))) {

                                $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                $diretorio = "upload/ambiente/";

                                move_uploaded_file($fotos['tmp_name'][$q], $diretorio . $tmpname);

                                list($width_orig, $height_orig) = getimagesize($diretorio . $tmpname);
                                $ratio = $width_orig / $height_orig;
//limite permitido proporcional
                                $width = 960;
                                $height = 720;
                                if ($width / $height > $ratio) {
                                    $width = $height + $ratio;
                                } else {
                                    $height = $width / $ratio;
                                }

                                $img = imagecreatetruecolor($width, $height);
                                if ($fotos['type'][$q] == 'image/jpeg') {
                                    $origi = imagecreatefromjpeg($diretorio . $tmpname);
                                } elseif ($tipo2 == 'image/png') {
                                    $origi = imagecreatefrompng($diretorio . $tmpname);
                                }

                                imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                                imagejpeg($img, $diretorio . $tmpname, 80);

                                $sql = "INSERT INTO url_imagens SET loja_id_loja='$id_loja', url='$tmpname'";

                                $sql = $this->db->query($sql);
                               
                            }
                        }
                    }
                    
                   }
                      
                   if(isset($fotos2)){
                         if (!empty($fotos2['tmp_name'][0])) {

                          
                $tipo = $fotos2['type'];

                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                    $diretorio = "upload/equipes/";

                    move_uploaded_file($fotos2['tmp_name'], $diretorio . $tmpname);
  

                    list($width_orig, $height_orig) = getimagesize($diretorio . $tmpname);
                    $ratio = $width_orig / $height_orig;
                    $width = 500;
                    $height = 500;
                    if ($width / $height > $ratio) {
                        $width = $height + $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
// tem que liberar ou comentar no php configuração "extensaõ  gd ou gd2" 
                    $img = imagecreatetruecolor($width, $height);
                    if ($tipo == 'image/jpeg') {
                        $origi = imagecreatefromjpeg($diretorio . $tmpname);
                    } elseif ($tipo == 'image/png') {
                        $origi = imagecreatefrompng($diretorio . $tmpname);
                    }
    
                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($img, $diretorio . $tmpname, 80);
                    $sql = "INSERT url_equipes SET url='$tmpname',loja_id_loja='$id_loja'";

                    $sql = $this->db->query($sql);
                                if ($sql->rowCount() > 0) {
                                    //return true;
                                } else {
                                    //return FALSE;
                                }
                            }
                        }
                    
                   }
                return TRUE;
            
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }


    
    
    public function cadastrarImagemAmbiente($fotos) {
        
        
        
             if (count($fotos) > 0) {

                        for ($q = 0; $q < count($fotos['tmp_name']); $q++) {

                            $tipo2 = $fotos['type'][$q];


                            if (in_array($tipo2, array('image/jpeg', 'image/png'))) {

                                $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                $diretorio = "upload/ambiente";

                                move_uploaded_file($fotos['tmp_name'][$q], $diretorio . $tmpname);

                                list($width_orig, $height_orig) = getimagesize($diretorio . $tmpname);
                                $ratio = $width_orig / $height_orig;
//limite permitido proporcional
                                $width = 900;
                                $height = 350;
                                if ($width / $height > $ratio) {
                                    $width = $height + $ratio;
                                } else {
                                    $height = $width / $ratio;
                                }

                                $img = imagecreatetruecolor($width, $height);
                                if ($fotos['type'][$q] == 'image/jpeg') {
                                    $origi = imagecreatefromjpeg($diretorio . $tmpname);
                                } elseif ($tipo == 'image/png') {
                                    $origi = imagecreatefrompng($diretorio . $tmpname);
                                }

                                imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                                imagejpeg($img, $diretorio . $tmpname, 80);

                                $sql = "INSERT INTO url_imagens SET loja_id_loja='$id', url='$tmpname'";

                                $sql = $this->db->query($sql);
                                if ($sql->rowCount() > 0) {
                                    //return true;
                                } else {
                                    //return FALSE;
                                }
                            }
                        }
                    }
        
    }
    
    
    
        }
