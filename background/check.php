<?php
//include database connection
include '../libs/db_connect.php';
 
$userid=$_POST["userid"];
$username=$_POST["username"];
  
$query = "SELECT id, username FROM users WHERE (:userid =null OR id != :userid) AND username = :username";

//prepare query for excecution
$stmt = $con->prepare($query);

//bind the parameters
$stmt->bindParam(':userid', $_POST['userid']);
$stmt->bindParam(':username', $_POST['username']);

$stmt->execute();

//this is how to get number of rows returned
$find = $stmt->rowCount();

echo $find;
 
?>