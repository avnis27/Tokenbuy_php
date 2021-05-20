	<div class="row">
		<div class="container">
			<h2>Select Currency to Buy <span class="font-green">COIN</span></h2><br>
			<div class="row clearfix">
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('BTC')">
					<input type="radio" id="cb1" name="coin" />
            		<label for="cb1">
            			<p class="font-green">Bitcoin (BTC)</p>
            			<small>1 BTC gets you</small>
            			<p class="font-red"><?=$this->mycoin->getPriceExchange('BTC',COIN).' '.COIN	; ?> </p>           			
            		</label>
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('ETH')">
					<input type="radio" id="cb2" name="coin" />
        			<label for="cb2">
        				<p class="font-green">Ethereum (ETH)</p>
            			<small>1 ETH gets you</small>
            			<p class="font-red"><?=$this->mycoin->getPriceExchange('ETH',COIN).' '.COIN	; ?></p>
        			</label>	
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('LTC')">
					<input type="radio" id="cb3" name="coin" />
        			<label for="cb3">
        				<p class="font-green">Litecoin (LTC)</p>
            			<small>1 LTC gets you</small>
            			<p class="font-red"><?=$this->mycoin->getPriceExchange('LTC',COIN).' '.COIN	; ?></p>        				
        			</label>
				</div>
				<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('BCH')">
					<input type="radio" id="cb4" name="coin" />
        			<label for="cb4">
        				<p class="font-green">Bitcoin-Cash (BCH)</p>
            			<small>1 BCH gets you</small>
            			<p class="font-red"><?=$this->mycoin->getPriceExchange('BCH',COIN).' '.COIN	; ?></p>
        			</label>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<p>&nbsp;</p><br>
					<form action="<?php echo base_url('dashboard/checkout');?>" method="post" id="from_sub"> 
						<input type="hidden" name="coin" id="coinValue">
						<button id="btn" class="btn btn-success btn-lg" type="button" onclick="fromSubmit()"> Continue</button>				
					</form>
				</div>	
			</div>
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
function getCoin(coin){
	$('#coinValue').val(coin);
}

function fromSubmit(){
	var cval = $('#coinValue').val();
	if(cval!=""){
		$('#from_sub').submit();
	}else{
		$('#exampleModal').modal('show');
	}
}	
</script>
   