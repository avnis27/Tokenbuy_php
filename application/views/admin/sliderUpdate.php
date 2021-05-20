<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Slider
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/slider">slider</a></li>
			<li class="active">Slider update</li>
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
							<h3 class="box-title">Slider details update</h3>
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/slider" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
							<?php
								foreach($slider_details as $res)
								{
									?>
										<div class="row">
											<div class="form-group col-md-2">
												<div class="input text">
													<label>Selected image</label>
													<img src="<?php echo base_url().'webroot/admin/upload/slider/'.$res->slider_image;?>" height="100" width="100" class="center-block"/>
												</div>
											</div>
											<div class="form-group col-md-2">
												<div class="input text">
													<label>Change image</label>
													<input name="slider_image" class="fileUpload" type="file" id="slider_image" />	
												</div>
											</div>
											<div class="form-group col-md-2"><br/>
												<div class="image-holder"></div>
											</div>
										</div>
									<?php
								}
							?>
							</div><!-- /.box-body -->								
							<div class="box-footer">
								<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Update">Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/slider">Cancel</a>							
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.right-side -->