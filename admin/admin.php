<?php
	session_start();		
	if(isset($_POST['submit'])) {
		require('../assets/connect/connect.php');
		$data_array = $_POST;
		foreach($data_array as $key=>$value) {
			switch($key) {
				case 'name':
					$name = $value;
					break;
				case 'password':
					$password = $value;
					break;				
			}
		}
		try {
			$stmt = $db->prepare("SELECT name FROM admin where name=:name and password=:password");
			$stmt->execute(array(':name'=>$name, ':password'=>$password));
			$return = $stmt->rowCount();
		} catch (PDOException $e) {
			$error = 'An error occurred: ' . $e->getMessage();
			echo $error;
		}	
		if($return > 0) {
			$_SESSION['admin'] = true;
		}
		else {
			unset($_SESSION['admin']);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster|Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<title>Nancy's Blog Admin</title>
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
		<?php if(! isset($_SESSION['admin'])) { ?>
			<h3>Login Form</h3>
			<form id="login-form" action="" method="post">
				<div class="form-set">
					<label>Name</label>
					<input type="text" name="name" maxlength="255"/>
				</div>
				<div class="form-set">
					<label>Password</label>
					<input type="password" name="password" maxlength="255"/>
				</div>
				<div class="form-set">
					<input type="submit" id="submit" value="Admin Logon" name="submit"/>
				</div>
			</form>
			<?php }
			else { ?>
				<h3>Welcome to the Blog Admin!</h3>
				<div id="rules">
					<ul>
						<li>See Menu at Left for Adding, Editing and Deleting</li>
						<li>Title and Content are required, Images are optional</li>
						<li>Maximum image size is 16M (stored as medium blob in database</li>
						<li>Check Publish to display entry</li>
						<li>You get one chance to change your mind about deleting</li>				
					</ul>
				</div>
				<hr>
				<h3>Still To Do:</h3>
				<p>work on front end - individual pages, sorting, pagination</p>
				<p>ability to create acct and then add comments</p>
				<p>move to code igniter</p>
			<?php } ?>
	</div>
</div>
<?php 
	include('admin_footer.php');
?>
</body>
</html>