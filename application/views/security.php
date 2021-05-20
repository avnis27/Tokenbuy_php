<div class="row">
    <div class="container bg-white proSection">
        <div class="row clearfix">
			<div id="proSidebar" class="col-md-3">
				<div class="picture-container">
					<div class="picture"> 
						<?php
							if($user_details->user_image != '')
							{
								?>
									<img src="<?php echo base_url('webroot/admin/upload/user/'.$user_details->user_image); ?>" class="picture-src" id="wizardPicturePreview" title="">
								<?php
							}
							else
							{
								?>
									<img src="<?php echo base_url(); ?>webroot/frontend/images/upload-img.jpg" class="picture-src" id="wizardPicturePreview" title="">
								<?php
							}
						?>
					</div>
				</div>
				<div class="sidebar-nav">
					<ul class="nav nav-list">
						<li>
							<a href="<?php echo base_url('dashboard/profile');?>"><i class="glyphicon glyphicon-user"></i> Profile</a>
						</li>
						<li class="active">
							<a href="<?php echo base_url('dashboard/security');?>"><i class="glyphicon glyphicon-lock"></i> Security</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="proContent" class="col-md-9 bg-Lgrey">
				<h2>Security</h2>
				<div class="col-md-12 bg-white mt-10">
					<?php
					/*
					<div class="alert alert-info mt-10" role="alert">Two Factor Authentication</div>
					<div class="row clearfix mt-30 mb-30">
						<form action="" class="proForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="col-md-6">
								<h5>Enable 2 Factor Authentication for following actions:</h5>
								<div class="col-md-12 bg-Lgrey mb-2">
									<h5>Signin 
										<span class="pull-right">
											<a href="#" id="active_sign_in<?php echo $user_details->user_id;?>" <?php if($user_details->sign_in != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','0','sign_in')">
												<button class="btn btn-sm btn-success">ON</button>
												<button class="btn btn-sm btn-default">OFF</button>
											</a>
											<a href="#" id="inactive_sign_in<?php echo $user_details->user_id;?>" <?php if($user_details->sign_in != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','1','sign_in')">
												<button class="btn btn-sm btn-default">ON</button>
												<button class="btn btn-sm btn-success">OFF</button>
											</a>
										</span>
									</h5>
								</div>
								<div class="col-md-12 bg-Lgrey mb-2">
									<h5>Profile update
										<span class="pull-right">
											<a href="#" id="active_profile_update<?php echo $user_details->user_id;?>" <?php if($user_details->profile_update != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','0','profile_update')">
												<button class="btn btn-sm btn-success">ON</button>
												<button class="btn btn-sm btn-default">OFF</button>
											</a>
											<a href="#" id="inactive_profile_update<?php echo $user_details->user_id;?>" <?php if($user_details->profile_update != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','1','profile_update')">
												<button class="btn btn-sm btn-default">ON</button>
												<button class="btn btn-sm btn-success">OFF</button>
											</a>
										</span>
									</h5>
								</div>
								<div class="col-md-12 bg-Lgrey mb-2">
									<h5>Password update 
										<span class="pull-right">
											<a href="#" id="active_password_update<?php echo $user_details->user_id;?>" <?php if($user_details->password_update != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','0','password_update')">
												<button class="btn btn-sm btn-success">ON</button>
												<button class="btn btn-sm btn-default">OFF</button>
											</a>
											<a href="#" id="inactive_password_update<?php echo $user_details->user_id;?>" <?php if($user_details->password_update != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','1','password_update')">
												<button class="btn btn-sm btn-default">ON</button>
												<button class="btn btn-sm btn-success">OFF</button>
											</a>
										</span>
									</h5>
								</div>
								<div class="col-md-12 bg-Lgrey mb-2">
									<h5>Transaction approval 
										<span class="pull-right">
											<a href="#" id="active_transaction_approval<?php echo $user_details->user_id;?>" <?php if($user_details->transaction_approval != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','0','transaction_approval')">
												<button class="btn btn-sm btn-success">ON</button>
												<button class="btn btn-sm btn-default">OFF</button>
											</a>
											<a href="#" id="inactive_transaction_approval<?php echo $user_details->user_id;?>" <?php if($user_details->transaction_approval != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $user_details->user_id;?>,'<?php echo base_url();?>dashboard/setStatus','1','transaction_approval')">
												<button class="btn btn-sm btn-default">ON</button>
												<button class="btn btn-sm btn-success">OFF</button>
											</a>
										</span>
									</h5>
								</div>																
							</div>
							<div class="col-md-6">
								<i class="fa fa-info-circle"></i> Two-factor authentication adds an aditional security layer to user accounts. Login and account access requires both a password and a unique multi-digit code sent to a registered physical device, such as a phone. Authy's multi-device 2FA feature gives a convenient solution to securing their data.									
							</div>
						</form>
					</div> 
					*/					
					?>
					<div class="alert alert-info mt-10" role="alert">Change Password</div>
					<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						<div class="row clearfix mt-30 mb-30">
							<div class="col-md-4">   
								<label>Old Password<span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="old_password"/>									
								<span class="text-danger hidden error_old_password">Old password field is required</span>
								<?php echo form_error('old_password','<span class="text-danger">','</span>') ;?>
							</div>
							<div class="col-md-4">                            
								<label>New Password<span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="new_password"/>	
								<span class="text-danger hidden error_new_password">New password field is required</span>
								<?php echo form_error('new_password','<span class="text-danger">','</span>') ;?>
							</div>
							<div class="col-md-4">
								<label>Confirm Password<span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="confirm_password"/>
								<span class="text-danger hidden error_confirm_password">Confirm password field is required</span>
								<?php echo form_error('confirm_password','<span class="text-danger">','</span>') ;?>
							</div>																
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<button class="btn btn-danger" type="submit" name="Submit" value="changePassword">Change password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
