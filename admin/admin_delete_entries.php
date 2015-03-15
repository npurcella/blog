<?php
	session_start();
	if(!isset($_SESSION['admin'])) {
		header('Location: admin.php');
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster|Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<title>Blog Admin - Delete</title>
</head>
<body>
<?php
	include('admin_header.php');
?>
<div id="admin-wrapper">
	<?php
		include('admin_nav.php');
	?>
	<div id="main-content">
		<?php
			include('content_delete_entries.php');	
		?>
	</div>
</div>
<?php 
	include('admin_footer.php');
?>
</body>
</html>