<?php

class lojas extends model {

    public function verificarCnpj($cnpj) {
        try {

            $sql = "SELECT cnpj FROM loja WHERE cnpj=:cnpj";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cnpj", $cnpj);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return "Já existe esse CNPJ!";
                exit;
            } else {
                
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function verificarCPF($cpf) {
        try {

            $sql = "SELECT cpf FROM clientes WHERE cpf=:cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();
            if ($sql->rowCount() == 0) {
                
            } else {
                return "Já existe um cadastro! ";
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function cadastrarRamo($ramo) {
        try {
            $sql = "INSERT INTO ramo SET nome=:id_ramo";
            $sql = $this->db->prepare($sql);
            
            $sql->bindValue(":id_ramo", $ramo);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                
            }else{
                Return 'Não foi possivel cadastrar, verifique o campo!';
            }
        } catch (Exception $ex) {
             echo 'Falhou:' . $ex->getMessage();
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

    public function cadastrar($id_funcionario, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $bairro, $cidade, $telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube, $instagram, $site, $id_ramo, $foto, $fotos, $fotos2, $palavrachave, $titulo, $cnpj, $cpf) {
        try {
            if (!empty($cnpj)) {
                $sql = "SELECT cnpj FROM loja WHERE cnpj=:cnpj";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":cnpj", $cnpj);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já existe esse CNPJ!";
                } else {



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



                            $sql = "INSERT INTO loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,url_imagem_principal=:url_imagem_principal,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave,cnpj=:cnpj,data=:data ";


                            $sql = $this->db->prepare($sql);
                            $sql->bindParam(":id_funcionario", $id_funcionario);
                            $sql->bindParam(":id_cliente", $id_cliente);
                            $sql->bindParam(":anuncio_site", $anuncio_site);

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
                            $sql->bindParam(":cnpj", $cnpj);
                            $sql->bindParam(":data", 'NOW()');
                            $sql->execute();

                            $id = $this->db->lastInsertId();

                            $sql = "INSERT INTO ramo_has_loja SET ramo_id_ramo=:id_ramo,loja_id_loja=:id_loja ";


                            $sql = $this->db->prepare($sql);
                            $sql->bindParam(":ramo_id_ramo", $id_ramo);
                            $sql->bindParam(":loja_id_loja", $id);

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
                }
            } else {
                if (!empty($cpf)) {
                    $sql = "SELECT cpf FROM clientes WHERE cpf=:cpf";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(":cpf", $cpf);
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                        return "Já existe esse CPF! ";
                    } else {

                        echo 'passou no verificar cpf';
                        exit;
                        $sql = "UPDATE clientes SET cpf=:cpf  WHERE id_clientes=:id_cliente";
                        $sql = $this->db->prepare($sql);

                        $sql->bindValue(":id_cliente", $id_cliente);
                        $sql->bindValue(":cpf", $cpf);
                        $sql->execute();
                        if ($sql->rowCount() > 0) {


                            $slug = '';
                            if (isset($titulo)) {
                                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                                $sql = "SELECT slug FROM loja WHERE slug LIKE '$slug%' ";
                                $sql = $this->db->prepare($sql);
                                $sql->execute();
                                if ($sql->rowCount() > 0) {
                                    return "Já exite esse titulo(nome fantasia)";
                                } else {



                                    $sql = "INSERT INTO loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,categoria=:tipo_categoria,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,url_imagem_principal=:url_imagem_principal,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave,data=:data ";


                                    $sql = $this->db->prepare($sql);
                                    $sql->bindParam(":id_funcionario", $id_funcionario);
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

                                    $sql->bindParam(":data", 'NOW()');
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
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function funcionamento($id_loja,$nome) {
        $sql = "INSERT INTO dia_semana SET id_loja=:id_loja,nome=:nome";
            $sql = $this->db->prepare($sql);
            $sql->bindParam(":id_loja", $id_loja);
            $sql->bindParam(":nome", $nome);
           


            $sql->execute();
    }


//    public function cadastrarFuncionamento($id_loja, $hora_domingo_inicio, $hora_domingo_fim, $domingo, $hora_segunda_inicio, $hora_segunda_fim, $segunda, $hora_terca_inicio, $hora_terca_fim, $terca, $hora_quarta_inicio, $hora_quarta_fim, $quarta, $hora_quinta_inicio, $hora_quinta_fim, $quinta, $hora_sexta_inicio, $hora_sexta_fim, $sexta, $hora_sabado_inicio, $hora_sabado_fim, $sabado) {
//        try {
//
//if(empty($segunda)){}else{
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $segunda);
//            $sql->bindParam(":hora_inicio", $hora_segunda_inicio);
//            $sql->bindParam(":hora_fim", $hora_segunda_fim);
//
//
//            $sql->execute();
//
//}
//if(empty($terca)){}else{
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $terca);
//            $sql->bindParam(":hora_inicio", $hora_terca_inicio);
//            $sql->bindParam(":hora_fim", $hora_terca_fim);
//
//
//            $sql->execute();
//
//}
//
//if(empty($quarta)){}else{
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $quarta);
//            $sql->bindParam(":hora_inicio", $hora_quarta_inicio);
//            $sql->bindParam(":hora_fim", $hora_quarta_fim);
//
//
//            $sql->execute();
//}
//
//if(empty($quinta)){}else{
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $quinta);
//            $sql->bindParam(":hora_inicio", $hora_quinta_inicio);
//            $sql->bindParam(":hora_fim", $hora_quinta_fim);
//
//
//            $sql->execute();
//
//}
//
//if(empty($sexta)){}else{
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $sexta);
//            $sql->bindParam(":hora_inicio", $hora_sexta_inicio);
//            $sql->bindParam(":hora_fim", $hora_sexta_fim);
//
//
//            $sql->execute();
//}
//
//if(empty($sabado)){}else{
//
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $sabado);
//            $sql->bindParam(":hora_inicio", $hora_sabado_inicio);
//            $sql->bindParam(":hora_fim", $hora_sabado_fim);
//
//
//            $sql->execute();
//}
//
//if(empty($domingo)){}else{
//
//            $sql = "INSERT INTO hora_func SET id_loja=:id_loja,id_dia_semana=:id_dia,hora_inicio=: inicio, hora_fim=:fim";
//            $sql = $this->db->prepare($sql);
//            $sql->bindParam(":id_loja", $id_loja);
//            $sql->bindParam(":id_dia", $domingo);
//            $sql->bindParam(":inicio", $hora_domingo_inicio);
//            $sql->bindParam(":fim", $hora_domingo_fim);
//
//
//            $sql->execute();
//            if($sql->rowCount()>0){
//                echo 'cadastrou?';
//                exit;
//            }
//}
//           
//        } catch (Exception $ex) {
//            echo 'Falhou:' . $ex->getMessage();
//        }
//    }

    public function editar($id_loja, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $bairro, $cidade, $telefone1, $telefone2 = '', $status, $whatsapp = '', $email = '', $facebook = '', $youtube = '', $instagram = '', $site = '', $id_ramo, $foto, $fotos, $fotos2, $palavrachave = '', $titulo = '', $cnpj = '') {
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




                $slug = $this->slugNotRepetir($titulo, $id_loja);


                $sql = "UPDATE loja SET clientes_id_clientes=:id_cliente,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,url_imagem_principal=:url_imagem_principal,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave,cnpj=:cnpj WHERE id_loja=:id_loja ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":id_loja", $id_loja);

                $sql->bindParam(":id_cliente", $id_cliente);
                $sql->bindParam(":anuncio_site", $anuncio_site);
               
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
                $sql->bindParam(":cnpj", $cnpj);
            } else {

                $slug = $this->slugNotRepetir($titulo, $id_loja);

                $sql = "UPDATE loja SET clientes_id_clientes=:id_cliente,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,bairro=:bairro,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp=:whatsapp,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave,cnpj=:cnpj WHERE id_loja=:id_loja ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":id_loja", $id_loja);

                $sql->bindParam(":id_cliente", $id_cliente);
                $sql->bindParam(":anuncio_site", $anuncio_site);
             
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
                $sql->bindParam(":cnpj", $cnpj);
            }
            $sql->execute();
            if ($sql->rowCount() > 0) {
                
                //por enquanto mudar um tipo de ramo, pois falta ver como fazer multipla escolha
  $sql = "UPDATE ramo_has_loja SET ramo_id_ramo=:id_ramo,loja_id_loja=:id_loja WHERE loja_id_loja=:id_loja AND ramo_id_ramo=:id_ramo ";

                
                            $sql = $this->db->prepare($sql);
                            $sql->bindParam(":ramo_id_ramo", $id_ramo);
                            $sql->bindParam(":loja_id_loja", $id_loja);
                 $sql->execute();
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
                            } elseif ($tipo2 == 'image/png') {
                                $origi = imagecreatefrompng($diretorio . $tmpname);
                            }

                            imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            imagejpeg($img, $diretorio . $tmpname, 80);

                            $sql = "INSERT INTO url_imagens SET loja_id_loja=:loja_id_loja, url=:url";


                            $sql = $this->db->prepare($sql);
                            $sql->bindValue(":loja_id_loja", $id_loja);
                            $sql->bindValue(":url", $tmpname);
                            $sql->execute();
                            if ($sql->rowCount() > 0) {
                                return TRUE;
                            }
                            if (count($fotos2) > 0) {

                                for ($q2 = 0; $q2 < count($fotos2['tmp_name']); $q2++) {

                                    $tipo3 = $fotos2['type'][$q2];


                                    if (in_array($tipo3, array('image/jpeg', 'image/png'))) {

                                        $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                        $diretorio = "upload/equipes/";

                                        move_uploaded_file($fotos2['tmp_name'][$q2], $diretorio . $tmpname);

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
                                        if ($fotos2['type'][$q2] == 'image/jpeg') {
                                            $origi = imagecreatefromjpeg($diretorio . $tmpname);
                                        } elseif ($tipo3 == 'image/png') {
                                            $origi = imagecreatefrompng($diretorio . $tmpname);
                                        }

                                        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                                        imagejpeg($img, $diretorio . $tmpname, 80);

                                        $sql = "INSERT INTO url_equipes SET loja_id_loja='$id_loja', url='$tmpname'";

                                        $sql = $this->db->query($sql);
                                        $sql->execute();
                                        if ($sql->rowCount() > 0) {
                                            return TRUE;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
                return TRUE;
            }
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
                        } elseif ($tipo2 == 'image/png') {
                            $origi = imagecreatefrompng($diretorio . $tmpname);
                        }

                        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                        imagejpeg($img, $diretorio . $tmpname, 80);

                        $sql = "INSERT INTO url_imagens SET loja_id_loja=:loja_id_loja, url=:url";


                        $sql = $this->db->prepare($sql);
                        $sql->bindValue(":loja_id_loja", $id_loja);
                        $sql->bindValue(":url", $tmpname);
                        $sql->execute();
                        if ($sql->rowCount() > 0) {
                            return TRUE;
                        }
                        if (count($fotos2) > 0) {

                            for ($q2 = 0; $q2 < count($fotos2['tmp_name']); $q2++) {

                                $tipo3 = $fotos2['type'][$q2];


                                if (in_array($tipo3, array('image/jpeg', 'image/png'))) {

                                    $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                                    $diretorio = "upload/equipes/";

                                    move_uploaded_file($fotos2['tmp_name'][$q2], $diretorio . $tmpname);

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
                                    if ($fotos2['type'][$q2] == 'image/jpeg') {
                                        $origi = imagecreatefromjpeg($diretorio . $tmpname);
                                    } elseif ($tipo3 == 'image/png') {
                                        $origi = imagecreatefrompng($diretorio . $tmpname);
                                    }

                                    imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                                    imagejpeg($img, $diretorio . $tmpname, 80);

                                    $sql = "INSERT INTO url_equipes SET loja_id_loja='$id_loja', url='$tmpname'";

                                    $sql = $this->db->query($sql);
                                    $sql->execute();
                                    if ($sql->rowCount() > 0) {
                                        return TRUE;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return TRUE;
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function slugNotRepetir($titulo, $id_loja) {
        try {
            if (isset($titulo) && !empty($titulo)) {

                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                $sql = "SELECT slug FROM loja WHERE slug='$slug' AND id_loja !='$id_loja' ";
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

    public function listarRamo() {
        try {
            $array = array();
            $sql = "SELECT * FROM ramo";
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
            echo $sql = "SELECT * FROM loja WHERE nome_fantasia LIKE '%$palavra%'";
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
        $sql = 'SELECT * FROM loja';
        $sql = $this->db->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            return $array;
        }
        //verificar arquivo
    }

    public function getDados($id_loja) {
        try {
            $array = array();
            $sql = "SELECT * FROM loja l LEFT JOIN url_imagens u ON l.id_loja= u.loja_id_loja LEFT JOIN url_equipes e ON e.loja_id_loja=l.id_loja INNER JOIN ramo c ON c.id_ramo=l.categoria WHERE l.id_loja=:id_loja GROUP BY l.id_loja";
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

            $sql = "SELECT COUNT(loja_id_loja)as total FROM url_imagens WHERE loja_id_loja=:id_loja";
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
            $sql = "SELECT * FROM url_imagens WHERE loja_id_loja=:id_loja ORDER BY id_url_imagens ASC";
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
