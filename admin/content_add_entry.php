<h3>Add New Blog Entry</h3>
<p class="error"><?php if(isset($errors)) { echo $errors; } ?></p>
<p class="alert"><?php if(isset($alerts)) { echo $alerts; } ?></p>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-set">
		<label>Title</label>
		<input class="resp-input" type="text" name="title" value="<?php if($errors != '') { echo $title; } ?>" maxlength="255"/>
	</div>
	<div class="form-set">
		<label>Content</label>
		<textarea  class="resp-input" name="content" rows="5"><?php if($errors != '') { echo $content; } ?> 
		</textarea>
	</div>
	<div class="form-set">
		<label>Picture (max 16M)</label>
		<input  class="resp-input" type="file" name="picture"/>
	</div>
	<div class="form-set">
		<label>Publish</label>
		<input type="checkbox" id="publish" name="publish" checked="checked"/>
	</div>
	<div class="form-set">
		<input type="submit" id="submit" value="Add New Blog Entry" name="submit"/>
	</div>
</form>