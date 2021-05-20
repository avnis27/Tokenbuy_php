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
			<div class="col-md-3 col-sm-3 text-center" onclick="getCoin('BTC')">
				<input type="radio" id="cb1" name="coin" />
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