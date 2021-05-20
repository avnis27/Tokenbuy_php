<?php
	$coinDetails = ($coin_record->coin_sold * 100/$coin_record->coin_total);
?>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Token Sold: <span class="font-green"><?php echo number_format($coin_record->coin_sold); ?></span></h2><br>
				<!--<h3 class="progress-title"><i class="fa fa-dollar-sign"></i></h3>-->
				<div class="progress">
					<div class="progress-bar testprogress" style="width:<?php echo $coinDetails; ?>%; background:#97c513;">
						<div class="progress-value testprogressText"><?php echo number_format($coinDetails, 2).' %'; ?></div>
					</div>
				</div>	 
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<h3><?php echo number_format($coin_record->coin_available); ?></h3>
				<p>still available at <i class="fa fa-dollar-sign"></i> 
					<?php 
						if(1 < $coin_record->coin_sold)
						{
							if($coin_details[4]->token_supply_to_qty < $coin_record->coin_sold)
							{
								echo $coin_details[5]->token_supply_price; 	
							}
							elseif($coin_details[3]->token_supply_to_qty < $coin_record->coin_sold)
							{
								echo $coin_details[4]->token_supply_price; 	
							}
							elseif($coin_details[2]->token_supply_to_qty < $coin_record->coin_sold)
							{
								echo $coin_details[3]->token_supply_price; 	
							}
							elseif($coin_details[1]->token_supply_to_qty < $coin_record->coin_sold)
							{
								echo $coin_details[2]->token_supply_price; 	
							}
							elseif($coin_details[0]->token_supply_to_qty < $coin_record->coin_sold)
							{
								echo $coin_details[1]->token_supply_price; 	
							}
							else
							{
								echo $coin_details[0]->token_supply_price; 			
							}
						}
						else
						{
							echo $coin_details[0]->token_supply_price; 														
						}
					?>
				</p>
				<form action="<?php echo base_url('dashboard/buyCoin'); ?>" method="post">
					<button class="btn btn-success btn-lg" type="submit">Buy INV</button>	
				</form>
			</div>
		</div>
		<div class="row clearfix mt-100">
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
		</div>
	</div>		
</div>