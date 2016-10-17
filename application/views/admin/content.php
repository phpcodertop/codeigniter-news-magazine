		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome <?php echo $this->session->userdata('username'); ?></h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="<?php echo base_url('admin/addnews'); ?>"><span>
					<img src="<?php echo base_url(); ?>assets/resources/images/icons/pencil_48.png" alt="icon" /><br />
					Add News 
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo base_url('admin/addpage'); ?>"><span>
					<img src="<?php echo base_url(); ?>assets/resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Add Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo base_url('admin/addcat'); ?>"><span>
					<img src="<?php echo base_url(); ?>assets/resources/images/icons/image_add_48.png" alt="icon" /><br />
					Add Category
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo base_url('admin/adduser'); ?>"><span>
					<img src="<?php echo base_url(); ?>assets/resources/images/icons/clock_48.png" alt="icon" /><br />
					Add user
				</span></a></li>
				
				<li><a class="shortcut-button" href="<?php echo base_url('admin/settings'); ?>"><span>
					<img src="<?php echo base_url(); ?>assets/resources/images/icons/comment_48.png" alt="icon" /><br />
					Settings
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			

