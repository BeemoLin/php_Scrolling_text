<!DOCTYPE HTML>
<html>
    <head>
        <title>SHOW</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body>

<div style='margin:0 0 .5em 0;'>
	<!-- this is the loader image, hidden at first -->
	<div id='loaderImage'><img src='images/ajax-loader.gif' /></div>
	
	<div style='clear:both;'></div>
</div>

<!-- this is where the contents will be shown. -->
<div id='pageContent'></div>


<script src='js/jquery-1.9.1.min.js'></script>
<script src='js/jquery.cycle.all.js'></script>

<script type="text/javascript">
    $(document).ready(function () { 
		// show a loader image
		$('#loaderImage').show();
		
		// Load name
		showView();
    });
	
	// READ NAME
	function showView(){
		// read and show the records after at least a second
		// we use setTimeout just to show the image loading effect when you have a very fast server
		// otherwise, you can just do: $('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });
		// THIS also hides the loader image
		setTimeout("$('#pageContent').load('view.php', function(){ $('#loaderImage').hide(); });", 1000);
	}
	
	// 輪播
	function showCycle(){
		$('#slideshow').cycle({fx:'fade',speed:250,timeout:3000,pause:1,fit: 1});
	}

</script>

 
</body>
</html>
