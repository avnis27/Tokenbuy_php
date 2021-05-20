<div class="row">
		<div class="container">

			<h2>You have Chosen to Buy <span class="font-green">COIN</span> paying in <span class="font-red"><?=$sell_coin; ?>	</span></h2>
			<br>

			<div class="row clearfix">
            <!---->
            	<div class="col-md-6 col-sm-6">
                <div class="bg-cherry col-md-12">
                 <h2>How much coin you need</h2>
                <h4>Enter amount of coin you want to buy or <?=$sell_coin; ?> to sell</h4>
                <hr>
                
                 <form action="<?=base_url(); ?>dashboard/checkout2" method="post" id="confirm_from" novalidate> 
					<input type="hidden" name="sell_coin" value="<?=$sell_coin; ?>">
                	<div class="form-group">
                    	<div class="input-group">
  						<span class="input-group-addon">When you sell </span>
  						<input type="number" class="form-control text-right  required yourcoin" name="sellcoinValue" >
  						<span class="input-group-addon" style="font-size:20px"><i class="fab fa-betcoin font-red"></i></span>
						</div>
                    </div>
                 
                
                	<div class="form-group">
                    	<div class="input-group">
  						<span class="input-group-addon"><?=COIN; ?></span>
  						<input type="number" class="form-control required setCoinValue" name="buy_coinValue" disabled >
                        <span class="input-group-addon" >When you get</span>
						</div>
                    </div>
                    
                    <div class="form-group">
                    	<div class="input-group">  	
                        <span class="input-group-addon">Email Address</span>					
  						<input type="email" class="form-control required"  name="email" placeholder="Email Address">
                        
						</div>
                    </div>
					
					<div class="form-group">
                    	<div class="input-group">  	
                        <span class="input-group-addon"><?=$sell_coin; ?> Address</span>					
  						<input type="text" class="form-control required"  name="contract_address" aria-label="Amount (to the nearest dollar)">
                        
						</div>
                    </div>
                    
                   <div class="form-group"> 
                   		<span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Accepted</button>
                    <input type="checkbox" name="remember_me" id="remember_me" class="hidden">
					All Terms and condition I have accepted
					</span>
                	</div>
                    
                    <div class="form-group pull-right"> 
                   	<input type="submit"   class="btn btn-success" value="Confirm" data-msg="Submitting.." id="confirm_btn" >
					
					<!--<input type="button" onclick="checkValidation('confirm_from','confirm_btn')"  class="btn btn-success" value="Confirm" data-msg="Submitting.." id="confirm_btn" >-->
                	</div>
              
    				
                </form>
                </div>
               
                </div>
            <!--//-->
            
            
            <!---->
            	<div class="col-md-6 col-sm-6">
                	<div class="sidebar">
                    	<div class="side-head">
                        <h3 class="mt-0 font-red">Purchase Details</h3>                        
                    	</div>
                        <div class="side-body green-bg col-md-12">
                        	<div class="item">
                            <h4>Coin To Buy <strong class="pull-right font-red"><?=$this->mycoin->getPriceExchange($sell_coin,COIN).' '.COIN	; ?></strong></h4>
                            </div>
                            <hr>
                            <div class="item">
                            <h4>Coin Price <strong class="pull-right font-red setCoinValue">0.00015 <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <div class="side-body bg-cherry col-md-12">
                        	<div class="item">
                            <h4>Net Amount<strong class="pull-right font-green setCoinValue">0.0015 <?=$sell_coin; ?></strong></h4>
                            </div>
                            <hr>
                            <div class="item">
                            <h4>Commission 0.00% <strong class="pull-right font-green setCoinValue">0.00000 <?=$sell_coin; ?></strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <!--//-->
				

				

				

				
			</div>

			
    
    

</div>

	</div>
	
	<script>
		$( ".yourcoin" ).keyup(function(e) {
		 var yourcoin =  $('.yourcoin').val();
		 var currecy_price  = '<?=$this->mycoin->getPriceExchange($sell_coin,COIN); ?>';
		 var sell_coin  = '<?=$sell_coin; ?>';
		 $('.setCoinValue').val(yourcoin*currecy_price);
		 $('.setCoinValue').text(yourcoin*currecy_price+' ' +sell_coin );
		});
	</script>