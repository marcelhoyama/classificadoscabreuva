<?php

class usuarios extends model {

    public function verificarLogin() {

        if (!isset($_SESSION['lgUsuario']) || (isset($_SESSION['lgUsuario']) && empty($_SESSION['lgUsuario']))) {
            header("Location:" . BASE_URL . "login_entrar");
            exit();
        } else {
            $id = $_SESSION['lgUsuario'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "SELECT * FROM usuarios WHERE id_usuarios=:id AND ip=:ip";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":ip", $ip);
            $sql->execute();

            if ($sql->rowCount() == 0) {
                header("Location:" . BASE_URL . "menuprincipal");
                exit();
            }
        }
    }

    public function logar($email, $senha) {
        try {
            $sql = "SELECT * FROM usuarios WHERE email=:email AND senha=:senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $sql = $sql->fetch();
                $_SESSION['lgUsuario'] = $sql['id_usuarios'];
                $_SESSION['lgname'] = $sql['nome'];
                $id = $_SESSION['lgUsuario'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $sql = "UPDATE usuarios SET ip=:ip WHERE id_usuarios=:id";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":ip", $ip);
                $sql->bindValue(":id", $id);
                $sql->execute();

                header("Location:" . BASE_URL . "menuprincipal");
                exit();
            } else {

                return FALSE;
            }
        } catch (Exception $ex) {
            echo 'Falhou:' . $ex->getMessage();
        }
    }

     public function esquecisenha($email) {



        $sql = "SELECT * FROM usuarios WHERE email = :email ";
         $sql=$this->db->prepare($sql);
             $sql->bindValue(":email",$email);
                      $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id'];
            $token = md5(time() . rand(0, 9999) . rand(0, 9999));
            $expirado = date('Y-m-d H:i', strtotime('+1 months'));
            $sql = "INSERT INTO usuario_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";

            $sql= $this->db->prepare($sql);
            $sql->bindValue(":id_usuario",$id);
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


        $sql = "SELECT * FROM usuario_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";

         $sql=$this->db->prepare($sql);
             $sql->bindValue(":hash",$token);
             
             $sql->execute();


        if ($sql->rowCount() > 0) {


            $sql = $sql->fetch();
            $id = $sql['id_usuario'];

        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id ";

             $sql=$this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->bindValue(":senha",$senha);
             $sql->execute();
            if ($sql->rowCount() > 0) {

                $sql = "UPDATE usuario_token SET used = 1  WHERE hash = :hash ";

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
    
    
    
    public function cadastro($nome, $email, $telefone, $sexo, $senha, $resenha) {
        try {
            $sql = "SELECT email FROM usuarios WHERE email=:email ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();
            //caso retorne 0 quer dizer que não existe o email
            if ($sql->rowCount() == 0) {
                if ($senha == $resenha) {
                    $sql = "INSERT usuarios SET nome=:nome, telefone=:telefone, data_2=:data, email=:email, senha=:senha, sexo=:sexo,status=:status,data_2=NOW() ";
                    $sql = $this->db->prepare($sql);

                    $sql->bindValue(":nome", $nome);
                    $sql->bindValue(":telefone", $telefone);
                    $sql->bindValue(":data", 'now()');
                    $sql->bindValue(":email", $email);
                    $sql->bindValue(":senha", $senha);
                    $sql->bindValue(":sexo", $sexo);
                    $sql->bindValue(":status", 1);
                    $sql->execute();

                    if ($sql->rowCount() > 0) {
                        $id = $this->db->lastInsertId();
                        $sql = "SELECT * FROM usuarios WHERE id_usuarios=$id";
                        $sql = $this->db->prepare($sql);
                        $sql->execute();
                        $sql = $sql->fetch();
                        $_SESSION['lgUsuario'] = $sql['id_usuarios'];
                        $_SESSION['lgname'] = $sql['nome'];
                        $id = $_SESSION['lgUsuario'];
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $sql = "UPDATE usuarios SET ip=:ip WHERE id_usuarios=:id";
                        $sql = $this->db->prepare($sql);
                        $sql->bindValue(":ip", $ip);
                        $sql->bindValue(":id", $id);
                        $sql->execute();

                        header("Location:" . BASE_URL . "menuprincipal");
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

    public function setLogado() {
        
    }

    public function getNome($id) {
        try {
            $array = array();
            $sql = "SELECT nome FROM usuarios WHERE id_usuarios=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                $nome = $array['nome'];
                return $nome;
            }
        } catch (Exception $ex) {
            
        }
    }

    public function getDados($id) {
        try {
            $array = array();
            $sql = "SELECT * FROM usuarios WHERE id_usuarios=:id";
        } catch (Exception $ex) {
            
        }
    }

    public function updatePerfil($id, $nome, $bairro, $cidade, $telefone, $data, $endereco, $email, $sexo) {
        try {
            $array = array();
            $sql = "UPDATE usuarios SET nome=:nome,bairro=:bairro, cidade=:cidade, telefone=:telefone, endereco=:endereco,email=:email, sexo=:sexo WHERE id_usuarios=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":bairro", $bairro);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":data_2", $data);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":sexo", $sexo);


            $sql->execute();

            header("Location:" . BASE_URL . "perfil?id=" . $id);
            exit();
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

    public function updatePerfilSenha($id, $nome, $bairro, $cidade, $telefone, $data, $endereco, $email, $sexo, $senha) {
        try {

            $sql = "UPDATE usuarios SET nome=:nome,bairro=:bairro, cidade=:cidade, telefone=:telefone, endereco=:endereco,email=:email, sexo=:sexo, senha=:senha WHERE id_usuarios=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":bairro", $bairro);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":data_2", $data);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":sexo", $sexo);
            $sql->bindValue(":senha", $senha);

            $sql->execute();

            header("Location:" . BASE_URL . "perfil?id=" . $id);
            exit();
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

}
