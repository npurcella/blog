<h3>Edit Entry</h3>
<p class="error"><?php if(isset($errors)) { echo $errors; } ?></p>
<p class="alert"><?php if(isset($alerts)) { echo $alerts; } ?></p>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-set">
		<label>Title</label>
		<input type="text" name="title" value="<?php echo $row['title']; ?>" maxlength="255"/>
	</div>
	<div class="form-set">
		<label>Content</label>
		<textarea name="content" rows="5"><?php echo $row['content']; ?>
		</textarea>
	</div>
	<div class="form-set">
		<label>Current Picture</label>
		<?php 
		if($row['picture'] != null) { ?>
			<img src="showimage.php?id=<?php echo $row['id']; ?>" width="80" height="60"/>
		<?php }
		else { ?>
			<img src="../assets/library/noImage.png" width="80" height="60"/>
		<?php } ?>
	</div>
	<div class="form-set">
		<label>New Picture</label>
		<input type="file" name="picture"/>
	</div>
	<div class="form-set">
		<label>Publish</label>
		<input type="checkbox" id="publish" name="publish" <?php if($row['publish'] == 1) echo 'checked="checked"' ?>/>
	</div>
	<div class="form-set">
		<input type="submit" id="submit" value="Update Blog Entry" name="update"/>
	</div>
	<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }?>"/>
</form>