<?php

class funcionarios extends model{
    
    
    public function verificarLogin(){
        
        if(!isset($_SESSION['lg']) || (isset($_SESSION['lg']) && empty($_SESSION['lg']))){
            header("Location:".BASE_URL."login_entrar");
            exit();
        }else{
            $id=$_SESSION['lg'];
            $ip=$_SERVER['REMOTE_ADDR'];
            
            $sql="SELECT * FROM funcionarios WHERE id_funcionario=:id AND funcionario_ip=:ip";
            $sql=$this->db->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->bindValue(":ip",$ip);
            $sql->execute();
           
            if($sql->rowCount() ==0){
              header("Location:".BASE_URL."menuprincipal_func");
                exit();
            }
        }
        
    }
    
    public function logar($email,$senha) {
        try{
            
            $sql="SELECT * FROM funcionarios WHERE funcionario_email=:email AND funcionario_senha=:senha";
       $sql=$this->db->prepare($sql);
       $sql->bindValue(":email",$email);
       $sql->bindValue(":senha", $senha);
       $sql->execute();
        
        if($sql->rowCount()>0){
            $sql=$sql->fetch();
        $_SESSION['lg']=$sql['id_funcionario'];
        $_SESSION['lgname']=$sql['funcionario_nome'];
        $id=$_SESSION['lg'];
        $ip=$_SERVER['REMOTE_ADDR'];
       
        $sql="UPDATE funcionarios SET funcionario_ip=:ip WHERE id_funcionario=:id";
        $sql=$this->db->prepare($sql);
        $sql->bindValue(":ip",$ip);
        $sql->bindValue(":id",$id);
        $sql->execute();
        
                 header("Location:".BASE_URL."menuprincipal_func");
         exit();
        
        
    }else{
    
        return FALSE;
    }
        } catch (Exception $ex) {
            echo 'Falhou:'.$ex->getMessage();
        }
        
    }
    public function setLogado() {
        
    }
    
    public function getName($id) {
        try{
            $array=array();
             $sql="SELECT funcionario_nome FROM funcionarios WHERE id_funcionario=:id";
             $sql= $this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->execute();
             if($sql->rowCount()>0){
             $array=$sql->fetch();
             $nome=$array['funcionario_nome'];
             return $nome;
             }
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
       
    }
    
    public function getDados($id) {
        try{
            $array=array();
            $sql="SELECT * FROM funcionarios WHERE id_funcionario=:id";
            $sql= $this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->execute();
             if($sql->rowCount()>0){
             $array=$sql->fetch();
             return $array;
             }
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
    }
    
    public function updatePerfil($id,$nome,$telefone,$endereco,$sexo) {
        try{
            $array=array();
            $sql="UPDATE funcionarios SET funcionario_nome=:nome WHERE id_funcionario=:id";
            $sql= $this->db->prepare($sql);
              $sql->bindValue(":id",$id);
            $sql->bindValue(":nome",$nome);
          
              $sql->bindValue(":senha",$senha);
             
           $sql->execute();
        
                 header("Location:".BASE_URL."perfil?id=".$id);
         exit();
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
        
    }
     public function updatePerfilSenha($id,$nome,$telefone,$endereco,$sexo,$senha) {
        try{
            
            $sql="UPDATE funcionarios SET funcionario_nome=:nome, funcionario_senha=:senha WHERE id_funcionario=:id";
            $sql= $this->db->prepare($sql);
               $sql->bindValue(":id",$id);
            $sql->bindValue(":nome",$nome);
       
              $sql->bindValue(":senha",$senha);
           $sql->execute();
        
                 header("Location:".BASE_URL."perfil?id=".$id);
         exit();
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
        
    }
    
}
