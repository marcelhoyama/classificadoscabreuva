<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/classificadoscabreuva/prestacao-servico/");
    $config['dbname']='buscadorcabreuva';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}else{
     define("BASE_URL", "https://lsseguranca.com.br/");
  
    $config['dbname']='lsseguranca';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}
    
    
global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
