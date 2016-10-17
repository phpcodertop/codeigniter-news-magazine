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

<h2>Details :</h2>
<form method="post" action="<?php echo base_url('admin/details'); ?>">
<table>
	<tr>
		<td> Facebook Url : </td>
		<td><input type="text" name="fb" size="50" value="<?php echo $details->fb; ?>"></td>
	</tr>
	<tr>
		<td> Twitter Url : </td>
		<td><input type="text" name="tw" size="50" value="<?php echo $details->tw; ?>"></td>
	</tr>
	<tr>
		<td> Instagram Url : </td>
		<td><input type="text" name="ins" size="50" value="<?php echo $details->ins; ?>"></td>
	</tr>
	<tr>
		<td> Twitter Box Code : </td>
		<td><textarea name="twitterbox" rows="10"><?php echo $details->twitterbox; ?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="save" value="Save">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			