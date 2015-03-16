<?php 
	require('assets/connect/connect.php');
	$results = $db->query("SELECT * FROM blog WHERE publish=1 ORDER BY created DESC");
	foreach ($results as $row) {
		$created = date('M d Y', strtotime($row['created']));
		if($row['picture'] != null) {
			echo '<div id="title-and-created"><a href=#">'.$row['title'].'</a>&nbsp;&nbsp; ( '.$created.' ) </div>'.
			'<div id="content">'.$row['content'].'</div>'.
			'<div id="picture">'.'<img src="admin/showimage.php?id='.$row['id'].'" width="80" height="60"/>'.'</div>';
		}
		else {
			echo '<div id="title-and-created"><a href="#">'.$row['title'].'</a> ( '.$created.' ) </div>'.
			'<div id="content">'.$row['content'].'</div>'.
			'<div id="picture">'.'<img src="assets/library/noImage.png" width="80" height="60"/>'.'</div>';
		}
	}
?>