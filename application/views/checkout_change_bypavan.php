	<style>
	.table-hover>tbody>tr:hover {
		 background-color: black!important;
	}
	</style>

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
	?>	
    <!--<link href="<?php echo base_url(); ?>webroot/frontend/css/dd.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo base_url(); ?>webroot/frontend/css/payment.css" rel="stylesheet" type="text/css">
    <body class="admin business tk-proxima-nova">    
    <div class="row">
		<div class="container">
        	<a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-info btn-lg"><i class="fa fa-reply"></i> Go Back</a>
			<h2>You have selected <span class="font-red"><?=$sell_coin; ?>	</span> to buy <span class="font-green">INV</span></h2><br>
			<div class="row clearfix">
            	<!---->
            	<div class="col-md-8 col-sm-8">
					<div class="bg-cherry col-md-12 req-form">
						<h2>Enter number of Token or <?=$sell_coin; ?></h2>
						<?php /*?><h4>Enter amount of coin you want to buy or <?=$sell_coin; ?> to sell</h4><?php */?><hr>                
						<!--<form action="<?=base_url(); ?>dashboard/checkout2" method="post" id="confirm_from" novalidate> -->
							<input type="hidden" name="sell_coin" value="<?=$sell_coin; ?>">
							<div class="form-group amount">
								<div class="input-group">
									<span class="input-group-addon">You sell </span>
									<input type="text" class="form-control text-right required yourcoin input-number" id="amount" value="0.01" name="sellcoinValue" >
									<span class="input-group-addon" style="font-size:20px"><?=$sell_coin; ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">You will get</span>
									<input type="number" class="form-control required setCoinValue coinval" value="<?=$this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price/100; ?>" name="buy_coinValue" >
									<span class="input-group-addon" style="font-size:20px"><?=COIN; ?></span>
								</div>
							</div>
							<!--<div class="form-group">
								<div class="input-group">  	
									<span class="input-group-addon">Email Address</span>					
									<input type="email" class="form-control required" name="email" placeholder="Email Address">                        
								</div>
							</div>-->					
							<!--<div class="form-group">
								<div class="input-group">  	
									<span class="input-group-addon"><?=$sell_coin; ?> Address</span>					
									<input type="text" class="form-control required" name="contract_address" id="contract_address" aria-label="Amount (to the nearest dollar)"> 
									<span id="scroll" class="label label-danger require_alert scrolladdess"  style="display:none">
										*Your coin address not valid
									</span>								
								</div>
							</div>-->                    
							<div class="form-group"> 
								<div class="row">
									<div class="col-md-6">
										<h4>Email</h4>
										<input type="email" class="form-control" name="user_email" id="user_email" onkeyup="removeError('user_email');">
										<span class="text-danger" id="error_user_email" style="display:none;">Email is required</span>										
									</div>
									<div class="col-md-6">
										<span class="button-checkbox">
											<button type="button" class="btn" data-color="info">Accepted</button>
											<input type="checkbox" name="remember_me" id="remember_me" class="hidden">
											I have confirmed the selected currency, amount, fees to buy the INV Token. I agree with Innovation.net website <a href="#" data-toggle="modal" data-target="#termsCondition">Terms and condition</a> for token sale and <a href="#" data-toggle="modal" data-target="#riskDisclaimer">Risk Disclaimer</a>.
										</span>
										<span class="text-danger" id="error_remember_me" style="display:none;">Please check accept Terms and condition</span>
									</div>
								</div>
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
											<button class="btn btn-success form-submit">Submit</button>
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
					<div class="row clearfix">
						<div class="col-md-12 col-lg-12 shifty-container">
							<div class="panel-default">
								<div class="panel-body">
									<div class="non-row clearfix">
										<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 coin-container">
											<div class="left">
												<div class="coin">
													<strong>Shift To</strong>
													<?php
														if($sell_coin == 'ETH')
														{
															?>
																<img class="outputCoin1" src="https://shapeshift.io/legacy/images/coins/bitcoin.png">
															<?php
														}
														else
														{
															?>
																<img src="https://shapeshift.io/images/coins/ether.png" class="outputCoin hidden">
															<?php
														}
													?>
													<div class="dropdown other-dropdown">
														<button class="btn btn-default dropdown-toggle btn-full" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
															OR<span class="caret"></span>
														</button>
														<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="others"></ul>
													</div>
												</div>
												<a class="qr-link">
													<div id="qr-code">
													</div>
												</a>
											</div>
										</div>
										<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 coin-fields">
											<div class="right">
												<div class="input-form ">
													<div class="row">
														<div class="col-xs-7">
															<div class="form-item">
																<select class='ssio-currency-dropdown hidden'>
																	<option value='---'>Pay with:</option>

																</select>
															</div>
														</div>
														<!--
														<div class="col-xs-5 amount">
															<div class="form-item">
																<input type="text" class="form-control disabled" id="amount" placeholder="Amount BTC (optional)">
															</div>
														</div>
														-->
													</div>
													<div class="form-item return-address-input hidden">
														<input type="text" class="form-control" id="return-address" placeholder="Return Address (optional)">
													</div>
													<div class="form-item email-input hidden">
														<input type="email" class="form-control" id="email" placeholder="Email for Receipt (optional)">
													</div>
													<div class="actions hidden" style="text-align: right; ">
														<button class="btn btn-success form-submit">Submit</button>
													</div>
												</div>
												<div class="instructions">
													<p class="first"></p>
													<p class="last"></p>
												</div>
												
												<div class=""> 
													<p class="first1"></p>
													<p class="last1"></p>
												</div>
											</div>
										</div>
									</div>
									<div class="status-window">
										<div class="status-message">
										</div>
										<div class="status-inner">
											<div class="deposit-address">
												<strong class="depo-label">Deposit Address</strong> <span class="depo-address-block"></span>
												<span class="pull-right timer"></span>
											</div>
											<ul class="list-unstyled inline" id="steps">
												<li id="deposit" class="pending">
													<span class="status"><span class="status-icon"></span></span>
													<span class="glyphicon glyphicon-save"></span>
													Awaiting Deposit</li>
												<li id="exchange" class="pending">
													<span class="status"><span class="status-icon"></span></span>
													<span class="glyphicon glyphicon-transfer"></span>
													Awaiting Exchange</li>
												<li id="complete" class="pending">
													<span class="status"><span class="status-icon"></span></span>
													<span class="glyphicon glyphicon-ok"></span>
													Complete
												</li>
											</ul>
										</div>
									</div>
									<div class="pane-header">
										<div class="row">
											<div class="payment-info col-md-5">
												<strong>Destination</strong>
												<input value="" id="withdraw-address" class="form-control" disabled>
											</div>
											<div class="col-md-7 limits hidden">
												<div class="row">
													<div class="deposit-limit col-md-3 col-sm-2">
														<strong>Deposit Limit</strong>
														
														<p ></p>
														<div class="deposit-limit2" id="ammount_for_fix" style="display:none" ></div>
													</div>
													<div class="exchange-rate col-md-3 col-sm-3">
														<strong>Exchange Rate</strong>
														<p></p>
													</div>
													<div class="min-limit col-md-3 col-sm-3">
														<strong>Deposit Minimum</strong>
														<p></p>
													</div>
													<div class="depo-max col-md-3 col-sm-3">
														<strong>Deposit Maximum</strong>
														<p></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>   
						</div>
					</div>	    
                </div>
                <!--//-->            
            	<div class="col-md-4 col-sm-4">
                	<div class="sidebar">
                    	<div class="side-head">
                        <h3 class="mt-0 font-red">Purchase Details</h3>                        
                    	</div>
                        <div class="side-body green-bg col-md-12">
                        	<div class="item">
								<h4>Coin To Buy <strong class="pull-right font-red buyCoinValue"><?= number_format($this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price/100,2).' '.COIN	; ?></strong></h4>
                            </div> <hr>
                            <div class="item">
								<h4>Coin Price <strong class="pull-right font-red"><?= number_format(1/($this->mycoin->getPriceCoinCap($sell_coin)/$token_supply_price), 8); ?> <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <div class="side-body bg-cherry col-md-12">
                        	<div class="item">
								<h4>Net Amount<strong class="pull-right font-green netCoinValue">0.01 <?=$sell_coin; ?></strong></h4>
                            </div> <hr>
                            <div class="item">
								<h4>Commission 0.00% <strong class="pull-right font-green">0.0000 <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="inbox-body">
				<div class="mail-option">
					<table class="table table-inbox table-hover">				
						<thead>
							<tr class="unread">								
								<th>Date</th>
								<th>Coin Amount/Price</th>
								<th>NET Amount/Commission</th>
								<th>Gross Amount</th>
								<th>Status</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach($result as $value)
								{
									if($value->created_date==date('Y-m-d'))
									{
										?>
											<tr  id="tr_<?php echo $value->transaction_id;?>">	 						
												<td ><?php echo $value->created_date;  
														echo  ' '.$value->time; ?></td>
												<td ><?php echo $value->quotedRate; ?></td>
												<td ><?php echo $value->deposit?></td>
												<td ><?php echo $value->depositAmount?></td>						
												<td >
													<?php 
														if($value->payment_status == 0)
														{
															echo '<span class="btn btn-warning">Waiting</span>';
														}
														elseif($value->payment_status == 1)
														{
															echo '<span class="btn btn-success">Confirmed</span>';
														}
														elseif($value->payment_status == 2)
														{
															echo '<span class="btn btn-success">Confirmed</span>';
														}
														elseif($value->payment_status == 3)
														{
															echo '<span class="btn btn-danger">Waiting</span>';
														}
														elseif($value->payment_status == 4)
														{
															echo '<span class="btn btn-danger">Waiting</span>';
														}
													?>
												</td>
												<td ><a class="confirm"  href="javascript:removeTodayTransection(<?php echo $value->transaction_id;?>)" title="Remove"><i class="fa fa-trash-o fa-2x text-danger"></i></a></td>	
											</tr>
										<?php 
									}
								}
							?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>		
	<script src="<?php echo base_url('webroot/frontend/shapeshift/jquery-1.7.2.min.js'); ?>"></script> 
	<?php /*?> <script src="<?php echo base_url('webroot/frontend/shapeshift/jquery.easing.js'); ?>"></script> <?php */?>     
    <?php /*?><script src="<?php echo base_url('webroot/frontend/shapeshift/jquery.dd.min.js'); ?>"></script>    <?php */?>
    <script src="<?php echo base_url('webroot/frontend/shapeshift/environ.js'); ?>"></script>
	<script src="<?php echo base_url('webroot/frontend/shapeshift/qrcode.js'); ?>"></script>
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
		var show_amount1 = '0.01';
		$( ".yourcoin" ).keyup(function(e) {
			var yourcoin =  $('.yourcoin').val();
			show_amount1 =  $('.yourcoin').val();
			$('.first1').text('Your Contibution Amount '+yourcoin);
			var currecy_price  = '<?=$this->mycoin->getPriceCoinCap($sell_coin); ?>';
			var supply_price  = '<?=$token_supply_price; ?>';
			var currecy_price2 = currecy_price/supply_price;
			var sell_coin  = '<?=$sell_coin; ?>';
			$('.setCoinValue').val(yourcoin*currecy_price2);
			$('.buyCoinValue').text(yourcoin*currecy_price2+' <?= COIN ?>');
			$('.netCoinValue').text(yourcoin+' '+sell_coin);
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
						location.reload();
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
		
		/* Payment js */
		jQuery( document ).ready(function( $ ) {
			//Public Key -- 35c00d98f002ce59b9713bd2a2b508f74434f30f6e4e9717241745f10e7ddd238cd62b38c5d361c473295b98e58531868bb5f0bd3e47a409bf5a7d27c229c9df

			var ssio_protocol = "https://";
			var SITE = ssio_protocol + "shapeshift.io";
			var outputData = '';
			if(currecyName == 'eth')
			{
				var output = 'BTC';				
			}
			else
			{
				var output = 'ETH';				
			}
			var depoMin = 0;
			var started = false;
			var coin = '';

			/*    if((typeof env != "undefined") && (env == "development"))
				{
					SITE = "";
				}
			*/
			function getUrlParameter(sParam)
			{
				var sPageURL = window.location.search.substring(1);
				var sURLVariables = sPageURL.split('&');
				for (var i = 0; i < sURLVariables.length; i++)
				{
					var sParameterName = sURLVariables[i].split('=');
					if (sParameterName[0] == sParam)
					{
						return sParameterName[1];
					}
				}
			}

			var apiKey = '';
			if(currecyName == 'eth')
			{			
				var destination = '1HRhypwYocUXXiqGYTaDBUgBFsVErZep1e';
			}
			else
			{
				var destination = '0xB8900B5Dd385b856094B2F23169cA2D156B6178d';
			}
			pre_amount = '0.01';
			apiKey = '35c00d98f002ce59b9713bd2a2b508f74434f30f6e4e9717241745f10e7ddd238cd62b38c5d361c473295b98e58531868bb5f0bd3e47a409bf5a7d27c229c9df';
			if(destination) {
				$('#withdraw-address').val(destination);
			}
			if(pre_amount) {
				$('#amount').val(pre_amount);
			}

			if(getUrlParameter('output')) {
				output = getUrlParameter('output');
				var split = output.split(',');

					if(split.length > 1) {
						output = split[0];
						$('.other-dropdown').show();
					} else {
						$('.other-dropdown').hide();
					}

				$('#amount').attr('placeholder', 'Amount ' + output + ' (optional)');
			}

			$('.ssio-currency-dropdown').val('---');


			function round(value, exp) {
				if (typeof exp === 'undefined' || +exp === 0)
					return Math.round(value);

				value = +value;
				exp  = +exp;

				if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
					return NaN;

				// Shift
				value = value.toString().split('e');
				value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

				// Shift back
				value = value.toString().split('e');
				return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
			}


			var spinner = '<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
			var deposit_type = '';
			var altcoin_deposit_limit = ''; // defined here (globally) because it is used in a bunch of places
			function getCoins(callback) {
				$.getJSON( SITE + "/getcoins", function( data ) {
					crypto_data = data;
					callback(crypto_data);
				});

			}

			function show_error(msg) {
				// At any point in the process, if the shapeshift api returns any kind of error,
				// this text gets placed into the page.
				if(!started) {
					alert(msg);
				}
			}


			function send_success_email(email, txid) {
				$.post(SITE+"/mail", {
					email: email,
					txid: txid
				}).done(function (response) {
					console.log("sent email", response);
					if(response.error) {
						var to_display = response.error;
					} else {
						var to_display = response.email.message;
					}
					//$('#shapeshift-lens-modal .ssio-email-status-msg').text(to_display);
				}).error(function(response) {

					if(response.error == "I'm busy right now, sorry.") {
						// iterate while busy signal until the email gets successfully sent.
						setTimeout(function() {
							send_success_email(email, txid);
						}, 3000);
					}
				});

			}


			function getRates(rate_pair) { 
				$('.ssio-limit, .ssio-exchange-rate').fadeIn();
				var altcoin_symbol = rate_pair;
				var pair = altcoin_symbol.toUpperCase() + '_' + output;

				$(".exchange-rate p").html(spinner);
				$(".deposit-limit p").html(spinner);
				$(".min-limit p").html(spinner);
				$('#shapeshift-lens-modal .ssio-more-options').show();

				$.get(SITE+"/rate/" + pair, function(response) {
					if(response.error) {
						show_error("ShapeShift API returned an error: " + response.error);
						return;
					}
					var rate = parseFloat(response.rate);
					var formatted_rate = rate.toFixed(8);
					if(altcoin_symbol == 'BTC') {
						formatted_rate = rate.toFixed(4);
					} else if(altcoin_symbol == 'NBT') {
						formatted_rate = rate.toFixed(4);
					} else {
						formatted_rate = rate.toFixed(8);
					}
					$(".exchange-rate p").text("1 " + altcoin_symbol.toUpperCase() + ' = ' + formatted_rate + ' ' + output);
					

					$.get(SITE+"/limit/" + pair, function(response) {
						if(response.error) {
							show_error(response.error);
							return;
						}
						var btc_deposit_limit = response.limit;
						altcoin_deposit_limit = parseFloat(btc_deposit_limit).toFixed(4);
						console.log("got rate for pair " + pair + " as " + rate + ", and btc_dep_limit : " + btc_deposit_limit)
						$(".deposit-limit p").text(altcoin_deposit_limit + " " + altcoin_symbol.toUpperCase());
						
						$(".min-limit p").text(response.min + " " + altcoin_symbol.toUpperCase());
						$(".deposit-limit2").text(response.min);
						if(altcoin_symbol.toUpperCase() == "BTC") {
							$('.depo-max').show();
							var data = {
								amount: 1,
								pair: pair
							}
							if(apiKey) {
								data['apiKey'] = apiKey;
							}
							$('.depo-max p').html(spinner);
							$.post(SITE+"/sendamount", data, function(response){
								if(response.success){
									$('.depo-max p').show().text(response.success.maxLimit + " " + altcoin_symbol.toUpperCase());
								} else {
									if(!started) {
										show_error(response.error);
									}
								}
							});
						} else {
							$('.depo-max').hide();
						}
					}).error(function(response) {
						show_error("General Ajax failure");
					});


				}).error(function(response) {
					show_error("General Ajax failure");
				});
			}




			$('.ssio-currency-dropdown').change(function(event) {
				$('#shapeshift-lens-modal .pay-with').fadeOut();
				if($(this).val() !== '---') {
					// When the user selects which currency they want to pay with,
					// show the further options, and make the pay button appear.
					$('.deposit-limit, .exchange-rate, .return-address-input, .email-input').fadeIn();
					var coin = $(this).val();
					getRates(coin);
					if($(this).val() == 'nxt') {
						$('.rs-address-input').fadeIn();
					} else {
						$('.rs-address-input').fadeOut();
					}
					if($(this).val() == 'xrp') {
						$('.dest-tag-input').fadeIn();
					} else {
						$('.dest-tag-input').fadeOut();
					}
				}
				if($(this).val() == 'btc') {
					//$('.deposit-limit, .exchange-rate, .return-address-input, .email-input').fadeOut();
				}
			});

			function show_success(msg) {
				$('.status-message').html(msg);
			}

			function btc_pay() {
				var deposit = $('#withdraw-address').val();
				amount = $('#amount').val();
				currency = $(".ssio-currency-dropdown").val();
				altcoin_name = crypto_data[currency.toUpperCase()].name;
				bitcoin_icon = '<img src="' + crypto_data["BTC"].image + '">';
				
				if(altcoin_name == 'Nubits') {
					qrstring = deposit;
				} else {
					qrstring = altcoin_name.toLowerCase()+":"+deposit;
				}

				var first_inst = "";

				if(amount)
				{
					qrstring = altcoin_name.toLowerCase()+":"+deposit+"?amount="+amount;
					first_inst = "Send " + amount + " " + bitcoin_icon + " BTC to <br>" + "<span class='depo-address'>" + deposit + "</span>";
					if(altcoin_name == 'Nubits') {
						qrstring = deposit+"?amount="+amount;
					}
					
				} else {
					first_inst = "Send " + bitcoin_icon + " BTC to <br>" + "<span class='depo-address'>" + deposit + "</span>";
				}
				$(".instructions").find('.first').html(first_inst);

				$('.input-form').fadeOut('normal', function() {
					$(this).remove();
					$('.instructions').fadeIn();
				});

				new QRCode(document.getElementById("qr-code"), qrstring);
				$('.coin').fadeOut('normal', function(){
					alert('Hide');
					$(this).hide();
					$('#qr-code').fadeIn();
				});
			}

			function pay_button_clicked(event) {
				// This function gets fired when the pay button is clicked. It fires off
				// the "shift" api call, then starts the timers.

				var btc_address = destination;
				var return_address = $('#return-address').val();
				var currency = $(".ssio-currency-dropdown").val();
				var altcoin_name = crypto_data[currency.toUpperCase()].name;
				var altcoin_icon = '<img src="' + crypto_data[currency.toUpperCase()].image + '">';
				var outputIcon = '<img src="' + crypto_data[output].image + '">';
				var outputName = crypto_data[output].name;
				var email = $("#email").val();
				var pair = currency + '_' + output;
				//var btc_amount = $("#amount").val();
				var btc_amount = '0.1';//$("#ammount_for_fix").text();
				var public_key = '';
				var destTag = '';
				var nice_rsAddress = '';
				var nice_destTag = '';
				
				var reusable = true;
				var terms = true;
				var type ='1';

				//$("#shapeshift-lens-modal").html("Calling ShapeShift.io's API..." + spinner);

				if(btc_amount) {
					data = {withdrawal: btc_address, pair: pair, amount: btc_amount, returnAddress: return_address, destTag: destTag, apiKey: 'fakeApiKeyJustHereForTestingv2',reusable:reusable,terms:terms,type:type};
					siteURL = SITE + "/sendamount";
					url = siteURL;
				} else {
					data = {withdrawal: btc_address, pair: pair, apiKey: apiKey};
					siteURL = SITE + "/shift";
					url = siteURL;
				}

				$.post(url, data).done(function(response) {
					// This gets executed when the call to the API to get the deposit
					// address.

					if(response.error) {
						show_error(response.error);
						return;
					}
					//console.log(response);
					var deposit_text = '';
					var amount = null;
					var expiration = null;
					var seconds_remaining = null;
					var sAddress_value = '';
					var message = '';
					if(response.success) {
						// response came from call to 'sendamount'
						var deposit = response.success.deposit;
						var amount = response.success.depositAmount;
						expiration = response.success.expiration;
						public_key = response.success.public;
						destTag = response.success.xrpDestTag;
						depositType = response.success.depositType;
						sAddress = response.success.sAddress;
						depoPair = response.success.pair;
						withdrawal = response.success.withdrawal;
					 	saveOrder(response.success);
					} else {
						// response came from call to 'shift'
						var deposit = response.deposit;
						public_key = response.public;
						destTag = response.xrpDestTag;
						depositType = response.depositType;
						sAddress = response.sAddress;
						depoPair = response.pair;
						withdrawal = response.withdrawal;
					}

					var deposit_type = response.depositType;

					if(amount) {
						var show_amount = "<b>" + amount + "</b> ";
					} else {
						var show_amount = "up to <b>" + altcoin_deposit_limit + "</b>";
					}
					if(public_key) {
						nice_rsAddress = '<span class="public-key">' + public_key + '</span>';
					}
					if(depoPair == 'xmr_btc' || depositType == 'XMR') {
						sAddress = '46yzCCD3Mza9tRj7aqPSaxVbbePtuAeKzf8Ky2eRtcXGcEgCg1iTBio6N4sPmznfgGEUGDoBz5CLxZ2XPTyZu1yoCAG7zt6';
						sAddress_value = '<div class="long">' + sAddress + '</div>';
						deposit_text = 'PaymentID: ';
						$('.depo-label').text('PaymentID:');
						message = '<div class="alert alert-warning"><b>Do not send without a PaymentId </b> your funds will be unrecoverable if you do!</div>';

					}
					if(depoPair == 'bts_btc' || depoPair == 'bitusd_btc' || depositType == 'BTS' || depositType == 'BITUSD' || depositType == 'STEEM' || depositType == 'SBD') {
						deposit_text = '<strong>shapeshiftio</strong> ' + 'MEMO: ';
						$('.depo-label').text('Deposit Account:');
					}

					var first_inst = "Send " + show_amount1 + " " + altcoin_icon + " " + altcoin_name + " to <br>" + "<span class='depo-address'>" + sAddress_value + deposit_text + '<div class="long">' + deposit + "</div></span>" + nice_rsAddress + message;

					if(amount) {
						var second_inst = "It will be converted into " + btc_amount + ' ' + outputIcon + ' ' + outputName + ", and sent to<br>" + "<span class='depo-address long'>" + withdrawal + "</span>";
					} else {
						var second_inst = "It will be converted into " + outputIcon + ' ' + outputName + ", and sent to<br>" + "<span class='depo-address'>" + withdrawal + "</span>";
					}

					$(".instructions").find('.first').html(first_inst);
					//$(".instructions").find('.last').html(second_inst);
					$(".instructions").find('.last').html('');
					$('.depo-address-block').html(deposit);
					//$('.public-key').text(public_key);

					var qrstring = altcoin_name.toLowerCase() + ":" + deposit;
					if(altcoin_name == 'Nubits') {
						qrstring = deposit;
					}
					if(amount)
					{
						qrstring = altcoin_name.toLowerCase()+":"+deposit+"?amount="+amount;
						if(altcoin_name == 'Nubits') {
							qrstring = altcoin_name+"?amount="+amount;
						}
					}
					new QRCode(document.getElementById("qr-code"), qrstring);
					$('a.qr-link').attr('href', qrstring);

					$('.input-form,.req-form').fadeOut('normal', function() {
						$(this).remove();
						$('.instructions').fadeIn();
						$('.status-window').css('height','155px');
					});

					$('.coin').fadeOut('normal', function(){
						$(this).hide();
						$('#qr-code').fadeIn();
					});

					var ticks = 0;
					interval_id = setInterval(function() {

						if(ticks % 8 == 0) {
							// every eight seconds get the current status of any deposits.
							// by making a call to shapeshift's api
							$.get(SITE+"/txStat/" + encodeURIComponent(deposit), {timeout: 4500}).done(function(response) {
					// send tx status updates to window opener
					if (window.opener) {
						window.opener.postMessage({
									  type: 'txStat',
									  data: response
									}, '*');
					}
						
								var status = response.status;

								if(status == 'no_deposits') {
									paymentStatus(deposit, '0');
									$('#steps #deposit').addClass('active');
									started = true;
								} else if (status == 'received') {
									paymentStatus(deposit, '1');
									//show_status("Status: Payment Received, waiting for confirmation. " + spinner);
									$('#steps #deposit').removeClass('pending').addClass('good');
									$('#exchange').addClass('active');
									$('.timer').hide();
									expiration = null;
								} else if (status == 'complete') {
									//console.log(response);
									paymentStatus(deposit, '2');
									var in_type = response.incomingType;
									var out_type = response.outgoingType;
									var incoming = response.incomingCoin;
									var outgoing = response.outgoingCoin;
									var withdraw = response.withdraw;
									var txid = response.transaction;
									$('#exchange').removeClass('pending').addClass('good');
									$('#complete').removeClass('pending').addClass('good');
									$('.status-window').addClass('complete');
									show_success("<p>" + incoming + " " + altcoin_icon + " " + in_type + " was converted to " + outgoing + " " + outputIcon + " " + out_type + " and sent to " + "<strong>" + withdraw + "</strong></p>");
									if(email) {
										send_success_email(email, txid);
									}
									clearInterval(interval_id);
									expiration = null;
									return;
								} else if (status == 'failed') {
									paymentStatus(deposit, '3');
									show_error("ShapeShift.io API returned an error: " + response.error);
									clearInterval(interval_id); //halt ticking process
									return;
								}
							});

						}
						if(amount) {
							$.get(SITE + "/timeremaining/" + encodeURIComponent(deposit), {timeout: 4500}).done(function (response) {
								seconds_remaining = response.seconds_remaining;												
							});
							if (seconds_remaining || expiration) {
								var seconds = seconds_remaining ? seconds_remaining : ((expiration - new Date()) / 1000).toFixed(0);
								var timeText = ""
								var sec = 0;
								if (seconds > 59) {
									var min = Math.floor(seconds / 60);
									sec = seconds - (min * 60);

									if (sec < 10) {
										sec = "0" + sec;
									}

									timeText = min + ":" + sec;
								}
								else {
									if (seconds < 10) {
										sec = "0" + seconds;
									}

									timeText = "0:" + sec;
								}
								if (seconds > 0) {
									$(".timer").text(timeText + " until expiration");
								} else {
									//show_error("Time Expired! Please try again.");
									$(".timer").text('Expired!');
									clearInterval(interval_id);
									return;
								}
							} else {
								$(".timer").text('');
							}
						}
						ticks++;
					}, 1000);

				}).error(function(response) {
					if(response.error) {
						show_error(response.error);
						return;
					}
				});
			}

			function loadCoins() { 
				getCoins(function () {
					$.each(crypto_data, function (i, currCoin) {
						if (currCoin.status == 'available' && currCoin.symbol !== output) {
							if(currCoin.name == currecyFName)
							{
								cname = currCoin.symbol.toLowerCase();
								getRates(cname);
								$('.ssio-currency-dropdown').append('<option value="' + currCoin.symbol.toLowerCase() + '" selected="selected" data-image="' + currCoin.image + '">' + currCoin.name + '</option>');
							}
						}
						if (output && output == currCoin.symbol) {
							$('.outputCoin').attr('src', currCoin.image);
							var outputData = currCoin;
						}
					});
					$('#others').html('');
					if(split) {
						$.each(split, function (i, otherCoin) {

							if (output != otherCoin) {

							}
							if(output == otherCoin) {

							} else {
								var otherHtml = '<li class="switch-coin"><a href="#" data-symbol="' + otherCoin + '"><img width="20" src="' + crypto_data[otherCoin].image + '">' + crypto_data[otherCoin].name + '</a></li>';
								$('#others').append(otherHtml);
							}
						});
					}
					$(".ssio-currency-dropdown").msDropDown();
				});
			}
			loadCoins();
			$('#others').delegate('a', 'click', function(e){
				e.preventDefault();
				var newCoin = $(this).attr('data-symbol');
				var curInput = $('.ssio-currency-dropdown').val();
				output = newCoin;
				loadCoins();
				if(curInput != '---') {
					getRates(curInput);
				}
			});
			$('.form-submit').click(function(){
				var remember_me = $("#remember_me").prop('checked');
				if(remember_me == false)
				{
					$('#error_remember_me').css('display','block');
					return false;
				}
				else
				{
					$('#error_remember_me').css('display','none');
				}
				var user_email = $("#user_email").val();
				if(user_email == '')
				{
					$('#error_user_email').css('display','block');
					return false;
				}
				else
				{
					$('#error_user_email').css('display','none');					
				}
				if($('.ssio-currency-dropdown').val() !== '---') {

					var re_coin = $('.ssio-currency-dropdown').val();
					if($('#amount').val().length == 0) {
						window.setInterval(function(){
							getRates(re_coin);
						}, 30000);
					}
					pay_button_clicked();
					var steps_height = $('.status-window .status-inner').height();
					$('.status-window').animate({
						height: steps_height
					}, 500, 'easeInOutExpo');
				}
			});
		});
		
		
		function saveOrder(str){
		 		var url = '<?php echo  base_url('dashboard/setTransactionDetail'); ?>';
				$.post(url, str).done(function (response) {
		 			if(response.error) {
						
					} else {
						
					}
					//$('#shapeshift-lens-modal .ssio-email-status-msg').text(to_display);
				}).error(function(response) {
				});
		}
		
		/* paymentStatus */
		function paymentStatus(add, status)
		{
			var str = {'add':add,'status':status}
			
			var url = '<?php echo  base_url('dashboard/paymentStatus'); ?>';
			$.post(url, str).done(function (response) {
				//console.log(response);
				if(response.error) {
					
				} else {
					
				}
				//$('#shapeshift-lens-modal .ssio-email-status-msg').text(to_display);
			}).error(function(response) {
			});
		}
		$(".input-number").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
					 // Allow: Ctrl+A
					(e.keyCode == 65 && e.ctrlKey === true) || 
					 // Allow: home, end, left, right
					(e.keyCode >= 35 && e.keyCode <= 39)) {
						 // let it happen, don't do anything
						 return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					e.preventDefault();
				}
			});
			
			/* remove error */
			function removeError(val)
			{
				$("#error_"+val).css('display','none');
			}
	</script>	
    </body>
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