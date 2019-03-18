<?php

class funcionarios extends model{
    
    
    public function verificarLogin(){
        
        if(!isset($_SESSION['lg']) || (isset($_SESSION['lg']) && !empty($_SESSION['lg']))){
            header("Location:".BASE_URL."login");
            exit();
        }
        
    }
    
    public function logar($email,$senha) {
        try{
            $sql="SELECT * FROM funcionarios WHERE email=:email AND senha=:senha";
       
        
        if($sql->rowCount()>0){
            $sql=$sql->fecth();
        $_SESSION['lg']=$sql['id_funcionarios'];
        header("Location:".BASE_URL);
        exit();
    }else{
    
        return "E-mail e/ou senha errados!";
    }
        } catch (Exception $ex) {
$ex->getMessage();
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
