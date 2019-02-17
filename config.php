<?php
require 'environment.php';



$config = array();


if (ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/denilsonParceria/");
	$config['dbname']='denilson_db';
	$config['host']='localhost';
	$config['dbuser']='root';
	$config['dbpass']='';
}
else{

		define("BASE_URL", "http://psmaciel.buscadorcabreuva.com.br/");
        $config['dbname']='u708362941_psmac';
	$config['host']='localhost';
	$config['dbuser']='u708362941_psmac';
	$config['dbpass']='170655';
}


