<?php

class foto extends model {

    public function excluirFotoImagens($id_loja,$id_url,$url) {
       
        try {
     
            
            $sql = "DELETE FROM url_imagens_lojas WHERE id_imagem_loja='$id_url' AND imagem_loja_url='$url'";

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
            $sql = "SELECT id_loja,loja_imagem_principal FROM lojas WHERE id_loja='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_loja = $row['id_loja'];
                $url_principal = $row['loja_imagem_principal'];
            }


            $sql = "UPDATE lojas SET loja_imagem_principal=NULL WHERE id_loja='$id_loja'";

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
                    . "lojas INNER JOIN url_imagens_lojas ON lojas.id_loja=url_imagens_lojas.id_imagem_loja WHERE lojas.id_loja='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
            echo'id'.    $id = $row['id_imagem_loja'];
            echo 'url'.   $url = $row['imagem_loja_equipe'];
           
            }


            $sql = "DELETE FROM url_imagens_lojas WHERE id_imagem_loja='$url'";

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
            $sql = "SELECT id_produto,produto_imagem FROM produtos INNER JOIN imagens_produtos ON produtos.id_produto= imagens_produtos=produtos_id_produto WHERE id_produtos='$id'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $row = $sql->fetch();
                $id_produto = $row['id_produto'];
                $produto_imagem = $row['produto_imagem'];
            }


            $sql = "UPDATE produtos SET produto_imagem=NULL WHERE id_produto='$id_produto'";

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
   

  

    public function listFotoPrincipal($id_loja) {
        try {
            
            
            $array = array();
            $sql = "SELECT loja_imagem_principal FROM lojas WHERE id_loja='$id_loja' ";
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
            $sql = "SELECT * FROM url_imagens_lojas INNER JOIN lojas ON lojas.id_loja=url_imagens_lojas.lojas_id_loja WHERE url_imagens_lojas.lojas_id_loja=$id_loja ";
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
            $sql = "SELECT imagem_loja_equipe FROM url_imagens_lojas INNER JOIN lojas ON lojas.id_loja=url_imagens_lojas.lojas_id_loja WHERE lojas.id_loja=:id_loja ";
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
                    $sql = "UPDATE lojas SET lojs_imagem_principal='$tmpname' WHERE id_loja='$id_loja'";

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

                                $sql = "INSERT INTO url_imagens_lojas SET lojas_id_loja='$id_loja', url='$tmpname'";

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
                    $sql = "INSERT url_imagens_lojas SET imagem_loja_equipe='$tmpname',lojas_id_loja='$id_loja'";

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

                                $sql = "INSERT INTO url_imagens_lojas SET lojas_id_loja='$id', imagem_loja_url='$tmpname'";

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
