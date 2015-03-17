<?php
	session_start();
	if(!isset($_SESSION['admin'])) {
		header('Location: admin.php');
	}	
	include('../assets/library/createThumbnail.php');
	
	if(isset($_SESSION['admin'])) {
		$title = '';
		$content = '';
		$picture = null;
		$alerts = '';
		$errors = '';
		if(isset($_POST['submit'])) {
			require('../assets/connect/connect.php');
			$title = trim($_POST['title']);
			$content = trim($_POST['content']);
			$publish = isset($_POST['publish']) ? true : false;
			if(get_magic_quotes_gpc()) {
				$title = stripslashes($title);
				$content = stripslashes($content);
			}
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
				try {
					$stmt = $db->prepare("INSERT INTO blog (title, content, picture, publish) VALUES (:title, :content, :picture, :publish)");
					$stmt->execute(array(':title'=>$title, ':content'=>$content, ':picture'=>$picture, ':publish'=>$publish));
				} catch (PDOException $e) {
					$error = 'An error occurred: ' . $e->getMessage();
					echo $error;
				}
				$alerts = 'Entry has been added<br>';
			}
		}
	}
	else {
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
	<title>Blog Admin - Add</title>
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
			include('content_add_entry.php');
		?>
	</div>
</div>
<?php 
	include('admin_footer.php');
?>
</body>
</html>