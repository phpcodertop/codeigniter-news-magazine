<div id="main-content"> <!-- Main Content Section with everything -->

<?php if($this->session->flashdata('edited')): ?>
<div class="notification success png_bg">
				<a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo $this->session->flashdata('edited'); ?>
				</div>
</div>
<?php endif; ?>

<?php if(validation_errors()): ?>
<div class="notification error png_bg">
				<a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo validation_errors(); ?>
				</div>
</div>
<?php endif; ?>
<script type="text/javascript">
	tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
<h2>Edit news </h2>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/editnews/'.$newsdata->news_id); ?>">
<table>
	<tr>
		<td>News Title : </td>
		<td><input type="text" name="title" size="40" value="<?php echo  $newsdata->title; ?>" /> *</td>
	</tr>
	<tr>
		<td>Category : </td>
		<td>
			<select name="cat_id">
				<?php foreach($cats as $row):?>
					<option value="<?php echo $row->cat_id; ?>" <?php if($row->cat_id == $newsdata->cat_id) echo "selected"; ?> ><?php echo $row->title; ?></option>
				<?php endforeach; ?>	
			</select>
		</td>
	</tr>
	<tr>
		<td>News Image : </td>
		<td>
			<img src="<?php echo base_url().'/assets/uploads/'.$newsdata->image; ?>" width="100px" height="100px" /> 
		</td>
	</tr>
	<tr>
		<td>News Youtube video : </td>
		<td><input type="text" name="youtube_video" size="40" value="<?php echo  $newsdata->youtube_video; ?>" /></td>
	</tr>
	<tr>
		<td>News Details : </td>
		<td>
			<textarea name="content" id="textarea"><?php echo  $newsdata->content; ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="add" value="Edit News">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			