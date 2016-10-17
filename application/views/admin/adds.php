<div id="main-content"> <!-- Main Content Section with everything -->

<?php if($this->session->flashdata('edited')): ?>
<div class="notification success png_bg">
				<a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo $this->session->flashdata('edited'); ?>
				</div>
</div>
<?php endif; ?>


<h2>Adds </h2>
<form method="post" action="<?php echo base_url('admin/ads'); ?>">
<table>
	<tr>
		<td> 640 * 60 px : </td>
		<td><textarea name="one" rows="5"><?php echo $ads1->code; ?></textarea></td>
	</tr>
	<tr>
		<td> 300 * 250 px : </td>
		<td><textarea name="two" rows="5"><?php echo $ads2->code; ?></textarea></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="save" value="Save">
		</td>
	</tr>
</table>
</form>		
			
			
			
			
<div class="clear"></div> <!-- End .clear -->
			
			