	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Slider
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
				<li class="active">Slider</li>
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>
		</div>
		<!-- Main content -->
		<section class="content">                
			<div id="content">
				<div class="row">				
					<div class="col-md-12 column">				
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Slider details</h3>                                    
								<div class="box-tools pull-right">
									<a href="<?php echo base_url();?>admin/slider/sliderAdd" title="Add slider"class="btn btn-info btn-sm">Add New</a>					
								</div>					
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Image</th>  
											<th>Status</th>  			
											<th>Action</th>  			
										</tr>  			
									</thead>
									<tbody>									
										<?php 
											if($slider_details) 
											{
												foreach ($slider_details as $row)
												{ 
													?>
														<tr> 
															<td width="10%">
																<img src="<?php echo base_url(); ?>webroot/admin/upload/slider/<?php echo $row->slider_image; ?>" height="50" width="50" class="center-block">
															</td>
															<td width="10%">
																<a href="#" id="active_<?php echo $row->slider_id;?>" <?php if($row->status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->slider_id;?>,'<?php echo base_url();?>admin/slider/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->slider_id;?>" <?php if($row->status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->slider_id;?>,'<?php echo base_url();?>admin/slider/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>														
															<td width="10%">			
																<a href="<?php echo base_url();?>admin/slider/sliderAdd/<?php echo $row->slider_id; ?>" title="Edit"><i class="fa fa-edit fa-2x text-primary"></i></a>&nbsp;&nbsp;	
																<a class="confirm" onclick="return delete_detail('admin/slider/delete_detail/<?php echo $row->slider_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
															</td>			
														</tr>  										
													<?php
												} 
											}
											else 
											{
												?>
													<tr>
														<td colspan="10">No Records Found</td>
													</tr>
												<?php 
											}
										?>
									</tbody>
								</table>
							</div><!-- /.box-body -->
							<!-- /.box -->
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</div>		