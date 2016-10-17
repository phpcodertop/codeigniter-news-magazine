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
<h2>Edit Page </h2>
<form method="post" action="<?php echo base_url('admin/editpage/'.$pagedetails->id); ?>">
<table>
	<tr>
		<td>Page Title : </td>
		<td><input type="text" name="pagetitle" size="40" value="<?php echo $pagedetails->pagetitle; ?>" /></td>
	</tr>
	<tr>
		<td>Page Content : </td>
		<td><textarea name="pagecontent" id="textarea" class="wysiwyg" rows="20"><?php echo $pagedetails->pagecontent; ?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="edit" value="Edit Page">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			