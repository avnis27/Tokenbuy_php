	<div class="content-wrapper">             
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>User Profile<small>Control panel</small> </h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
				<li class="Active"><a href="#">User Profile</a></li>				
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
		</div>	
		<!-- Main content -->
		<section class="content">                
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Update User Profile</h3>
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-default btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<?php 
							if(!empty($userDetails))
							{
								foreach($userDetails as $row)
								{
									?>
										<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
											<div class="box-body">
												<div class="row">
													<div class="form-group col-md-5">
														<div class="input text">
															<label>Username</label>
															<input name="username" class="form-control"  type="text" id="username" value="<?php echo $row->admin_name; ?>"  disabled />												
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-5">
														<div class="input text">
															<label>Old Password</label>
															<input name="old_password" class="form-control"  type="password" id="old_password" value=""  />												
															<?php echo form_error('old_password','<span class="text-danger">','</span>'); ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-5">
														<div class="input text">
															<label>New Password</label>
															<input name="new_password" class="form-control"  type="password" id="new_password" value=""  />												
															<?php echo form_error('new_password','<span class="text-danger">','</span>'); ?>
														</div>
													</div>
												
													<div class="form-group col-md-5">
														<div class="input text">
															<label>Confirm Password</label>
															<input name="confirm_password" class="form-control"  type="password" id="confirm_password" value=""  />												
															<?php echo form_error('confirm_password','<span class="text-danger">','</span>'); ?>
														</div>
													</div>
												</div>
											</div><!-- /.box-body -->								
											<div class="box-footer">
												<button class="btn btn-success btn-sm" data-toggle="model" type="submit" name="submit" value="Submit" >Submit</button>
												<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/dashboard">Cancel</a>							
											</div>
										</form>
									<?php
								}									
							}
						?>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>			
		</section><!-- /.content -->
	</div><!-- ./wrapper 