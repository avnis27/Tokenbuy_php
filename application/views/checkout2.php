	<div class="row">
		<div class="container">
			<h2>Purchase <span class="font-green"><?=COIN; ?></span></h2><br>
			<div class="row clearfix">
				<form action="" name="" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="col-md-7 col-sm-6 brd-grey">
						<p></p>
						<p class="font-red">Send</p>
						<h1 class="font-green"><?=$sellcoinValue; ?> <?=$sell_coin; ?> <span class="pull-right"><?=$buy_coinValue; ?></span></h1>
						<p class="font-red">to this address</p>
						<!--<input type="text" class="form-control input-lg" name="sendAddress" <?php echo getAddress($sell_coin); ?> /> 					<hr>					-->
						<input type="text" class="form-control input-lg" name="sendAddress" id="contract_address" value="1Ac8nMwyz9MkJx8moYdcuhr7WksUszS6o1" /> 					<hr>					
						<p class="font-red">Lorem ipsum dolor sit amet, eu commodo labores eum, ad nec legere oportere. An libris oporteat pri. Ex pro nibh minimum. Vidisse facilisis no has. No sapientem assentior necessitatibus vel. At mundi ponderum vis, ut per aliquid recusabo adversarium, mollis eruditi nec ne.</p>
						<p class="font-red">Est ne quis adipisci torquatos. Eam eu sale impedit, causae suavitate sea in. Qui prima denique sapientem et, ex graeco essent dolorum nec, alii alienum partiendo est te. Stet nostro an vim.</p>
						<p class="font-red"> is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placeholder (or filler) text. It's a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout.</p>               
					</div>
					<div class="col-md-5 col-sm-6">
						<div class="sidebar">
							<div class="side-body grey-bg col-md-12">
								<div class="item">
									<h4>Balance</h4>
									<h2 class="font-green"><?=$buy_coinValue; ?> <?=COIN; ?> </h2>
								</div>                                                      
							</div>
							<p>&nbsp;</p>
							<div class="side-head">
							<h3 class="mt-0 font-red">Purchase Details</h3>                        
							</div>
							<div class="side-body green-bg col-md-12">
								<div class="item">
									<h4>Coin To Buy <strong class="pull-right font-red"><?=$buy_coinValue; ?> <?=COIN; ?></strong></h4>
								</div><hr>
								<div class="item">
									<h4>Coin Price <strong class="pull-right font-red"><?=$sellcoinValue; ?> <?=$sell_coin; ?></strong></h4>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="side-body bg-cherry col-md-12">
								<div class="item">
									<h4>Net Amount<strong class="pull-right font-green"><?=$sellcoinValue; ?> <?=$sell_coin; ?></strong></h4>
								</div><hr>
								<div class="item">
									<h4>Commission 0.00% <strong class="pull-right font-green"><?=$sellcoinValue; ?> <?=$sell_coin; ?></strong></h4>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="side-body grey-bg col-md-12">
								<div class="item">
									<h4>Gross Amount <strong class="pull-right font-green"><?=$sellcoinValue; ?> <?=$sell_coin; ?></strong></h4>
								</div>   
								<div class="item">
									<span class="btn btn-primary" onClick="checkpayementStatus();">Proceed</span>
								</div>  								
							</div>																					
							<button class="btn btn-primary" type="button" onClick="makepayementStatus();">make payment</button>								
						</div>
					</div>
				</form>
			</div>
			<script>
				function checkpayementStatus(){ 
					var address =  $('#contract_address').val();
					var yourcoin =  $('.yourcoin').val();
					$.ajax({
						url: 'https://shapeshift.io/txStat/'+address+'/'+'<?=$sell_coin; ?>', // form action url
						type: 'GET', // form submit method get/post
						dataType: 'json', // request type html/json/xml
						success: function(resp) 
						{
							alert(resp.error);
							if(resp.status=='no_deposits')
							{
								alert('*no deposits');
							}
							else if(resp.status=='received')
							{								
								alert('*received');								
								return false;
							}
							else if(resp.status=='complete')
							{								
								alert('*complete');								
								return false;
							}						
							else if(resp.status=='failed')
							{								
								alert('*failed');								
								return false;
							}
						}					
					}); 
					//setInterval(function(){ 
					//}, 3000);
				}		
			
				function makepayementStatus(){ 
					var address =  $('#contract_address').val();
					var yourcoin =  $('.yourcoin').val();
					$.ajax({
						url: 'https://shapeshift.io/txbyaddress/'+address+'/69d8443736729940ea2c06dd71b537fc95cfa09f412f6d94077a2999ce31d94f6321877353a2b7e12b4558e0f5ece5715dadff69536e0c1a4557fee78c9f2845', // form action url
						type: 'GET', // form submit method get/post
						dataType: 'json', // request type html/json/xml
						success: function(resp) 
						{
							alert(resp.error);
							if(resp.status=='returned')
							{
								alert('*no deposits');
							}
							else if(resp.status=='received')
							{								
								alert('*received');								
								return false;
							}
							else if(resp.status=='complete')
							{								
								alert('*complete');								
								return false;
							}						
							else if(resp.status=='failed')
							{								
								alert('*failed');								
								return false;
							}
						}					
					}); 
					//setInterval(function(){ 
					//}, 3000);
				}		
			</script>			
		</div>
	</div>
</div>

   