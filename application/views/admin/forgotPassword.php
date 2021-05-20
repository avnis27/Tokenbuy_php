<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Uozef</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>webroot/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>webroot/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>webroot/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
			<div id="msg_div">
				<?php echo $this->session->flashdata('message');?>				
			</div>	
            <div class="header">Forgot Your Password</div>
            <form action="" method="post">				  
                <div class="body bg-gray">
                    <div class="form-group">
						<label>Enter Your Email ID</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email ID" value=""/>
						<?php echo form_error('email','<span class="text-danger">','</span>'); ?>						
						<?php echo '<span class="text-danger">'.$this->session->flashdata('email').'</span>'; ?>						
                    </div>
                </div>
                <div class="footer bg-gray">                                                               
                    <button type="submit" name="submit" value="forgotpassword" class="btn bg-olive btn-block">Submit</button>  
                    <a href="<?php echo base_url(); ?>admin" class="btn bg-red btn-block">Cancel</a>  
                </div>
            </form>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url();?>webroot/admin/js/jquery.min.js"></script>
        <!-- Bootstrap -->
		<script src="<?php echo base_url();?>webroot/admin/js/bootstrap.min.js" type="text/javascript"></script> 
		<!-- Bootbox -->
		<script src="<?php echo base_url();?>webroot/admin/js/bootbox.min.js" type="text/javascript"></script>
		<!-- Error Message -->
		<script>
			$("#msg_div").fadeOut(10000);
		</script>
    </body>
</html>