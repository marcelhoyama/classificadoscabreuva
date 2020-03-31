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

     public function esquecisenha($email) {



        $sql = "SELECT * FROM clientes WHERE email = :email ";
         $sql=$this->db->prepare($sql);
             $sql->bindValue(":email",$email);
                      $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id'];
            $token = md5(time() . rand(0, 9999) . rand(0, 9999));
            $expirado = date('Y-m-d H:i', strtotime('+1 months'));
            $sql = "INSERT INTO cliente_token (id_cliente, hash, expirado_em) VALUES (:id_cliente, :hash, :expirado_em)";

            $sql= $this->db->prepare($sql);
            $sql->bindValue(":id_cliente",$id);
            $sql->bindValue(":hash",$token);
            $sql->bindValue(":expirado_em", $expirado);;
             $sql->execute();

            $link = BASE_URL . "redefinir?token=" . $token;
            $mensagem = "Clique no link para redefinir a senha:" . $link;
            $assunto = "Redefinição de Senha";
            $headers = "From: marecrisbr@gmail.com" . "\r\n" .
                    "Reply-To:".$email."\r\n".
                    "X-Mailer: PHP/" . phpversion();

            mail($email, $assunto, $mensagem, $headers);
           // echo $mensagem;
           return true;
        }else{
            return false;
        }
    }

    public function redefinirSenha($token, $senha) {


        $sql = "SELECT * FROM cliente_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";

         $sql=$this->db->prepare($sql);
             $sql->bindValue(":hash",$token);
             
             $sql->execute();


        if ($sql->rowCount() > 0) {


            $sql = $sql->fetch();
            $id = $sql['id_cliente'];

        $sql = "UPDATE cleintes SET senha = :senha WHERE id = :id ";

             $sql=$this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->bindValue(":senha",$senha);
             $sql->execute();
            if ($sql->rowCount() > 0) {

                $sql = "UPDATE cliente_token SET used = 1  WHERE hash = :hash ";

                 $sql=$this->db->prepare($sql);
             
             $sql->bindValue(":hash",$token);
             $sql->execute();
                if ($sql->rowCount() > 0) {
                    echo "Senha Alterado com sucesso! Volte a logar com a nova senha redefinida. ";
                    exit;
                }
            }
        } else {
            echo "token usado ou invalido!";
            exit;
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
            $array = array();
            $array1 = array();
            $array2 = array();
            $sql = "SELECT *,c.email email,c.status status FROM clientes C LEFT JOIN loja l ON c.id_clientes=l.clientes_id_clientes WHERE c.nome LIKE :palavra";
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

    public function cadastrar($nome, $email, $telefone, $sexo, $senha, $resenha) {
        try {

            $sql = "SELECT email FROM clientes WHERE email=:email ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();
            //caso retorne 0 quer dizer que não existe o email
            if ($sql->rowCount() == 0) {

                if ($senha == $resenha) {

                    $sql = "INSERT INTO clientes SET nome=:nome,telefone=:telefone,sexo=:sexo,email=:email,senha=:senha,data=:data ";
                    $sql = $this->db->prepare($sql);


                    $sql->bindValue(":nome", $nome);

                    $sql->bindValue(":sexo", $sexo);

                    $sql->bindValue(":email", $email);

                    $sql->bindValue(":senha", $senha);

                    $sql->bindValue(":telefone", $telefone);
                     $sql->bindValue(":data", 'NOW()');
                      


                    $sql->execute();

                    if ($sql->rowCount() > 0) {

                        header("Location:" . BASE_URL . "menuprincipal_loja");
                        exit();
                    } else {
                        return "Não foi posssivel cadastrar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
                    }
                }
            } else {
                return "Já existe um cadastro! ";
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function editar($id, $nome, $email, $telefone, $sexo, $status) {
        try {



            $id_funcionario = 1;
            $sql = "UPDATE clientes SET nome=:nome,telefone=:telefone,sexo=:sexo,email=:email, status=:status WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);


            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":email", $email);
             //$sql->bindValue(":senha", $senha);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":status", $status);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                header("Location:" . BASE_URL . "menuprincipal_func");
                exit();
            } else {
                return "Não foi posssivel Atualizar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

    public function listarClientes() {
        $array = array();
        try {
            $sql = "SELECT *,loja.id_loja id_lojas FROM clientes INNER JOIN loja ON loja.clientes_id_clientes=clientes.id_clientes";
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
            $sql = "SELECT * FROM ramo";
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
            $sql = "SELECT *,COUNT(l.clientes_id_clientes) as quantidade FROM clientes c RIGHT JOIN loja l ON c.id_clientes=l.clientes_id_clientes WHERE c.id_clientes=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch(PDO::FETCH_ASSOC);

                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function updatePerfil($id, $nome, $telefone, $endereco) {
        $array = array();
        try {
            t;
            $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, endereco=:endereco WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':endereco', $endereco);
             


            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();

                header("Location:" . BASE_URL . "perfil_cliente?id=" . $id);
                exit();
            } else {
                return "Não foi possivel atualizar, verifique os campos se estão corretos!";
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function updatePerfilSenha($id, $nome, $telefone, $endereco, $senha) {
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

                header("Location:" . BASE_URL . "perfil_cliente?id=" . $id);
                exit();
            } else {
                 return "Não foi possivel atualizar, verifique os campos se estão corretos!";
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function qtdLojaCliente($id) {
        try {
            $sql = "SELECT id_loja,nome_fantasia,COUNT(id_loja) AS 'quantidade' FROM loja WHERE clientes_id_clientes = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue('id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function getIdLojaCliente($id_cliente) {
        try {
            $sql = "SELECT *  FROM loja INNER JOIN clientes on clientes.id_clientes=loja.clientes_id_clientes   WHERE clientes_id_clientes = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id_cliente);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
             echo "Falhou:" . $ex->getMessage();
        }
    }
    

}
