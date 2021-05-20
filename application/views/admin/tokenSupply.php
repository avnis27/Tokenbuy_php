	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Token supply
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
				<li class="active">Token supply</li>
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
								<h3 class="box-title">Token supply details</h3> 			
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Name</th>  
											<th>From qty</th>  
											<th>To qty</th>  
											<th>Price</th>  
											<th>Status</th>  			
											<th>Action</th>  			
										</tr>  			
									</thead>
									<tbody>									
										<?php 
											if($tokenSupply_details) 
											{
												foreach ($tokenSupply_details as $row)
												{ 
													?>
														<tr> 
															<td><?php echo $row->token_supply_name; ?></td>
															<td><?php echo $row->token_supply_from_qty; ?></td>
															<td><?php echo $row->token_supply_to_qty; ?></td>
															<td><?php echo $row->token_supply_price; ?></td>
															<td width="10%">
																<a href="#" id="active_<?php echo $row->token_supply_id;?>" <?php if($row->status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->token_supply_id;?>,'<?php echo base_url();?>admin/tokenSupply/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->token_supply_id;?>" <?php if($row->status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->token_supply_id;?>,'<?php echo base_url();?>admin/tokenSupply/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>														
															<td width="10%">			
																<a href="<?php echo base_url();?>admin/tokenSupply/tokenSupplyUpdate/<?php echo $row->token_supply_id; ?>" title="Edit"><i class="fa fa-edit fa-2x text-primary"></i></a>&nbsp;&nbsp;	
																<?php /*<a class="confirm" onclick="return delete_detail('admin/tokenSupply/delete_detail/<?php echo $row->token_supply_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	*/ ?>
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
											$coin_record = $this->db->get_where('record_coin', array('status'=>1))->row();	
										?>
									</tbody>
								</table>								
								<h4><strong>Total Coin Sold:</strong> <?php echo $coin_record->coin_sold; ?></h4>
								<h4><strong>Total Coin Available:</strong> <?php echo $coin_record->coin_available; ?></h4>
							</div><!-- /.box-body -->
							<!-- /.box -->
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</div>		