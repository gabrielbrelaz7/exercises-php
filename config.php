<?php

// DADOS PARA CONEXÃO POR XAMP SERVER
// $databaseHost = 'localhost';
// $databaseName = 'exercises';
// $databaseUsername = 'root';
// $databasePassword = '';

// DADOS PARA CONEXÃO POR LAMP SERVER
$databaseHost = 'database:3306';
$databaseName = 'lamp';
$databaseUsername = 'lamp';
$databasePassword = 'lamp';

try {
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception

} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>