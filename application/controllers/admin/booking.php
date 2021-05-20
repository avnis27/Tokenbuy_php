<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	/* Booking list show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->data['booking_list'] = $this->db->order_by('booking_id', 'desc')->get_where('user_booking')->result();
			$this->show_viewAdmin('admin/booking', $this->data);
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
				$msg = 'Booking detail remove successfully.';					
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
			$booking_id = $this->input->post('id');
			$post['isActive'] = $this->input->post('status');
			$this->comman_model->update_details('user_booking', $post, 'booking_id', $booking_id);
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