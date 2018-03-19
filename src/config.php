<?php

define("DB_S", "mysql:dbname=blog;host=127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");

try{
	
	$pdo = new PDO(DB_S, DB_USER, DB_PASS);

}catch(PDOException $error){
	
	echo "Não foi possível conectar ao banco de dados! ->". $error->getMessage();
	
}