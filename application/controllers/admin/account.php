<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'account' => array(
            array(
                'field' => 'apiKey',
                'label' => 'api key',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'apiSecret',
                'label' => 'secret key',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'btc_address',
                'label' => 'btc address',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'eth_address',
                'label' => 'eth address',
                'rules' => 'trim|required'
            )
        )
    );	
	
	/* Account details */
	public function index()
	{
		if($this->checkSessionAdmin())
		{
			if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
			{
				$this->form_validation->set_rules($this->validation_rules['account']);
				if($this->form_validation->run())
				{
					$post['apiKey'] = $this->input->post('apiKey');
					$post['btc_address'] = $this->input->post('btc_address');
					$post['eth_address'] = $this->input->post('eth_address');
					$post['apiSecret'] = $this->input->post('apiSecret');
					$post['modify_date'] = date('Y-m-d');
					$this->comman_model->update_details('api_details', $post, 'id', 1);
					
					$msg = 'Account detail update successfully.';					
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/account');											
				}
				else
				{
					$this->data['account_details'] = $this->db->get_where('api_details')->row();
					$this->show_viewAdmin('admin/account', $this->data);
				}
			} 
			else 
			{
				$this->data['account_details'] = $this->db->get_where('api_details')->row();
				$this->show_viewAdmin('admin/account', $this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
    }
	
	/* Add and Update account details */
	public function accountUpdate($id = null)
	{
		if($this->checkSessionAdmin())
		{
			if($id)
			{
				if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
				{
					$this->form_validation->set_rules($this->validation_rules['account']);
					if($this->form_validation->run())
					{
						$post['apiKey'] = $this->input->post('apiKey');
						$post['btc_address'] = $this->input->post('btc_address');
						$post['eth_address'] = $this->input->post('eth_address');
						$post['apiSecret'] = $this->input->post('apiSecret');
						$post['modify_date'] = date('Y-m-d');
						$this->comman_model->update_details('api_details', $post, 'id', $id);
						
						$msg = 'Account detail update successfully.';					
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/account');											
					}
					else
					{
						$this->data['account_details'] = $this->comman_model->edit_details('api_details', 'id', $id);
						$this->show_viewAdmin('admin/accountUpdate', $this->data);
					}
				} 
				else 
				{
					$this->data['account_details'] = $this->comman_model->edit_details('api_details', 'id', $id);
					$this->show_viewAdmin('admin/accountUpdate', $this->data);
				}
			}
			else
			{
				$this->data['account_details'] = $this->db->get_where('api_details')->row();
				$this->show_viewAdmin('admin/account', $this->data);
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* Delete account */
	public function delete_detail($id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->comman_model->delete_detail('api_details', 'id', $id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/account'); 
			}
			else
			{
				$msg = 'Account detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/account');
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
			$id = $this->input->post('id');
			$post['status'] = $this->input->post('status');
			$this->comman_model->update_details('api_details', $post, 'id', $id);
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