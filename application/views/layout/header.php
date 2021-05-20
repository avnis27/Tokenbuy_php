<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?=$title; ?>
</title>
<meta name="description" content="Source code generated using layoutit.com">
<link href="<?php echo base_url(); ?>webroot/frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>webroot/frontend/css/bootstrap-theme.min" rel="stylesheet">
<link href="<?php echo base_url(); ?>webroot/frontend/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">-->
<script src="<?php echo base_url(); ?>webroot/frontend/js/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo base_url();?>webroot/admin/js/plugins/daterangepicker/bootstrap-datepicker.js" type="text/javascript"></script>
</head>
<body>
<div class="navbar navbar-custom navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="80" id="nav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="navbar-brand"> 
      	<a href="<?php echo base_url(); ?>">
        	<img src="<?php echo base_url(); ?>webroot/frontend/images/logo2.png" class="img-responsive forfix">
            <img src="<?php echo base_url(); ?>webroot/frontend/images/logoWhite.png" class="img-responsive foraffix">         </a> 
      </div>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
    	<ul class="nav navbar-nav">
        	<li><a href="<?php echo base_url('dashboard/buyCoin'); ?>" class="btn hbtn-blue">BUY TOKEN</a></li>
            <li><a href="<?php echo base_url('dashboard/buyCoin'); ?>" class="btn hbtn-green">0.20 $</a></li>        	
        </ul>
		<ul class="nav navbar-nav pull-right">
			<li> <a href="<?=base_url();?>">Home</a> </li>
			<?php
				if($this->Ref_UserID)
				{
					?>
						<li class="dropdown"> 
							<a href="<?=base_url('dashboard');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata('Ref_UserName'); ?><span class="caret"></span></a>          
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li>
									<a href="<?=base_url('dashboard/profile'); ?>">My Profile</a>
								</li>
								<li>
									<a href="<?php echo base_url('dashboard'); ?>">Balance</a>
								</li>
								<li>
									<a href="<?php echo base_url('dashboard/transaction');?>">Transactions</a>
								</li>
								<li>
									<a href="<?=base_url('dashboard/security');?>">Security</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?=base_url('home/logout');?>">Logout</a> 
						</li>
					<?php
				}
				else
				{
					?>
						<li> 
							<a href="<?=base_url('home');?>">Login</a> 
						</li>                        
						<li> 
							<a href="<?=base_url('home/register');?>">Register</a> 
						</li>
					<?php
				}
			?>
		</ul>
    </nav>
    <!--/.nav-collapse --> 
  </div>
  <!--/.container --> 
</div>
<div id="msg_div_front">
	<?php echo $this->session->flashdata('message');?>
</div>
<div class="container-fluid mt-100 mb-100">
