<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development'){
    define("BASE_URL", "http://localhost/classificadoscabreuva/");
    $config['dbname']='buscadorcabreuva';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}else{
     define("BASE_URL", "http://buscadorcabreuva.com.br/");
  
    $config['dbname']='classificadoscabreuva';
    $config['host']='localhost';
    $config['dbuser']='root';
    $config['dbpass']='';
}
    
    
global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //mostrar o erro rowCount();
} catch(PDOException $e) {
	echo "FALHOU: ".$e->getMessage();
	exit;
}
