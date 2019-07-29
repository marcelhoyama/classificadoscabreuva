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

    public function cadastrar($id_funcionario, $id_cliente, $nome, $razao_social, $cnpj, $endereco, $telefone1, $telefone2, $status, $whatsapp, $email, $facebook, $youtube, $site, $descricao, $chamada, $chave1, $url_imagem_principal,$id_ramo1,$id_ramo2,$id_ramo3,$id_ramo4) {
        try {


            $sql = "INSERT INTO lojas (funcionarios_id_funcionarios,clientes_id_clientes,nome_fantasia,razao_social,cnpj,endereco,telefone1,telefone2,status,whatsapp,email,facebook,youtube,site,descricao,chamada,palavra_chave1,url_imagem_principal) VALUES (:id_funcionario,:id_cliente,:nome,:razao_social,:cnpj,:endereco,:telefone1,:telefone2,:status,:whatsapp,:email,:facebook,:youtube,:site,:descricao,:chamada,:chave1,:url_imagem_principal) ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_funcionario", $id_funcionario);
            $sql->bindValue(":id_cliente", $id_cliente);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":razao_social", $razao_social);
            $sql->bindValue(":cnpj", $cnpj);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":telefone1", $telefone1);
            $sql->bindValue(":telefone2", $telefone2);
            $sql->bindValue(":status", $status);
            $sql->bindValue(":whatsapp", $whatsapp);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":facebook", $facebook);
            $sql->bindValue(":youtube", $youtube);
            $sql->bindValue(":site", $site);
            $sql->bindValue(":descricao", $descricao);
            $sql->bindValue(":chamada", $chamada);
              $sql->bindValue(":chave1", $chave1);
            $sql->bindValue(":url_imagem_principal", $url_imagem_principal);
          
            $sql->execute();
             $id_loja= lastInsertId($sql); 
            if ($sql->rowCount() > 0) {
               
                
  $sql = "INSERT INTO loja_ramo ($id_loja,$id_ramo1) VALUES (:id_loja, :id_ramo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo1);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = "INSERT INTO loja_ramo ($id_loja,$id_ramo2) VALUES (:id_loja, :id_ramo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo2);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                $sql = "INSERT INTO loja_ramo ($id_loja,$id_ramo3) VALUES (:id_loja, :id_ramo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo3);

            $sql->execute();
            if ($sql->rowCount() > 0) {
                 $sql = "INSERT INTO loja_ramo ($id_loja,$id_ramo4) VALUES (:id_loja, :id_ramo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_loja", $id_loja);
            $sql->binValue(":id_ramo", $id_ramo4);

            $sql->execute();
            if ($sql->rowCount() > 0) {
               
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

}
