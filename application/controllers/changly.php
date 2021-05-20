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
		$accountDetails = $this->db->get_where('api_details')->row();
		$apiKey = $accountDetails->apiKey;
		$apiSecret = $accountDetails->apiSecret;
		$apiUrl = 'https://api.changelly.com';
		if($param2 == 'eth')
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>'eth','to'=>'btc','address'=>$accountDetails->btc_address,'extraId'=>'','amount'=>$coinval), 'id'=>1)
			);	
		}
		else
		{
			$message = json_encode(
				array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>$param2,'to'=>'eth','address'=>$accountDetails->eth_address,'extraId'=>'','amount'=>$coinval), 'id'=>1)
			);			
		}
		
		/* $message = json_encode(
			array('jsonrpc' => '2.0', 'method' => 'createTransaction', 'params' => array('from'=>'ltc','to'=>'eth','address'=>'0xB8900B5Dd385b856094B2F23169cA2D156B6178d','extraId'=>'null','amount'=>'1'), 'id'=>1)
		); */
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
		echo  $response;
	}
	
	/* Get Transactions */
	public function getTransactions()
	{
		$accountDetails = $this->db->get_where('api_details')->row();
		$apiKey = $accountDetails->apiKey;
		$apiSecret = $accountDetails->apiSecret;
		$apiUrl = 'https://api.changelly.com';

		$message = json_encode(
			array('jsonrpc' => '2.0', 'method' => 'getTransactions', 'params' => array('currency'=>'eth','address'=>$accountDetails->eth_address,'extraId'=>null,'limit'=>10,'offset'=>10), 'id'=>1)
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
	 	echo  $response;
	}
	
	
	/* Get getTransactionsStatus */
	public function getTransactionsStatus($param1='')
	{
		$accountDetails = $this->db->get_where('api_details')->row();
		$apiKey = $accountDetails->apiKey;
		$apiSecret = $accountDetails->apiSecret;
		$apiUrl = 'https://api.changelly.com';

		$message = json_encode(
			array('jsonrpc' => '2.0', 'method' => 'getStatus', 'params' => array('id'=>$param1), 'id'=>1)
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
		print_r($response);
		curl_close($ch);
		//var_dump($response);
		return $response;
	}
}
