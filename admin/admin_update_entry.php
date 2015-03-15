<?php
	session_start();
	if(!isset($_SESSION['admin'])) {
		header('Location: admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster|Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<title>Blog Admin - Edit</title>
</head>
<body>
<?php
	include('admin_header.php');

	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$title = trim($_POST['title']);
		$content = trim($_POST['content']);	
		$publish = isset($_POST['publish']) ? 1 : 0;
		$picture = '';
		$alerts = '';
		$errors = '';	

		if($_FILES['picture']['size'] > 0) {
			if($_FILES['picture']['size'] < 16777215) {
				$picture = file_get_contents($_FILES['picture']['tmp_name']);
			}
			else {
				$errors = 'File size cannot be greater than 16M<br>';
			}
		}
		if($title == '' || $content == '') {
			if($content == '') {
				$errors = 'Content is a required field<br>' . $errors;
			}
			if($title == '') {
				$errors = 'Title is a required field<br>' . $errors;
			}
		}
		else {
			require('../assets/connect/connect.php');
			try {
				if($picture != '') {
					$stmt = $db->prepare("UPDATE blog set title=:title, content=:content, picture=:picture, publish=:publish WHERE id=:id");
					$stmt->execute(array(':title'=>$title, ':content'=>$content, ':picture'=>$picture, ':publish'=>$publish, ':id'=>$id));
				}
				else {
					$stmt = $db->prepare("UPDATE blog set title=:title, content=:content, publish=:publish WHERE id=:id");
					$stmt->execute(array(':title'=>$title, ':content'=>$content, ':publish'=>$publish, ':id'=>$id));
				}
			} catch (PDOException $e) {
				$error = 'An error occurred while trying to update: ' . $e->getMessage();
				echo $error;
			}			
			$alerts = 'Entry has been updated';	
		}
	}
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		require('../assets/connect/connect.php');
		$stmt = $db->prepare("SELECT * FROM blog WHERE id=:id");
		if($stmt->execute(array(':id'=>$id))) {
			$row = $stmt->fetch();
		}
	}	
?>
<div id="admin-wrapper">
	<?php
		include('admin_nav.php');
	?>
	<div id="main-content">
		<?php
			include('content_update_entry.php');
		?>
	</div>
</div>
<?php 
	include('admin_footer.php');
?>
</body>
</html>