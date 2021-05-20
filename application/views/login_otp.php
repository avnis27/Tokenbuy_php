<div class="row">
	<div class="container">
		<div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form action="<?=base_url(); ?>home/login_otp" method="post" >
					<fieldset>
						<h2>One time password</h2>
						<hr class="colorgraph">
						<div class="form-group">
							<?php echo form_input($token);?>			
						</div>
						<div class="form-group">
							<input type="text" class="hidden" name="identity" value="<?php echo $identity; ?>">
							<input type="text" class="hidden" name="remember" value="<?php echo $remember; ?>">
							<input type="text" class="hidden" name="otp_login_key" value="<?php echo $otp_login_key; ?>">
						</div>
						<div class="form-group row">
							<div class="col-xs-6 col-sm-6 col-md-6">								
								<button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="row" id="msg_div_login">
			<?php echo $this->session->flashdata('message_login');?>
		</div>
	</div>		
</div>