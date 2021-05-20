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
 
class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
 		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
    }
	
	/*--------------------------------------------------------------------
 	*	@Function: Login
 	*---------------------------------------------------------------------
	*/
	
	public function index(){
		if($this->checkfrantSession()){
			redirect('dashboard');
		}
		else{	
			$this->data['title'] = 'Login';
			$this->show_viewFrontInner('login', $this->data);
  		}
	}
	
	/*--------------------------------------------------------------------
 	*	@Function: register
 	*---------------------------------------------------------------------
	*/
	function register()
	{
		$this->data['title'] = 'Register';
 		$this->show_viewFrontInner('registration', $this->data);
 	}
	
	/*---------------------------------------------------------------
	 |	@function : for get admin Name
	 |----------------------------------------------------------------
	*/
	
	public function login()
	{
		if(isset($_POST) && @$_POST)
		{	
			$remember = 1;
				
	 		$postData  			= $this->input->post();			
			$data['user_email'] = $postData['email'];
			$data['user_password'] 	= $postData['password'];
	 		$UserEmail = $this->db->get_where('user', array('user_email' => $data['user_email']))->row();
	 		if (count($UserEmail) > 0) 
			{
				$password = $this->db->get_where('user', array('user_email' => $data['user_email'], 'user_password' => sha1($data['user_password'])))->row();
				if(count($password) > 0)
				{
					$verify = $this->db->get_where('user', array('user_email' => $data['user_email'], 'user_password' => sha1($data['user_password']), 'verify_status' => '1'))->row();
					if(count($verify) > 0)
					{
						$isActive = $this->db->get_where('user', array('user_email' => $data['user_email'], 'user_password' => sha1($data['user_password']), 'isActive' => '1'))->row();
						if(count($isActive) > 0)
						{			
							if ( $this->ion_auth->is_otp_set( $this->input->post('email') ) )
							{
								$activation_code = $this->ion_auth->set_otp_login_activation($this->input->post('email'));									
								if($activation_code)
								{
									$this->session->set_flashdata('otp_login_key', $activation_code);
									$this->session->set_flashdata('identity', $this->input->post('email'));
									$this->session->set_flashdata('remember_me', $remember);
									redirect('home/login_otp', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
								}
								//if the set activation was un-successful
								//redirect them back to the login page
								$this->session->set_flashdata('message', $this->ion_auth->errors());
								redirect('home', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
							}
					
							//$msg['message'] = 'Logged in';
							//$msg['back_url'] = base_url()."dashboard";
							//$msg['status'] = "success";
							$this->session->set_userdata('Ref_is_logged', 'yes');
						 	$this->session->set_userdata('Ref_UserID', $isActive->user_id);
							$this->session->set_userdata('Ref_UserName', $isActive->user_fname.' '.$isActive->user_lname);
							$this->session->set_userdata('Ref_logged_in', TRUE);
							$this->session->set_userdata('Ref_UserEmail', $isActive->user_email);
					  		//echo  json_encode($msg);						
							
							$msg = 'Logged in';					
							$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url('dashboard'));
						}
						else
						{
							//$msg['back_url'] =  "";
							//$msg['message']  = 'Your account is blocked. please contact your administrator';
							//$msg['status']   = "failure";
							//echo  json_encode($msg);
							
							$msg = 'Your account is blocked. please contact your administrator';					
							$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url('dashboard'));
						}
					}
					else
					{
						//$msg['back_url'] =  "";
						//$msg['message']  = "Please check and verify your email address or spam mail folder.";
						//$msg['status'] 	 = "failure";
						//echo  json_encode($msg);
						
						$msg = 'Please check and verify your email address or spam mail folder.';					
						$this->session->set_flashdata('message_login', '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('home'));
					}						
				
				}
				else
				{
					//$msg['back_url'] =  "";
					//$msg['message']  = 'Enter correct password';
					//$msg['status']  = "failure";
					//echo  json_encode($msg);	
					
					$msg = 'Enter correct password';					
					$this->session->set_flashdata('message_login', '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('home'));					
				}										
			}
			else
			{
				//$msg['back_url'] =  "";
				//$msg['message'] = 'Email id is not exist';
				//$msg['status']  = "failure";
				//echo  json_encode($msg);							
				
				$msg = 'Email id is not exist';					
				$this->session->set_flashdata('message_login', '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('home'));		
			}
		}
		else
		{
			$this->data['title'] = 'Login';
			$this->show_viewFrontInner('login', $this->data);
		}
	}
	
	//login with two-step authentication
	function login_otp()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('token'			, 'Token', 'required');
		
		if ($this->form_validation->run() == true)
		{
			$remember = 1;

			if ($this->ion_auth->is_otp_set($this->input->post('identity')))
			{
				if ($this->ion_auth->otp_login($this->input->post('identity'), $this->input->post('token'), $remember, $this->input->post('otp_login_key')))
				{
					$session = $this->session->all_userdata();
					$isActive = $this->db->get_where('user', array('user_id' => $session['user_id']))->row();
					//if the login is successful
					//redirect them back to the home page
					$this->session->set_userdata('Ref_is_logged', 'yes');
					$this->session->set_userdata('Ref_UserID', $isActive->user_id);
					$this->session->set_userdata('Ref_UserName', $isActive->user_fname.' '.$isActive->user_lname);
					$this->session->set_userdata('Ref_logged_in', TRUE);
					$this->session->set_userdata('Ref_UserEmail', $isActive->user_email);
					//echo  json_encode($msg);						
					
					$msg = 'Logged in';					
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard'));
				}
				else
				{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message_login', $this->ion_auth->errors());
				redirect('home', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
				}
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message_login', $this->ion_auth->errors());
				redirect('home', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{			
			if($this->session->flashdata('identity') == NULL || $this->session->flashdata('otp_login_key') == NULL)
			{
				redirect('home', 'refresh');
			}
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message_login'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['token'] = array('name' => 'token',
				'id' => 'token',
				'class' => 'form-control',
				'type' => 'text'
			);
			$this->data['identity'] = $this->session->flashdata('identity');
			$this->data['remember'] = $this->session->flashdata('remember_me');
			$this->data['otp_login_key'] = $this->session->flashdata('otp_login_key');
			
			$this->show_viewFrontInner('login_otp', $this->data);
		}
	}
	
	
	
 	/*---------------------------------
	function : forget password view
	---------------------------------*/
	public function forgetpassword()
 	{
  		$this->data['title'] = 'Forgot Password';
		$this->show_viewFrontInner('forget-password', $this->data);
 	}
	
	/* Email validation */
	public function emailVal()
	{
		$email = $_POST['email'];
		$HTML = '';
		$email_result = $this->db->get_where('user', array('user_email' => $email))->row();
		if($email_result)
		{
			$HTML = 1;
		}
		else
		{
			$HTML = 0;
		}
		echo $HTML;
	}
	
	public function forget()
	{
		//$emailData = AllEmailValidation('email', 'isvalid');
		//$errMsg[$emailData['errors']]['email'] = $emailData['email'];
		$email = Validation('email','EMAIL_REF');
		$errMsg[$email['errors']]['email'] = $email['email'];
		if(count(@$errMsg['errors']) > 0)
		{
			@$errMsg['message'] ='error message';
			echo json_encode($errMsg);
		}
		else
		{
			$postData = xssCleanValidate($_POST);				
			$check_email = $this->db->get_where('user', array('user_email' => $postData['email']))->row();
			if(count($check_email) > 0)
			{
				$token_id = md5(uniqid(mt_rand()));
				$resetPassLink = base_url().'home/resetpassword?tokenidxs='.$token_id;
				$data['resetPassLink'] = $resetPassLink;
				$data['first_name'] = ucfirst($check_email->user_fname.' '.$check_email->user_lname);
				$data['email'] = $postData['email'];

				$subject = "Forgot Password";
				//$message_body = '';
				//$message_body .= 'Dear '.$data['first_name'];
				//$message_body .= PHP_EOL."Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen. To reset your password";
				//$message_body .= PHP_EOL."visit the following link: <a href='.$resetPassLink.'>click here</a>";
				//$message_body .= PHP_EOL."Regards";
				//$message_body .= PHP_EOL."uozef";

				$message_body = strip_tags($this->load->view('/mail/forgotPassword.php', $data, true));
				$this->send_mail($postData['email'],$subject,$message_body);			
				// Insert Into Database
				$CreateDate = date("Y-m-d");
				$CreateTime = date("H:i:s");
				$duration	= '+15 minutes';
				$ExpiryTime = date('H:i:s', strtotime($duration, strtotime($CreateTime)));

				$insert_data = array(
					'user_email' => $postData['email'], 
					'user_token' => $token_id, 
					'created_date' => $CreateDate, 
					'CreateTime' => $CreateTime, 
					'ExpiryTime' => $ExpiryTime
				);
				$this->db->insert('forgotpassword', $insert_data);
				
				$data['status'] 	= 	"success";
				$data['back_url'] 	= 	base_url('home');
				$data['message'] 	=	'Please check your email';
				echo json_encode($data);
			}
			else
			{
				$data['status'] = "failure";
				$data['back_url'] = "";
				$data['message'] ='This email address is not register with us';
				echo json_encode($data);	
			}
		}
	}
	
	/* Reset Password */
	public function resetpassword()
	{
		$tokenidxs = $_GET['tokenidxs'];
		$result = $this->db->get_where('forgotpassword', array('user_token' => $tokenidxs))->row();
		if(count($result) > 0)
		{
			$user_result = $this->db->get_where('user', array('user_email'=>$result->user_email))->row();			
			if($_POST)
			{ 
				$user_data['user_password'] = sha1($_POST['password']);
				$this->db->where('user_id',$user_result->user_id);
				$this->db->update('user', $user_data);
				$subject = 'Password Reset';
				$message = '';
				$message .= 'Your password reset successfully';
				$message .= base_url('home');
				$mail = $this->send_mail($user_result->user_email, $subject, $message);
				if(!$mail)
				{
					$data['status'] 	= 	"failure";
					$data['back_url']   = 	"";
					$data['message'] 	=	'Something wrong in your token';
					echo json_encode($data);
				}
				else
				{
					$data['status'] 	= 	"success";
					$data['back_url'] 	= 	base_url('home');
					$data['message'] 	=	'Your password update successfully';
					echo json_encode($data);
				}
			}
			else
			{
				$this->data['title'] = 'Reset password';
				$this->show_viewFrontInner('resetpassword', $this->data);
			}
		}
		else
		{
			$msg = 'Do not matches your token, please try again';
			$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
			redirect(base_url('home'));
		}
	}
	
	
	/*--------------------------------------------------------------------
 	*	@Function: Registration
 	*---------------------------------------------------------------------
	*/
	public function registration()
	{	
 		$errMsg = $this->validation();
 		if(count(@$errMsg['errors']) > 0)
		{
			@$errMsg['message'] ='error message';
			echo json_encode($errMsg);
		}
		else
		{      
			$postData  = xssCleanValidate($this->input->post());
		 	$data = $this->insertdata($postData);
			$this->db->insert('user', $data);
 			$last_id =  $this->db->insert_id();
 			$mailSent = $this->db->get_where('user',array('mailSent'=>'1','user_id'=>$last_id))->row();
						
			if(count($mailSent) > 0){
				
			}else{
				$result = $this->db->get_where('user',array('user_id'=>$last_id))->row();				
				//$this->notverifyToken_ref_user($result['mailData']->user_email,$result['mailData']->user_token,$result['mailData']->user_fname,$result['mailData']->user_lname);
				
				$message = "Welcome to <br>Dear ".ucfirst($result->user_fname).' '.ucfirst($result->user_lname).",					
					<p>Nice! Just one more click to complete your registration.</p>
					<a href='".base_url('home/verify?t='.$result->user_token)."'>Click Here </a>											
					<p>For any questions/clarifications/assistance please send us an email immediately, at hr@redmapple.com</p>
					<h3>Thank you </h3>
					<h3>Team</h3>";					
				$subject ="Please Verify Your mail";	
				$message_body = strip_tags($message);
				$mail = $this->send_mail($result->user_email,$subject,$message_body);	
				if($mail)
				{
					$mailSent2['mailSent'] = '1';
					$this->db->where('user_id', $last_id);
					$this->db->update('user', $mailSent2);					
				}
			}	
	 		$msg['last_id'] 	= 	$last_id;
	 		$msg['status'] 		= 	"success";
			$msg['back_url'] 	= 	base_url().'home';
	 		$msg['message'] 	=	'Please check email and get verify link.';
			echo json_encode($msg);
		}
	}
	/*--------------------------------------------------------------------
 	*	@Function: verify
 	*---------------------------------------------------------------------
	*/
	function verify(){
	    
	   $token = $_GET['t'];
	   $result =  $this->db->get_where('user',array('user_token'=>$token))->row();
	     	if(count($result) > 0){
	     	    $data1['verify_status'] = 1;
	     	    $data1['isActive'] = 1;
	     	    $this->db->where('user_token', $token);
			    $this->db->update('user', $data1);
				$msg['last_id'] 	= 	$result->user_id;
				$msg['back_url'] 	= 	base_url().'home';
				$msg['status'] 		= 	"success";
				$msg			 	=	'Registration successfully';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url('home'));
			   
	     	}else{
	     	    $msg['status'] 		= 	"failure";
				$msg['back_url'] 	= 	"";
				$msg['message'] 	=	'Found some error, please contact to admin';
				echo json_encode($msg);
	     	}
	     	
	}
	/*--------------------------------------------------------------------
 	*	@Function: GETTING IP DATA OF PEOPLE BROWING THE SYSTEM
   	*---------------------------------------------------------------------
	*/	
	
	function insertdata($postData){
	  
		$data['user_referral_code'] 	=	sha1($postData['first_name'].''.$postData['email'].''.time());
		$data['user_token'] 	=	sha1($postData['last_name'].''.$postData['first_name'].''.time());
		$data['user_fname'] 	=	@$postData['first_name'];
		$data['user_lname'] 	=	@$postData['last_name'];
	//	$data['user_email'] 	=	@$postData['display_name'];
	 	$data['user_email'] 	=	@$postData['email'];
		$data['user_password'] 	=	sha1(@$postData['password']);
		//$data['user_agree'] 	=	@$postData['user_agree'];
	 	//$data['created_date'] 	= 	date('y-m-d h:i:s');
 		$data['isActive'] 		= 	1;
 		$data['verify_status'] 	= 	0;
	 	return $data;
	}
	/*--------------------------------------------------------------------
 	*	@Function: GETTING IP DATA OF PEOPLE BROWING THE SYSTEM
   	*---------------------------------------------------------------------
	*/	
	function validation(){
 		$fname = Validation('first_name','NAME','3','25');
		$errMsg[$fname['errors']]['first_name'] = $fname['first_name'];
		
		$lname = Validation('last_name','NAME','3','25');
		$errMsg[$lname['errors']]['last_name'] = $lname['last_name'];
		
		//$lname = Validation('password','PASSWORD','6','20');
		//$errMsg[$lname['errors']]['password'] = $lname['password'];

		$email = Validation('email','EMAIL');
		$errMsg[$email['errors']]['email'] = $email['email'];
 
		return $errMsg;
	}
	 
	public function logout()
	{	
		//echo 'gtghg';
	    $this->session->unset_userdata('Ref_UserID');
        $this->session->unset_userdata('Ref_UserName');
        $this->session->unset_userdata('Ref_logged_in');
        $this->session->unset_userdata('Ref_UserEmail');
        $this->session->sess_destroy();
		redirect('home');
 	}
	
	function notverifyToken_ref_user($mail,$token,$f_name,$l_name)
	{					
		$message = "Welcome to  <br>
					Dear ".ucfirst($f_name).' '.ucfirst($l_name).",<br>
					
					Nice! Just one more click to complete your registration.<br>

					<a href=".base_url('home/verify?t='.$token).">Click Here </a><br>
											
					For any questions/clarifications/assistance please send us an email immediately, at support@.io <br>
					Thank you <br>
					Team  <br>";					
		$subject ="Please Verify Your mail";			
		sent_mail($mail,$subject,$message);	
	}
	
	/*---------------------------------
	function : Step-4
	---------------------------------*/
	public function step_4()
 	{
  		$this->data['title'] = 'Step-4';
		$this->show_viewFrontInner('step_4', $this->data);
 	}
	
	/*---------------------------------
	function : Step-5
	---------------------------------*/
	public function step_5()
 	{
  		$this->data['title'] = 'Step-5';
		$this->show_viewFrontInner('step_5', $this->data);
 	}
}
