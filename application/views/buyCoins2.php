	<?php 
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
	<div class="row">
		<div class="container">        	
			<h1>What will you use to buy <span class="font-green">INV</span>
            <a href="<?php echo base_url('dashboard'); ?>" class="btn goback-btn pull-right"><i class="fa fa-reply"></i> Go Back</a> 
            
            </h1><br>			
            
			<div class="row clearfix currentRate mt-50">
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('BTC')">
					<input type="radio" id="cb1" name="coin" checked="checked" />
            		<label for="cb1">
            			<p class="font-green">Bitcoin (BTC)</p>
            			<small>1 BTC gets you</small>
            			<p class="font-blue"><?= number_format($this->mycoin->getPriceCoinCap('BTC'),2).' USD'; ?><br>
							<?php
								$BTC_XCM = $this->mycoin->getPriceCoinCap('BTC')/$token_supply_price;
								echo number_format($BTC_XCM).' '.COIN;
							?>
						</p>           			
            		</label>
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('ETH')">
					<input type="radio" id="cb2" name="coin" />
        			<label for="cb2">
        				<p class="font-green">Ethereum (ETH)</p>
            			<small>1 ETH gets you</small>
            			<p class="font-blue"><?= number_format($this->mycoin->getPriceCoinCap('ETH'),2).' USD'; ?><br>
							<?php
								$ETH_XCM = $this->mycoin->getPriceCoinCap('ETH')/$token_supply_price;
								echo number_format($ETH_XCM).' '.COIN;
							?>
						</p>
        			</label>	
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('LTC')">
					<input type="radio" id="cb3" name="coin" />
        			<label for="cb3">
        				<p class="font-green">Litecoin (LTC)</p>
            			<small>1 LTC gets you</small>
            			<p class="font-blue">
							<?= number_format($this->mycoin->getPriceCoinCap('LTC'),2).' USD'; ?><br>
							<?php
								$LTC_XCM = $this->mycoin->getPriceCoinCap('LTC')/$token_supply_price;
								echo number_format($LTC_XCM).' '.COIN;
							?>
						</p>  				
        			</label>
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('BCH')">
					<input type="radio" id="cb4" name="coin" />
        			<label for="cb4">
        				<p class="font-green">Bitcoin-Cash (BCH)</p>
            			<small>1 BCH gets you</small>
            			<p class="font-blue"><?= number_format($this->mycoin->getPriceCoinCap('BCH'),2).' USD'; ?><br>
							<?php
								$BCH_XCM = $this->mycoin->getPriceCoinCap('BCH')/$token_supply_price;
								echo number_format($BCH_XCM).' '.COIN;
							?>
						</p>
        			</label>
				</div>
			</div>
			<div class="row clearfix liveRate">
			</div>
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<p>&nbsp;</p><br>
					<form action="<?php echo base_url('dashboard/checkout');?>" method="post" id="from_sub"> 
						<input type="hidden" name="coin" value="BTC" id="coinValue">
						<button id="btn" class="btn btn-continue btn-big" type="button" name="buyCoin" onclick="fromSubmit()"> Continue</button>				
					</form>                                        
				</div>	
			</div>
            <!---->
            <?php /*?><div class="row clearfix mt-100">
            	<div class="table-responsive">
                <h2>Token Supply:</h2>
  					<table class="table table-striped token-supply">                    	
                    	<tbody>
							<?php
								if($coin_details)
								{
									foreach($coin_details as $res)
									{
										if($res->token_supply_from_qty < $coin_record->coin_sold)
										{
											?>
												<tr>
													<td>
														<h4>Previous Price</h4> $<?php echo $res->token_supply_price; ?>
													</td>
													<td>
														<h4>Milestone</h4> > <?php echo $res->token_supply_total_qty; ?>
													</td>
													<td>
														<h4>Ended at</h4> <?php echo date('d/m/Y', strtotime($coin_record->created_date)); ?>
													</td>  
													<td>&nbsp;</td>  
												</tr>
											<?php
										}
										elseif($res->token_supply_from_qty == $coin_record->coin_sold)
										{
											?>
												<tr class="info">
													<td>
														<h4>Current Price</h4> $<?php echo $res->token_supply_price; ?>
													</td>
													<td>
														<h4>Milestone</h4> > <?php echo $res->token_supply_total_qty; ?>
													</td>
													<td>
														<h4>Ended at</h4> 
													</td>  
													<td>
														<!--<a href="<?php echo base_url('dashboard/checkout');?>" class="btn btn-primary">BUY NOW!</a>-->&nbsp;
													</td> 
												</tr>
											<?php
										}
										else
										{
											?>
												<tr>
													<td>
														<h4>Next Price</h4> $<?php echo $res->token_supply_price; ?>
													</td>
													<td>
														<h4>Milestone</h4> > <?php echo $res->token_supply_total_qty; ?>
													</td>
													<td>
														<h4>Ended at</h4> 
													</td>  
													<td>&nbsp;</td>  
												</tr>
											<?php
										}
									}
								}
							?>
                        </tbody>
                    </table>
                
                </div>
            </div><?php */?>
            <!--//-->
            
            
            
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">      
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Please select atleast one currency</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
			</div>
		</div>
	</div>
</div>
<script>
	var cb = 'cb1';
	
	function getCoin(coin){
		$('#coinValue').val(coin);
		if(coin == 'BTC')
		{
			cb = 'cb1';			
		}
		if(coin == 'ETH')
		{
			cb = 'cb2';			
		}
		if(coin == 'LTC')
		{
			cb = 'cb3';			
		}
		if(coin == 'BCH')
		{
			cb = 'cb4';			
		}		
	}

	function fromSubmit(){
		var cval = $('#coinValue').val();
		if(cval!=""){
			$('#from_sub').submit();
		}else{
			$('#exampleModal').modal('show');
		}
	}	
	/* Live rate */
	function rateRefresh()
	{ 
		setTimeout(function()
		{
			var dataString = 'id=1';
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url();?>dashboard/rateRefresh',
				data: dataString,
				success:function(result)
				{
					if(result)
					{
						$('.currentRate').empty();
						$('.liveRate').html(result);
						$('#'+cb).attr('checked', 'checked');
					}
					else
					{
						$('.liveRate').empty();
					}	
				}
			});
			rateRefresh();
		}, 2000)
	}
	rateRefresh();
</script>
   