	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				User
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
				<li class="active">User</li>
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
								<h3 class="box-title">User details</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>First name</th>  
											<th>Last name</th>  
											<th>Email</th>  
											<th>Document</th>
											<th>Verify</th>
											<th>SignIn</th>
											<th>Profile</th>
											<th>Password</th>
											<th>Transaction</th>
											<th> Status &nbsp;&nbsp; </th>  			
											<!--<th>Action</th>  			-->
										</tr>  			
									</thead>
									<tbody>									
										<?php 
											if($user_list) 
											{
												foreach ($user_list as $row)
												{ 
													?>
														<tr> 
															<td width="10%"><?php echo $row->user_fname; ?></td>
															<td width="10%"><?php echo $row->user_lname; ?></td>
															<td width="10%"><?php echo $row->user_email; ?></td>
															<td width="15%">
																<?php
																	$document_result = $this->db->get_where('verification', array('verification_user_id'=>$row->user_id))->row();																	
																	if(count($document_result) > 0)
																	{
																		echo '<a href="'.base_url().'webroot/admin/upload/doc/'.$document_result->verification_passport_doc.'" target="_blank">Passport Doc</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
																		echo '<a href="'.base_url().'webroot/admin/upload/doc/'.$document_result->verification_licence_doc.'" target="_blank">Licence Doc</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
																		echo '<a href="'.base_url().'webroot/admin/upload/doc/'.$document_result->verification_national_doc.'" target="_blank">National ID Doc</a>';																		
																	}
																	else
																	{
																		echo 'Document not available';
																	}
																?>
															</td>
															<td width="5%">
																<a href="#" id="active_d<?php echo $row->user_id;?>" <?php if(@$document_result->verification_status != 1){ echo "style='display:none;'"; } ?> class="btn-group" >
																	<button class="btn btn-sm btn-info">Approved</button>
																</a>
																<a href="#" id="inactive_d<?php echo $row->user_id;?>" <?php if(@$document_result->verification_status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusDoc(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusDoc','1')">
																	<button class="btn btn-sm btn-warning">Approve</button>
																</a>
															</td>
															<td width="10%">
																<a href="#" id="active_sign_in<?php echo $row->user_id;?>" <?php if($row->sign_in != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','sign_in','0')">
																	<button class="btn btn-sm btn-info">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_sign_in<?php echo $row->user_id;?>" <?php if($row->sign_in != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','sign_in','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-info">OFF</button>
																</a>
															</td>
															<td width="10%">
																<a href="#" id="active_profile<?php echo $row->user_id;?>" <?php if($row->profile_update != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','profile','0')">
																	<button class="btn btn-sm btn-info">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_profile<?php echo $row->user_id;?>" <?php if($row->profile_update != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','profile','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-info">OFF</button>
																</a>
															</td>
															<td width="10%">
																<a href="#" id="active_password<?php echo $row->user_id;?>" <?php if($row->password_update != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','password','0')">
																	<button class="btn btn-sm btn-info">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_password<?php echo $row->user_id;?>" <?php if($row->password_update != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','password','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-info">OFF</button>
																</a>
															</td>
															<td width="10%">
																<a href="#" id="active_transaction<?php echo $row->user_id;?>" <?php if($row->transaction_approval != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','transaction','0')">
																	<button class="btn btn-sm btn-info">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_transaction<?php echo $row->user_id;?>" <?php if($row->transaction_approval != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatusUser(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatusUser','transaction','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-info">OFF</button>
																</a>
															</td>															
															<td width="15%">
																<a href="#" id="active_<?php echo $row->user_id;?>" <?php if($row->isActive != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->user_id;?>" <?php if($row->isActive != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->user_id;?>,'<?php echo base_url();?>admin/user/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>
															<?php
																/*
																	<td width="10%">			
																		<a class="confirm" onclick="return delete_detail('admin/user/delete_detail/<?php echo $row->user_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
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
	<script>
		/* Change status */
		function setStatusDoc(ID, PAGE, status) 
		{
			var str = 'id='+ID+'&status='+status;
			jQuery.ajax({
				type :"POST",
				url  :PAGE,
				data : str,
				success:function(data)
				{			
					if(data==1)
					{
						var a_spanid = 'active_d'+ID ;
						var d_spanid = 'inactive_d'+ID ;
						if(status !="1")
						{
							$("#"+a_spanid).hide();
							$("#"+d_spanid).show();
							jQuery("#msg_div").html();
						}
						else
						{			
							$("#"+d_spanid).hide();
							$("#"+a_spanid).show();
							jQuery("#msg_div").html();
						}
					}
				} 
			});
		}
		
		/* Change status of user account */
		function setStatusUser(ID, PAGE, name, status) 
		{
			var str = 'id='+ID+'&status='+status+'&name='+name;
			jQuery.ajax({
				type :"POST",
				url  :PAGE,
				data : str,
				success:function(data)
				{			
					if(data==1)
					{
						var a_spanid = 'active_'+name+''+ID ;
						var d_spanid = 'inactive_'+name+''+ID ;
						if(status !="1")
						{
							$("#"+a_spanid).hide();
							$("#"+d_spanid).show();
							jQuery("#msg_div").html();
						}
						else
						{			
							$("#"+d_spanid).hide();
							$("#"+a_spanid).show();
							jQuery("#msg_div").html();
						}
					}
				} 
			});
		}
	</script>