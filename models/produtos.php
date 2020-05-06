<?php

class produtos extends model {

  

    public function cadastrar($id_loja, $codigo,$foto, $nome, $cor, $tamanho = '', $valor, $desconto, $qtd, $peso='', $id_categoria, $descricao, $devolucao) {
        try {

            if (!empty($nome)) {
                $sql = "SELECT produto_nome FROM produtos p "
                        . " INNER JOIN lojas_has_categorias lc ON lc.id_loja=p.id_loja"
                        . " INNER JOIN loja l ON l.id_loja=lc.id_loja"
                        . " INNER JOIN categorias c ON c.id_categoria=lc.id_categoria WHERE p.produto_nome=:nome AND lc.id_loja=$id_loja";
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
             


                $sql = "INSERT INTO produtos SET produto_nome=:nome,produto_codigo=:codigo,produto_valor=:valor,produto_imagem=:imagem,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_situacao=1,produto_data=NOW(),produto_descricao=:descricao,id_loja=$id_loja ";


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
                $sql->bindPAram(":descricao",$descricao);
               
                

                $sql->execute(); ////
                $id_produtos = $this->db->lastInsertId();

                if ($sql->rowCount() > 0) {

                    $sql = "INSERT INTO lojas_has_categorias SET id_loja=:id_loja,id_categoria=:id_categoria,id_produtos=:id_produtos ";


                    $sql = $this->db->prepare($sql);

                    $sql->bindValue(":id_loja", $id_loja);
                    $sql->bindValue(":id_categoria", $id_categoria);
                    $sql->bindValue(":id_produtos", $id_produtos);
                    $sql->execute();
                    if ($sql->rowCount() > 0) {
                        
                    }

                   
                }// rowCount
            
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

    public function editar($id_produto,$foto, $nome, $cor, $tamanho, $valor, $desconto, $qtd, $peso, $descricao, $devolucao) {
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
                
                $sql = "UPDATE produtos SET produto_nome=:nome,produto_valor=:valor,produto_imagem=:imagem,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_descricao=:descricao WHERE id_produtos=$id_produto ";


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
                $sql->bindParam(":descricao",$descricao);
                $sql->execute(); 
            }else{
                 $sql = "UPDATE produtos SET produto_nome=:nome,produto_valor=:valor,produto_tamanho=:tamanho,produto_cor=:cor,produto_desconto=:desconto,produto_quantidade=:qtd,produto_devolucao=:devolucao,produto_peso=:peso,produto_descricao=:descricao WHERE id_produtos=$id_produto ";


                $sql = $this->db->prepare($sql);
                $sql->bindParam(":nome", $nome);
               
                $sql->bindParam(":valor", $valor);
             
                $sql->bindParam(":tamanho", $tamanho);
                $sql->bindParam(":cor", $cor);
                $sql->bindParam(":desconto", $desconto);
                $sql->bindParam(":qtd", $qtd);
                $sql->bindParam(":devolucao", $devolucao);
                $sql->bindParam(":peso", $peso);
                $sql->bindParam(":descricao",$descricao);
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

                header("Location:".BASE_URL."menuprincipal_produtos");
                exit;
                }// rowCount
            
            
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

    public function listarProdutos($id_loja) {

        try {
            $sql = "SELECT * FROM produtos INNER JOIN loja ON loja.id_loja=produtos.id_loja WHERE produtos.id_loja=:id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja",$id_loja );
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

    public function getProduto($id_produto) {
        try {
            $array = array();
            $sql = "SELECT * FROM produtos"
                    . " WHERE id_produtos=:id_produto";
            $sql = $this->db->prepare($sql);
           $sql->bindValue(":id_produto", $id_produto);
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

    
        public function listarCategoria() {
        $array = array();
        try {
            $sql = "SELECT * FROM categorias ORDER BY categoria_nome";
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
}

