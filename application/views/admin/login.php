<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Uozef</title>
		<link type="image/png" sizes="16x16" rel="icon" href="<?php echo base_url(); ?>webroot/frontend/img/favicon60x60.png">
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
            <div class="header">Uozef</div> 
            <form action="" method="post">				  
                <div class="body bg-gray">
                    <div class="form-group">
						<label>Email</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter Email" value=""/>
						<?php echo form_error('username','<span class="text-danger">','</span>'); ?>
                    </div>
                    <div class="form-group">
						<label>Password</label>
                        <input type="password" id="password" name="password" class="form-control" id="inputError" placeholder="Enter Password" value=""/>
						<?php echo form_error('password','<span class="text-danger">','</span>'); ?>
                    </div>
					<!--
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" value="check_me"/> Remember me
                    </div>
					-->
                </div>
                <div class="footer bg-gray">                                                               
                    <button type="submit" name="Login" value="Login" class="btn bg-olive btn-block">Sign me in</button>  
					<p><a href="<?php echo site_url();?>admin/home/forgotPassword">I forgot my password</a></p>
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
			$("#msg_div").fadeOut(7000);
		</script>
    </body>
</html>