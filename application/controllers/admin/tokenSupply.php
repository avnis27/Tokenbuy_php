<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TokenSupply extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*	Validation Rules */
	 protected $validation_rules = array
        (
        'tokenSupply' => array(
            array(
                'field' => 'token_supply_name',
                'label' => 'image',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'token_supply_price',
                'label' => 'price',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'token_supply_from_qty',
                'label' => 'from qty',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'token_supply_to_qty',
                'label' => 'to qty',
                'rules' => 'trim|required'
            )
        )
    );	
	
	/* TokenSupply details */
	public function index()
	{
		if($this->checkSessionAdmin())
		{
			$this->data['tokenSupply_details'] = $this->comman_model->show_allDetails('token_supply');
			$this->show_viewAdmin('admin/tokenSupply', $this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}
    }
	
	/* Add and Update tokenSupply details */
	public function tokenSupplyUpdate($token_supply_id = null)
	{
		if($this->checkSessionAdmin())
		{
			if($token_supply_id)
			{
				if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") 
				{
					$this->form_validation->set_rules($this->validation_rules['tokenSupply']);
					if($this->form_validation->run())
					{
						$post['token_supply_name'] = $this->input->post('token_supply_name');
						$post['token_supply_from_qty'] = $this->input->post('token_supply_from_qty');
						$post['token_supply_to_qty'] = $this->input->post('token_supply_to_qty');
						$post['token_supply_price'] = $this->input->post('token_supply_price');
						$post['token_supply_total_qty'] = $this->input->post('token_supply_to_qty');
						$post['modify_date'] = date('Y-m-d');
						$this->comman_model->update_details('token_supply', $post, 'token_supply_id', $token_supply_id);
						$lastID = $this->db->select('token_supply_id')->order_by('token_supply_id', 'desc')->get_where('token_supply', array('status'=> 1))->row();
						if($token_supply_id < $lastID->token_supply_id)
						{
							$post1['token_supply_from_qty'] = $this->input->post('token_supply_to_qty')+1;
							$post1['modify_date'] = date('Y-m-d');
							$this->comman_model->update_details('token_supply', $post1, 'token_supply_id', $token_supply_id+1);
						}
						$msg = 'Token supply detail update successfully.';					
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/tokenSupply');											
					}
					else
					{
						$this->data['tokenSupply_details'] = $this->comman_model->edit_details('token_supply', 'token_supply_id', $token_supply_id);
						$this->show_viewAdmin('admin/tokenSupplyUpdate', $this->data);
					}
				} 
				else 
				{
					$this->data['tokenSupply_details'] = $this->comman_model->edit_details('token_supply', 'token_supply_id', $token_supply_id);
					$this->show_viewAdmin('admin/tokenSupplyUpdate', $this->data);
				}
			}
			else
			{
				if(isset($_POST['Submit']) && $_POST['Submit'] == "Submit") 
				{
					$imagePath = 'webroot/admin/upload/tokenSupply/';
					$img_name = 'tokenSupply';
					$fileName = $_FILES["tokenSupply_image"]["name"];
					$fieldName = "tokenSupply_image";
					$imageName = $this->ImageUpload($fileName, $img_name, $imagePath, $fieldName);	
					if($imageName == '')
					{
						$msg = 'Please upload tokenSupply image';					
						$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
						redirect(base_url().'admin/tokenSupply/tokenSupplyAdd');
					}
					else
					{
						$post['tokenSupply_image'] = $imageName;							
					}						
					$this->comman_model->add_details('token_supply', $post);
					$msg = 'TokenSupply inserted successfully.';					
					$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
					redirect(base_url().'admin/tokenSupply');					
				}
				else 
				{
					$this->show_viewAdmin('admin/tokenSupplyAdd', $this->data);
				}
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
	}
	
	/* Delete tokenSupply */
	public function delete_detail($token_supply_id = null)
	{
		if($this->checkSessionAdmin())
		{
			$this->comman_model->delete_detail('token_supply', 'token_supply_id', $token_supply_id);
			if ($this->db->_error_number() == 1451)
			{		
				$msg = 'You need to delete child category first';
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/tokenSupply'); 
			}
			else
			{
				$msg = 'TokenSupply detail remove successfully.';					
				$this->session->set_flashdata('message', '<div class="col-xs-12"><div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'</div></div>');
				redirect(base_url().'admin/tokenSupply');
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
			$token_supply_id = $this->input->post('id');
			$post['status'] = $this->input->post('status');
			$this->comman_model->update_details('token_supply', $post, 'token_supply_id', $token_supply_id);
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