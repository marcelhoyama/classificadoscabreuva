<?php

class funcionarios extends model{
    
    
    public function verificarLogin(){
        
        if(!isset($_SESSION['lg']) || (isset($_SESSION['lg']) && !empty($_SESSION['lg']))){
            header("Location:".BASE_URL."login");
            exit();
        }else{
            $id=$_SESSION['lg'];
            $ip=$_SERVER['REMOTE_ADDR'];
            
            $sql="SELECT * FROM funcionarios WHERE id_funcionarios =:id AND ip=:ip";
            $sql=$db->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->bindValue(":ip",$ip);
            $sql->execute();
            if($sql->rowCount() ==0){
                header("Location:login");
                exit();
            }
        }
        
    }
    
    public function logar($email,$senha) {
        try{
            $sql="SELECT * FROM funcionarios WHERE email=:email AND senha=:senha";
       $sql=$db->prepare($sql);
       $sql->bindValue(":email",$email);
       $sql->bindValue(":senha", $senha);
       $sql->execute();
        
        if($sql->rowCount()>0){
            $sql=$sql->fecth();
        $_SESSION['lg']=$sql['id_funcionarios'];
        $ip=$_SERVER['REMOTE_ADDR'];
        
        $sql="UPDATE funcionarios SET ip=:ip WHERE id_funcionarios=:id ";
        $sql=$db->prepare($sql);
        $sql->bindValue(":ip",$ip);
        $sql->execute();
        if($sql->rowCount()>0){
            
         header("Location:".BASE_URL."menuprincipal");
         exit();
        }
        
    }else{
    
        return "E-mail e/ou senha errados!";
    }
        } catch (Exception $ex) {
            echo 'Falhou:'.$ex->getMessage();
        }
        
    }
    public function setLogado() {
        
    }
    
    public function getNome($id) {
        try{
             $sql="SELECT nome FROM funcionarios WHERE id_funcionarios=:id";
        } catch (Exception $ex) {

        }
       
    }
    
    public function getDados($id) {
        try{
            $array=array();
            $sql="SELECT * FROM funcionarios WHERE id_funcionarios=:id";
            
        } catch (Exception $ex) {

        }
    }
    
}
