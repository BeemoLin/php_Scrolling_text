<?php
//include database connection
include '../libs/db_connect.php';

try{

	$query = "SELECT id, username FROM users WHERE username = :username";

	//prepare query for excecution
	$stmt = $con->prepare($query);

	//bind the parameters
	$stmt->bindParam(':username', $_POST['username']);

	$stmt->execute();

	//this is how to get number of rows returned
	$find = $stmt->rowCount();

	echo $find;
	
	if($find==0)
	{
		//write query
		$query = "INSERT INTO users SET username = ?";

		//prepare query for excecution
		$stmt = $con->prepare($query);

		//this is the third question mark
		$stmt->bindParam(1, $_POST['username']);

		// Execute the query
		if($stmt->execute()){
			echo "User was created.";
		}else{
			echo "Unable to created user.";
		}
	}
}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>