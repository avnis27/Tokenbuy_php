<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		//$this->load->library(array('ion_auth','form_validation'));
	}
	
	/* User list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['user_list'] = $this->db->order_by('user_id', 'desc')->get_where('user', array('isActive'=>1))->result();
			$this->show_viewAdmin('admin/user', $this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}
    }
	
	/* Delete user */
	public function delete_detail($user_id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->comman_model->delete_detail('user', 'user_id', $user_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child user first';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/user'); 
			}
			else
			{
				$msg = 'User detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/user');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}		
	}
	
	/* Set Active / Inactive Status */
	public function setStatus()
	{
		if($this->checkSessionAdmin())
		{
			$user_id = $this->input->post('id');
			$post['isActive'] = $this->input->post('status');
			$this->comman_model->update_details('user', $post, 'user_id', $user_id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* Set Active / Inactive Status */
	public function setStatusUser()
	{
		if($this->checkSessionAdmin())
		{
			$user_id = $this->input->post('id');
			$name = $_POST['name'];
			if($name == 'sign_in')
			{
				if($this->input->post('status') == 1)
				{
					$post['sign_in'] = $this->input->post('status');	
				}
				else
				{
					$post['sign_in'] = $this->input->post('status');	
					$post['otp'] = '';
					$post['otp_login_code'] = '';
					$post['otp_backup_codes'] = '';					
				}
			}
			if($name == 'profile')
			{
				$post['profile_update'] = $this->input->post('status');				
			}
			if($name == 'password')
			{
				$post['password_update'] = $this->input->post('status');				
			}
			if($name == 'transaction')
			{
				$post['transaction_approval'] = $this->input->post('status');				
			}
			$this->comman_model->update_details('user', $post, 'user_id', $user_id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* Set Active / Inactive Status */
	public function setStatusDoc()
	{
		if($this->checkSessionAdmin())
		{
			$user_id = $this->input->post('id');
			$user_details = $this->db->get_where('user', array('user_id'=>$user_id))->row();
			$email = $user_details->user_email;
			$subject = 'Document approved successfully';
			$message = '';
			$message .= 'Hello '.$user_details->user_fname.' '.$user_details->user_lname;		
			$message .= ',<p>  Your document approved successfully, you are free to purchase coin.</p>';
			$this->send_mail($email, $subject, $message);	
			$post['verification_status'] = $this->input->post('status');
			$this->comman_model->update_details('verification', $post, 'verification_user_id', $user_id);
			echo 1 ;
			exit();
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
}

/* End of file */