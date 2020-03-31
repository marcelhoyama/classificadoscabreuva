<?php

class lojas extends model {

   

    

   
   

//    public function cadastrar($nome, $email, $telefone, $sexo, $senha, $resenha) {
//        try {
//           
//            $sql = "SELECT email FROM clientes WHERE email=:email ";
//            $sql = $this->db->prepare($sql);
//            $sql->bindValue(":email", $email);
//            $sql->execute();
//            //caso retorne 0 quer dizer que não existe o email
//            if ($sql->rowCount() == 0) {
//          
//                if($senha == $resenha){
//            
//                $sql = "INSERT INTO clientes SET nome=:nome,telefone=:telefone,sexo=:sexo,email=:email,senha=:senha,data=:data,status=:status ";
//                $sql = $this->db->prepare($sql);
//                
//               
//                $sql->bindValue(":nome", $nome);
//               
//                $sql->bindValue(":sexo", $sexo);
//               
//                $sql->bindValue(":email", $email);
//               
//                $sql->bindValue(":senha", $senha);
//                 
//                $sql->bindValue(":telefone", $telefone);
//                 $sql->bindValue(":data",'now()');
//                   $sql->bindValue(":status",1);
//    
//                $sql->execute();
//           
//                if ($sql->rowCount() > 0) {
//                     $id = $this->db->lastInsertId();
//                        $sql = "SELECT * FROM clientes WHERE id_clientes=$id";
//                        $sql = $this->db->prepare($sql);
//                        $sql->execute();
//                        $sql = $sql->fetch();
//                        $_SESSION['lgCliente'] = $sql['id_clientes'];
//                        $_SESSION['lgname'] = $sql['nome'];
//                        $id = $_SESSION['lgCliente'];
//                        $ip = $_SERVER['REMOTE_ADDR'];
//
//                        $sql = "UPDATE clientes SET ip=:ip WHERE id_clientes=:id";
//                        $sql = $this->db->prepare($sql);
//                        $sql->bindValue(":ip", $ip);
//                        $sql->bindValue(":id", $id);
//                        $sql->execute();
//
//                       
//                    header("Location:" . BASE_URL . "menuprincipal_loja");
//                    exit();
//                } else {
//                    return "Não foi posssivel cadastrar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
//                }
//            }
//            } else {
//                return "Já existe um cadastro! ";
//            }
//        } catch (Exception $ex) {
//            echo 'Falhou:' . $ex->getMessage();
//        }
//    }
//
//    
//    
//      public function editar($id,$nome, $email, $telefone, $sexo, $status) {
//        try {
//        
//           
//              
//                $id_funcionario = 1;
//                $sql = "UPDATE clientes SET nome=:nome,telefone=:telefone,sexo=:sexo,email=:email, status=:status WHERE id_clientes=:id";
//                $sql = $this->db->prepare($sql);
//               
//               
//                $sql->bindValue(":nome", $nome);
//                $sql->bindValue(":sexo", $sexo);
//                $sql->bindValue(":email", $email);
//               // $sql->bindValue(":senha", $senha);
//                $sql->bindValue(":telefone", $telefone);
//                $sql->bindValue(":status",$status);
//                $sql->bindValue(":id",$id);
//                $sql->execute();
//                if ($sql->rowCount() > 0) {
//                   
//                    header("Location:" . BASE_URL . "menuprincipal_func");
//                    exit();
//                } else {
//                    return "Não foi posssivel Atualizar! Verifique os campos se estão preenchidos corretamente e tente novamente!";
//                }
//           
//        } catch (Exception $ex) {
//            echo 'Falhou:' . $ex->getMessage();
//        }
//    }
//    
//    
       public function listarPorRamo() {
        $array = array();
        try {
            $sql = "SELECT *,d.nome AS funcionamento,r.nome AS nome_ramo FROM ramo r " 
		    ."left join ramo_has_loja rl ON r.id_ramo = rl.ramo_id_ramo "
                    ."left join loja l ON l.id_loja=rl.loja_id_loja "
                     ."left join dia_semana d ON l.id_loja=d.id_loja "
                     ."left JOIN url_imagens i ON i.loja_id_loja=l.id_loja "
                     ."GROUP BY r.nome  ";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo "Falhou:" . $ex->getMessage();
        }
    }
    public function listarLojas() {
        $array = array();
        try {
            $sql = "SELECT *,d.nome AS funcionamento,r.nome AS nome_ramo FROM loja l left join ramo_has_loja"                    ." rl ON l.id_loja = rl.loja_id_loja "
                    ."left join ramo r ON rl.ramo_id_ramo=r.id_ramo "
                     ."left join dia_semana d ON l.id_loja=d.id_loja "
                     ."left JOIN url_imagens i ON i.loja_id_loja=l.id_loja "
                    ."GROUP BY l.id_loja ";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
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
           $sql="SELECT *,COUNT(id_loja) AS 'quantidade' FROM loja WHERE clientes_id_clientes = :id";
           $sql=$this->db->prepare($sql);
           $sql-> bindValue('id',$id);
           $sql->execute();
           
            if ($sql->rowCount() > 0) {
               $array= $sql->fetchAll(PDO::FETCH_ASSOC);
               return $array;
            }
       } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
       } 
        
    }
}
