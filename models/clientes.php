<?php

class clientes extends model {

    public function verificarLogin() {

        if (!isset($_SESSION['lgCliente']) || (isset($_SESSION['lgCliente']) && empty($_SESSION['lgCliente']))) {
            header("Location:" . BASE_URL . "login_entrar_1");
            exit();
        } else {
            $id = $_SESSION['lgCliente'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "SELECT * FROM clientes WHERE id_clientes=:id AND cliente_ip=:ip";
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
            $sql = "SELECT * FROM clientes WHERE cliente_email=:email AND cliente_senha=:senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                $_SESSION['lgCliente'] = $sql['id_clientes'];
                $_SESSION['lgname'] = $sql['cliente_nome'];
                $id = $_SESSION['lgCliente'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $sql = "UPDATE clientes SET cliente_ip=:ip WHERE id_clientes=:id";
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



        $sql = "SELECT * FROM clientes WHERE cliente_email = :email ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id_clientes'];
            $token = md5(time() . rand(0, 9999) . rand(0, 9999));
            $expirado = date('Y-m-d H:i', strtotime('+1 months'));
            $sql = "INSERT INTO clientes_token (clientes_id_clientes, cliente_hash, cliente_expirado_em) VALUES (:id_cliente, :hash, :expirado_em)";

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


         
            $sql = "SELECT * FROM clientes_token WHERE cliente_hash = :hash AND cliente_used = 0 AND cliente_expirado_em > NOW()";
        
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":hash", $token);

            $sql->execute();


            if ($sql->rowCount() > 0) {
               

                $sql = $sql->fetch();
                $id = $sql['clientes_id_clientes'];

                $sql = "UPDATE clientes SET cliente_senha ='$senha' WHERE id_clientes = $id";
               
              
                $sql = $this->db->prepare($sql);
            

                $sql->execute();
               
                if ($sql->rowCount() > 0) {
                
                    echo $sql = "UPDATE clientes_token SET cliente_used = 1  WHERE cliente_hash ='$token'";
                  
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

            $sql = "SELECT cliente_cpf FROM clientes WHERE cliente_cpf=:cpf";
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
            $sql = "SELECT * FROM clientes c LEFT JOIN lojas l ON c.id_clientes=l.clientes_id_clientes WHERE c.cliente_nome LIKE :palavra";
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

            $sql = "SELECT cliente_email FROM clientes WHERE cliente_email=:email ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();
            //caso retorne 0 quer dizer que não existe o email
            if ($sql->rowCount() == 0) {

                if ($senha == $resenha) {

                    $sql = "INSERT INTO clientes SET cliente_nome=:nome,cliente_celular=:telefone,cliente_sexo=:sexo,cliente_email=:email,cliente_senha=:senha,cliente_data_cadastro=NOW() ";
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
            $sql = "UPDATE clientes SET cliente_nome=:nome,cliente_celular=:telefone,cliente_sexo=:sexo,cliente_email=:email, cliente_situacao=:status WHERE id_clientes=:id";
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
            $sql = "SELECT *,lojas.id_loja id_loja FROM clientes INNER JOIN lojas ON lojas.clientes_id_clientes=clientes.id_clientes";
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
                $nome = $array['cliente_nome'];
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
            $sql = "SELECT *,c.cliente_endereco as endereco,c.cliente_email as email,COUNT(l.clientes_id_clientes) as quantidade FROM clientes c RIGHT JOIN lojas l ON c.id_clientes=l.clientes_id_clientes WHERE c.id_clientes=:id";
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

            $sql = "UPDATE clientes SET cliente_nome=:nome, cliente_telefone=:telefone, cliente_endereco=:endereco WHERE id_clientes=:id";
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

            $sql = "UPDATE clientes SET cliente_nome=:nome, cliente_celular=:telefone, cliente_endereco=:endereco, senha=:senha WHERE id_clientes=:id";
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
            $sql = "SELECT id_loja,loja_nome_fantasia,COUNT(id_loja) AS 'quantidade' FROM lojas WHERE clientes_id_clientes = :id";
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
            $sql = "SELECT loja_delivery,palavra_chave_nome,loja_anunciar, loja_cnpj_cpf,id_loja,id_ramo,ramos_nome,"
                    . " loja_nome_fantasia,cliente_nome ,loja_razao_social,loja_endereco,bairro_nome,cidade_nome,"
                    . " loja_fixo,loja_celular,delivery_fixo,delivery_celular,loja_email,loja_facebook,"
                    . " loja_youtube,loja_instagram,loja_site,cliente_cpf,loja_imagem_principal"
                    . " FROM lojas INNER JOIN clientes on clientes.id_clientes=lojas.clientes_id_clientes "
                    . "LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                    . " left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                    . " LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                    . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                    . " LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                    . " LEFT JOIN palavraschaves p ON p.lojas_id_loja=lojas.id_loja"
                    . " WHERE clientes_id_clientes =:id_cliente  ORDER BY lojas.id_loja";
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
            $sql = "SELECT * FROM lojas left JOIN clientes on clientes.id_clientes=lojas.clientes_id_clientes "
                     . "LEFT JOIN subramos_has_lojas subr ON subr.lojas_id_loja=lojas.id_loja"
                    . " left JOIN subramos ON subramos.id_subramos=subr.subramos_id_subramos"
                    . " LEFT JOIN ramos ON ramos.id_ramo=subramos.ramos_id_ramo"
                    . " LEFT JOIN lojas_has_bairros lb ON lb.lojas_id_loja = lojas.id_loja"
                    . " LEFT JOIN bairros b ON b.id_bairros=lb.bairros_id_bairros"
                    . " LEFT JOIN cidades ON cidades.id_cidades=b.cidades_id_cidades"
                    . " LEFT JOIN palavraschaves p ON p.lojas_id_loja=lojas.id_loja"
                    . " WHERE lojas.clientes_id_clientes =:id_cliente ";
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
