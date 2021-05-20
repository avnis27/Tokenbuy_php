<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getAddress($coin){
	if($coin=="LTC"){
		$Address = "3QQi8v2HgrnkMquXY5mGB54sSNwCqDPjiW";
	}else if($coin=="BCH"){
		$Address = "3QQi8v2HgrnkMquXY5mGB54sSNwCqDPjiW";
	}else if($coin=='ETH'){
		$Address = "3QQi8v2HgrnkMquXY5mGB54sSNwCqDPjiW";
	}
	else if($coin=='BTC'){
		$Address = "3QQi8v2HgrnkMquXY5mGB54sSNwCqDPjiW";
	}
	return $Address;
}
 /* XSS Clean */
function xssCleanValidate($input_array)
{
	$CI =& get_instance();
	$out_array = array();
	
	foreach ($input_array as $key => $value)
	{
 		if(is_array($value)){
			
	 		$out_array[$key] = $value!="" ? $CI->security->xss_clean(json_encode($value)) : '';
			
		}else{
 			$out_array[$key] = $value!="" ? $CI->security->xss_clean($value) : '';
		}
	}
	
	return $out_array;
}



function Validation($fieldName, $type, $min="", $max="", $operation="", $tablename="", $id="",$isRequired='')
{
 	
	if($type=="Number")
	{
		
		if (empty($_POST[$fieldName]) && $isRequired=='YES') 
		{		
			$errMsg[$fieldName] = '*Required';
			$errMsg['errors'] = 'errors';
		}
		
		else if($min!="" && $min!=NULL && !empty($_POST[$fieldName]) && strlen($_POST[$fieldName]) < $min ){ 
					
				$errMsg[$fieldName] = "It's must have atleast ".$min." Number";
				$errMsg['errors'] = 'errors';
		
		}
		else if($max!="" && $max!=NULL && !empty($_POST[$fieldName]) && strlen($_POST[$fieldName]) > $max )
		{
	 		$errMsg[$fieldName] = "It's should not exceed more than ".$max." Number";
			$errMsg['errors'] = 'errors';
	 	}
		else if(!is_numeric($_POST[$fieldName]) && !empty($_POST[$fieldName]))
		{
			$errMsg[$fieldName] = "It's must contain only numbers";
			$errMsg['errors'] = 'errors';	
		}
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;
		
	}
	else if($type=="TEXT")
	{
		if (empty($_POST[$fieldName])) 
		{		
			$errMsg[$fieldName] = '*Required';
			$errMsg['errors'] = 'errors';
		}
		else if (strlen($_POST[$fieldName]) < $min) 
		{		
			$errMsg[$fieldName] = "It's must have atleast ".$min." characters";
			$errMsg['errors'] = 'errors';
		}
		else if (strlen($_POST[$fieldName]) > $max) 
		{		
			$errMsg[$fieldName] = "It's should not exceed more than ".$max." characters";
			$errMsg['errors'] = 'errors';
		}
	//	else if (!preg_match("/^[\\p{L} '-]+$/", $_POST[$fieldName]))
	//	{
	//		$errMsg[$fieldName] = 'Enter valid';
	//		$errMsg['errors'] = 'errors';
	//	}	
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;
	}
	
	else if($type=="NAME")
	{
		if (empty($_POST[$fieldName])) 
		{		
			$errMsg[$fieldName] = '*Required';
			$errMsg['errors'] = 'errors';
		}
		else if (strlen($_POST[$fieldName]) < $min) 
		{		
			$errMsg[$fieldName] = "It's must have atleast ".$min." characters";
			$errMsg['errors'] = 'errors';
		}
		else if (strlen($_POST[$fieldName]) > $max) 
		{		
			$errMsg[$fieldName] = "It's should not exceed more than ".$max." characters";
			$errMsg['errors'] = 'errors';
		}
		else if (!preg_match("/^[a-zA-Z]+$/", $_POST[$fieldName]))
		{
			$errMsg[$fieldName] = '*Its must contain only character';
			$errMsg['errors'] = 'errors';
		}	
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;
	}
	
	else if($type=="PASSWORD")
	{
		if (empty($_POST[$fieldName])) 
		{		
			$errMsg[$fieldName] = '*Required';
			$errMsg['errors'] = 'errors';
		}
		else if(strlen($_POST[$fieldName]) <  6)
	    {
	        $errMsg[$fieldName] = "It's must be at least 6 characters";
	        $errMsg['errors'] = 'errors';
	    }    
		else if(strlen($_POST[$fieldName]) >  20)
	    {
	        $errMsg[$fieldName] = "It's should not exceed more than 20 charactres";
	        $errMsg['errors'] = 'errors';
	    }      
		else if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/', $_POST[$fieldName]))
	    {
	        $errMsg[$fieldName] = "The password does not meet the requirements!";
	        $errMsg['errors'] = 'errors';
	    }   		
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;	
	}
	else if($type=="EMAIL")
	{
		$CI =& get_instance();
		$UserEmail =$CI->db->get_where('user', array('user_email' => $_POST[$fieldName],'isActive'=>1))->row();
		
		if (empty($_POST[$fieldName])) 
		{		
			$errMsg[$fieldName] = '*Required'; 
			$errMsg['errors'] = 'errors';
		}
		else if(!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $_POST[$fieldName]))
		{
			$errMsg[$fieldName] = 'Enter valid';
			$errMsg['errors'] = 'errors';	
		}
		else if (count($UserEmail) > 0) 
		{
			$errMsg[$fieldName] = 'Email id already ';
			$errMsg['errors'] = 'errors';	
		} 
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;
	}
	else if($type=="REQUIRED")
	{
		
		if (empty($_POST[$fieldName]) && $isRequired=='YES') 
		{		
			$errMsg[$fieldName] = '*Required';
			$errMsg['errors'] = 'errors';
		}
 		
		else
		{  
			$errMsg[$fieldName] = '';
			$errMsg['errors'] = 'errors1';
		}
		return $errMsg;
		
	}
	else{
	
	}	
	 
}

/*---------------------------------------------------------------
 |	@function : sent message via send gried 
 |----------------------------------------------------------------
*/

	function _ddsent_mail($email,$subject,$message,$attach="")
	{
		$CI =& get_instance();
		$config = array(
		'protocol' => 'SMTP',
		'smtp_host' => 'tls://smtp.gmail.com',
		'smtp_port' => 465,
	  	'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE,
		'charset'  => 'utf-8',
		'priority' => '1',
		);
		$CI->load->library('email',$config);
		//$CI->email->initialize($config);
 		$CI->email->set_newline("\n");
		$CI->email->from('noreply@support.com', "Support | Support");
		$CI->email->to($email);  
		$CI->email->subject($subject);
 		
 		$CI->email->message($message);
		if($attach!=""){
 		
			//$CI->email->attach($attach);
		}
	 	$CI->email->send();        
	}
  
  function sent_mail($email,$subject,$message){
     
        $url = 'https://api.sendgrid.com/';
        $user = 'pavan123';
        $pass = 'Admin@123';
         $params = array(
            'api_user'  => $user,
            'api_key'   => $pass,
             'to'        => $email,
            'subject'   => $subject,
            'html'      => $message,
             'from'      => 'test@test.com',
          );
        $request =  $url.'api/mail.send.json';
        // Generate curl request
        $session = curl_init($request);
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        // Tell PHP not to use SSLv3 (instead opting for TLS)
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // obtain response
        $response = curl_exec($session);

        curl_close($session);

        // print everything out
        return $response;
 }
  
  