<?php

class lojas extends model{
    
    
    public function verificarCnpj($cnpj){
      try{
                    
          $sql="SELECT cnpj FROM lojas WHERE cnpj=:cnpj";
          $sql= $this->db->prepare($sql);
          $sql->bindValue(":cnpj",$cnpj);
          $sql->execute();
          if($sql->rowCount()>0){
              return TRUE;
          }else{
              return FALSE;
          }
      } catch (Exception $ex) {
          echo 'Falhou:'.$ex->getMessage();
      }
        }
        
    
        public function cadastrarRamo($id_loja,$id_ramo) {
            try{
                $sql="INSERT INTO loja_ramo ($id_loja,$id_ramo) VALUES (:id_loja, :id_ramo)";
                  $sql= $this->db->prepare($sql);
                $sql->bindValue(":id_loja",$id_loja);
                $sql->binValue(":id_ramo",$id_ramo);
                
                $sql->execute();
                if($sql->rowCount()>0){
                    return TRUE;
                }
            } catch (Exception $ex) {

            }
        }
    
        
        public function pesquisarCliente($palavra) {
            try{
                $array=array();
                $sql="SELECT * FROM clientes WHERE nome LIKE :palavra";
                $sql= $this->db->prepare($sql);
                $sql->bindValue(":palavra",$palavra."%");
                $sql->execute();
                
                if($sql->rowCount()>0){
                    
                     $array=$sql->fetchAll();
                    return $array;
                }else{
                    return false;
                }
            } catch (Exception $ex) {
                echo 'Falhou:'.$ex->getMessage();
            }
            
        }
    
        public function cadastrar($id_funcionario,$nome, $email, $telefone, $cpf) {
            try{
                
        
                $sql="INSERT INTO clientes (funcionarios_id_funcionarios,clientes_id_clientes,nome,razao_social,cnpj,endereco,telefone1,telefone2,status,whatsapp,email,facebook,youtube,site,descricao,chamada,url_imagem_principal) VALUES (:id_funcionario,:id_cliente,:nome,:razao_social,:cnpj,:endereco,:telefone1,:telefone2,:status,:whatsapp,:email,:facebook,:youtube,:site,:descricao,:chamada,:url_imagem_principal) ";
           $sql= $this->db->prepare($sql);
           $sql->bindValue(":funcionarios_id_funcionarios",$id_funcionario);
           $sql->bindValue(":clientes_id_cliente",$id_cliente);
           $sql->bindValue(":nome_fantasia",$nome);
            $sql->bindValue(":razao_social",$razao_social);
             $sql->bindValue(":cnpj",$cnpj);
              $sql->bindValue(":endereco",$endereco);
           $sql->bindValue(":telefone1",$telefone1);
           $sql->bindValue(":telefone2",$telefone2);
           $sql->bindValue(":status",$status);
           $sql->bindValue(":whatsapp",$whatsapp);
           $sql->bindValue(":email",$email);
           $sql->bindValue(":facebook",$facebook);
           $sql->bindValue(":youtube",$youtube);
           $sql->bindValue(":site",$site);
           $sql->bindValue(":descricao",$descricao);
           $sql->bindValue(":chamada",$chamada);
           $sql->bindValue(":url_imagem_principal",$url_imagem_principal);
           $sql->bindValue(":chave1",$chave1);
           $sql->execute();
           if($sql->rowCount()>0){
               $id_loja=$sql->lastInsertId();
               return $id_loja;                      
//           $sql = "INSERT INTO palavras_buscadas (palavra,loja_id_loja) VALUES (:palavra,:id_loja)";
//           $sql=$this->db->prepare($sql);
//            $sql->bindValue(":palavra", $palavra);
//                   $sql->bindValue(":id_loja", $id_loja);
//            $sql->execute();
            
          
        
           
        
    
           }
                
                 
                } catch (Exception $ex) {
                    echo 'Falhou:'.$ex->getMessage();
            }
            
        }
        
        public function listarClientes() {
            
            try{
                $sql="SELECT * FROM clientes";
                $sql= $this->db->prepare($sql);
                $sql->execute();
                if($sql->rowCount()>0){
                    
                     $array=$sql->fetchAll();
                    return $array;
                }else{
                    return false;
                }
            } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
            }
            
        }
        
        public function listarRamo() {
            $array=array();
            try{
                $sql="SELECT * FROM ramo_atividade";
                $sql= $this->db->prepare($sql);
                $sql->execute();
                if($sql->rowCount()>0){
                    $array=$sql->fetchAll();
                return $array;
                    
                }
            } catch (Exception $ex) {
                echo 'Falhou:'.$ex->getMessage();
            }
        }

         public function listarCliente($id) {
            $array=array();
            try{
                $sql="SELECT * FROM clientes WHERE id=:id";
                $sql= $this->db->prepare($sql);
                $sql->bindValue(':id',$id);
                $sql->execute();
                if($sql->rowCount()>0){
                    
                     $array=$sql->fetch();
                    return $array;
                }else{
                    return false;
                }
            } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
            }
        
        
            }
            
             public function getName($id) {
            
            try{
                $sql="SELECT nome FROM clientes WHERE id_clientes=:id";
                $sql= $this->db->prepare($sql);
                $sql->bindValue(':id',$id);
                $sql->execute();
                if($sql->rowCount()>0){
                    
                     $array=$sql->fetch();
                    $nome=$array['nome'];
             return $nome;
                }else{
                    return false;
                }
            } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
            }
        
        
            }
}


