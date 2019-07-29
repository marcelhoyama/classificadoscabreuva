<?php

class clientes extends model {

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

    public function cadastrar($id_funcionario, $nome, $email, $telefone, $cpf) {
        try {
 $sql = "SELECT cpf FROM clientes WHERE cpf=:cpf";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();
            if ($sql->rowCount() == 0) {
                
            $sql = "INSERT INTO clientes (funcionarios_id_funcionarios,nome,email,telefone,cpf) VALUES (:id_funcionario,:nome,:email,:telefone,:cpf) ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_funcionario", $id_funcionario);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":cpf", $cpf);
            $sql->execute();
            if ($sql->rowCount() > 0) {
               header("Location:".BASE_URL."pesquisar_clientes");
                exit();
            }else{
                return "Não foi posssivel cadastrar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
            }
            } else {
                return "Já existe um cadastro! ";
            }

        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function listarClientes() {
        $array = array();
        try {
            $sql = "SELECT *,lojas.id_loja id_lojas FROM clientes INNER JOIN lojas ON lojas.clientes_id_clientes=clientes.id_clientes";
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

    public function getDados($id) {
$array=array();
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
}
