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



<h2>Settings : </h2>
<form method="post" action="<?php echo base_url('admin/settings'); ?>">
<table>
	<tr>
		<td>Site Name : </td>
		<td><input type="text" name="sitename" size="40" value="<?php echo $settings->sitename; ?>" /></td>
	</tr>
	<tr>
		<td>Site Mail : </td>
		<td><input type="text" name="sitemail" size="40" value="<?php echo $settings->sitemail; ?>" /></td>
	</tr>
	<tr>
		<td>Site Description : </td>
		<td><textarea name="description" cols="4" ><?php echo $settings->description; ?></textarea></td>
	</tr>
	<tr>
		<td>Site KeyWords : </td>
		<td><textarea name="keywords" cols="4" ><?php echo $settings->keywords; ?></textarea></td>
	</tr>
	<tr>
		<td>Copyrights : </td>
		<td><input type="text" name="copyright" size="40" value="<?php echo $settings->copyright; ?>" /></td>
	</tr>
	<tr>
		<td>Author : </td>
		<td><input type="text" name="author" size="40" value="<?php echo $settings->author; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="sava" value="Save Settings">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			