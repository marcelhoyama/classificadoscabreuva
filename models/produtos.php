<?php

class produtos extends model {

    public function cadastrar($id_loja, $codigo, $foto, $nome, $cor, $tamanho = '', $valor, $desconto, $qtd, $peso = '', $id_categoria, $descricao, $devolucao, $vlantigo = '', $frete = '', $id_subcategoria) {
        try {

            if (!empty($nome)) {
                $sql = "SELECT produto_nome FROM produtos p "
                        . "LEFT JOIN imagens_produtos ON produtos_id_produto=id_produto"
                        . " LEFT JOIN subcategorias_prod ON id_subcategoria_prod=subcategorias_prod_id_subcategoria_prod"
                        . " LEFT JOIN categorias_prod ON id_cat_prod=categorias_prod_id_cat_prod"
                        . " LEFT JOIN lojas ON lojas.id_loja=produtos.lojas_id_loja"
                        . " WHERE p.produto_nome=:nome AND lojas.lojas_id_loja=$id_loja";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":nome", $nome);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return "Já existe esse nome de Produto! ";
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
                    $diretorio = "assets/images/produtos/";

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



//                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));



            $sql = "INSERT INTO produtos SET produto_nome=:nome,produto_codigo=:codigo,produto_valor=:valor,produto_imagem=:imagem,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_situacao=1,produto_data=NOW(),produto_descricao=:descricao,produto_valor_antigo=:vlantigo,produto_frete_gratis=:frete,id_loja=$id_loja,subcategorias_prod_id_subcategoria_prod=:id_subcategoria ";


            $sql = $this->db->prepare($sql);
            $sql->bindParam(":nome", $nome);
            $sql->bindParam(":codigo", $codigo);
            $sql->bindParam(":valor", $valor);
            $sql->bindParam(":imagem", $tmpname);
            $sql->bindParam(":tamanho", $tamanho);
            $sql->bindParam(":cor", $cor);
            $sql->bindParam(":desconto", $desconto);
            $sql->bindParam(":qtd", $qtd);
            $sql->bindParam(":devolucao", $devolucao);
            $sql->bindParam(":peso", $peso);
            $sql->bindParam(":descricao", $descricao);
            $sql->bindParam("vlantigo", $vlantigo);
            $sql->bindParam(":frete", $frete);
            $sql->bindParam(":id_subcategoria", $id_subcategoria);



            $sql->execute(); ////


            if ($sql->rowCount() > 0) {
                
            }// rowCount
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function editar($id_produto, $id_loja, $codigo, $foto, $nome, $cor, $tamanho = '', $valor, $desconto, $qtd, $peso = '', $id_categoria, $descricao, $devolucao, $vlantigo = '', $frete = '', $id_subcategoria) {
        try {



            //deixar em primeiro add foto unica e logo add na tabela

            if (!empty($foto['tmp_name'][0])) {

                $tipo = $foto['type'];

                if (in_array($tipo, array('image/jpeg', 'image/png'))) {
                    $tmpname = md5(time() . rand(0, 999)) . '.jpg';
                    $diretorio = "assets/images/produtos/";

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

                $sql = "UPDATE produtos SET produto_nome=:nome,produto_codigo=:codigo,produto_valor=:valor,produto_imagem=:imagem,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_situacao=1,produto_data=NOW(),produto_descricao=:descricao,produto_valor_antigo=:vlantigo,produto_frete_gratis=:frete,id_loja=$id_loja,subcategorias_prod_id_subcategoria_prod=:id_subcategoria WHERE id_produtos=$id_produto ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":nome", $nome);

                $sql->bindParam(":valor", $valor);
                $sql->bindParam(":imagem", $tmpname);
                $sql->bindParam(":tamanho", $tamanho);
                $sql->bindParam(":cor", $cor);
                $sql->bindParam(":desconto", $desconto);
                $sql->bindParam(":qtd", $qtd);
                $sql->bindParam(":devolucao", $devolucao);
                $sql->bindParam(":peso", $peso);
                $sql->bindParam(":descricao", $descricao);
                $sql->bindParam("vlantigo", $vlantigo);
                $sql->bindParam(":frete", $frete);
                $sql->bindParam(":id_subcategoria", $id_subcategoria);
                $sql->execute();
            } else {
                $sql = "UPDATE produtos SET produto_nome=:nome,produto_codigo=:codigo,produto_valor=:valor,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_situacao=1,produto_data=NOW(),produto_descricao=:descricao,produto_valor_antigo=:vlantigo,produto_frete_gratis=:frete,id_loja=$id_loja,subcategorias_prod_id_subcategoria_prod=:id_subcategoria WHERE id_produtos=$id_produto ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":nome", $nome);

                $sql->bindParam(":valor", $valor);

                $sql->bindParam(":tamanho", $tamanho);
                $sql->bindParam(":cor", $cor);
                $sql->bindParam(":desconto", $desconto);
                $sql->bindParam(":qtd", $qtd);
                $sql->bindParam(":devolucao", $devolucao);
                $sql->bindParam(":peso", $peso);
                $sql->bindParam(":descricao", $descricao);
                $sql->bindParam("vlantigo", $vlantigo);
                $sql->bindParam(":frete", $frete);
                $sql->bindParam(":id_subcategoria", $id_subcategoria);
                $sql->execute();
            }



//                $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($titulo)));









            if ($sql->rowCount() > 0) {

//                    $sql = "UPDATE lojas_has_categorias SET id_loja=:id_loja,id_categoria=:id_categoria,id_produtos=:id_produtos ";
//
//
//                    $sql = $this->db->prepare($sql);
//
//                    $sql->bindValue(":id_loja", $id_loja);
//                    $sql->bindValue(":id_categoria", $id_categoria);
//                    $sql->bindValue(":id_produtos", $id_produtos);
//                    $sql->execute();
//                    if ($sql->rowCount() > 0) {
//                        
//                    }

                header("Location:" . BASE_URL . "menuprincipal_produtos");
                exit;
            }// rowCount
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

    public function listarProdutos($id_loja) {

        try {
            $sql = "SELECT * FROM produtos INNER JOIN loja ON loja.id_loja=produtos.id_loja WHERE produtos.id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
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

    public function countProdutosLoja($id_loja) {

        try {
            $sql = "SELECT count(id_produtos) as qtd FROM produtos INNER JOIN loja ON loja.id_loja=produtos.id_loja WHERE produtos.id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $resul = $sql->fetch();
                return $resul;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }



}
