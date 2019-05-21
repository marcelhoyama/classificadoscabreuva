<?php

class usuarios extends model{
    
    
    public function verificarLogin(){
        
        if(!isset($_SESSION['lg']) || (isset($_SESSION['lg']) && !empty($_SESSION['lg']))){
            header("Location:".BASE_URL."login");
            exit();
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
}
