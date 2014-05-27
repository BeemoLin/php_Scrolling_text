<?php
//include database connection
include '../libs/db_connect.php';

try{
	$_POST['list'];

	$output = array();
	$list = parse_str($list, $output);

	$save = implode(',', $output['sid']);

	$sort_id = 1;
	foreach ($output['sid'] as &$value) {
		echo "\n$sort_id=$value";
		
		$query = "update 
				users 
			set 
				sort_id = :sort_id
			where id = :id";
			
		//prepare query for excecution
		$stmt = $con->prepare($query);

		//bind the parameters
		$stmt->bindParam(':sort_id', $sort_id);

		$stmt->bindParam(':id', $value);
			
		// Execute the query
		if($stmt->execute()){
			echo "User was updated.";
		}else{
			echo "Unable to update user.";
		}
		
		$sort_id++;
	}
	
}
//to handle error
catch(PDOException $exception){
	echo "Error: " . $exception->getMessage();
}
?>
