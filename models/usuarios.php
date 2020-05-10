<?php

class usuarios extends model {

    public function verificarLogin() {

        if (!isset($_SESSION['lgUsuario']) || (isset($_SESSION['lgUsuario']) && empty($_SESSION['lgUsuario']))) {
            header("Location:" . BASE_URL . "login_entrar");
            exit();
        } else {
            $id = $_SESSION['lgUsuario'];
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "SELECT * FROM usuarios WHERE id_usuario=:id AND ip=:ip";
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
            $sql = "SELECT * FROM usuarios WHERE usuario_email=:email AND usuario_senha=:senha";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            if ($sql->rowCount() > 0) {

                $sql = $sql->fetch();
                $_SESSION['lgUsuario'] = $sql['id_usuario'];
                $_SESSION['lgname'] = $sql['usuario_nome'];
                $id = $_SESSION['lgUsuario'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $sql = "UPDATE usuarios SET usuario_ip=:ip WHERE id_usuario=:id";
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



        $sql = "SELECT * FROM usuarios WHERE usuario_email = :email ";
         $sql=$this->db->prepare($sql);
             $sql->bindValue(":email",$email);
                      $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id'];
            $token = md5(time() . rand(0, 9999) . rand(0, 9999));
            $expirado = date('Y-m-d H:i', strtotime('+1 months'));
            $sql = "INSERT INTO usuarios_token (id_usuario_token, usuario_hash, usuario_expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";

            $sql= $this->db->prepare($sql);
            $sql->bindValue(":id_usuario",$id);
            $sql->bindValue(":hash",$token);
            $sql->bindValue(":expirado_em", $expirado);;
             $sql->execute();

            $link = BASE_URL . "redefinir?token=" . $token;
            $mensagem = "Clique no link para redefinir a senha:" . $link;
            $assunto = "Redefinição de Senha";
            $headers = "From: suporte@buscadorcabreuva.com.br" . "\r\n" .
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


        $sql = "SELECT * FROM usuarios_token WHERE usuario_hash = :hash AND usuario_used = 0 AND usuario_expirado_em > NOW()";

         $sql=$this->db->prepare($sql);
             $sql->bindValue(":hash",$token);
             
             $sql->execute();


        if ($sql->rowCount() > 0) {


            $sql = $sql->fetch();
            $id = $sql['id_usuario'];

        $sql = "UPDATE usuarios SET usuario_senha = :senha WHERE id_usuario = :id ";

             $sql=$this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->bindValue(":senha",$senha);
             $sql->execute();
            if ($sql->rowCount() > 0) {

                $sql = "UPDATE usuarios_token SET usuario_used = 1  WHERE usuario_hash = :hash ";

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
            $sql = "SELECT usuario_email FROM usuarios WHERE usuario_email=:email ";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();
            //caso retorne 0 quer dizer que não existe o email
            if ($sql->rowCount() == 0) {
                if ($senha == $resenha) {
                    $sql = "INSERT usuarios SET usuario_nome=:nome, usuario_celular=:telefone, usuario_data_cadastro=:data, usuario_email=:email, usuario_senha=:senha, usuario_sexo=:sexo,usuario_situacao=:status,usuario_data_cadastro=NOW() ";
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
                        $sql = "SELECT * FROM usuarios WHERE id_usuario=$id";
                        $sql = $this->db->prepare($sql);
                        $sql->execute();
                        $sql = $sql->fetch();
                        $_SESSION['lgUsuario'] = $sql['id_usuario'];
                        $_SESSION['lgname'] = $sql['usuario_nome'];
                        $id = $_SESSION['lgUsuario'];
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $sql = "UPDATE usuarios SET usuario_ip=:ip WHERE id_usuario=:id";
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
            $sql = "SELECT usuario_nome FROM usuarios WHERE id_usuario=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
                $nome = $array['usuario_nome'];
                return $nome;
            }
        } catch (Exception $ex) {
            
        }
    }

    public function getDados($id) {
        try {
            $array = array();
            $sql = "SELECT * FROM usuarios WHERE id_usuario=:id";
        } catch (Exception $ex) {
            
        }
    }

    public function updatePerfil($id, $nome, $id_bairro, $telefone, $endereco, $email, $sexo,$senha) {
        try {
            $array = array();
            $sql = "UPDATE usuarios SET usuario_nome=:nome, usuario_celular=:telefone, usuario_endereco=:endereco,usuario_email=:email, usuario_sexo=:sexo, usuario_senha=:senha WHERE id_usuario=:id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome", $nome);
       
            $sql->bindValue(":telefone", $telefone);
           
            $sql->bindValue(":endereco", $endereco);
            
            $sql->bindValue(":sexo", $sexo);
    $sql->bindValue(":senha", $senha);

            $sql->execute();
            $sql="SELECT usuarios_id_usuario FROM usuarios_has_bairros WHERE usuarios_id_usuario=$id";
            $sql = $this->db->prepare($sql);
              $sql->execute();
              if($sql->rowCount()==0){
$sql="INSERT INTO usuarios_has_bairros SET usuarios_id_usuario=:id_usuario,bairros_id_bairros=:id_bairro";
 $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_usuario", $id);
            $sql->bindValue(":id_bairro", $id_bairro);
$sql->execute();
              } else {
                  $sql="UPDATE usuarios_has_bairros SET bairros_id_bairros=:id_bairro WHERE usuarios_id_usuario=:id_usuario";
 $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_usuario", $id);
            $sql->bindValue(":id_bairro", $id_bairro);
$sql->execute();
              }
            header("Location:" . BASE_URL . "perfil?id=" . $id);
            exit();
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }

   

}
