		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			<script type="text/javascript"> 
			$(document).ready(function (){
				$('main-nav li a').click(function (){
					$('main-nav a').removeClass('current');
					$(this).addClass('current');
				});
			});
			</script>
			<h1 id="sidebar-title">Admin Page</h1>
		  
			<!-- Logo (221px wide) -->
			<img id="logo" src="<?php echo base_url(); ?>assets/resources/images/logo.png" alt="Admin Page" />
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile"><?php echo $this->session->userdata('username'); ?></a><br />
				<br />
				<a target="_blank" href="<?php echo base_url('home'); ?>" title="View the Site">View the Site</a> | <a href="<?php echo base_url(); ?>admin/logout" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo base_url('admin'); ?>" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					News
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/addnews'); ?>">Add New</a></li>
						<li><a href="<?php echo base_url('admin/managenews'); ?>">Manage News</a></li> <!-- Add class "current" to sub menu items also -->
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Pages
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/addpage'); ?>">Create a new Page</a></li>
						<li><a href="<?php echo base_url('admin/managepages'); ?>">Manage Pages</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Categories
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/addcat'); ?>">Add New</a></li>
						<li><a href="<?php echo base_url('admin/managecats'); ?>">Manage Categories</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Users
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/adduser'); ?>">Add New</a></li>
						<li><a href="<?php echo base_url('admin/manageusers'); ?>">Manage Users</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/settings'); ?>">Settings</a></li>
					</ul>
				</li> 
				<li>
					<a href="#" class="nav-top-item">
						Adds
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/ads'); ?>">Ads</a></li>
					</ul>
				</li> 

				<li>
					<a href="#" class="nav-top-item">
						Details
					</a>
					<ul>
						<li><a href="<?php echo base_url('admin/details'); ?>">Details</a></li>
					</ul>
				</li>   
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->