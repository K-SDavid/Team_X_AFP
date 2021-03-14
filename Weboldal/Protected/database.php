<?php 
function getConnection() {
	$connection = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';',DB_USER, DB_PASS);
	$connection->exec("SET NAMES '".DB_CHARSET."'");
	return $connection;
}

?>