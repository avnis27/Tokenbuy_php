	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<form action="<?=base_url(); ?>home/registration" method="post" id="refaral_from" autocomplete="off">
						<h2 class="text-center">Sign Up </h2>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" class="form-control input-lg required minChar"  data-min="3" data-max="25" placeholder="First Name" tabindex="1">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" class="form-control input-lg required minChar" placeholder="Last Name" tabindex="2" data-min="3" data-max="25" >
								</div>
							</div>
						</div>
						<!--
						<div class="form-group">
							<input type="text" name="display_name" id="display_name" class="form-control input-lg required minChar" placeholder="Display Name" tabindex="3">
						</div>
						-->
						<div class="form-group">
							<input type="email" name="email" class="form-control input-lg required emailValidation" placeholder="Email Address" tabindex="4">
						</div>
						<div class="row form-group">
							<div class="col-xs-12 col-sm-6 col-md-6">
									<input type="password" name="password"  class="form-control input-lg required passport1" placeholder="Password" tabindex="5">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
									<input type="password" name="password_confirmation"  class="form-control input-lg required passport2" placeholder="Confirm Password" tabindex="6">
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<small class="font-Bblue"><strong>Password required:</strong> Length:6-22 characters (atleast 1capital, 1small, 1special char and 1numeric)</small>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-sm-3 col-md-3">
								<span class="button-checkbox">
									<button type="button" class="btn required user_agree" data-color="info" tabindex="7">I Agree</button>
									<input type="checkbox" id="user_agree" class="hidden">
								</span>
							</div>
							<div class="col-xs-8 col-sm-9 col-md-9">
								 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
							</div>
						</div>
						
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-md-6">
							 <input type="button" onclick="adddata('refaral_from','refaral_btn')"  class="btn btn-primary btn-block btn-lg" value="Register" data-msg="Submitting.." id="refaral_btn" >
							</div>
							<div class="col-xs-12 col-md-6 hidden">
								<a href="<?php echo base_url('home'); ?>" class="btn btn-success btn-block btn-lg">Sign In</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
						</div>
						<div class="modal-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>		
	</div>