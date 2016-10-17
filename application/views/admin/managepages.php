<div id="main-content"> <!-- Main Content Section with everything -->
<?php if($this->session->flashdata('deleted')): ?>
<div class="notification success png_bg">
				<a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					<?php echo $this->session->flashdata('deleted'); ?>
				</div>
</div>
<?php endif; ?>
<!-- Page Head -->
<h2>Manage Pages</h2>
<div class="content-box"><!-- Start Content Box -->
				
				
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<table>
							<thead>
								<tr>
								   <th>Id</th>
								   <th>Page Title</th>
								   <th>Edit</th>
								</tr>
								
							</thead>
							<tbody>

								<?php foreach($pages as $row): ?>
									<tr>
										<td><?php echo $row->id; ?></td>
										<td><?php echo $row->pagetitle; ?></td>
										<td>
											<!-- Icons -->
											 <a href="<?php echo base_url('admin/editpage/'.$row->id); ?>" title="Edit"><img src="<?php echo base_url(); ?>assets/resources/images/icons/pencil.png" alt="Edit" /></a>
											 <a href="<?php echo base_url('admin/deletepage/'.$row->id); ?>" onclick="return confirm('Are You really want to Delete ?');" title="Delete"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross.png" alt="Delete" /></a> 
										</td>
									</tr>
								<?php endforeach; ?>	

							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					

			<div class="clear"></div>
			
			
			