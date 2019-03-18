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
    
}
