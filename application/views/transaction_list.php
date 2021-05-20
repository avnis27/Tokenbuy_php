<div class="container">
	<div class="row form-group">
		<div class="col-md-12 mail-option">
			<h2>Transaction History:</h2>
			<div class="table-responsive">
				<table class="table table-striped"> 	
					<thead>
						<tr class="unread">								
							<th>Date</th>
							<th>Transaction Id</th>
							<th>Coin Amount/Price</th>
							<th>NET Amount/Commission</th>
							<th>Gross Amount</th>
							<th>Status</th>
							<!--<th>Remove</th>-->
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($result as $value)
							{
								?>
									<tr id="tr_<?php echo $value->booking_id;?>">	 						
										<td><?php echo date('d.m.Y h:i A', strtotime($value->modify_date));?></td>
										<td><?php echo $value->transaction_id;?></td>
										<td ><?php echo $value->coin_amount; ?></td>
										<td ><?php echo $value->net_amount?></td>
										<td ><?php echo $value->gross_amount?></td>	
										<?php
											$accountDetails = $this->db->get_where('api_details')->row();
											$apiKey = $accountDetails->apiKey;
											$apiSecret = $accountDetails->apiSecret;
											$apiUrl = 'https://api.changelly.com';

											$message = json_encode(
												array('jsonrpc' => '2.0', 'method' => 'getStatus', 'params' => array('id'=>$value->transaction_id), 'id'=>1)
											);
											$sign = hash_hmac('sha512', $message, $apiSecret);
											$requestHeaders = [
												'api-key:' . $apiKey,
												'sign:' . $sign,
												'Content-type: application/json'
											];

											$ch = curl_init($apiUrl);
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
											curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
											
											$response = curl_exec($ch);
											$api_result = json_decode($response);								
											curl_close($ch);																								
											
											if($api_result->result == 'waiting')
											{
												echo '<td class="text-danger"><strong>'.$api_result->result.'</strong></td>';
											}
											else
											{
												echo '<td class="text-success"><strong>'.$api_result->result.'</strong></td>';
											}
										?>							
										<!--<td ><a class="confirm"  href="javascript:removeTodayTransection(<?php echo $value->booking_id;?>)" title="Remove"><i class="fa fa-trash-o fa-2x text-danger"></i></a></td>	-->
									</tr>
								<?php 
							}
						?>	
					</tbody>
				</table>
				<div class="row pull-right">
					<div class="col-xs-12">
						<div class="dataTables_paginate paging_bootstrap">
							<ul class="pagination">
								<li><?php echo $links; ?></li>
							</ul> 
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>