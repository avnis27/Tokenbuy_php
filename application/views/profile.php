<div class="row">
    <div class="container bg-white proSection">
        <div class="row clearfix">
            <!--proSidebar-->
			<form action="" id="profileForm" class="proForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
							<input type="file" id="wizard-picture" name="user_image">
						</div>
						<h6 class="">Choose Picture</h6>
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
					<h2>Update Profile <button class="btn btn-success pull-right" name="Submit" type="submit">Save Changes</button></h2>
					<div class="col-md-12 bg-white mt-10">
						<div class="row clearfix mt-30">
							<div class="col-md-6">
								<div class="alert alert-success" role="alert">Personel Information</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<label>Email Address</label>
										<input type="text" readonly class="form-control" value="<?php echo $user_details->user_email; ?>" />
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="col-md-6">
										<label>First Name</label>
										<input type="text" class="form-control input-lg required minChar" name="user_fname" value="<?php echo $user_details->user_fname; ?>" />
									</div>
									<div class="col-md-6">
										<label>Last Name</label>
										<input type="text" class="form-control input-lg required minChar" name="user_lname" value="<?php echo $user_details->user_lname; ?>" />
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<label>Country of residence:</label>
										<select class="form-control" name="user_residence_country">
											<option value="">--- Select residence ---</option>
											<option value="Australia" <?php echo ($user_details->user_residence_country == 'Australia')?'selected':'';?>>Australia</option>
											<option value="Dubai" <?php echo ($user_details->user_residence_country == 'Dubai')?'selected':'';?>>Dubai</option>
											<option value="India" <?php echo ($user_details->user_residence_country == 'India')?'selected':'';?>>India</option>
											<option value="Singapore" <?php echo ($user_details->user_residence_country == 'Singapore')?'selected':'';?>>Singapore</option>
										</select>
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<label>Country of citizenship:</label>
										<select class="form-control" name="user_citizenship_country">
											<option value="">--- Select citizenship ---</option>
											<option value="Australia" <?php echo ($user_details->user_citizenship_country == 'Australia')?'selected':'';?>>Australia</option>
											<option value="Dubai" <?php echo ($user_details->user_citizenship_country == 'Dubai')?'selected':'';?>>Dubai</option>
											<option value="India" <?php echo ($user_details->user_citizenship_country == 'India')?'selected':'';?>>India</option>
											<option value="Singapore" <?php echo ($user_details->user_citizenship_country == 'Singapore')?'selected':'';?>>Singapore</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Activate two factor authentication: (if changing otp)</label>
										<input type="checkbox" name="otp" id="otp" value="1" <?php echo ($user_details->sign_in == 1)?'checked':'';?>>										 
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="pull-right">
										<a href="<?php echo base_url('dashboard/verification1');?>" class="btn btn btn-warning" >Get Verified!</a>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="alert alert-warning" role="alert">Balance Information</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<label>ETH Address</label>
										<input type="text" placeholder="ETH Address" id="contract_address" onblur="checkAddres()" required name="user_eth_address" value="<?php echo $user_details->user_eth_address; ?>" class="form-control" />
									</div>
								</div>
								<div class="row clearfix form-group">
									<div class="col-md-12">
										<button class="btn btn-success" type="submit" name="Submit">Update</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
	$('#otp').change(function() {
		$("#profileForm").submit();
	});
	function checkAddres(){
		var address =  $('#contract_address').val();
		$.ajax({
			url: 'https://shapeshift.io/validateAddress/'+address+'/'+'eth', // form action url
			type: 'GET', // form submit method get/post
			dataType: 'json', // request type html/json/xml
			success: function(resp) 
			{
				if(resp.isvalid==true){
				}
				else
				{
					alert('*Your ETH address not valid');	
					$('#contract_address').val('');
					return false;
				}
			}
			
		}); 
	}
</script>