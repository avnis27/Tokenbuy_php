	<?php
		$countTranction =0;	
		foreach($result as $value)
		{
			if($value->created_date==date('Y-m-d'))
			{
				$countTranction = $countTranction+1;
			}
		}
					
		$token_supply_price = '';
		if(1 < $coin_record->coin_sold)
		{
			if($coin_details[4]->token_supply_to_qty < $coin_record->coin_sold)
			{
				$token_supply_price = $coin_details[5]->token_supply_price; 	
			}
			elseif($coin_details[3]->token_supply_to_qty < $coin_record->coin_sold)
			{
				$token_supply_price = $coin_details[4]->token_supply_price; 	
			}
			elseif($coin_details[2]->token_supply_to_qty < $coin_record->coin_sold)
			{
				$token_supply_price = $coin_details[3]->token_supply_price; 	
			}
			elseif($coin_details[1]->token_supply_to_qty < $coin_record->coin_sold)
			{
				$token_supply_price = $coin_details[2]->token_supply_price; 	
			}
			elseif($coin_details[0]->token_supply_to_qty < $coin_record->coin_sold)
			{
				$token_supply_price = $coin_details[1]->token_supply_price; 	
			}
			else
			{
				$token_supply_price = $coin_details[0]->token_supply_price; 			
			}
		}
		else
		{
			$token_supply_price = $coin_details[0]->token_supply_price; 														
		}
		
		/* minimum amount */
		$minimumAmount = $this->mycoin->getMinAmount($sell_coin);
		$minValue = json_decode($minimumAmount);
	?>	
    <div class="row">
		<div class="container">
        	
			<h1 class="head-content">You have selected <span class="font-red"><?=$sell_coin; ?>	</span> to buy <span class="font-green"><?=COIN; ?></span>
            <a href="<?php echo $this->agent->referrer(); ?>" class="btn goback-btn pull-right"><i class="fa fa-reply"></i> Go Back</a>
            
            </h1><br>
			<div class="row clearfix">
            	<!---->
            	<div class="col-md-8 col-sm-6">
                	<!-- Checkout Box -->
					<div class="row clearfix" >
						<div class="bg-white col-md-12 req-form coin">
							<h2>Enter number of Token or <?=$sell_coin; ?></h2>
							<?php /*?><h4>Enter amount of coin you want to buy or <?=$sell_coin; ?> to sell</h4><?php */?><hr>                
							<!--<form action="<?=base_url(); ?>dashboard/checkout2" method="post" id="confirm_from" novalidate> -->
								<input type="hidden" name="sell_coin" value="<?=$sell_coin; ?>">
								<div class="form-group amount">
									<p class="font-red hidden" id="error_amount">Amount is too small. Minimum allowed is <?=$minValue->result.' '.$sell_coin; ?>. Please send a higher amount.</p>
									<div class="input-group">
										<span class="input-group-addon">You sell </span>
										<input type="text" class="form-control text-right required yourcoin input-number" id="amount" value="<?php echo $minValue->result; ?>" name="sellcoinValue" >
										<span class="input-group-addon" style="font-size:20px"><?=$sell_coin; ?></span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" >You will get</span>
										<input type="number" class="form-control required setCoinValue coinval" value="<?=intval(($this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price)*$minValue->result); ?>" name="buy_coinValue" >
										<span class="input-group-addon" style="font-size:20px"><?=COIN; ?></span>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">  	
										<span class="input-group-addon">Email Address</span>					
										<input type="email" class="form-control required" required name="user_email" id="user_email" value="<?php echo $this->session->userdata('Ref_UserEmail');?>" placeholder="Email Address" onkeyup="removeError('user_email');">                        
									</div>
									<span class="font-red" id="error_user_email" style="display:none;">Email is required</span>	
								</div>		
								<div class="form-group hidden">
									<div class="input-group">  	
										<span class="input-group-addon"><?=$sell_coin; ?> Address</span>					
										<input type="text" class="form-control" name="contract_address" id="contract_address" value="0xB8900B5Dd385b856094B2F23169cA2D156B6178d" aria-label="Amount (to the nearest dollar)"> 
										<span id="scroll" class="label label-danger require_alert scrolladdess"  style="display:none">
											*Your coin address not valid
										</span>								
									</div>
								</div>       
								<div class="form-group"> 
									<span class="button-checkbox">
										<button type="button" class="btn" onClick="acceptStatus(this.value)" data-color="info">Accept</button>
										<input type="checkbox" name="remember_me" required id="remember_me" class="hidden">
										I have confirmed the selected currency, amount, fees to buy the INV Token. I agree with Innovation.net website <a href="#" data-toggle="modal" data-target="#termsCondition">Terms and condition</a> for token sale and <a href="#" data-toggle="modal" data-target="#riskDisclaimer">Risk Disclaimer</a>.
									</span>
									<span class="font-red" id="error_remember_me" style="display:none;">Please check accept Terms and condition</span>								
								</div>   
								<?php 
									if(count($totalTransection) >= 2)
									{
										?>	
											<div class="form-group pull-right actions" style="text-align: right;">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Submit</button>
											</div>
										<?php
									} 
									else
									{
										?>
											<div class="form-group pull-right actions" style="text-align: right;">
													<input type="button" onclick="btc_pay()" class="btn btn-success" value="Confirm" data-msg="Submitting.." id="confirm_btn" >
											</div>
										<?php 
									}
								?>
								<!--
								<div class="form-group pull-right"> 
									<input type="button" class="btn btn-success" value="Confirm" data-msg="Submitting.." id="confirm_btn" onclick="checkAddres()" >					
									<!--<input type="button" onclick="checkValidation('confirm_from','confirm_btn')"  class="btn btn-success" value="Confirm" data-msg="Submitting.." id="confirm_btn" >->
								</div> 
							</form>
							-->                 				
						</div>  
					</div>
                    <!--//-->
                    
                    <!-- QR Code Box -->
					<div class="row clearfix tran">
                    <!---->
                    	<div class="col-md-12 bg-white padTB15">
                        	<div class="row clearfix">
                            	<div class="col-md-8 col-sm-6">
									<p><b>Transaction ID: </b> <span id="transaction_id"></span></p>
									<p>Send</p>
									<h1><span id="coinValue"></span>   <?=$sell_coin; ?></h1>
									<p>to this address:</p>
									<div class="well">
									<span class="depo-address-block"></span>
									</div> 	
									<p><b>Transaction status:  </b> <span class="font-green statusID"></span></p>
                                </div>                                
                                <div class="col-md-4 col-sm-6">
									<a class="qr-link pull-right">
										<div id="qr-code"></div>                                    
									</a>    
									<p class="text-right">or scan this QR code</p>  
                                </div>
                            </div>                            
                            <div class="row clearfix">
                            	<div class="col-md-12">
                                <p class="font-blue">The Wallet Address linked to this purchase will only be active for 24 hours. Transactions remitted after this window closes will not be applied to your COIN balance.</p>
								<p class="font-blue">The exchange rate shown on this confirmation page will be fixed for the nest 60 minutes. If your transaction is not on the blockchain within this time frame the current rate at the time the transaction appears will be applied to your purchase.</p>
                                <p class="font-blue"><strong class="font-red" style="font-size:20px">Important Note: </strong>Every Purchase MUST be made in a Single Transaction. If you purchase 3 ETH you should send one transfer for 3 ETH not 3 Transfers of 1 ETH each. If more than one transaction is submitted we cannot guarantee accreditation. Creating multiple purchase is <strong>NOT</strong> an issue</p>
                                </div>
                            </div>
                        </div>
					</div>	 
                    <!--//-->   
                </div>
                <!--//-->            
            	<div class="col-md-4 col-sm-6">
                	<div class="pur-details bg-white">
                    	<h3 class="head">Purchase Details</h3>
                        <div class="col-md-12">
                        <div class="side-body green-bg col-md-12">
                        	<div class="item">
								<h4>No. of Token<strong class="pull-right font-white buyCoinValue"><?= intval(($this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price)*$minValue->result).' '.COIN	; ?></strong></h4>
                            </div> <hr>
                        <div class="item">
								<h4>Token Price <strong class="pull-right font-white Token_Price"><?= number_format(1/($this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price), 8); ?> <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <div class="side-body green-bg col-md-12">
                        	<div class="item">
								<h4>Net Amount<strong class="pull-right font-white netCoinValue"><?=$minValue->result.' '.$sell_coin; ?></strong></h4>
                            </div> <hr>
                            <div class="item">
								<h4>Commission 0.00% <strong class="pull-right font-white">0.0000 <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                        </div>
                        <p>&nbsp;</p>
                        <h4 class="foot clearfix">Gross Amount <span class="pull-right text-right grossAmount"><?php echo $minValue->result; ?> <?=$sell_coin; ?></span></h4>                                            
                    </div>
                </div>
			</div><hr>
            <div class="row form-group inbox-body">
				
			</div>
		</div>
	</div>		
	<script src="<?php echo base_url();?>webroot/frontend/shapeshift/qrcode.js"></script>
	<script src="<?php echo base_url();?>webroot/admin/js/bootbox.min.js" type="text/javascript"></script>	
	<script>	
		/*  Details remove */
		function delete_detail(location_target)
		{
			bootbox.confirm("Are you sure you want to delete this details",function(confirmed){
				if(confirmed)
				{
					location.href="<?php echo base_url(); ?>"+location_target;
				}
			});
		}
	
		var coinValue = '<?=$minValue->result?>';
		var currencyType = '<?=$sell_coin; ?>';
		var currecyName = '';
		var currecyFName = '';
		if(currencyType == 'BTC')
		{
			currecyName = 'btc';
			currecyFName = 'Bitcoin';
		}
		if(currencyType == 'BCH')
		{
			currecyName = 'bch';
			currecyFName = 'Bitcoin Cash';
		}
		if(currencyType == 'LTC')
		{
			currecyName = 'ltc';
			currecyFName = 'Litecoin';
		}
		if(currencyType == 'ETH')
		{
			currecyName = 'eth';
			currecyFName = 'Ether';
		}
		var cname = '---';
		var show_amount1 = '<?=$minValue->result?>';
		$( ".yourcoin" ).keyup(function(e) {
			var yourcoin =  $('.yourcoin').val();
			show_amount1 =  $('.yourcoin').val();
			var currecy_price  = '<?=$this->mycoin->getPriceCoinCap($sell_coin); ?>';
			var supply_price  = '<?=$token_supply_price; ?>';
			var currecy_price2 = currecy_price/supply_price;
			var sell_coin  = '<?=$sell_coin; ?>';
			$('.setCoinValue').val(parseInt(yourcoin*currecy_price2));
			$('.buyCoinValue').text(parseInt(yourcoin*currecy_price2+' <?= COIN ?>'));
			$('.netCoinValue').text(parseInt(yourcoin+' '+sell_coin));
			$('.grossAmount').text(yourcoin+' '+sell_coin);
		});
		
		/* Coin value */
		$('.coinval').keyup(function(e)
		{
			var coinval = $('.coinval').val();
			$('.buyCoinValue').text(coinval+' <?= COIN ?>'); 
			var currecy_price  = '<?=$this->mycoin->getPriceCoinCap($sell_coin); ?>';
			var supply_price  = '<?=$token_supply_price; ?>';
			var currecy_price2 = currecy_price/supply_price;
			var sell_coin  = '<?=$sell_coin; ?>';
			$('.netCoinValue').text(coinval/currecy_price2+' '+sell_coin);
			$('.grossAmount').text(coinval/currecy_price2+' '+sell_coin);
			$('.yourcoin').val(coinval/currecy_price2);
		});
		function checkDayTransection(){
			$.ajax({
				url: '', // form action url
				type: 'GET', // form submit method get/post
				dataType: 'json', // request type html/json/xml
				success: function(resp) 
				{
					if(resp.isvalid==true){
						$('#scroll').hide();
						$('#confirm_from').submit();
					}else
					{
		 				alert('*Your coin  address not valid');	
						$('#contract_address').val('');
					}
				}
				
			}); 
		}
		
		function removeTodayTransection(id)
		{							
			$.ajax({
				url: '<?=base_url(); ?>dashboard/delete_detail/'+id, // form action url
				type: 'GET', // form submit method get/post
				dataType: 'json', // request type html/json/xml
				success: function(resp) 
				{					
					if(resp.message=='success'){
						$('#tr_'+id).hide();
						//location.reload();
					}
					else
					{						
						
					}
					if(resp.remainTran >= 2){
					//		alert('asasa');
					}
				}				
			}); 
		}
		function checkAddres(){
			var address =  $('#contract_address').val();
			var yourcoin =  $('.yourcoin').val();
			$.ajax({
				url: 'https://shapeshift.io/validateAddress/'+address+'/'+'<?=$sell_coin; ?>', // form action url
				type: 'GET', // form submit method get/post
				dataType: 'json', // request type html/json/xml
				success: function(resp) 
				{
					if(resp.isvalid==true){
						$('#scroll').hide();
						$('#confirm_from').submit();
					}else
					{
						//$('#contract_address').html(''
						//+'  <span id="scroll" class="label label-danger require_alert" >'
						//+'      *Your coin  address not valid'
						//+'  </span>'
						//$('.scrolladdess').show();
						alert('*Your coin  address not valid');	
						$('#contract_address').val('');
					}
				}				
			}); 
			//setInterval(function(){ 

			//}, 3000);
		}		
	</script>
	<script>
	function acceptStatus(val)
	{
		var remember_me = $("#remember_me").prop('checked');
		if(remember_me == true)
		{
			$('#error_remember_me').css('display','block');
		}
		else
		{
			$('#error_remember_me').css('display','none');
		}
	}
	function btc_pay() {

		var remember_me = $("#remember_me").prop('checked');
		var user_email = $("#user_email").val();
		if(remember_me == false || user_email == '')
		{
			if(remember_me == false)
			$('#error_remember_me').css('display','block');
			if(user_email == '')
			$('#error_user_email').css('display','block');
			return false;
		}
		else
		{
			$('#error_remember_me').css('display','none');
			$('#error_user_email').css('display','none');
		}
		
		var address =  $('#contract_address').val();
		var yourcoin =  $('.yourcoin').val();
		var grossAmount =  $('.grossAmount').text();
		var miniLimit = '<?=$minValue->result?>';
		var Token_Price = $(".Token_Price").text();
		$('#coinValue').text(yourcoin);		
		var sell_coin  = '<?=$sell_coin; ?>'; 
		var getStatusVal = '';
		$.ajax({
			url: 'http://redmapple.com/uozef_v3/changly/index/'+currecyName+'/'+yourcoin, // form action url
			type: 'GET', // form submit method get/post
			dataType: 'json', // request type html/json/xml
			success: function(resp) 
			{
				//	console.log('resp'+resp.result.payinAddress);
				if(miniLimit > yourcoin)
				{
					$('#error_amount').removeClass('hidden');
				}
				else
				{
					var qrstring = resp.result.payinAddress; //response.payee;
				
					new QRCode(document.getElementById("qr-code"), qrstring);
					$('.coin').fadeOut('normal', function(){
						
						$(this).hide();
						$('#qr-code').fadeIn();						
						//$('#deposit_address').text(resp.result.payinAddress);
						$('#transaction_id').text(resp.result.id);
						getStatusVal = resp.result.id;
						var dataString = 'coin_amount='+Token_Price+'&net_amount='+yourcoin+'&gross_amount='+grossAmount+'&transaction_id='+resp.result.id;
						$.ajax({
							type:'post',
							url: 'http://redmapple.com/uozef_v3/dashboard/getTransactions',
							data: dataString,
							cache: false,
							success: function(resData)
							{
								$('.inbox-body').html(resData);
							}
						});
					});
					$('.tran').fadeIn();
					
					$('.head-content').html('<span class="font-green"><?=COIN?></span> Purchase');
					setInterval(function(){ getTransactionsStatus(resp.result.id); }, 3000);
					
					$('.depo-address-block').text(resp.result.payinAddress);
					$('#withdraw-address').text(resp.result.payoutAddress);
				}
			}			
		});
	}
	$('.tran').fadeOut();
	/*********** Get Transactions Status **********/
	function getTransactionsStatus(id){
		
		$.ajax({
			url: 'http://redmapple.com/uozef_v3/changly/getTransactionsStatus/'+id, // form action url
			type: 'GET', // form submit method get/post
			dataType: 'json', // request type html/json/xml
			success: function(resp) 
			{
				//console.log(resp);
				$('.statusID').text(resp.result);				
			}
		});	
	}
	/* remove error */
	function removeError(val)
	{
		$("#error_"+val).css('display','none');
	}
	</script>
	<!-- Terms and condition -->
	<div id="termsCondition" class="modal fade col-lg-12" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Terms and condition</h4>
				</div>
				<div class="modal-body">
					<p class="text-danger">
						What is Lorem Ipsum?
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
						industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
						and scrambled it to make a type specimen book. It has survived not only five centuries, but also the 
						leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
						with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
						publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						Why do we use it?
						It is a long established fact that a reader will be distracted by the readable content of a page when 
						looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal 
						distribution of letters, as opposed to using 'Content here, content here', making it look like 
						readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as 
						their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
						their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on 
						purpose (injected humour and the like).
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Risk Disclaimer -->
	<div id="riskDisclaimer" class="modal fade col-lg-12" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Risk disclaimer</h4>
				</div>
				<div class="modal-body">
					<p class="text-danger">
						What is Lorem Ipsum?
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
						industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
						and scrambled it to make a type specimen book. It has survived not only five centuries, but also the 
						leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
						with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
						publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						Why do we use it?
						It is a long established fact that a reader will be distracted by the readable content of a page when 
						looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal 
						distribution of letters, as opposed to using 'Content here, content here', making it look like 
						readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as 
						their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
						their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on 
						purpose (injected humour and the like).
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>