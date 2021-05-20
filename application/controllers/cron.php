<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *   Class
 *
 * @package      
 * @subpackage  Controllers
 * @category    
 * @author      BRInfotech
 * @link        
 */
 
class cron extends MY_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','date_helper','html_helper')); 
		$this->load->library('session');
		
    }
	

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

		$authToken = curl_exec($ch);


		$data =array();
		echo $authToken;
	}	
	
	

	/*--------------------------------------------------------------------
 	*	@Function: get enter scan url responce
 	*---------------------------------------------------------------------
	*/
	function receiveBtc(){
		
		$siteUrl = "https://api.blockchain.info/v2/receive/balance_update";

		$url  = $siteUrl;

		$params = array(
			'confs'  => '5',
			'key'   => '3a65336b-a534-4e29-8502-aaadddb0ca08',
	 		'addr'        => '6a8ad631-a98e-42f5-a512-37721a1b3a49',
			'callback'   => 'https://mystore.com?invoice_id=123',
			'onNotification'      => 'KEEP',
		 	'op'      => 'RECEIVE',
		  );
		$ch = curl_init();
		$headers = array(
		//'Accept: application/json',
		'Content-Type: text/plain',
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		// Timeout in seconds
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$authToken = curl_exec($ch);


		$data =array();
		echo $authToken;
	}	
	
	
}
