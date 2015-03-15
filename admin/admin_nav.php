<div id="sidebar">
	<?php if(!isset($_SESSION['admin'])) { ?>
		<a href="admin.php">Please log in first</a>
	<?php }
	else { ?>
		<ul>
			<li>
				<a href="admin.php">Admin Home</a>
			</li>
			<li>
				<a href="admin_add_entry.php">Add New Blog Entry</a>
			</li>
			<li>
				<a href="admin_update_entries.php">Edit Existing Blog Entry</a>
			</li>
			<li>
				<a href="admin_delete_entries.php">Delete Blog Entry</a>
			</li>						
		</ul>
	<?php } ?>
</div>