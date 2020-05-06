<?php

class clientes extends model {

    public function verificarLogin() {

        if (!isset($_SESSION['lgCliente']) || (isset($_SESSION['lgCliente']) && empty($_SESSION['lgCliente']))) {
            header("Location:" . BASE_URL . "login_entrar_1");
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
            } else {
                return 'Erro na autenticação, avisar suporte@buscadorcabreuva.com.br!';
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
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id_clientes'];
            $token = md5(time() . rand(0, 9999) . rand(0, 9999));
            $expirado = date('Y-m-d H:i', strtotime('+1 months'));
            $sql = "INSERT INTO clientes_token (id_cliente, hash, expirado_em) VALUES (:id_cliente, :hash, :expirado_em)";

            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_cliente", $id);
            $sql->bindValue(":hash", $token);
            $sql->bindValue(":expirado_em", $expirado);

            $sql->execute();

            $link = BASE_URL . "redefinir?token=" . $token;
            $mensagem = "Conforme seu pedido de recuperar a senha. Segue o link. Clique no link para redefinir a senha:" . $link;
            $assunto = "Buscador Cabreúva - Redefinição de Senha, Solicitado";
            $headers = "MIME-Version: 1.0\r\n" .
                    "From: suporte@buscadorcabreuva.com.br" . "\r\n" .
                    "Content-type: text/html;charset=utf-8" . "\r\n" .
                    "Reply-To: suporte@buscadorcabreuva.com.br \r\n" .
                    "X-Mailer: PHP/" . phpversion();

            mail($email, $assunto, $mensagem, $headers);
            // echo $mensagem;
            return true;
        } else {
            return false;
        }
    }

    public function redefinirSenha($token, $senha) {
        try {


         
            $sql = "SELECT * FROM clientes_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
        
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":hash", $token);

            $sql->execute();


            if ($sql->rowCount() > 0) {
               

                $sql = $sql->fetch();
                $id = $sql['id_cliente'];

                $sql = "UPDATE clientes SET senha ='$senha' WHERE id_clientes = $id";
               
              
                $sql = $this->db->prepare($sql);
            

                $sql->execute();
               
                if ($sql->rowCount() > 0) {
                
                    echo $sql = "UPDATE clientes_token SET used = 1  WHERE hash ='$token'";
                  
                    $sql = $this->db->prepare($sql);
                    

                    $sql->execute();

                    if ($sql->rowCount() > 0) {
                        
                        return "Senha Alterado com sucesso! Volte a logar com a nova senha redefinida. ";
                    } else {
                      

                        return "nao passou o token";
                    }
                }
            } else {
                return "token usado ou invalido!";
                exit;
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

                    $sql = "INSERT INTO clientes SET nome=:nome,telefone=:telefone,sexo=:sexo,email=:email,senha=:senha,data=NOW() ";
                    $sql = $this->db->prepare($sql);


                    $sql->bindValue(":nome", $nome);

                    $sql->bindValue(":sexo", $sexo);

                    $sql->bindValue(":email", $email);

                    $sql->bindValue(":senha", $senha);

                    $sql->bindValue(":telefone", $telefone);



                    $$_SESSION['lgCliente'] = $this->db->lastInsertId();

                    $sql->execute();

                    if ($sql->rowCount() > 0) {

                        header("Location:" . BASE_URL . "menuprincipal_loja?id_cliente=" . $_SESSION['lgCliente']);
                        exit();
                    } else {
                        return "Não foi posssivel cadastrar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
                    }
                } else {
                    return 'Senha não conferi!';
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
            $sql = "SELECT * FROM ramo ORDER BY nome";
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
            $sql = "SELECT *,c.endereco as endereco,c.email as email,COUNT(l.clientes_id_clientes) as quantidade FROM clientes c RIGHT JOIN loja l ON c.id_clientes=l.clientes_id_clientes WHERE c.id_clientes=:id";
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

            $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, endereco=:endereco WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':endereco', $endereco);



            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetch();

                header("Location:" . BASE_URL . "menuprincipal_loja");
                exit();
            } else {
                return "Não foi possivel atualizar, verifique os campos se estão corretos!";
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function updatePerfilSenha($id, $nome, $telefone, $endereco, $senha) {

        try {

            $sql = "UPDATE clientes SET nome=:nome, telefone=:telefone, endereco=:endereco, senha=:senha WHERE id_clientes=:id";
            $sql = $this->db->prepare($sql);

            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':senha', $senha);

            $sql->execute();
            if ($sql->rowCount() > 0) {



                header("Location:" . BASE_URL . "menuprincipal_loja");
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
            $sql = "SELECT loja.delivery,loja.palavrachave,loja.anuncio_site, loja.cnpj, loja.id_loja,ramo.id_ramo,ramo.nome,"
                    . " loja.nome_fantasia,clientes.nome ,loja.razao_social,loja.endereco,b.bairro_nome,loja.cidade,"
                    . " loja.telefone1,loja.telefone2,loja.whatsapp1,loja.whatsapp2,loja.email,loja.facebook,"
                    . " loja.youtube,loja.instagram,loja.site,clientes.cpf,loja.url_imagem_principal"
                    . " FROM loja INNER JOIN clientes on clientes.id_clientes=loja.clientes_id_clientes "
                    . " left JOIN ramo ON ramo.id_ramo=loja.ramo"
                    . " LEFT JOIN loja_has_bairros lb ON lb.id_loja = loja.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairro=lb.id_bairros"
                    . " WHERE clientes_id_clientes =:id_cliente  ORDER BY loja.id_loja";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_cliente', $id_cliente);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function getLojaCliente($id_cliente) {
        try {
            $sql = "SELECT *,ramo.nome as nome_ramo"
                    . " FROM loja left JOIN clientes on clientes.id_clientes=loja.clientes_id_clientes "
                    . " left JOIN ramo ON ramo.id_ramo=loja.ramo"
                    . " LEFT JOIN loja_has_bairros lb ON lb.id_loja = loja.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairro=lb.id_bairros"
                    . " WHERE loja.clientes_id_clientes =:id_cliente ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_cliente', $id_cliente);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) {
                    $value['id_loja'];
                }
               $_SESSION['id_loja']=$value['id_loja'];
                return $array;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

}
