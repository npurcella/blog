<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster|Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<title>Nancy's Blog Admin</title>
</head>
<body>
<?php
	include('header.php'); 
?>
<div id="blog-wrapper">
	<div id="main-blog-content">
		<?php
			include('entries.php');
		?>
	</div>
</div>
<?php 
	include('footer.php'); 
?>
</body>
</html>