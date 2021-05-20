<div class="row">
	<div class="container">
		<div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form action="<?=base_url(); ?>home/login" method="post" id="refaral_loginfrom" novalidate>
					<fieldset>
						<h2>Please Sign In</h2>
						<hr class="colorgraph">
						<div class="form-group">
							<input type="email" name="email"  class="form-control input-lg required emailValidation" placeholder="Email Address">
							<span id="require_alert1" class="label label-danger hidden"> *Invalid email id  </span>
						</div>
						<div class="form-group">
							<input type="password" name="password"  class="form-control input-lg required" placeholder="Password">
						</div>
						<span class="button-checkbox">
							<button type="button" class="btn" data-color="info">Remember Me</button>
							<input type="checkbox" name="remember_me" id="remember_me" value="1" checked="checked" class="hidden">
							<a href="<?php echo  base_url('home/forgetpassword'); ?>" class="btn btn-link pull-right">Forgot Password?</a>
						</span>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<a href="<?php echo base_url('home/register'); ?>" class="btn btn-lg btn-primary btn-block">Register</a>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<?php
									/*
										<input type="button" onclick="adddata('refaral_loginfrom','refaral_btn')"  class="btn btn-lg btn-success btn-block" value="Sign In" data-msg="Submitting.." id="refaral_btn" >
									*/
								?>
										<button type="submit" class="btn btn-lg btn-success btn-block">Sign In</button>
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
