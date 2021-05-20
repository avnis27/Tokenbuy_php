<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycoin {

     /*--------------------------------------------------------------------
 	*	@Function: get enter scan url responce
 	*---------------------------------------------------------------------
	*/
	function getPriceExchange($fsym,$tsyms){
		
		$siteUrl = "https://min-api.cryptocompare.com/data/price?";

		$url  = $siteUrl.'fsym='.$fsym.'&tsyms='.$tsyms;


		$ch = curl_init();
		$headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Timeout in seconds
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$price = curl_exec($ch);


		$data =array();
		$nprice = json_decode($price);
	 
		return $nprice->$tsyms;
	}	
	
	/* Coincap API responce */
	public function getPriceCoinCap($currency)
	{
		$url  = "http://coincap.io/page/".$currency;
		$ch = curl_init();
		$headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Timeout in seconds
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$price = curl_exec($ch);

		$data =array();
		$nprice = json_decode($price);				
		return $nprice->price_usd;
	}
	
	/* Changelly */
	public function changelly($method, $from=null, $to=null, $amount=null, $id=null, $address=null, $extraId=null)
	{
		$apiKey = '82d9fc0a1c544119b3f67f87c3b2a4e7';
		$apiSecret = '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef';
		$apiUrl = 'https://api.changelly.com';
		if($method = 'getExchangeAmount')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getExchangeAmount', 'params' => array('from'=>$from,'to'=>$to,'amount'=>$amount), 'id' => $id)
			);			
		}
		elseif($method = 'getMinAmount')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getMinAmount', 'params' => array('from'=>$from,'to'=>$to))
			);			
		}
		elseif($method = 'getCurrencies')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getCurrencies', 'params' => array(''), 'id'=>$id)
			);			
		}
		elseif($method = 'createTransaction')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>$from, 'to'=>$to, 'address'=>$address, 'amount'=>$amount), 'id'=>$id)
			);			
		}
		elseif($method = 'getTransactions')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getTransactions', 'params' => array('currency'=>$from, 'address'=>$address, 'extraId'=>$extraId, 'limit'=>'10', 'offset'=>'10'), 'id'=>$id)
			);			
		}
		elseif($method = 'getStatus')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getStatus', 'params' => array('id'=>'1d36f592f21e'), 'id'=>'1')
			);			
		}
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
		curl_close($ch);

		//var_dump($response);
		return $response;
	}
	public function generateAddress()
	{
		$apiKey = '82d9fc0a1c544119b3f67f87c3b2a4e7';
		$apiSecret = '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef';
		$apiUrl = 'https://api.changelly.com';
		$message = json_encode(
			array('id' => '2', 'jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>'btc','to'=>'eth','address'=>'0xb40436a9541f0771f8d38131067490692f8A0840','amount' =>'0.01'))
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
		curl_close($ch);

		//var_dump($response);
		return $response;
	}
	
	/* Get minimam limit */
	public function getMinAmount($para1="")
	{
		$apiKey = '82d9fc0a1c544119b3f67f87c3b2a4e7';
		$apiSecret = '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef';
		$apiUrl = 'https://api.changelly.com';
		if($para1 == 'ETH')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getMinAmount', 'params' => array('from'=>'eth','to'=>'btc'), 'id'=>1)
			);			
		}
		else
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'getMinAmount', 'params' => array('from'=>strtolower($para1),'to'=>'eth'), 'id'=>1)
			);
		}
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
		//print_r($response);
		curl_close($ch);
		//var_dump($response);
		return $response;
	}
	
	
}