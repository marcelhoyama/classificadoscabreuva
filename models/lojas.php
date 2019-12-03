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

    public function cadastrar($id, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $bairro, $cidade, $telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube, $instagram, $site, $tipo_categoria,$descricao, $chamada, $prova, $foto, $fotos, $fotos2, $apresentacao, $produtos, $acao, $palavrachave, $titulo) {
        try {

  

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

            $slug = '';
            if (isset($titulo)) {
                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                $sql = "SELECT slug FROM loja WHERE slug LIKE '$slug%' ";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já exite esse titulo(nome fantasia)";
                } else {



                     $sql = "INSERT INTO loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,categoria=:tipo_categoria,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,url_imagem_principal=:url_imagem_principal,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave ";
                    

                    $sql = $this->db->prepare($sql);
                    $sql->bindParam(":id_funcionario", $id);
                    $sql->bindParam(":id_cliente", $id_cliente);
                    $sql->bindParam(":anuncio_site", $anuncio_site);
                    $sql->bindParam(":tipo_categoria", $tipo_categoria);
                    $sql->bindParam(":nome_fantasia", $nome_fantasia);
                    $sql->bindParam(":razao_social", $razao_social);
                    $sql->bindParam(":endereco", $endereco);
                    $sql->bindParam(":bairro", $bairro);
                    $sql->bindParam(":cidade", $cidade);
                    $sql->bindParam(":telefone1", $telefone1);
                    $sql->bindParam(":telefone2", $telefone2);
                    $sql->bindParam(":status", $status);
                    $sql->bindParam(":whatsapp", $whatsapp);
                    $sql->bindParam(":email", $email);
                    $sql->bindParam(":facebook", $facebook);
                    $sql->bindParam(":youtube", $youtube);
                    $sql->bindParam(":instagram", $instagram);
                    $sql->bindParam(":site", $site);
                    $sql->bindParam(":descricao", $descricao);
                    $sql->bindParam(":chamada", $chamada);
                    $sql->bindParam(":prova", $prova);
                    $sql->bindParam(":apresentacao", $apresentacao);
                    $sql->bindParam(":produto", $produtos);
                    $sql->bindParam(":acao", $acao);
                    $sql->bindParam(":palavrachave", $palavrachave);
                    $sql->bindParam(":url_imagem_principal", $tmpname);
                    $sql->bindParam(":slug", $slug);
                    $sql->bindParam(":titulo", $titulo);
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
                }
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

     public function editar($id_loja,$id, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $bairro, $cidade, $telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube, $instagram, $site, $tipo_categoria,$descricao, $chamada, $prova, $foto, $fotos, $fotos2, $apresentacao, $produtos, $acao, $palavrachave, $titulo) {
        try {
            
    

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
                    
           
            
                    
               


                     $sql = "UPDATE loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,categoria=:tipo_categoria,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,url_imagem_principal=:url_imagem_principal,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave WHERE id_loja=:id_loja ";
                    
echo 'veio no link imagem';
exit;
                    $sql = $this->db->prepare($sql);
                    $sql->bindParam(":id_loja",$id_loja);
                    $sql->bindParam(":id_funcionario", $id);
                    $sql->bindParam(":id_cliente", $id_cliente);
                    $sql->bindParam(":anuncio_site", $anuncio_site);
                    $sql->bindParam(":tipo_categoria", $tipo_categoria);
                    $sql->bindParam(":nome_fantasia", $nome_fantasia);
                    $sql->bindParam(":razao_social", $razao_social);
                    $sql->bindParam(":endereco", $endereco);
                    $sql->bindParam(":bairro", $bairro);
                    $sql->bindParam(":cidade", $cidade);
                    $sql->bindParam(":telefone1", $telefone1);
                    $sql->bindParam(":telefone2", $telefone2);
                    $sql->bindParam(":status", $status);
                    $sql->bindParam(":whatsapp", $whatsapp);
                    $sql->bindParam(":email", $email);
                    $sql->bindParam(":facebook", $facebook);
                    $sql->bindParam(":youtube", $youtube);
                    $sql->bindParam(":instagram", $instagram);
                    $sql->bindParam(":site", $site);
                    $sql->bindParam(":descricao", $descricao);
                    $sql->bindParam(":chamada", $chamada);
                    $sql->bindParam(":prova", $prova);
                    $sql->bindParam(":apresentacao", $apresentacao);
                    $sql->bindParam(":produto", $produtos);
                    $sql->bindParam(":acao", $acao);
                    $sql->bindParam(":palavrachave", $palavrachave);
                    $sql->bindParam(":url_imagem_principal", $tmpname);
                    $sql->bindParam(":slug", $slug);
                    $sql->bindParam(":titulo", $titulo);
                    $sql->execute();

                
                  
                    
                } else {


                     $sql = "UPDATE loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,categoria=:tipo_categoria,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave WHERE id_loja=:id_loja ";
                    

                    $sql = $this->db->prepare($sql);
                    $sql->bindParam(":id_loja",$id_loja);
                    $sql->bindParam(":id_funcionario", $id);
                    $sql->bindParam(":id_cliente", $id_cliente);
                    $sql->bindParam(":anuncio_site", $anuncio_site);
                    $sql->bindParam(":tipo_categoria", $tipo_categoria);
                    $sql->bindParam(":nome_fantasia", $nome_fantasia);
                    $sql->bindParam(":razao_social", $razao_social);
                    $sql->bindParam(":endereco", $endereco);
                    $sql->bindParam(":bairro", $bairro);
                    $sql->bindParam(":cidade", $cidade);
                    $sql->bindParam(":telefone1", $telefone1);
                    $sql->bindParam(":telefone2", $telefone2);
                    $sql->bindParam(":status", $status);
                    $sql->bindParam(":whatsapp", $whatsapp);
                    $sql->bindParam(":email", $email);
                    $sql->bindParam(":facebook", $facebook);
                    $sql->bindParam(":youtube", $youtube);
                    $sql->bindParam(":instagram", $instagram);
                    $sql->bindParam(":site", $site);
                    $sql->bindParam(":descricao", $descricao);
                    $sql->bindParam(":chamada", $chamada);
                    $sql->bindParam(":prova", $prova);
                    $sql->bindParam(":apresentacao", $apresentacao);
                    $sql->bindParam(":produto", $produtos);
                    $sql->bindParam(":acao", $acao);
                    $sql->bindParam(":palavrachave", $palavrachave);
                     $sql->bindParam(":slug", $slug);
                    $sql->bindParam(":titulo", $titulo);
                   
                    $sql->execute();
                }
                    
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

                                                    $sql = "INSERT INTO url_imagens SET loja_id_loja='$id_loja', url='$tmpname'";
      

                                                    $sql = $this->db->query($sql);
                                                       $sql->execute();
                                                    if ($sql->rowCount() > 0) {
                                                        //return true;
                                                    } else {
                                                        //return FALSE; 
                                                        echo 'nao cadastrou a foto';
                                                        exit;
                                                    }
                                                }
                                            }
                                        }
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

                                    $sql = "INSERT INTO url_equipes SET loja_id_loja='$id_loja', url='$tmpname'";

                                    $sql = $this->db->query($sql);
                                       $sql->execute();
                                    if ($sql->rowCount() > 0) {


                                       
                                    } else {
                                        //return FALSE;
                                    }
                                }
                            }
                        }
                    }
                
//            if (isset($titulo) && !empty($titulo)) {
//            
//                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
//                $sql = "SELECT slug FROM loja WHERE slug='$slug' AND id_loja !=$id_loja ";
//                $sql = $this->db->prepare($sql);
//                $sql->execute();
//                if ($sql->rowCount() > 0) {
//                     
//$erro= 'Já existe esse nome fantasia! tente outro nome de fantasia ';
//
//                return $erro;
//                
//                }
//            }
            
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
            $array = array();
            $sql = "SELECT * FROM categorias";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll();
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage(); 
        }
    }

    public function buscarLoja($palavra) {
    try{
        
   
        $array=array();
       echo $sql="SELECT * FROM loja WHERE nome_fantasia LIKE '%$palavra%'";
        $sql=$this->db->prepare($sql);
           
        $sql->execute();
         
        if($sql->rowCount()>0){
            $array=$sql->fetchAll();
            return $array;
        }else{
            echo 'nao foi';
        }
         } catch (Exception $ex) {
 echo "Falhou:" . $ex->getMessage();
    }
    }
    

    public function listarLojas() {
        $array=array();
        $sql='SELECT * FROM loja';
        $sql=$this->db->prepare($sql);
        $sql->execute();
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        return $array;
            
        }
        //verificar arquivo
    }
    
    public function getDados($id_loja) {
     try{
         $array=array();
         $sql="SELECT * FROM loja l LEFT JOIN url_imagens u ON l.id_loja= u.loja_id_loja LEFT JOIN url_equipes e ON e.loja_id_loja=l.id_loja WHERE l.id_loja=:id_loja";
         $sql= $this->db->prepare($sql);
         $sql->bindValue(":id_loja",$id_loja);
         $sql->execute();
         if($sql->rowCount() >0){
            $array=$sql->fetch(PDO::FETCH_ASSOC);
            return $array;
         }
     } catch (Exception $ex) {
echo "Falhou:" . $ex->getMessage();
     }
        
    }
     public function totalFotos($id_loja) {
         try{
            
               $sql="SELECT COUNT(loja_id_loja)as total FROM url_imagens WHERE loja_id_loja=:id_loja";
         $sql= $this->db->prepare($sql);
         $sql->bindValue(":id_loja",$id_loja);
         $sql->execute();
         if($sql->rowCount()>0){
             $total=$sql->fetch();
             return $total['total'];
         }
         } catch (Exception $ex) {
echo "Falhou:" . $ex->getMessage();
         }
       
     }
     
     
        public function listarFotos($id_loja) {
         try{
             $total=array();
               $sql="SELECT * FROM url_imagens WHERE loja_id_loja=:id_loja ORDER BY id_url_imagens ASC";
         $sql= $this->db->prepare($sql);
         $sql->bindValue(":id_loja",$id_loja);
         $sql->execute();
         if($sql->rowCount()>0){
             $total=$sql->fetchAll();
             return $total;
         }
         } catch (Exception $ex) {
echo "Falhou:" . $ex->getMessage();
         }
       
     }
     }
    


