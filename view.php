<?php
//include database connection
include 'libs/db_connect.php';

//select all data
$query = "SELECT username FROM users ORDER BY sort_id ASC";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found
		echo "<div id='slideshow'>";
		
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
			echo "<div>{$username}</div>";
        }
		echo "</div>";
}

echo "<script type='text/javascript'>"
   , "showCycle();"
   , "</script>";
?>