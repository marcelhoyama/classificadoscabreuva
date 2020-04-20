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
            $ramo = ucfirst(trim(strtolower($ramo)));
            $sql = "INSERT INTO ramo SET nome=:ramo";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(":ramo", $ramo);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                
            } else {
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

    public function cadastrar($id_funcionario, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social = '', $endereco, $id_bairro, $cidade, $telefone1, $telefone2 = '', $status, $whatsapp1 = '', $whatsapp2 = '', $email = '', $facebook = '', $youtube = '', $instagram = '', $site = '', $id_ramo, $palavrachave = '', $titulo, $cpfcnpj = '', $delivery = '', $funcionamento = '') {
        try {

            if (!empty($cpfcnpj) && strlen($cpfcnpj) == 14) {
                $sql = "SELECT cpfcnpj FROM loja WHERE cpfcnpj=:cpfcnpj";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":cpfcnpj", $cpfcnpj);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já existe esse CNPJ! ";
                }
            }// EMPTY cpf
//            if ($foto['error'] > 0) {
//                return 'Houve Erro no arquivo ou danificado FOTO, tente com outra foto! ';
//            }
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
                $sql = "SELECT slug FROM loja WHERE slug LIKE '$slug%' ";
                $sql = $this->db->prepare($sql);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já exite esse titulo(nome fantasia)";
                }


                $sql = "INSERT INTO loja SET clientes_id_clientes=:id_cliente,funcionarios_id_funcionarios=:id_funcionario,anuncio_site=:anuncio_site,status=:status,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp1=:whatsapp1,whatsapp2=:whatsapp2,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,ramo=:ramo,descricao=:descricao,chamada=:chamada,prova=:prova,slug=:slug,titulo=:titulo,link_apresentacao=:apresentacao,link_produto=:produto,link_acao=:acao,palavrachave=:palavrachave,cpfcnpj=:cpfcnpj,delivery=:delivery, funcionamento=:funcionamento,data=NOW() ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":id_funcionario", $id_funcionario);
                $sql->bindParam(":id_cliente", $id_cliente);
                $sql->bindParam(":anuncio_site", $anuncio_site);
                $sql->bindParam(":ramo", $id_ramo);
                $sql->bindParam(":nome_fantasia", $nome_fantasia);
                $sql->bindParam(":razao_social", $razao_social);
                $sql->bindParam(":endereco", $endereco);
//                $sql->bindParam(":bairro", $bairro);
                $sql->bindParam(":cidade", $cidade);
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
                $sql->bindParam(":chamada", $chamada);
                $sql->bindParam(":prova", $prova);
                $sql->bindParam(":apresentacao", $apresentacao);
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

                    $sql = "INSERT INTO loja_has_bairros SET id_loja=:id_loja,id_bairros=:id_bairro ";


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

    public function funcionamento($id_loja, $nome) {
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
    // }

    public function editar($id_loja, $id_cliente, $anuncio_site, $nome_fantasia, $razao_social, $endereco, $id_bairro, $cidade, $telefone1, $telefone2, $whatsapp1, $whatsapp2, $email, $facebook, $youtube, $instagram, $site, $tipo_ramo, $palavrachave, $titulo, $delivery, $funcionamento) {
        try {


            $slug = $this->slugNotRepetir($titulo, $id_loja);


            $sql = "UPDATE loja SET anuncio_site=:anuncio_site,nome_fantasia=:nome_fantasia,razao_social=:razao_social,endereco=:endereco,cidade=:cidade,telefone1=:telefone1,telefone2=:telefone2,whatsapp1=:whatsapp1,whatsapp2=:whatsapp2,email=:email,facebook=:facebook,youtube=:youtube,instagram=:instagram,site=:site,ramo=:ramo,slug=:slug,titulo=:titulo,palavrachave=:palavrachave,delivery=:delivery,funcionamento=:funcionamento WHERE id_loja=:id_loja ";

            $sql = $this->db->prepare($sql);
            $sql->bindParam(":id_loja", $id_loja);


            $sql->bindParam(":anuncio_site", $anuncio_site);

            $sql->bindParam(":nome_fantasia", $nome_fantasia);
            $sql->bindParam(":razao_social", $razao_social);
            $sql->bindParam(":endereco", $endereco);

            $sql->bindParam(":cidade", $cidade);
            $sql->bindParam(":telefone1", $telefone1);
            $sql->bindParam(":telefone2", $telefone2);
            $sql->bindParam(":ramo", $tipo_ramo);
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
            $sql->bindParam(":funcionamento", $funcionamento);

            $sql->execute();
            $this->palavrachave($id_loja);
            $sql2 = "UPDATE loja_has_bairros SET id_bairros=:id_bairro WHERE id_loja=:id_loja ";
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

            $sql = "delete from palavra_chave where id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);

            $sql->execute();


            $sql = "select palavrachave from loja where id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_loja', $id_loja);

            $sql->execute();
            if ($sql->rowCount() > 0) {


                $resul = $sql->fetch(PDO::FETCH_ASSOC);
                // $palavra= implode(",",$resul['palavrachave']); 


                $palavra = explode(",", $resul['palavrachave']);
                print_r($palavra);
                foreach ($palavra as $value) {
                    $sql = "insert into palavra_chave set pchave_nome=:pchave_nome,id_loja=:id_loja";
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

    public function listarPorRamo() {
        try {
            $array = array();
            $sql = "SELECT * FROM ramo ORDER BY nome ASC";
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
        $sql = "SELECT *,loja.id_loja as id_loja,ramo.nome as nome_ramo,loja.funcionamento FROM loja"
                . " LEFT JOIN loja_has_bairros lb ON lb.id_loja = loja.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairro=lb.id_bairros "
                . " left join ramo on ramo.id_ramo=loja.ramo WHERE loja.status =0 AND loja.anuncio_site=1 ";
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
            $sql = "SELECT *,e.url as equipe FROM loja l LEFT JOIN url_imagens u ON l.id_loja= u.loja_id_loja"
                    . " LEFT JOIN url_equipes e ON e.loja_id_loja=l.id_loja"
                    . " LEFT JOIN loja_has_bairros lb ON lb.id_loja = l.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairro=lb.id_bairros"
                    . " WHERE l.id_loja=:id_loja GROUP BY l.id_loja";
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
