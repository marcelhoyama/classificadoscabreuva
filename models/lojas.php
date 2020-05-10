<?php

class lojas extends model {

    public function verificarCnpj($cnpj) {
        try {
            if (strlen($cnpj) == 14) {
                $sql = "SELECT loja_cnpj_cpf FROM lojas WHERE loja_cnpj_cpf=:cnpj";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":cnpj", $cnpj);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já existe esse CNPJ!";
                    exit;
                } else {
                    $sql = "SELECT loja_cnpj_cpf FROM lojas WHERE loja_cnpj_cpf=:cnpj";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(":cnpj", $cnpj);
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                        return "Já existe esse CPF!";
                        exit;
                    }
                }
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

//    public function verificarCPF($cpf) {
//        try {
//
//            $sql = "SELECT cpf FROM clientes WHERE cpf=:cpf";
//            $sql = $this->db->prepare($sql);
//            $sql->bindValue(":cpf", $cpf);
//            $sql->execute();
//            if ($sql->rowCount() == 0) {
//                
//            } else {
//                return "Já existe um cadastro! ";
//            }
//        } catch (Exception $ex) {
//            echo 'Falhou:' . $ex->getMessage();
//        }
//    }

    public function cadastrarSubRamo($ramo) {
        try {
            $ramo = ucfirst(trim(strtolower($ramo)));

            $sql = "SELECT subramo_nome FROM subramos WHERE subramo_nome=:ramo";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(":ramo", $ramo);

            $sql->execute();
            if ($sql->rowCount() == 0) {
                $sql = "INSERT INTO subramos SET subramo_nome=:ramo";
                $sql = $this->db->prepare($sql);

                $sql->bindValue(":ramo", $ramo);

                $sql->execute();
                if ($sql->rowCount() > 0) {
                    
                } else {
                    Return 'Não foi possivel cadastrar, verifique o campo!';
                }
            } else {
                return "Já existe esse subramo!";
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function cadastrarRamo($ramo) {
        try {
            $ramo = ucfirst(trim(strtolower($ramo)));
            $sql = "SELECT ramos_nome FROM ramos WHERE ramos_nome=:ramo";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(":ramo", $ramo);

            $sql->execute();
            if ($sql->rowCount() == 0) {
                $sql = "INSERT INTO ramos SET ramos_nome=:ramo";
                $sql = $this->db->prepare($sql);

                $sql->bindValue(":ramo", $ramo);

                $sql->execute();
                if ($sql->rowCount() > 0) {
                    
                } else {
                    Return 'Não foi possivel cadastrar, verifique o campo!';
                }
            } else {
                return "Já existe esse Ramo!";
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function listarCategoria() {
        $array = array();
        try {
            $sql = "SELECT * FROM ramos ORDER BY ramos_nome";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function pesquisarCliente($palavra) {
        try {
            $array = array();
            $sql = "SELECT * FROM clientes WHERE cliente_nome LIKE :palavra";
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

    public function cadastrar($id_funcionario, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social = '', $endereco, $id_bairro, $cidade, $telefone1, $telefone2 = '', $status, $whatsapp1 = '', $whatsapp2 = '', $email = '', $facebook = '', $youtube = '', $instagram = '', $site = '', $id_ramo, $id_subramo, $palavrachave = '', $titulo, $cpfcnpj = '', $delivery = '', $funcionamento = '') {
        try {

            $this->verificarCnpj($cpfcnpj);

            //deixar em primeiro add foto unica e logo add na tabela
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


            //query normal
            $slug = '';
            if (isset($titulo)) {
                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));
                $sql = "SELECT loja_slug FROM lojas WHERE loja_slug LIKE '$slug%' ";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já exite esse titulo(nome fantasia)";
                    exit;
                }


                $sql = "INSERT INTO lojas SET clientes_id_clientes=:id_cliente,loja_anunciar=:anuncio_site,loja_situacao=:status,loja_nome_fantasia=:nome_fantasia,loja_razao_social=:razao_social,loja_endereco=:endereco,loja_fixo=:telefone1,loja_celular=:telefone2,delivery_fixo=:whatsapp1,delivery_celular=:whatsapp2,loja_email=:email,loja_facebook=:facebook,loja_youtube=:youtube,loja_instagram=:instagram,loja_site=:site,loja_descricao=:descricao,loja_slug=:slug,loja_titulo=:titulo,loja_cnpj_cpf=:cpfcnpj,loja_delivery=:delivery,loja_situacao=:situacao,data_cadastro=NOW() ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":id_funcionario", $id_funcionario);
                $sql->bindParam(":id_cliente", $id_cliente);
                $sql->bindParam(":anuncio_site", $anuncio_site);

                $sql->bindParam(":nome_fantasia", $nome_fantasia);
                $sql->bindParam(":razao_social", $razao_social);
                $sql->bindParam(":endereco", $endereco);


                $sql->bindParam(":telefone1", $telefone1);
                $sql->bindParam(":telefone2", $telefone2);
                $sql->bindParam(":status", $status);
                $sql->bindParam(":whatsapp1", $whatsapp1);
                $sql->bindParam(":whatsapp2", $whatsapp2);
                $sql->bindParam(":email", $email);
                $sql->bindParam(":facebook", $facebook);
                $sql->bindParam(":youtube", $youtube);
                $sql->bindParam(":instagram", $instagram);
                $sql->bindParam(":site", $site);
                $sql->bindParam(":descricao", $descricao);

                $sql->bindParam(":produto", $produtos);
                $sql->bindParam(":acao", $acao);
                $sql->bindParam(":palavrachave", $palavrachave);
//                $sql->bindParam(":url_imagem_principal", $tmpname);
                $sql->bindParam(":slug", $slug);
                $sql->bindParam(":titulo", $titulo);
                $sql->bindParam(":cpfcnpj", $cpfcnpj);
                $sql->bindParam(":delivery", $delivery);
                $sql->bindParam(":funcionamento", $funcionamento);

                $sql->execute(); ////
                $id_loja = $this->db->lastInsertId();

                if ($sql->rowCount() > 0) {

                    $sql = "INSERT INTO lojas_has_bairros SET lojas_id_loja=:id_loja,bairros_id_bairros=:id_bairro ";


                    $sql = $this->db->prepare($sql);

                    $sql->bindValue(":id_loja", $id_loja);
                    $sql->bindValue(":id_bairro", $id_bairro);
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                        
                    }

                    $this->palavrachave($id_loja);
                }// rowCount
            }// IF TITULO
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function cadastrarFuncionamento($segunda, $terca, $quarta, $quinta, $sexta, $sabado, $domingo, $id_loja) {

        $sql = "INSERT INTO semanas SET semana_segunda=:segunda, semana_terca=:terca,semana_quarta=:quarta,semana_quinta=:quinta,semana_sexta=:sexta,semana_sabado=:sabado,semana_domingo=:domingo";
        $sql->bindValue(":segunda", $id_loja);
        $sql->bindValue(":terca", $id_bairro);
        $sql->bindValue(":quarta", $quarta);
        $sql->bindValue(":quinta", $quinta);
        $sql->bindValue(":sexta", $sexta);
        $sql->bindValue(":sabado", $sabado);
        $sql->bindValue(":domingo", $domingo);

        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql->fetch();
            $id_semana = $this->db->lastInsertId();
        }

        for ($i = 1; $i <= 10; $i++) {
            echo $i;
        }
        $sql = "INSERT INTO funcionamentos SET hora_inicio=:inicio ,hora_fim=:fim";

        $sql->bindValue(":inicio", $hinicio);
        $sql->bindValue(":fim", $hfim);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql->fetch();
            $id_funcionamento = $this->db->lastInsertId();
        }
        $sql = "INSERT INTO intervalos SET funcionamentos_id_funcionamento=:id_funcionamento,inter_hora_inicio=:interinicio,inter_hora_fim=:interfim";
        $sql->bindValue(":id_funcionamento", $id_funcionamento);
        $sql->bindValue(":interinicio", $hinicio);
        $sql->bindValue(":interfim", $hfim);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            $sql = "INSERT INTO funcionamentos_has_semanas SET funcionamentos_id_funcionamento=:id_funcionamento,semanas_id_semana=:id_semana, lojas_id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindParam(":id_funcionamento", $id_funcionamento);
            $sql->bindParam(":id_semana", $id_semana);
            $sql->bindParam(":id_loja", $id_loja);



            $sql->execute();
        }
    }

    public function editarFuncionamento($segunda, $terca, $quarta, $quinta, $sexta, $sabado, $domingo, $id_loja, $id_semana, $id_funcionamento, $id_intervalo) {

        $sql = "UPDATE semanas SET semana_segunda=:segunda, semana_terca=:terca,semana_quarta=:quarta,semana_quinta=:quinta,semana_sexta=:sexta,semana_sabado=:sabado,semana_domingo=:domingo WHERE id_semana=:id_semana";
        $sql->bindValue(":id_semana", $id_semana);
        $sql->bindValue(":segunda", $id_loja);
        $sql->bindValue(":terca", $id_bairro);
        $sql->bindValue(":quarta", $quarta);
        $sql->bindValue(":quinta", $quinta);
        $sql->bindValue(":sexta", $sexta);
        $sql->bindValue(":sabado", $sabado);
        $sql->bindValue(":domingo", $domingo);

        $sql->execute();


        //acho que aqui tem q ser um array id_funcionamento, pois funcionamento é por dia (7dias)
        $sql = "UPDATE funcionamentos SET hora_inicio=:inicio ,hora_fim=:fim WHERE id_funcionamento=:id_funcionamento";
        $sql->bindValue(":id_funcionamento", $id_funcionamento);
        $sql->bindValue(":inicio", $hinicio);
        $sql->bindValue(":fim", $hfim);
        $sql->execute();
        //acho que aqui tem q ser um array id_intervalo, pois intervalos tem varios por dia ou nenhum é por dia (7dias)
        $sql = "UPDATE intervalos SET funcionamentos_id_funcionamento=:id_funcionamento,inter_hora_inicio=:interinicio,inter_hora_fim=:interfim WHERE id_intervalo=:id_intervalo";
        $sql->bindValue(":id_intervalo", $id_intervalo);
        $sql->bindValue(":id_funcionamento", $id_funcionamento);
        $sql->bindValue(":interinicio", $hinicio);
        $sql->bindValue(":interfim", $hfim);
        $sql->execute();


        $sql = "UPDATE funcionamentos_has_semanas SET funcionamentos_id_funcionamento=:id_funcionamento,hsemanas_id_semana=:id_semana, loas_id_loja=:id_loja";
        $sql = $this->db->prepare($sql);
        $sql->bindParam(":id_funcionamento", $id_funcionamento);
        $sql->bindParam(":id_semana", $id_semana);
        $sql->bindParam(":id_loja", $id_loja);


        $sql->execute();
    }

    public function editar($id_loja, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social = '', $endereco, $id_bairro, $cidade, $telefone1, $telefone2 = '', $status, $whatsapp1 = '', $whatsapp2 = '', $email = '', $facebook = '', $youtube = '', $instagram = '', $site = '', $id_ramo, $id_subramo, $palavrachave = '', $titulo, $cpfcnpj = '', $delivery = '', $funcionamento = '') {
        try {


            $slug = $this->slugNotRepetir($titulo, $id_loja);


            $sql = "UPDATE loja SET clientes_id_clientes=:id_cliente,loja_anunciar=:anuncio_site,loja_situacao=:status,loja_nome_fantasia=:nome_fantasia,loja_razao_social=:razao_social,loja_endereco=:endereco,loja_fixo=:telefone1,loja_celular=:telefone2,delivery_fixo=:whatsapp1,delivery_celular=:whatsapp2,loja_email=:email,loja_facebook=:facebook,loja_youtube=:youtube,loja_instagram=:instagram,loja_site=:site,loja_descricao=:descricao,loja_slug=:slug,loja_titulo=:titulo,loja_cnpj_cpf=:cpfcnpj,loja_delivery=:delivery,loja_situacao=:situacao WHERE id_loja=:id_loja ";

            $sql = $this->db->prepare($sql);
            $sql->bindParam(":id_loja", $id_loja);


            $sql->bindParam(":anuncio_site", $anuncio_site);

            $sql->bindParam(":nome_fantasia", $nome_fantasia);
            $sql->bindParam(":razao_social", $razao_social);
            $sql->bindParam(":endereco", $endereco);


            $sql->bindParam(":telefone1", $telefone1);
            $sql->bindParam(":telefone2", $telefone2);

            $sql->bindParam(":whatsapp1", $whatsapp1);
            $sql->bindParam(":whatsapp2", $whatsapp2);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":facebook", $facebook);
            $sql->bindParam(":youtube", $youtube);
            $sql->bindParam(":instagram", $instagram);
            $sql->bindParam(":site", $site);
            $sql->bindParam(":palavrachave", $palavrachave);
            $sql->bindParam(":slug", $slug);
            $sql->bindParam(":titulo", $titulo);
            $sql->bindParam(":delivery", $delivery);


            $sql->execute();
            $this->palavrachave($id_loja);


            $sql2 = "UPDATE lojas_has_bairros SET lojas_id_loja=:id_loja,bairros_id_bairros=:id_bairros  WHERE id_loja=:id_loja ";
            $sql2 = $this->db->prepare($sql2);
            $sql2->bindParam(":id_loja", $id_loja);
            $sql2->bindParam(":id_bairro", $id_bairro);
            $sql2->execute();


            if ($sql->rowCount() > 0) {


                header("Location:" . BASE_URL . "editar_loja?id_loja=" . $id_loja . "&id_cliente=" . $id_cliente);
                exit;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function palavrachave($id_loja) {
        try {

            $sql = "delete from palavraschaves where lojas_id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);

            $sql->execute();


            $sql = "select loja_palavrachave from lojas where id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);

            $sql->execute();
            if ($sql->rowCount() > 0) {


                $resul = $sql->fetch(PDO::FETCH_ASSOC);
                // $palavra= implode(",",$resul['palavrachave']); 


                $palavra = explode(",", $resul['loja_palavrachave']);

                foreach ($palavra as $value) {
                    $sql = "insert into palavraschaves set palavra_chave_nome=:pchave_nome,id_loja=:id_loja";
                    $value = trim($value);
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':id_loja', $id_loja);
                    $sql->bindValue(':pchave_nome', $value);
                    $sql->execute();
                }

                if ($sql->rowCount() > 0) {
                    
                }
            } else {
                
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
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

    public function addRamoSubramo($id_loja, $id_ramo, $id_subramo) {
        try {


            $sql = "INSERT INTO subramos_has_lojas SET subramos_id_subramos=:subramo,lojas_id_loja=:id_loja,subramos_ramos_id_ramo=:id_ramo";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(":subramo", $id_subramo);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo);
            $sql->execute();
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
                $nome = $array['nome'];
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
        $sql = "SELECT * FROM lojas left JOIN clientes on clientes.id_clientes=lojas.clientes_id_clientes"
                . " LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                . " left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                . " LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                . " LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                . " LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                . " LEFT JOIN palavraschaves p ON p.lojas_id_loja=lojas.id_loja WHERE loja_situacao =0 AND loja_anunciar=1 ";
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
            $sql = "SELECT * FROM lojas left JOIN clientes on clientes.id_clientes=lojas.clientes_id_clientes"
                . " LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                . " left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                . " LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                . " LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                . " LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                . " LEFT JOIN palavraschaves p ON p.lojas_id_loja=lojas.id_loja"
                    . " WHERE lojas.id_loja=:id_loja GROUP BY lojas.id_loja";
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

            $sql = "SELECT COUNT(lojas_id_loja)as total FROM url_imagens_lojas WHERE lojas_id_loja=:id_loja";
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
            $sql = "SELECT * FROM url_imagens_lojas WHERE lojas_id_loja=:id_loja ORDER BY id_url_imagem_loja ASC";
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
