<h3>Delete Entry</h3>
<form action="" method="post">
	<table id="create-table">
		<tr>
			<td class="right">
				<label>Title</label>
			</td>
			<td>
				<input class="resp-input" type="text" name="title" value="<?php echo $row['title']; ?>" maxlength="255"/>
			</td>
		</tr>
		<tr>
			<td class="right">
				<label>Content</label>
			</td>
			<td>
				<textarea  class="resp-input" name="content" rows="5"><?php echo $row['content']; ?>
				</textarea>
			</td>	
		</tr>
		<tr>
			<td class="right">
				<label>Image</label>
			</td>
			<td>
				<?php 
				if($row['picture'] != null) { ?>
					<img src="showimage.php?id=<?php echo $row['id']; ?>" width="80" height="60"/>
				<?php }
				else { ?>
					<img src="../assets/library/noImage.png" width="80" height="60"/>
				<?php } ?>
			</td>		
		</tr>	
		<tr>
			<td class="right">
				<label>Publish</label>
			</td>
			<td>
				<input type="checkbox" <?php if($row['publish'] == 1) echo 'checked="checked"' ?>/>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="center">
				<input type="submit" value="Delete Blog Entry" name="delete" onclick="return confirm('Are you sure you want to delete this blog entry?')"/>
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }?>"/>
</form>


