<?php

class usuarios extends model{
    
    
    public function verificarLogin(){
        
        if(!isset($_SESSION['lgUsuario']) || (isset($_SESSION['lgUsuario']) && empty($_SESSION['lgUsuario']))){
            header("Location:".BASE_URL."login_entrar");
            exit();
        }else {
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
    
      public function logar($email,$senha) {
        try{
            $sql="SELECT * FROM usuarios WHERE email=:email AND senha=:senha";
       $sql=$this->db->prepare($sql);
       $sql->bindValue(":email",$email);
       $sql->bindValue(":senha", $senha);
       $sql->execute();
        
        if($sql->rowCount()>0){
            
            $sql=$sql->fetch();
        $_SESSION['lgUsuario']=$sql['id_usuarios'];
        $_SESSION['lgname']=$sql['nome'];
        $id=$_SESSION['lgUsuario'];
        $ip=$_SERVER['REMOTE_ADDR'];
      
        $sql="UPDATE usuarios SET ip=:ip WHERE id_usuarios=:id";
        $sql=$this->db->prepare($sql);
        $sql->bindValue(":ip",$ip);
        $sql->bindValue(":id",$id);
        $sql->execute();
        
                 header("Location:".BASE_URL."menuprincipal");
         exit();
        
        
    }else{
    
        return FALSE;
    }
        } catch (Exception $ex) {
            echo 'Falhou:'.$ex->getMessage();
        }
        
    }
        
      public function cadastro($nome,$telefone,$email, $senha,$sexo) {
        try{
            $sql="INSERT usuarios SET nome=:nome, telefone=:telefone, data_2=:data, email=:email, senha=:senha, sexo=:sexo ";
       $sql=$this->db->prepare($sql);
       
       $sql->bindValue(":nome",$nome);
       $sql->bindValue(":telefone",$telefone);
       $sql->bindValue(":data",'now()');
       $sql->bindValue(":email",$email);
       $sql->bindValue(":senha", $senha);
       $sql->bindValue(":sexo",$sexo);
       $sql->execute();
        
        if($sql->rowCount()>0){
            $id=$this->db->lastInsertId ();
            $sql="SELECT * FROM usuarios WHERE id_usuarios=$id";
             $sql=$this->db->prepare($sql);
                 $sql->execute();
            $sql=$sql->fetch();
        $_SESSION['lgUsuario']=$sql['id_usuarios'];
        $_SESSION['lgname']=$sql['nome'];
        $id=$_SESSION['lgUsuario'];
        $ip=$_SERVER['REMOTE_ADDR'];
       
        $sql="UPDATE usuarios SET ip=:ip WHERE id_usuarios=:id";
        $sql=$this->db->prepare($sql);
        $sql->bindValue(":ip",$ip);
        $sql->bindValue(":id",$id);
        $sql->execute();
        
                 header("Location:".BASE_URL."menuprincipal");
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
 
    
     public function getNome($id) {
        try{
            $array=array();
             $sql="SELECT nome FROM usuarios WHERE id_usuarios=:id";
             $sql= $this->db->prepare($sql);
             $sql->bindValue(":id",$id);
             $sql->execute();
             if($sql->rowCount()>0){
             $array=$sql->fetch();
             $nome=$array['nome'];
             return $nome;
             }
        } catch (Exception $ex) {

        }
       
    }
    
    public function getDados($id) {
        try{
            $array=array();
            $sql="SELECT * FROM usuarios WHERE id_usuarios=:id";
            
        } catch (Exception $ex) {

        }
    }
    
     public function updatePerfil($id,$nome,$bairro, $cidade, $telefone,$data, $endereco,$email,$sexo) {
        try{
            $array=array();
            $sql="UPDATE usuarios SET nome=:nome,bairro=:bairro, cidade=:cidade, telefone=:telefone, endereco=:endereco,email=:email, sexo=:sexo WHERE id_usuarios=:id";
            $sql= $this->db->prepare($sql);
              $sql->bindValue(":id",$id);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":bairro",$bairro);
            $sql->bindValue(":telefone",$telefone);
            $sql->bindValue(":data_2",$data);
            $sql->bindValue(":endereco",$endereco);
            $sql->bindValue(":email",$email);
             $sql->bindValue(":sexo",$sexo);
             
             
           $sql->execute();
        
                 header("Location:".BASE_URL."perfil?id=".$id);
         exit();
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
        
    }
     public function updatePerfilSenha($id,$nome,$bairro, $cidade, $telefone,$data, $endereco,$email,$sexo,$senha) {
        try{
            
            $sql="UPDATE usuarios SET nome=:nome,bairro=:bairro, cidade=:cidade, telefone=:telefone, endereco=:endereco,email=:email, sexo=:sexo, senha=:senha WHERE id_usuarios=:id";
            $sql= $this->db->prepare($sql);
              $sql->bindValue(":id",$id);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":bairro",$bairro);
            $sql->bindValue(":telefone",$telefone);
            $sql->bindValue(":data_2",$data);
            $sql->bindValue(":endereco",$endereco);
            $sql->bindValue(":email",$email);
             $sql->bindValue(":sexo",$sexo);
             $sql->bindValue(":senha",$senha);
             
           $sql->execute();
        
                 header("Location:".BASE_URL."perfil?id=".$id);
         exit();
        } catch (Exception $ex) {
echo "Falhou:".$ex->getMessage();
        }
        
    }
}
