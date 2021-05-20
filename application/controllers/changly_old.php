<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *  Home Class
 *
 * @package     
 * @subpackage  Controllers
 * @category    
 * @author      Brinfotech
 * @link        
 */
 
class Changly extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
 		$this->load->library('session');
 		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
    }
	
	/*--------------------------------------------------------------------
 	*	@Function: Login
 	*---------------------------------------------------------------------
	*/
 	public function index($param2="",$coinval='')
	{
		if($param2 == 'eth')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>'eth','to'=>'btc','address'=>'1AFE7JtLvVcVWk6Wwo5MEvuPDDiHMCiuY7','extraId'=>'','amount'=>$coinval), 'id'=>1)
			);	
		}
		else
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>$param2,'to'=>'eth','address'=>'0xB8900B5Dd385b856094B2F23169cA2D156B6178d','extraId'=>'','amount'=>$coinval), 'id'=>1)
			);			
		}
		$this->curlOpration($message);
	}
	
	/* Get Transactions */
	public function getTransactions()
	{
 		$message = json_encode(
			array('jsonrpc' => '2.0', 'method' => 'getTransactions', 'params' => array('currency'=>'eth','address'=>'0xB8900B5Dd385b856094B2F23169cA2D156B6178d','extraId'=>null,'limit'=>10,'offset'=>10), 'id'=>1)
		);
		$this->curlOpration($message);
	
	}
	
	function getTransactionsStatus($param1=''){
		$message = json_encode(
			array('jsonrpc' => '2.0', 'method' => 'getStatus', 'params' => array('id'=$param1), 'id'=>1)
		);
 		$this->curlOpration($message);
	}
	
	
	
	function curlOpration($message){
		
		$apiKey = '82d9fc0a1c544119b3f67f87c3b2a4e7';
		$apiSecret = '20823a2e739396216fecbfd727cb5ce31e508e0c8c45ed9379d3c41f4dea93ef';
		$apiUrl = 'https://api.changelly.com';

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
