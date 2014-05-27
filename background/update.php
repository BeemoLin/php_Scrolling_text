<?php
//include database connection
include '../libs/db_connect.php';

try{


	$query = "SELECT id, username FROM users WHERE id != :userid AND username = :username";

	//prepare query for excecution
	$stmt = $con->prepare($query);

	//bind the parameters
	$stmt->bindParam(':userid', $_POST['userid']);
	$stmt->bindParam(':username', $_POST['username']);

	$stmt->execute();

	//this is how to get number of rows returned
	$find = $stmt->rowCount();

	echo $find;
	
	if($find==0)
	{
		//write query
		//in this case, it seemed like we have so many fields to pass and 
		//its kinda better if we'll label them and not use question marks
		//like what we used here
		$query = "update 
					users 
				set 
					username = :username
				where
					id = :userid";

		//prepare query for excecution
		$stmt = $con->prepare($query);

		//bind the parameters
		$stmt->bindParam(':username', $_POST['username']);

		$stmt->bindParam(':userid', $_POST['userid']);

		// Execute the query
		if($stmt->execute()){
			echo "User was updated.";
			exit();
		}else{
			echo "Unable to update user.";
		}
	}

}

//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>