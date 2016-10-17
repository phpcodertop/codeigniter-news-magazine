<!DOCTYPE html>
<html >
		<meta charset="utf-8">
		<title>Login to the admin area .</title>
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/style-red.css">
    <body>
<style type="text/css">
.error{
    background: #ffcece url('../images/icons/cross_circle.png');
    border-color: #df8f8f;
    color: #665252;
    position: relative;
    padding: 10px;
    font-size: 13px;
    width: 99.8%;
}    
</style>  

 <?php if(validation_errors()): ?>
<div class="error">
                <a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    <?php echo validation_errors(); ?>
                </div>
</div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
<div class="error">
                <a href="#" class="close"><img src="<?php echo base_url(); ?>assets/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                <div>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
</div>
<?php endif; ?>

    <div class="off-canvas-wrap" data-offcanvas="">
        <div class="inner-wrap">
            <!-- ***** Full page screen ***** -->
            <section class="full-page-section" id="loginSection" style="height: 599px;">
                <div class="inner">
                    <div class="row">
                        <div class="medium-6 medium-offset-3 columns">
                            <div class="row">
                                <div class="medium-4 columns">
                                </div>
                                <div class="medium-8 columns">
                                    <h1>Login</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="medium-4 columns login-pic">
                                    <img alt="" src="<?php echo base_url(); ?>assets/login/thumb4.jpg">
                                </div>
                                <form  action="<?php echo base_url('home/login'); ?>" method="post">
		<div class="medium-8 columns">
			<div class="row collapse">
				<div class="small-9 columns"><input placeholder="Username" name="username" type="text"></div>

				
			</div>
			<div class="row collapse">
				<div class="small-9 columns"><input placeholder="Password" name="password" type="password"></div>
			</div>
			<input type="submit" name="login" class="button" />
			</div>
<div style="display:none" class="cffm_applied"></div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>