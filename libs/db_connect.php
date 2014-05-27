<?php
$host = "localhost";
$db_name = "curd";
$username = "root";
$password = "123456";
global $con;
try {

	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}catch(PDOException $exception){ //to handle connection error
	echo "Connection error: " . $exception->getMessage();
}
?>