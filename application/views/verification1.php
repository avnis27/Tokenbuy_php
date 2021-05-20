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
						<li class="active">
							<a href="<?php echo base_url('dashboard/profile');?>"><i class="glyphicon glyphicon-user"></i> Profile</a>
						</li>
						<li>
							<a href="<?php echo base_url('dashboard/security');?>"><i class="glyphicon glyphicon-lock"></i> Security</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="proContent" class="col-md-9 bg-Lgrey">
				<h2>Update Profile</h2>
				<div class="col-md-12 bg-white mt-10">
					<form action="" class="proForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    
                    <h3>Anti Money Laundring Policy requires a KYC procedure for clients.</h3>
						<div class="row">
							<?php
								if($user_details->user_image != '')
								{
									?>
										<div class="col-md-6">                                        
                                        <label>First of all a smile for the camera!</label>
                                        <!--<label>Existing image</label>																																				-->
											<img src="<?php echo base_url('webroot/admin/upload/user/'.$user_details->user_image); ?>" class="img-responsive">
										</div>
									<?php
								}
							?>								
							<div class="col-md-6">
                            	<div class="form-group mt-50">
                                <button class="btn btn-continue"><i class="fa fa-camera"></i>  Take a snapshot using camera</button>
                                </div>
                                <p>OR</p>
                            
                            <div class="form-group">
                            <label>Change image</label>                            
							<input type="file" name="user_image" /><br>
                            </div>
																																										
								<button type="submit" class="btn btn-success" name="Submit" value="Varification">Continue</button>
							</div>
						</div>
						<div class="row clearfix form-group">
							<div class="col-md-12"><br/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>