<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/classificadoscabreuva/comerciante/");
    $config['dbname']='buscadorcabreuva';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}else{
        define("BASE_URL", "https://www.buscadorcabreuva.com.br/comerciante/");
  
    $config['dbname']='u708362941_busca';
    $config['host']='localhost';
    $config['dbuser']='u708362941_busca';
    $config['dbpass']='uP:i+c0!';
}
    
    
global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
