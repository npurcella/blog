<h3>Add New Blog Entry</h3>
<p class="error"><?php if(isset($errors)) { echo $errors; } ?></p>
<p class="alert"><?php if(isset($alerts)) { echo $alerts; } ?></p>
<form action="" method="post" enctype="multipart/form-data">
	<table id="create-table">
		<tr>
			<td class="right">
				<label>Title</label>
			</td>
			<td>
				<input class="resp-input" type="text" name="title" value="<?php if($errors != '') { echo $title; } ?>" maxlength="255"/>
			</td>
		</tr>
		<tr>
			<td class="right">
				<label>Content</label>
			</td>
			<td>
				<textarea  class="resp-input" name="content" rows="5"><?php if($errors != '') { echo $content; } ?> 
				</textarea>
			</td>
		</tr>
		<tr>
			<td class="right">
				<label>Picture (max 16M)</label>
			</td>
			<td>
				<input  class="resp-input" type="file" name="picture"/>
			</td>
		</tr>
		<tr>
			<td class="right">
				<label>Publish</label>
			</td>
			<td>
				<input type="checkbox" name="publish" checked="checked"/>
			</td>
		</tr>		
		<tr>
			<td colspan="2" class="center">
				<input type="submit" value="Add New Blog Entry" name="submit"/>
			</td>
		</tr>
	</table>
</form>