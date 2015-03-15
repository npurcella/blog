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
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		require('../assets/connect/connect.php');
		$stmt = $db->prepare("SELECT * FROM blog WHERE id=:id");
		if($stmt->execute(array(':id'=>$id))) {
			$row = $stmt->fetch();
		}

	}
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		require('../assets/connect/connect.php');
		try {
			$stmt = $db->prepare("DELETE from blog WHERE id=:id");
			$stmt->execute(array(':id'=>$id));
		} catch (PDOException $e) {
			$errors = 'An error occurred while trying to delete: ' . $e->getMessage();
			echo $error;
		}	
		header('Location: admin_delete_entries.php');			
	}
?>
<div id="admin-wrapper">
	<?php
		include('admin_nav.php');
	?>
	<div id="main-content">
		<?php
			include('content_delete_entry.php');
		?>
	</div>
</div>
<?php 
	include('admin_footer.php');
?>
<script src="../assets/js/utils.js"></script>
</body>
</html>