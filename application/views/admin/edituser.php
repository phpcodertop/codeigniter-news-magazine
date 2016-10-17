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

<?php if($this->session->flashdata('exist')): ?>
<div class="notification error png_bg">
				<a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo $this->session->flashdata('exist'); ?>
				</div>
</div>
<?php endif; ?>

<h2>Edit User </h2>
<form method="post" action="<?php echo base_url('admin/edituser/'.$userdetails->id); ?>">
<table>
	<tr>
		<td>User Name : </td>
		<td><input type="text" disabled="disabled" name="username" size="40" value="<?php echo $userdetails->username; ?>" /></td>
	</tr>
	<tr>
		<td>Password : </td>
		<td><input type="password" name="password" size="40" /></td>
	</tr>
	<tr>
		<td>Confirm Password : </td>
		<td><input type="password" name="password2" size="40" /></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="edit" value="Edit User">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			