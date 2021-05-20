<div class="row">
	
		<div class="container">
			<?php
				$apiKey = '82d9fc0a1c544119b3f67f87c3b2a4e7';
				$apiSecret = '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef';
				$apiUrl = 'https://api.changelly.com';
				
				$message = json_encode(
					array('jsonrpc' => '2.0', 'method' => 'generateAddress', 'params' => array('from'=>'btc','to'=>'eth','address'=>'0xB8900B5Dd385b856094B2F23169cA2D156B6178d'), 'id'=>1)
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
				print_r(json_decode($response));
				curl_close($ch);
				//var_dump($response);
				return $response;
			?>
			<iframe src="https://changelly.com/widget/v1?auth=email&from=BTC&to=ETH&merchant_id=ead60b001a71&address=0xB8900B5Dd385b856094B2F23169cA2D156B6178d&amount=1&ref_id=ead60b001a71&color=00cf70" width="600" height="500" class="changelly" scrolling="no" style="overflow-y: hidden; border: none" > Can't load widget </iframe> 
			<h2>Select Currency to Buy <span class="font-green">COIN</span></h2>
			<br>

			<div class="row clearfix">
				<div class="col-md-3 col-sm-3 text-center">
					<input type="radio" id="cb1" name="coin" />
            		<label for="cb1">
            			<p class="font-green">Bitcoin (BTC)</p>
            			<small>1BTC gets you</small>
            			<p class="font-red">45454 XCM</p>           			

            		</label>
				</div>

				<div class="col-md-3 col-sm-3 text-center">
					<input type="radio" id="cb2" name="coin" />
        			<label for="cb2">
        				<p class="font-green">Ethereum (ETH)</p>
            			<small>1 ETH gets you</small>
            			<p class="font-red">545 XCD</p>
        			</label>	
				</div>

				<div class="col-md-3 col-sm-3 text-center">
					<input type="radio" id="cb3" name="coin" />
        			<label for="cb3">
        				<p class="font-green">Litecoin (LTC)</p>
            			<small>1 LTC gets you</small>
            			<p class="font-red">5151 XCD</p>
        				

        			</label>
				</div>

				<div class="col-md-3 col-sm-3 text-center">
					<input type="radio" id="cb4" name="coin" />
        			<label for="cb4">
        				<p class="font-green">Bitcoin-Cash (BCH)</p>
            			<small>1 BCH gets you</small>
            			<p class="font-red">1211 XCD</p>
        			</label>
				</div>
			</div>

			<div class="row clearfix">
				<div class="col-md-12 text-center">
					<p>&nbsp;</p><br>
    	<button id="btn" class="btn btn-success btn-lg">Continue</button>
    </div>	
			</div>
    
    

</div>

	</div>