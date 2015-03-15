<?php
header('Content-type: image/jpeg');
	$id = $_GET['id'];
	$db = new PDO('mysql:host=localhost;dbname=a4155748_blog', 'root', '');
	$stmt = $db->prepare("SELECT * FROM blog WHERE id=:id");
	if($stmt->execute(array(':id'=>$id))) {
		$row = $stmt->fetch();
	}	
   $picture = $row['picture'];
   echo $picture;
?>