<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dashboard Class
 *
 * @package     
 * @subpackage  Controllers
 * @category    User Dashboard
 * @author      BRInfotech
 * @link        
 */
class Dashboard extends MY_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','date_helper','html_helper','file'),NUll);
		$this->load->library('session');		
		$this->load->library('mycoin');
		//$this->load->library('action');
		$this->load->library('mywebcam');
		$this->load->library('user_agent');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('language'));
 	}
	
	/*	Validation Rules */
	 protected $validation_rules = array(
		'change_password' => array(
            array(
                'field' => 'old_password',
                'label' => 'old password',
                'rules' => 'trim|required'
            ),
			 array(
                'field' => 'new_password',
                'label' => 'new password',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'confirm_password',
                'label' => 'confirm password',
                'rules' => 'trim|required|matches[new_password]'
            )
        ),
		'verification_2' => array(
			array(
				'field' => 'verification_passport_ID',
				'label' => 'passport id',
				'rules' => 'trim|required|is_unique[verification.verification_passport_ID]'
			),
			array(
				'field' => 'verification_passport_expiry_date',
				'label' => 'passport expiry date',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'verification_licence_no',
				'label' => 'licence number',
				'rules' => 'trim|required|is_unique[verification.verification_licence_no]'
			),
			array(
				'field' => 'verification_licence_expiry_date',
				'label' => 'licence expiry date',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'verification_national_ID_name',
				'label' => 'National ID name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'verification_national_ID_number',
				'label' => 'National ID number',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'verification_national_expiry_date',
				'label' => 'National expiry date',
				'rules' => 'trim|required'
			)
		)
    );
	
	/* This is call on controller load */
	public function index()
	{ 
		//$arrE = $this->mycoin->changelly('getExchangeAmount', 'btc', 'eth', '99', '1');
		//$arrM = $this->mycoin->changelly('getMinAmount', 'btc', 'eth','','','','');
		//$arrC = $this->mycoin->changelly('getCurrencies', '', '', '', '1');
		//$arrT = $this->mycoin->changelly('createTransaction', 'btc', 'eth', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', '', '1');
		//$arrTr = $this->mycoin->changelly('getTransactions', 'btc', '0xB8900B5Dd385b856094B2F23169cA2D156B6178d', null, null,null,'1');
		//$arrS = $this->mycoin->changelly('getStatus', '1');
		//$arrS = $this->mycoin->generateAddress();
		//echo '<pre>';
		//print_r(json_decode($arrS));
		//die;
		if($this->checkfrantSession())
		{			
	 		$this->data['title'] = 'Dashboard';
			$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
			$this->data['coin_record'] = $this->db->get_where('record_coin', array('status'=>1))->row();	
			$this->show_viewFrontInner('dashboard', $this->data);
		}
		else
		{	
			redirect('home');
  		}
 	}  
	
	/* This is call on controller load */ 
	public function buyCoin() 	
	{  	  		
		if($this->checkfrantSession()) 
		{
			redirect('dashboard/buycoin2'); 
		}
		else 
		{	 
			redirect('home'); 
		} 
	}
	
	function buycoin2()
	{
		if($this->checkfrantSession()) 
		{
			$this->data['title'] = 'buyCoins';
			$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
			$this->data['coin_record'] = $this->db->get_where('record_coin', array('status'=>1))->row();	
			$this->show_viewFrontInner('buyCoins2', $this->data); 			
		}
		else 
		{	 
			redirect('home'); 
		} 
	}
	
	/* Ajax search */
	public function rateRefresh()
	{
		if($this->checkfrantSession())
		{		
			$id = $_POST['id'];
			$HTML = '';
			$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
			$this->data['coin_record'] = $this->db->get_where('record_coin', array('status'=>1))->row();	
			$HTML = $this->load->view('buyCoinsRate', $this->data);
			echo $HTML;
		}
		else
		{
			redirect('home');
		}
	}
	
 	/* this is call on controller load */ 	
	public function checkout() 
	{
		if($this->checkfrantSession()) 
		{ 	
			if($_POST)
			{
				$this->data['title'] = 'buyCoins'; 
				$this->data['sell_coin'] = $this->input->post('coin'); 
				$this->data['coin_record'] = $this->db->get_where('record_coin', array('status'=>1))->row();
				$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
				$this->data['result'] = $this->db->limit(2)->order_by('transaction_id','DESC')->get_where('transaction',array('user_id'=>$this->Ref_UserID, 'created_date = '=>date('Y-m-d')))->result();
				$this->data['booking_list'] = $this->db->order_by('booking_id','desc')->get_where('user_booking', array('user_id'=>$this->Ref_UserID, 'isActive'=>1))->result();
				$this->data['totalTransection'] = $this->db->order_by('transaction_id','DESC')->get_where('transaction',array('user_id'=>$this->Ref_UserID, 'created_date = '=>date('Y-m-d')))->result();				
				$this->show_viewFrontInner('checkout', $this->data); 	
			}
			else
			{		
				redirect('dashboard/buyCoin');
			}
		} 
		else 
		{
			redirect('home');
		} 
	}
	
	/* Checkout2 */
 	function checkout2()
	{
		if($this->checkfrantSession()) 	
		{ 
			if($_POST)
			{
				$this->data['title'] 			= 'buyCoins'; 
				$this->data['sell_coin'] 		= $this->input->post('sell_coin'); 
				$this->data['sellcoinValue']	= $this->input->post('sellcoinValue');
				$this->data['buy_coinValue'] 	= $this->input->post('buy_coinValue'); 
				$this->data['email'] 			= $this->input->post('email'); 		
				$this->data['contract_address'] = $this->input->post('contract_address'); 
				
				$this->show_viewFrontInner('step_6', $this->data); 				
			}
			else
			{
				$this->data['title'] = 'buyCoins';
				$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
				$this->show_viewFrontInner('buyCoins', $this->data); 
			}
		} 	
		else
		{	
			redirect('home'); 
		} 
	}
	/*--------------------------------------------------------
	*	@function: transaction detail
	*--------------------------------------------------------*/
	function transaction()
	{
		if($this->checkfrantSession())
		{
			$config = array();
			$config["base_url"] = base_url() . "dashboard/transaction";
			$config["total_rows"] = $this->front_model->getRecord_count($this->Ref_UserID);
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : '';
			$this->data["links"] = $this->pagination->create_links();
			$this->data['result'] = $this->front_model->show_allAdvertiser($config["per_page"], $page, $this->Ref_UserID);
						
			$this->data['title'] = 'Transaction';
			$this->show_viewFrontInner('transaction_list', $this->data); 										
		}
		else
		{
			redirect('home');
		}
	}
	/*--------------------------------------------------------
	*	@function: Save transaction detail in data base
	*--------------------------------------------------------*/
	function setTransactionDetail(){
		$postData = 	$this->input->post();
 	//	print_r($_POST);
		$postData['user_id'] 		= $this->Ref_UserID;
		$postData['payment_status'] = '0';
		$postData['created_date'] 	= date('Y-m-d');
		$postData['time'] 	= date('H:i:s');
		
		$postData['modify_date'] 	= date('Y-m-d');
		$this->db->insert('transaction',$postData);
		echo $this->db->last_query();
	}
	
	/*--------------------------------------------------------
	*	@function: Update payment status detail in data base
	*--------------------------------------------------------*/
	function paymentStatus()
	{
		$deposit = $this->input->post('add');
		$postData['payment_status'] = $this->input->post('status');
		$this->db->where('deposit', $deposit);
		echo $this->db->update('transaction', $postData);
	}
	
	/* Delete faq */
	public function delete_detail($booking_id = null)
	{
		$post['isActive'] = 0;
		$this->db->where('booking_id', $booking_id);
		$this->db->update('user_booking',$post);
		$data['message'] = "success";
		echo json_encode($data);
		/* 
		$this->comman_model->delete_detail('transaction', 'transaction_id', $transaction_id);
		if ($this->db->_error_number() == 1451)
		{		
			$data['remainTran'] = count($this->db->order_by('transaction_id','DESC')->get_where('transaction',array('user_id'=>$this->Ref_UserID, 'created_date = '=>date('Y-m-d')))->result());
			$data['message'] = "fail";
			echo json_encode($data);
		//	$msg = 'You need to delete child faq first';
		//	$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
		//	redirect(base_url('dashboard/checkout'));
		}
		else
		{
			
			$data['remainTran'] = count($this->db->order_by('transaction_id','DESC')->get_where('transaction',array('user_id'=>$this->Ref_UserID, 'created_date = '=>date('Y-m-d')))->result());
			$data['message'] = "success";
			echo json_encode($data);
		///	$msg = 'Transaction detail remove successfully.';					
		//	$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
		//	redirect(base_url('dashboard/checkout'));
		}	
		*/
	}
	
	/* Store transaction */
	function getTransactions()
	{
		if($this->checkfrantSession())
		{
			$data['user_id'] = $this->Ref_UserID;
			$data['transaction_id'] = $_POST['transaction_id'];
			$data['coin_amount'] = $_POST['coin_amount'];
			$data['net_amount'] = $_POST['net_amount'];
			$data['gross_amount'] = $_POST['gross_amount'];
			$data['status'] = 'Waiting';
			$this->db->insert('user_booking',$data);
			$this->db->last_query();
			$HTML = '';
			$this->data['booking_list'] = $this->db->order_by('booking_id','desc')->get_where('user_booking', array('user_id'=>$this->Ref_UserID, 'isActive'=>1))->result();
			$HTML = $this->load->view('booking_list.php', $this->data);
			echo $HTML;
		}
	}
	
	/* User profile */
	public function profile()
	{
		if($this->checkfrantSession())
		{	
			$profile_data = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();
			$user = $profile_data;
			if(isset($_POST))
			{
				$otp = $this->input->post('otp');					
				if(empty($otp))
				{
					$otp = 0;
					$this->ion_auth->otp_delete($this->Ref_UserID);
				}
				$secret_key = '';
				if ((bool)$otp)
				{					
					if((bool)$otp === TRUE)
					{
						// Create secret to redirect to otp_activation
						$this->form_validation->set_rules('otp', $this->lang->line('edit_user_validation_otp_label'), 'xss_clean|trim');
						if($this->ion_auth->set_otp_secret_key($this->Ref_UserID) )
						{
							$this->ion_auth->backup_codes($this->Ref_UserID);
							$secret_key = $this->ion_auth->get_otp_secret_key($this->Ref_UserID);
							#$backup_codes = $this->ion_auth->backup_codes_db($id);
						}
					}
				}				
				if($profile_data->profile_update == 0)
				{
					$msg = 'Profile is not update, please change profile update status';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard/profile'));
				}
				else
				{
					$imagePath = 'webroot/admin/upload/user/';
					$img_name = 'user';
					$fileName = @$_FILES["user_image"]["name"];
					$fieldName = "user_image";
					$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
					if($imageName)
					{
						$data['user_image'] = $imageName;
					}
					$user_fname = $this->input->post('user_fname');
					if($user_fname)
					{
						$data['user_fname'] = $this->input->post('user_fname');					
					}	
					$user_lname = $this->input->post('user_lname');
					if($user_lname)
					{
						$data['user_lname'] = $this->input->post('user_lname');					
					}
					$user_eth_address = $this->input->post('user_eth_address');
					if($user_eth_address)
					{
						$data['user_eth_address'] = $this->input->post('user_eth_address');					
					}
					$user_residence_country = $this->input->post('user_residence_country');
					if($user_residence_country)
					{
						$data['user_residence_country'] = $this->input->post('user_residence_country');					
					}
					$data['sign_in'] = $otp;
					$data['user_citizenship_country'] = $this->input->post('user_citizenship_country');					
					$this->db->where('user_id', $this->Ref_UserID);
					$this->db->update('user', $data);
						
					if(!empty($secret_key))
					{ 
						$this->session->set_flashdata('otp_secret_key', $secret_key);
						$this->session->set_flashdata('otp_message', $user->{$this->config->item('identity', 'ion_auth')});
						#$this->session->set_flashdata('otp_backup_codes', $backup_codes);
						redirect('dashboard/otp_activation/'.$this->Ref_UserID); 
					}
				}
			}
			$this->data['title'] = 'Profile';						
			$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();				
			$this->show_viewFrontInner('profile', $this->data); 								
		}
		else
		{
			redirect('home');
		}
	}
	
	// Display OTP secret key and QR-code
	public function otp_activation($id)
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Profile';		
			$this->data['otp_secret_key'] = $this->session->flashdata('otp_secret_key');
			if($this->data['otp_secret_key'] != NULL)
			{
				$this->data['message'] = $this->session->flashdata('message');
				$this->data['google_chart_url'] = $this->ion_auth->get_qrcode_googleurl($this->session->flashdata('otp_message'), $this->data['otp_secret_key'], $this->config->item('otp', 'ion_auth')['issuer']);
				$this->data['backup_codes'] = unserialize($this->ion_auth->backup_codes_db($id));
				$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();;	
				$this->show_viewFrontInner('otp_activation', $this->data);
			}
			else
			{
				redirect('dashboard/profile', 'refresh');
			}
			
		}
		else
		{
			redirect('/', 'refresh');
		}
	}
	
	/* User verification part1 */
	public function verification1()
	{
		if($this->checkfrantSession())
		{
			if(isset($_POST['Submit']))
			{
				$imagePath = 'webroot/admin/upload/user/';
				$img_name = 'user';
				$fileName = $_FILES["user_image"]["name"];
				$fieldName = "user_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName)
				{
					$data['user_image'] = $imageName;
					$this->db->where('user_id', $this->Ref_UserID);
					$this->db->update('user', $data);
				}
				redirect(base_url('dashboard/verification2'));
			}
			else
			{
				$this->data['title'] = 'verification-1';
				$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();				
				$this->show_viewFrontInner('verification1', $this->data); 				
			}
		}
		else
		{
			redirect(base_url('home'));
		}
	}
	
	/* User verification_part2 */
	public function verification2()
	{
		if($this->checkfrantSession())
		{
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Varification')
			{
				$this->form_validation->set_rules($this->validation_rules['verification_2']);
				if($this->form_validation->run())
				{
					$attach_val = '';
					$message = '';	
					$message .= 'Hello Admin,';
					$message .= '<p>New documents is coming for approval.</p>';
					$message .= '<p>Name : '.$this->Ref_UserName.'</p>';
					$message .= '<p>Email : '.$this->Ref_UserEmail.'</p>';
					$message .= 'Documents: <br>';
					$imagePathP = 'webroot/admin/upload/doc/';
					$img_nameP = 'passport';
					$fileNameP = $_FILES["verification_passport_doc"]["name"];
					$fieldNameP = "verification_passport_doc";
					$imageNameP = $this->ImageUpload($fileNameP, $img_nameP, $imagePathP, $fieldNameP);						
					if($imageNameP)
					{
						$data['verification_passport_doc'] = $imageNameP;	
						$message .=  '1. <a href="'.base_url().'webroot/admin/upload/doc/'.$imageNameP.'" target="_blank">Passport Doc</a>';	
						$message .= '<br>';
					}
					else
					{
						$msg = 'Please upload passport document file';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('dashboard/verification2'));
					}
					$imagePathL = 'webroot/admin/upload/doc/';
					$img_nameL = 'licence';
					$fileNameL = $_FILES["verification_licence_doc"]["name"];
					$fieldNameL = "verification_licence_doc";
					$imageNameL = $this->ImageUpload($fileNameL, $img_nameL, $imagePathL, $fieldNameL);	
					if($imageNameL)
					{
						$data['verification_licence_doc'] = $imageNameL;	
						$message .=  '2. <a href="'.base_url().'webroot/admin/upload/doc/'.$imageNameL.'" target="_blank">Licence Doc</a>';	
						$message .= '<br>';
					}
					else
					{
						$msg = 'Please upload licence document file';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('dashboard/verification2'));
					}
					$imagePathN = 'webroot/admin/upload/doc/';
					$img_nameN= 'national';
					$fileNameN = $_FILES["verification_national_doc"]["name"];
					$fieldNameN = "verification_national_doc";
					$imageNameN = $this->ImageUpload($fileNameN, $img_nameN, $imagePathN, $fieldNameN);	
					if($imageNameN)
					{
						$data['verification_national_doc'] = $imageNameN;	
						$message .=  '3. <a href="'.base_url().'webroot/admin/upload/doc/'.$imageNameN.'" target="_blank">National ID Doc</a>';	
						$message .= '<br>';
					}
					else
					{
						$msg = 'Please upload national Id document file';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url('dashboard/verification2'));
					}
					$this->db->delete('verification', array('verification_user_id'=>$this->Ref_UserID));
					$data['verification_user_id'] = $this->Ref_UserID;
					$data['verification_passport_ID'] = $this->input->post('verification_passport_ID');
					$data['verification_passport_expiry_date'] = $this->input->post('verification_passport_expiry_date');
					$data['verification_licence_no'] = $this->input->post('verification_licence_no');
					$data['verification_licence_expiry_date'] = $this->input->post('verification_licence_expiry_date');
					$data['verification_national_ID_name'] = $this->input->post('verification_national_ID_name');
					$data['verification_national_ID_number'] = $this->input->post('verification_national_ID_number');
					$data['verification_national_expiry_date'] = $this->input->post('verification_national_expiry_date');
					$email = 'bharatchhabra13@gmail.com';
					$subject = 'New application for approving';	
					//$message .= 'One new for verification for approve client name: '.$this->Ref_UserName;					
					$this->send_mail($email, $subject, $message);
					$userSubject = 'Document submitted successfully';
					$userMessage = '';
					$userMessage .= 'Hello '.$this->Ref_UserName;
					$userMessage .= ',<p>Your document submitted successfully we will check and approve between 48 hours.</p>';
					$this->send_mail($this->Ref_UserEmail, $userSubject, $userMessage);	
					//$this->send_mail_attached($email, $subject, $message, $attach_val1);	
					$this->db->insert('verification', $data);
					$msg = 'Varification document upload successfully!';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard/verification2'));					
				}
				else
				{
					$this->data['title'] = 'verification-2';
					$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();				
					$this->show_viewFrontInner('verification2', $this->data); 
				}
			}
			else
			{
				$this->data['title'] = 'verification-2';
				$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();				
				$this->show_viewFrontInner('verification2', $this->data); 							
			}
		}
		else
		{
			redirect(base_url('home'));
		}
	}
	
	/* User Security */
	public function security()
	{
		if($this->checkfrantSession())
		{
			$this->data['title'] = 'Security';
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'changePassword')
			{
				$profile_data = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();
				if($profile_data->password_update == 0)
				{
					$msg = 'Password is not update, please change password update status';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url('dashboard/security'));
				}
				else
				{
					$this->form_validation->set_rules($this->validation_rules['change_password']);
					if ($this->form_validation->run()) 
					{
						$old_password = $this->input->post('old_password');
						if($old_password)
						{
							$user_password = $this->db->get_where('user', array('user_email'=>$this->Ref_UserEmail, 'user_password'=>sha1($old_password)))->row();
							if(count($user_password) > 0)
							{
								$data['user_password'] = sha1($this->input->post('new_password'));
								$this->db->where('user_id', $this->Ref_UserID);
								$this->db->update('user', $data);
								$msg = 'Password is change successfully';
								$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
								redirect(base_url('dashboard/security'));
							}
							else
							{
								$msg = 'Old password is not match, please try again...';
								$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
								redirect(base_url('dashboard/security'));
							}
						}	
						else
						{
							$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();		
							$this->show_viewFrontInner('security', $this->data); 	
						}
					}
					else
					{
						$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();		
						$this->show_viewFrontInner('security', $this->data); 	
					}					
				}
			}
			else
			{
				$this->data['user_details'] = $this->db->get_where('user', array('user_id'=>$this->Ref_UserID))->row();		
				$this->show_viewFrontInner('security', $this->data); 							
			}
		}
		else
		{
			redirect(base_url('home'));
		}
	}
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkfrantSession())
		{
			$user_id = $this->input->post('id');
			$name = $this->input->post('name');
			if($name == 'sign_in')
			{
				$post['sign_in'] = $this->input->post('status');				
			}
			elseif($name == 'profile_update')
			{
				$post['profile_update'] = $this->input->post('status');				
			}
			elseif($name == 'password_update')
			{
				$post['password_update'] = $this->input->post('status');				
			}
			elseif($name == 'transaction_approval')
			{
				$post['transaction_approval'] = $this->input->post('status');				
			}
			$this->comman_model->update_details('user', $post, 'user_id', $user_id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'home');
		}
	}
	
	/* Coingate API */
	function api_request()
    {
		$method = 'GET';
		$params = array();
		$url = 'https://api-sandbox.coingate.com/v1/orders/1';
        $nonce      = time();
        $message    = $nonce . '9902 aILfybAU3js5MD8Enq0peg';
        $signature  = hash_hmac('sha256', $message, 'G4HSTg85bn6Q7osVjyPFDKC1iRJfZzlY');

        $headers = array();
        $headers[] = 'Access-Key: aILfybAU3js5MD8Enq0peg';
        $headers[] = 'Access-Nonce: ' . $nonce;
        $headers[] = 'Access-Signature: ' . $signature;

        $curl = curl_init();
        
        $curl_options = array(
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_URL             => $url
        );

        if ($method == 'POST') {
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';

            array_merge($curl_options, array(CURLOPT_POST => 1));
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        curl_setopt_array($curl, $curl_options);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response       = curl_exec($curl);
        $http_status    = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		print_r($response);
		echo '<br>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ <br>';
		print_r($http_status);
        die;
		curl_close($curl);

        return array('status_code' => $http_status, 'response_body' => $response);
    }
	function step_4()
	{
		$this->show_viewFrontInner('step_4', $this->data); 		
	}
	
	function webindex()
	{
		$this->load->view('webindex', $this->data);
	}
	
	function saveimage()
	{
		$filename =  time() . '.jpg';
		$filepath = 'webroot/saved_images/';

		move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

		echo $filepath.$filename;
	}
	
	function webcam()
	{
		$this->load->view('webcam', $this->data);
	}
	
	function webShowImage()
	{
		//require_once 'webcamClass.php';
		//$webcamClass=new webcamClass();
		//echo 'ddsd';
		echo $this->mywebcam->showImage();
	}
	
	function saveimg(){
		print_r($_FILES);
	}
	
	function webcam2()
	{
		$this->show_viewFrontInner('webcam2', $this->data); 		
	}
}	
