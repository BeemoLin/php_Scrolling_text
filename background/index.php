<!DOCTYPE HTML>
<html>
    <head>
        <title>管理後台</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
<body>

<div style='margin:0 0 .5em 0;'>
	<!-- when clicked, it will show the user's list -->
	<div id='viewUsers' class='customBtn'>HOME</div>

	<!-- when clicked, it will load the add user form -->
	<div id='addUser' class='customBtn'>新增名稱</div>
	
	<!-- this is the loader image, hidden at first -->
	<div id='loaderImage'><img src='../images/ajax-loader.gif' /></div>
	
	<div style='clear:both;'></div>
</div>

<!-- this is where the contents will be shown. -->
<div id='pageContent'></div>

<script src='../js/jquery-1.9.1.min.js'></script>
<script src='../js/jquery-ui-1.9.2.min.js'></script>

<script type='text/javascript'>
$(document).ready(function(){
	
	// VIEW NAME on load of the page
	$('#loaderImage').show();
	showUsers();
	
	// clicking the 'VIEW NAME' button
	$('#viewUsers').click(function(){
		// show a loader img
		$('#loaderImage').show();

		showUsers();
	});
	
	// clicking the '新增名稱' button
	$('#addUser').click(function(){
		showCreateUserForm();
	});

	// clicking the EDIT button
	$(document).on('click', '.editBtn', function(){ 
	
		var user_id = $(this).closest('td').find('.userId').text();
		console.log(user_id);
		
		// show a loader image
		$('#loaderImage').show();

		// read and show the records after 1 second
		// we use setTimeout just to show the image loading effect when you have a very fast server
		// otherwise, you can just do: $('#pageContent').load('update_form.php?user_id=" + user_id + "', function(){ $('#loaderImage').hide(); });
		setTimeout("$('#pageContent').load('update_form.php?user_id=" + user_id + "', function(){ $('#loaderImage').hide(); checkName(); });",1000);
		
	});	
	
	
	// when clicking the DELETE button
    $(document).on('click', '.deleteBtn', function(){ 
        if(confirm('Are you sure?')){
		
            // get the id
			var user_id = $(this).closest('td').find('.userId').text();
			
			// trigger the delete file
			$.post("delete.php", { id: user_id })
				.done(function(data) {
					// you can see your console to verify if record was deleted
					console.log(data);
					
					$('#loaderImage').show();
					
					// reload the list
					showUsers();
					
				});

        }
    });
	
	
    // CREATE FORM IS SUBMITTED
     $(document).on('submit', '#addUserForm', function() {

		// show a loader img
		$('#loaderImage').show();
		
		var username=$("#username").val();
		
		$.ajax({
			type:"post",
			url:"check.php",
			data:"userid=-1"+"&username="+username,
				success:function(data){
				if(data==0){
					$("#message").html("驗證OK");
					$('#loaderImage').hide();
					
					// post the data from the form
					$.post("create.php", {username: username})
						.done(function(data) {
							// 'data' is the text returned, you can do any conditions based on that
							showUsers();
						});
				}
				else{
					$("#message").html("名稱已被使用");
					$('#loaderImage').hide();
					return;
				}
			}
		 });
	 			
        return false;
    });
	
     // UPDATE FORM IS SUBMITTED
    $(document).on('submit', '#updateUserForm', function() {
		
		// show a loader img
		$('#loaderImage').show();
		
		
		var userid=$("#userid").val();
		var username=$("#username").val();
		
		$.ajax({
			type:"post",
			url:"check.php",
			data:"userid="+userid+"&username="+username,
				success:function(data){
				if(data==0){
					$("#message").html("驗證OK");
					$('#loaderImage').hide();
					
					// post the data from the form
					$.post("update.php", { userid: userid, username: username })
						.done(function(data) {
							// 'data' is the text returned, you can do any conditions based on that
							showUsers();
						});
				}
				else{
					$("#message").html("名稱已被使用");
					$('#loaderImage').hide();
				}
			}
		 });
		

	 			
        return false;
    });
});

// READ USERS
function showUsers(){
	// read and show the records after at least a second
	// we use setTimeout just to show the image loading effect when you have a very fast server
	// otherwise, you can just do: $('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });
	// THIS also hides the loader image
	setTimeout("$('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });", 1000);
}

// CREATE USER FORM
function showCreateUserForm(){
	// show a loader image
	$('#loaderImage').show();
	
	// read and show the records after 1 second
	// we use setTimeout just to show the image loading effect when you have a very fast server
	// otherwise, you can just do: $('#pageContent').load('read.php');
	setTimeout("$('#pageContent').load('create_form.php', function(){ $('#loaderImage').hide(); checkName(); });",1000);
}

function checkName()
{
	$("#username").blur(function(){
	
	var userid=$("#userid").val();
	var username=$("#username").val();

	  $.ajax({
			type:"post",
			url:"check.php",
			data:"userid="+userid+"&username="+username,
				success:function(data){
				if(data==0){
					$("#message").html("驗證OK");
					$('#loaderImage').hide();
				}
				else{
					$("#message").html("名稱已被使用");
					$('#loaderImage').hide();
				}
			}
		 });
	});
}
</script>

</body>
</html>