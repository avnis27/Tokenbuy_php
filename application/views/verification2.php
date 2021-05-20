<div class="row">
    <div class="container bg-white proSection">
        <div class="row clearfix">
            <!--proSidebar-->
			<form action="" class="proForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
					<h2>Verification</h2>
					<div class="col-md-12 bg-white mt-10">
						<div class="row clearfix mt-30">
							<div class="col-md-12">
								<div class="alert alert-success" role="alert">Documents</div>
								<div class="row">
									<div class="col-md-12">
										<label><input type="checkbox" required onchange="getValCheckbox(this, 'user_passport')" name="user_passport"> &nbsp;Passport<span class="text-danger">*</span></label>
										<div class="row hidden user_passport">
											<div class="col-md-4">
												<label>Passport Id<span class="text-danger">*</span></label>
												<input type="text" required class="form-control" name="verification_passport_ID">
												<?php echo form_error('verification_passport_ID','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-4">
												<label>Expiry Date<span class="text-danger">*</span></label>
												<input type="text" required id="passE_datepicker" class="form-control" name="verification_passport_expiry_date">
												<?php echo form_error('verification_passport_expiry_date','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-4">
												<label>Upload Doc<span class="text-danger">*</span></label>
												<input type="file" required name="verification_passport_doc">
											</div>
										</div>																																								
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label><input type="checkbox" required onchange="getValCheckbox(this, 'user_driving_license')" name="user_driving_license"> &nbsp;Driving license<span class="text-danger">*</span></label>
										<div class="row hidden user_driving_license">
											<div class="col-md-4">
												<label>Licence No<span class="text-danger">*</span></label>
												<input type="text" required name="verification_licence_no" class="form-control">
												<?php echo form_error('verification_licence_no','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-4">
												<label>Expiry Date<span class="text-danger">*</span></label>
												<input type="text" id="drivE_datepicker" required class="form-control" name="verification_licence_expiry_date">
												<?php echo form_error('verification_licence_expiry_date','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-4">
												<label>Upload Doc<span class="text-danger">*</span></label>
												<input type="file" name="verification_licence_doc" required>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<label><input type="checkbox" required onchange="getValCheckbox(this, 'user_national_ID_card')" name="user_national_ID_card" /> &nbsp;National ID Card<span class="text-danger">*</span></label>
										<div class="row hidden user_national_ID_card">
											<div class="col-md-3">
												<label>Id Name<span class="text-danger">*</span></label>
												<input type="text" required name="verification_national_ID_name" class="form-control">
												<?php echo form_error('verification_national_ID_name','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-3">
												<label>Id Number<span class="text-danger">*</span></label>
												<input type="text" required name="verification_national_ID_number" class="form-control">
												<?php echo form_error('verification_national_ID_number','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-3">
												<label>Expiry Date<span class="text-danger">*</span></label>
												<input type="text" required id="nationaE_datepicker" name="verification_national_expiry_date" class="form-control">
												<?php echo form_error('verification_national_expiry_date','<span class="text-danger">','</span>');?>
											</div>											
											<div class="col-md-3">
												<label>Upload Doc<span class="text-danger">*</span></label>
												<input type="file" required id="verification_national_doc" name="verification_national_doc">
												<?php echo form_error('verification_national_doc','<span class="text-danger">','</span>');?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix form-group">
							<div class="col-md-12">
								<button type="submit" class="btn btn-success" name="Submit" value="Varification">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
	function getValCheckbox(val, name)
	{
		if(val.checked)
		{
			$('.'+name).removeClass('hidden');
		}
		else
		{
			$('.'+name).addClass('hidden');
		}
	}			
</script>