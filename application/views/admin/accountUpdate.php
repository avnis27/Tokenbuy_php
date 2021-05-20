<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Account
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/account">Account</a></li>
			<li class="active">Account update</li>
		</ol>
	</section>
	<div>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
		</div>	
	</div>
	<!-- Main content -->
	<section class="content">                
		<div id="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Account details</h3>
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/account" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
							<?php
								foreach($account_details as $res)
								{
									?>
										<div class="row">
											<div class="form-group col-md-3">
												<div class="input text">
													<label>Api key<span class="text-danger">*</span></label>
													<input name="apiKey" class="form-control" type="text" id="apiKey" value="<?php echo $res->apiKey; ?>" />	
													<?php echo form_error('apiKey','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>Api secret<span class="text-danger">*</span></label>
													<input name="apiSecret" readonly class="form-control" type="text" id="apiSecret" value="<?php echo $res->apiSecret; ?>" />	
													<?php echo form_error('apiSecret','<span class="text-danger">','<span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>BTC address<span class="text-danger">*</span></label>
													<input name="btc_address" class="form-control" type="text" id="btc_address" value="<?php echo $res->btc_address; ?>" />	
													<?php echo form_error('btc_address','<span class="text-danger">','<span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>ETH address<span class="text-danger">*</span></label>
													<input name="eth_address" class="form-control" type="text" id="eth_address" value="<?php echo $res->eth_address; ?>" />	
													<?php echo form_error('eth_address','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
										</div>
									<?php
								}
							?>
							</div><!-- /.box-body -->								
							<div class="box-footer">
								<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Update">Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/account">Cancel</a>							
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.right-side -->