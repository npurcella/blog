<?php 
	echo '<table id="entry-table">';
	require('assets/connect/connect.php');
	$results = $db->query("SELECT * FROM blog WHERE publish=1 ORDER BY created DESC");
	foreach ($results as $row) {
		$created = date('M d Y', strtotime($row['created']));
		if($row['picture'] != null) {
			echo '<tr><td class="title"><a href=#">'.$row['title'].'</a></td></tr>'.
			'<tr>'.'<td class="created">'.$created.'</tr>'.'</tr>'.
			'<tr><td class="content">'.$row['content'].'</td>'.
			'<td>'.'<img src="admin/showimage.php?id='.$row['id'].'" width="80" height="60"/>'.'</td></tr>';
		}
		else {
			echo '<tr><td class="title"><a href="admin_update_entry.php?id='.$row['id'].'">'.$row['title'].'</a></td></tr>'.
			'<tr>'.'<td class="created">'.$created.'</tr>'.'</tr>'.
			'<tr><td class="content">'.$row['content'].'</td>'.
			'<td>'.'<img src="assets/library/noImage.png" width="80" height="60"/>'.'</td></tr>';
		}
	}
	echo '</table>';
?>