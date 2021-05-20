<div class="row">
	<div class="container">
		<div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<form action="<?=base_url(); ?>home/forget" method="post" id="forgot_form" novalidate>
					<fieldset>
						<h2>Forgot Password</h2>
						<hr class="colorgraph">
						<div class="form-group">
							<input type="email" name="email"  class="form-control input-lg required emailValidation" placeholder="Email Address">
							 <span class="help-block small">Your email address to send password reset link</span>
						</div>														
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<a href="<?php echo base_url('home'); ?>" class="btn btn-lg btn-primary btn-block">Cancel</a>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">								
								<input type="button" onclick="adddata('forgot_form','forgot_btn')"  class="btn btn-lg btn-success btn-block" data-msg="Submitting.." id="forgot_btn" value="Send reset link">									
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>		
</div>


