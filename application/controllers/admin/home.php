<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');	
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'login' => array(
            array(
                'field' => 'username',
                'label' => 'email',
                'rules' => 'trim|required'
            ),
			 array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            )
        ),
		'profile_password' => array(
            array(
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => 'trim|required'
            ),
			 array(
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|matches[new_password]'
            )
        ),
		'forgotPassword_email' => array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            )
        ),
		'resetpassword' => array(
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|matches[rpassword]'
            ),
			array(
                'field' => 'rpassword',
                'label' => 'Re-Type Password',
                'rules' => 'trim|required'
            )
        )
    );
		
	/* Login */
	public function index()
	{
		if($this->checkSessionAdmin())
		{
			redirect(base_url().'admin/dashboard');
		}
		else
		{	
			if(isset($_POST['Login']) && $_POST['Login'] =='Login')
			{
				$this->form_validation->set_rules($this->validation_rules['login']);
				if ($this->form_validation->run()) 
				{
					$data['admin_username'] = $_POST['username'];
					$data['admin_password'] = md5($_POST['password']);
					$res = $this->admin_model->CheckUsernameLogin($data);						
					if($res)
					{
						if($res[0]->admin_active_inactive == '1')
						{
							$result = $this->admin_model->CheckLogin($data);								
							if (count($result) > 0) 
							{	
								$this->session->set_userdata($result);
								redirect(base_url().'admin/dashboard');
							}
							else
							{
								if(!$this->session->userdata('attamp'))
								{
									$this->session->set_userdata('attamp', '1');
									$msg = 'Invalid Username / Email  and Password';
									$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
									redirect(base_url().'admin');
								}
								else
								{
									$n = $this->session->userdata('attamp');
									if($n < 3)
									{
										$n++;
										$this->session->set_userdata('attamp', $n);	
										if($n == 3)
										{
											$msg = 'Last attempts block your account ';
											$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
											redirect('admin');
										}
										else{
											$msg = 'Invalid Username / Email And Password';
											$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
											redirect(base_url().'admin');
										}
									}
									else 
									{
										$post['admin_active_inactive'] = '0';
										$post['admin_email'] = $_POST['username'];
										$post['admin_username'] = $_POST['username'];
										$post['admin_modify_date'] = date('Y-m-d');
										$this->admin_model->blockUser($post);
										$msg = 'Your Account has been Blocked Please Contact Your Admin';
										$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');								
										redirect(base_url().'admin');
										$this->session->sess_destroy();	
									}
								}
							}
						}
						else
						{
							$msg = 'Blocked Your Account Please Contact Your Admin';
							$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url().'admin');
						}
					}
					else
					{
						$msg = 'Invalid Username/Email Please try again';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin');
					}
				}
				else
				{
					$msg = 'Please Fill  Username/Email And Password';
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin');
				}
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
    }
	
	/*	Admin Profile */
	public function profile() 
	{  
		if($this->checkSessionAdmin())
		{
			$admin_id = $this->uri->segment(4);
			if(isset($_POST['submit']) && $_POST['submit'] == 'Submit')
			{
				$post['admin_id'] = $admin_id;
				$post['old_password'] = md5($this->input->post('old_password'));
				$post['new_password'] = md5($this->input->post('new_password'));
				$post['confirm_password'] = md5($this->input->post('confirm_password'));
				$this->form_validation->set_rules($this->validation_rules['profile_password']);
				if ($this->form_validation->run()) 
				{
					$result = $this->admin_model->checkpassword($post);
					if(count($result) != 0)
					{
						$this->admin_model->updateUserPassword($post);
						$msg = 'Your Password will be change successfully';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-sucess alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/logout');
					}
					else
					{
						$msg = 'Do not matches old password please try again';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/profile/'.$admin_id);
					}
				}
				else
				{
					$this->data['userDetails'] = $this->admin_model->getUserProfileDetails($admin_id);
					$this->show_viewAdmin('admin/profile', $this->data);
				}
			}
			else
			{
				$this->data['userDetails'] = $this->admin_model->getUserProfileDetails($admin_id);
				$this->show_viewAdmin('admin/profile', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}		
    }
		
	/* Forgot Password */
	public function forgotPassword()
	{
		if(isset($_POST['submit']) && $_POST['submit'] == 'forgotpassword')
		{
			$email = $this->input->post('email');
			$this->form_validation->set_rules($this->validation_rules['forgotPassword_email']);
			if ($this->form_validation->run()) 
			{
				$result = $this->admin_model->CheckEmail($email);
				if(count($result) > 0)
				{
					$subject = 'Password Recovery';
					$message = '';
					$message .= 'Change your password <a href="'.base_url().'admin/home/resetpassword?a='.base64_encode($email).'">Click Here </a><br>';
					$mail = $this->send_mail($email, $subject, $message);
					if(!$mail)
					{
						$msg = 'Something wrong in your Email ID ';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/forgotPassword');
					}
					else
					{
						$msg = 'Send a link in your Email ID. Please check your Email and reset your password';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/forgotPassword');
					}
				}
				else
				{
					$msg = 'Do not matches your Email Please insert right Email ID';
					$this->session->set_flashdata('email', $msg);
					redirect(base_url().'admin/home/forgotPassword');
				}
			}
			else
			{
				$this->load->view('admin/forgotPassword', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/forgotPassword', $this->data);
		}
	}
	
	/* Reset Password */
	public function resetpassword()
	{
		$email = base64_decode($_GET['a']);
		$result = $this->admin_model->CheckEmail($email);
		if(count($result) > 0)
		{
			if(isset($_POST['resetpassword']) && $_POST['resetpassword'] == 'resetpassword')
			{
				$post['email'] = $email;
				$post['password'] = md5($this->input->post('password'));
				$this->form_validation->set_rules($this->validation_rules['resetpassword']);
				if ($this->form_validation->run()) 
				{
					$result = $this->admin_model->reset_password($post);
					if($result)
					{
						$subject = 'Password Reset';
						$message = '';
						$message .= 'Your Password reset successfully <br>';
						$message .= base_url().'admin';
						$mail = $this->send_mail($email, $subject, $message);
						if(!$mail)
						{
							$msg = 'Something wrong in your Email ID ';
							$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url().'admin/home/resetpassword?a='.base64_encode($email));
						}
						else
						{
							$msg = 'Your password update successfully';
							$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
							redirect(base_url().'admin');
						}
					}
					else
					{
						$msg = 'Do not update your password please try again';
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/home/resetpassword?a='.base64_encode($email));
					}
				}
				else
				{
					$this->load->view('admin/resetpassword', $this->data);
				}
			}
			else
			{
				$this->load->view('admin/resetpassword', $this->data);
			}
		}
		else
		{
			$msg = 'Do not matches your Email Please insert right Email ID';
			$this->session->set_flashdata('email', $msg);
			redirect(base_url().'admin/home/forgotPassword');
		}
	}
	
	/* Section first */
	public function sectionFirst()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['sectionFirst']) && $_POST['sectionFirst'] == 'Update')
			{
				$data['sectionfirst_description'] = $this->input->post('sectionfirst_description');
				if($data['sectionfirst_description'] != '')
				{
					$this->db->where('sectionfirst_id', 1);
					$this->db->update('bitcoin_sectionfirst', $data);
				}				
				$msg = 'Home page section first details update successfully!';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/home/sectionFirst');
			}
			else
			{
				$this->data['sectionFirst_details'] = $this->db->get_where('bitcoin_sectionfirst')->row();
				$this->show_viewAdmin('admin/sectionFirst', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}	
	}
	
	/* Section second */
	public function sectionSecond()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['sectionSecond']) && $_POST['sectionSecond'] == 'Update')
			{
				$data['sectionsecond_descriprion'] = $this->input->post('sectionsecond_descriprion');
							
				$this->db->where('sectionsecond_id =', 1);
				$this->db->update('bitcoin_sectionsecond', $data);
				$msg = 'Home page section second details update successfully!';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/home/sectionSecond');
			}
			else
			{
				$this->data['sectionSecond_details'] = $this->db->get_where('bitcoin_sectionsecond')->row();
				$this->show_viewAdmin('admin/sectionSecond', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}	
	}
	
	/* Road map */
	public function roadmap()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Update')
			{
				$imagePath = 'webroot/admin/upload/';
				$img_name = 'roadmap';
				$fileName = $_FILES["roadmap_image"]["name"];
				$fieldName = "roadmap_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName != '')
				{
					$post['roadmap_image'] = $imageName;
					$this->comman_model->update_details('bitcoin_roadmap', $post, 'roadmap_id', 1);
				}	
				$msg = 'Road map update successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/home/roadmap');	
			}
			else
			{
				$this->data['roadmap_result'] = $this->db->get_where('bitcoin_roadmap')->row();
				$this->show_viewAdmin('admin/roadmap', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/* Coin details */
	public function coindetails()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Update')
			{
				$imagePath = 'webroot/admin/upload/';
				$img_name = 'coindetails';
				$fileName = $_FILES["coindetails_image"]["name"];
				$fieldName = "coindetails_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName != '')
				{
					$post['coindetails_image'] = $imageName;
					$this->comman_model->update_details('bitcoin_coindetails', $post, 'coindetails_id', 1);
				}	
				$msg = 'Coin details update successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/home/coindetails');	
			}
			else
			{
				$this->data['coin_result'] = $this->db->get_where('bitcoin_coindetails')->row();
				$this->show_viewAdmin('admin/coindetails', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/* Announcement details */
	public function announcement()
	{
		if($this->checkSessionAdmin())
		{
			if(isset($_POST['Submit']) && $_POST['Submit'] == 'Update')
			{
				$post['announcement_title'] = $this->input->post('announcement_title');
				$imagePath = 'webroot/admin/upload/';
				$img_name = 'announcement';
				$fileName = $_FILES["announcement_image"]["name"];
				$fieldName = "announcement_image";
				$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
				if($imageName != '')
				{
					$post['announcement_image'] = $imageName;
					$this->comman_model->update_details('bitcoin_announcement', $post, 'announcement_id', 1);
				}	
				$msg = 'Announcement details update successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/home/announcement');	
			}
			else
			{
				$this->data['announcement_result'] = $this->db->get_where('bitcoin_announcement')->row();
				$this->show_viewAdmin('admin/announcement', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/*	Logout */
	public function logout() 
	{        
        $this->session->sess_destroy();		
        redirect( base_url().'admin');
    }
}
/* End of file */