<?php

class lojas extends model {

    public function verificarCnpj($cnpj) {
        try {

            $sql = "SELECT cnpj FROM lojas WHERE cnpj=:cnpj";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cnpj", $cnpj);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function cadastrarRamo($id_loja, $id_ramo) {
        try {
            $sql = "INSERT INTO loja_ramo ($id_loja,$id_ramo) VALUES (:id_loja, :id_ramo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                return TRUE;
            }
        } catch (Exception $ex) {
            
        }
    }

    public function pesquisarCliente($palavra) {
        try {
            $array = array();
            $sql = "SELECT * FROM clientes WHERE nome LIKE :palavra";
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

    public function cadastrar($id, $id_cliente, $anuncio_site ,$tipo_categoria,$nome_fantasia, $razao_social, $endereco, $bairro,$cidade,$telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube,$instagram, $site, $descricao, $chamada, $prova, $foto,$fotos,$fotos2, $apresentacao, $produtos, $acao) {
        try {

            echo "entrou no model cadastrar loja............................";
           echo "<br>".   $id;
               echo  "<br>".   $id_cliente;
               echo  "<br>".     $nome_fantasia;
               echo  "<br>".     $razao_social; 
               echo   "<br>".    $cnpj;
               echo "<br>".      $endereco; 
                   echo"<br>".   $telefone1; 
                   echo"<br>".   $telefone2; 
                   echo"<br>".   $status; 
                   echo"<br>".   $whatsapp; 
                   echo"<br>".   $email;
                   echo"<br>".   $facebook; 
                   echo"<br>".   $youtube; 
                   echo"<br>".   $site; 
                   echo"<br>".   $descricao; 
                   echo"<br>".   $chamada; 
                   echo"<br>".   $chave1; 
                   echo"<br>".   $foto; 
                   echo "<br>".  $id_ramo1; 
                   echo"<br>".   $id_ramo2; 
                   echo "<br>".  $id_ramo3; 
                   echo"<br>".   $id_ramo4;

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
                }
                  }
            echo $sql = "INSERT INTO lojas SET (funcionarios_id_funcionarios,clientes_id_clientes,nome_fantasia,razao_social,cnpj,"
            . "endereco,telefone1,telefone2,status,whatsapp,email,facebook,youtube,site,descricao,chamada,palavra_chave1,url_imagem_principal) "
            . "VALUES (:id_funcionario,:id_cliente,:nome,:razao_social,:cnpj,:endereco,:telefone1,:telefone2,:status,:whatsapp,:email,"
            . ":facebook,:youtube,:site,:descricao,:chamada,:chave1,:url_imagem_principal) ";

            $sql = $this->db->prepare($sql);
            $sql->bindParam(":id_funcionario", $id);
            $sql->bindParam(":id_cliente", $id_cliente);
            $sql->bindParam(":nome", $nome);
            $sql->bindParam(":razao_social", $razao_social);
            $sql->bindParam(":cnpj", $cnpj);
            $sql->bindParam(":endereco", $endereco);
            $sql->bindParam(":telefone1", $telefone1);
            $sql->bindParam(":telefone2", $telefone2);
            $sql->bindParam(":status", $status);
            $sql->bindParam(":whatsapp", $whatsapp);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":facebook", $facebook);
            $sql->bindParam(":youtube", $youtube);
            $sql->bindParam(":site", $site);
            $sql->bindParam(":descricao", $descricao);
            $sql->bindParam(":chamada", $chamada);
            $sql->bindParam(":chave1", $chave1);
            $sql->bindParam(":url_imagem_principal", $tmpname);

            $sql->execute();
             
                $id = $this->db->lastInsertId();
            if ($sql->rowCount() > 0) {

                    if (count($fotos2) > 0) {

                        for ($q = 0; $q < count($fotos2['tmp_name']); $q++) {

                            $tipo3 = $fotos2['type'][$q];


                            if (in_array($tipo3, array('image/jpeg', 'image/png'))) {

                                $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                $diretorio = "upload/equipes/";

                                move_uploaded_file($fotos2['tmp_name'][$q], $diretorio . $tmpname);

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
                                if ($fotos2['type'][$q] == 'image/jpeg') {
                                    $origi = imagecreatefromjpeg($diretorio . $tmpname);
                                } elseif ($tipo == 'image/png') {
                                    $origi = imagecreatefrompng($diretorio . $tmpname);
                                }

                                imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                                imagejpeg($img, $diretorio . $tmpname, 80);

                                $sql = "INSERT INTO url_equipes SET loja_id_loja='$id', url='$tmpname'";

                                $sql = $this->db->query($sql);
                                if ($sql->rowCount() > 0) {
                                    

                    if (count($fotos) > 0) {

                        for ($q = 0; $q < count($fotos['tmp_name']); $q++) {

                            $tipo2 = $fotos['type'][$q];


                            if (in_array($tipo2, array('image/jpeg', 'image/png'))) {

                                $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                $diretorio = "upload/";

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
                                } else {
                                    //return FALSE;
                                }
                            }
                        }
                    }
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
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

    public function listarRamo() {
        $array = array();
        try {
            $sql = "SELECT * FROM ramo_atividade";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function listarCliente($id) {
        $array = array();
        try {
            $sql = "SELECT * FROM clientes WHERE id=:id";
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
            $sql = "SELECT nome FROM clientes WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();
                $nome = $array['nome'];
                return $nome;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    
    public function listarCategoria() {
        try {
            $array=array();
        $sql="SELECT * FROM categorias";
        $sql=$this->db->prepare($sql);
        $sql->execute();
        if($sql->rowCount()>0){
            $array =$sql->fetchAll();
            return $array;
        }
        } catch (Exception $ex) {
            
        }
        
    }
    
    public function getFotos(){
        
    }
    
    public function saveFotos() {
        //verificar arquivo
        
        if
    }
}
