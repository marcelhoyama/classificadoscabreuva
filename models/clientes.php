<?php

class clientes extends model {

    public function verificarLogin() {

        if (!isset($_SESSION['lgCliente']) || (isset($_SESSION['lgCliente']) && empty($_SESSION['lgCliente']))) {
            header("Location:" . BASE_URL . "login_entrar");
            exit();
        } else {
            $id = $_SESSION['lgCliente'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "SELECT * FROM clientes WHERE id_clientes=:id AND ip=:ip";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":ip", $ip);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                header("Location:" . BASE_URL . "menuprincipal_loja");
                exit();
            }
        }
    }

    public function logar($email, $senha) {
        try {
            $sql = "SELECT * FROM clientes WHERE email=:email AND senha=:senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $_SESSION['lgCliente'] = $sql['id_clientes'];
                $_SESSION['lgname'] = $sql['nome'];
                $id = $_SESSION['lgCliente'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $sql = "UPDATE clientes SET ip=:ip WHERE id_clientes=:id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":ip", $ip);
                $sql->bindValue(":id", $id);
                $sql->execute();

                header("Location:" . BASE_URL . "menuprincipal_loja");
                exit();
            } else {

                return FALSE;
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

    public function pesquisarCliente($palavra) {
        try {
            $array=array();
            $array1 = array();
            $array2=array();
            $sql = "SELECT *,COUNT(l.id_loja) as quantidade FROM clientes C LEFT JOIN loja l ON c.id_clientes=l.clientes_id_clientes WHERE c.nome LIKE :palavra";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":palavra", $palavra . "%");
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                
            
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function cadastrar($ramo, $nome, $sexo, $email, $senha, $telefone) {
        try {
            $sql = "SELECT email FROM clientes WHERE email=:email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();
            //caso retorne 0 quer dizer que não existe o email
            if ($sql->rowCount() == 0) {
              
                $id_funcionario = 1;
                $sql = "INSERT INTO clientes SET funcionarios_id_funcionarios=:id_funcionario,ramo=:ramo,nome=:nome,telefone=:telefone,sexo=:sexo,email=:email,senha=:senha ";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":id_funcionario", $id_funcionario);
                $sql->bindValue(":ramo", $ramo);
                $sql->bindValue(":nome", $nome);
                $sql->bindValue(":sexo", $sexo);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":senha", $senha);
                $sql->bindValue(":telefone", $telefone);
  
                $sql->execute();
                if ($sql->rowCount() > 0) {
                   
                    header("Location:" . BASE_URL . "menuprincipal_loja");
                    exit();
                } else {
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
    
    
    public function updatePerfil($id,$nome,$telefone,$endereco) {
          $array = array();
        try {
          t;
            $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, endereco=:endereco, senha=:senha WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            
            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':endereco', $endereco);
        
            
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();

                 header("Location:" . BASE_URL . "perfil_cliente?id=".$id);
                    exit();
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
        
    }
     public function updatePerfilSenha($id,$nome,$telefone,$endereco,$senha) {
          $array = array();
        try {
          t;
            $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, endereco=:endereco, senha=:senha WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);
            
            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':endereco', $endereco);
             $sql->bindValue(':senha', $senha);
            
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();

                 header("Location:" . BASE_URL . "perfil_cliente?id=".$id);
                    exit();
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
        
    }
    
    public function qtdLojaCliente($id) {
       try{
           $sql="SELECT COUNT(id_loja) AS 'quantidade' FROM loja WHERE clientes_id_clientes = :id";
           $sql=$this->db->prepare($sql);
           $sql-> bindValue('id',$id);
           $sql->execute();
           
            if ($sql->rowCount() > 0) {
                $array= $sql->fetch();
            }
       } catch (Exception $ex) {

       } 
        
    }
}
