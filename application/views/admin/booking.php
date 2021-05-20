	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Booking
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Booking</li>
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
								<h3 class="box-title">Booking details</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Date</th>
											<th>User name</th>
											<th>Transaction Id</th>
											<th>Coin Amount/Price</th>
											<th>NET Amount/Commission</th>
											<th>Gross Amount</th>
											<th>Status</th>
											<th>Transaction status</th>
											<!--<th>Remove</th>-->
										</tr>  			
									</thead>
									<tbody>									
										<?php 
											if($booking_list) 
											{
												foreach ($booking_list as $res)
												{ 
													?>
														<tr> 
															<td><?php echo date('d.m.Y h:i A', strtotime($res->modify_date));?></td>
															<td>
																<?php 
																	$user_details = $this->db->get_where('user', array('user_id'=>$res->user_id))->row();																
																	echo $user_details->user_fname.' '.$user_details->user_lname;
																?>
															</td>
															<td><?php echo $res->transaction_id;?></td>
															<td ><?php echo $res->coin_amount; ?></td>
															<td ><?php echo $res->net_amount?></td>
															<td ><?php echo $res->gross_amount?></td>	
															<td width="10%">
																<a href="#" id="active_<?php echo $res->booking_id;?>" <?php if($res->isActive != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $res->booking_id;?>,'<?php echo base_url();?>admin/booking/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $res->booking_id;?>" <?php if($res->isActive != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $res->booking_id;?>,'<?php echo base_url();?>admin/booking/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>
															<?php
																if($res->status == 'success' || $res->status == 'deposit')
																{
																	echo '<td class="text-success"><strong>'.$res->status.'</strong></td>';
																}
																else
																{
																	echo '<td class="text-danger"><strong>'.$res->status.'</strong></td>';
																}
															?>	
															<?php
																/*
																	<td width="10%">			
																		<a class="confirm" onclick="return delete_detail('admin/user/delete_detail/<?php echo $row->booking_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
																	</td>			
																*/
															?>
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