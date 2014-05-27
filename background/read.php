<?php
//include database connection
include '../libs/db_connect.php';

//select all data
$query = "SELECT id, username FROM users ORDER BY sort_id ASC";
$stmt = $con->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found

    echo "<table class='tftable' border='1'>";//start table
    
        //creating our table heading
        echo "<tr>";
			echo "<th>排序</th>";
            echo "<th>名稱</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr>";
        echo "<tbody id='sort'>";
		
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
            
            //creating new table row per record
            echo "<tr id=sid_{$id}>";
				echo "<td class='item'><div class='customBtn'>↑↓</div></td>";
                echo "<td>{$username}</td>";
                echo "<td style='text-align:center;'>";
					// add the record id here
					echo "<div class='userId'>{$id}</div>";
					
                    //we will use this links on next part of this post
                    echo "<div class='editBtn customBtn'>編輯</div>";
					
                    //we will use this links on next part of this post
                    echo "<div class='deleteBtn customBtn'>刪除</div>";
                echo "</td>";
            echo "</tr>";
        }
		
    echo "</tbody>";
    echo "</table>";//end table
    
}

// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}
?>

<script>
		$(function() {
		
			$('#sort').sortable({
				items: '.item',
				update: function(event, tr) {
					var postData = $(this).sortable('serialize');
					console.log(postData);
					
					$.post('save_sort.php', {list: postData}, function(o) {
						console.log(o);
					}, 'json');
				}
			});
		});
</script>