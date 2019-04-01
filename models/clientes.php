<?php

class clientes extends model{
    
    
    public function verificarCPF($cpf){
      try{
          $sql="SELECT cpf FROM clientes WHERE cpf=:cpf";
          $sql= $this->db->prepare($sql);
          $sql->bindValue(":cpf",$cpf);
          $sql->execute();
          if($sql->rowCount()>0){
              return TRUE;
          }
      } catch (Exception $ex) {
          echo 'Falhou:'.$ex->getMessage();
      }
        }
        
    
        public function verificarExiste($cpf) {
            try{
                
            } catch (Exception $ex) {

            }
        }
    
        
        public function pesquisarCliente($palavra) {
            try{
                $array=array();
                $sql="SELECT * FROM clientes WHERE nome LIKE '%:palavra' ";
                $sql= $this->db->prepare($sql);
                $sql->bindValue(":palavra",$palavra);
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
                if(verificarCPF($cpf)==TRUE){
                $sql="INSERT INTO clientes (id_funcionario,nome,email,telefone,cpf) VALUES (:id_funcionario,:nome,:email,:telefone,:cpf) ";
           $sql= $this->db->prepare($sql);
           $sql->bindValue(":id_funcionario",$id_funcionario);
           $sql->bindValue(":nome",$nome);
           $sql->bindValue(":email",$email);
           $sql->bindValue(":telefone",$telefone);
           $sql->bindValue(":cpf",$cpf);
           $sql->execute();
           if($sql->rowCount()>0){
               return TRUE;
           }
                }
                } catch (Exception $ex) {
                    echo 'Falhou:'.$ex->getMessage();
            }
            
        }
}