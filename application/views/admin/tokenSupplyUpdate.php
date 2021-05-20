<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Token supply
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/tokenSupply">Token supply</a></li>
			<li class="active">Token supply update</li>
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
							<h3 class="box-title">Token supply details</h3>
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/tokenSupply" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
							<?php
								foreach($tokenSupply_details as $res)
								{
									?>
										<div class="row">
											<div class="form-group col-md-3">
												<div class="input text">
													<label>Name<span class="text-danger">*</span></label>
													<input name="token_supply_name" class="form-control" type="text" id="token_supply_name" value="<?php echo $res->token_supply_name; ?>" />	
													<?php echo form_error('token_supply_name','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>From qty<span class="text-danger">*</span></label>
													<input name="token_supply_from_qty" readonly class="form-control" type="text" id="token_supply_from_qty" value="<?php echo $res->token_supply_from_qty; ?>" />	
													<?php echo form_error('token_supply_from_qty','<span class="text-danger">','<span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>To qty<span class="text-danger">*</span></label>
													<input name="token_supply_to_qty" class="form-control" type="text" id="token_supply_to_qty" value="<?php echo $res->token_supply_to_qty; ?>" />	
													<?php echo form_error('token_supply_to_qty','<span class="text-danger">','<span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-3">
												<div class="input text">
													<label>Price<span class="text-danger">*</span></label>
													<input name="token_supply_price" class="form-control" type="text" id="token_supply_price" value="<?php echo $res->token_supply_price; ?>" />	
													<?php echo form_error('token_supply_price','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
										</div>
									<?php
								}
							?>
							</div><!-- /.box-body -->								
							<div class="box-footer">
								<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Update">Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/tokenSupply">Cancel</a>							
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.right-side -->