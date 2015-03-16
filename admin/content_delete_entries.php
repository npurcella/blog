<h3>Delete Blog</h3>
<?php 
	require('../assets/connect/connect.php');
	$results = $db->query("SELECT * FROM blog");
	foreach ($results as $row) {
		if($row['publish'] == 1) {
			$checked = '<label><input type="checkbox" disabled checked="checked"/>Published</label>';
		}
		else {
			$checked = '<label><input type="checkbox" disabled/>Published</label>';
		}		
		echo '<tr>';
		if($row['picture'] != null) {
			echo '<div id="admin-title-and-created"><a href="admin_delete_entry.php?id='.$row['id'].'">'.$row['title'].'</a> ( '.$row['created'].' ) </div>'.
			'<div id="admin-publish">'.$checked.'</div>'.
			'<div id="admin-picture">'.'<img src="showimage.php?id='.$row['id'].'" width="80" height="60"/>'.'</div>'.
			'<div id="admin-content">'.$row['content'].'</div>';
		}
		else {
			echo '<div id="admin-title-and-created"><a href="admin_delete_entry.php?id='.$row['id'].'">'.$row['title'].'</a> ( '.$row['created'].' ) </div>'.
			'<div id="admin-publish">'.$checked.'</div>'.
			'<div id="admin-picture">'.'<img src="../assets/library/noImage.png" width="80" height="60"/>'.'</div>'.
			'<div id="admin-content">'.$row['content'].'</div>';

		}
	}
?>	