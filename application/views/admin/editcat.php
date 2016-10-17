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

<h2>Edit Category </h2>
<form method="post" action="<?php echo base_url('admin/editcat/'.$catdetails->cat_id); ?>">
<table>
	<tr>
		<td>Category Name : </td>
		<td><input type="text" name="title" size="40" value="<?php echo $catdetails->title; ?>" /></td>
	</tr>
	<tr>
		<td>Category Description : </td>
		<td><textarea name="description"><?php echo $catdetails->description; ?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="edit" value="Edit Category">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			