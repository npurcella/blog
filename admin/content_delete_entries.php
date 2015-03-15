<h3>Delete Blog</h3>
<?php 
	echo '<table id="update-table">';
	echo '<th>Title</th><th>Content</th><th>Image</th><th>Published</th>';
	require('../assets/connect/connect.php');
	$results = $db->query("SELECT * FROM blog");
	foreach ($results as $row) {
		if($row['publish'] == 1) {
			$checked = '<input type="checkbox" checked="checked"/>';
		}
		else {
			$checked = '<input type="checkbox"/>';
		}
		echo '<tr>';
		if(!isset($row['picture'])) {
			echo '<td class="center"><a href="admin_delete_entry.php?id='.$row['id'].'">'.
			$row['title'].'</a></td>'.
			'<td>'.$row['content'].'</td>'.
			'<td>'.'<img src="../assets/library/noImage.png" width="80" height="60"/>'.'</td>'.
			'<td>'.$checked.'</td>';
		}
		else {
			echo '<td class="center"><a href="admin_delete_entry.php?id='.$row['id'].'">'.
			$row['title'].'</a></td>'.
			'<td>'.$row['content'].'</td>'.
			'<td>'.'<img src="showimage.php?id='.$row['id'].'" width="80" height="60"/>'.'</td>'.
			'<td>'.$checked.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>	