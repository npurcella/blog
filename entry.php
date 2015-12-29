<?php 
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		require('assets/connect/connect.php');
		$stmt = $db->prepare("SELECT * FROM blog WHERE id=:id");
		if($stmt->execute(array(':id'=>$id))) {
			$row = $stmt->fetch();
		}
	}	
	$created = date('M d Y', strtotime($row['created']));
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster|Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<title><?php echo $row['title'];?></title>
</head>
<body>
<?php
	include('header.php'); 
?>
<div id="blog-wrapper">
	<div id="main-blog-content">
		<?php
			if($row['picture'] != null) {
				$picture = '<div id="picture"><img src="admin/showimage.php?id='.$row['id'].'width="80" height="60"></div>';
			}
			else {
				$picture = '';
			}
			echo '<div id="blog-content"><h3>'. $row['title'] .'</h3><p> ( '.$created.' )</p>'. '<div id="blog-picture"><img src="admin/showimage.php?id='.$row['id'].'width="80" height="60"></div>' .'<div>'.$row['content'].'</div></div>';
		?>
	</div>
</div>
<?php 
	include('footer.php'); 
?>
</body>
</html>
