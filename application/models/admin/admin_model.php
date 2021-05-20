<?php

class Admin_model extends CI_Model {

	function __construct()
	{
       parent::__construct();
	   $this->load->database();
	}
	
	/*	Check Login Username Function */
	function CheckUsernameLogin($data)
	{
		$email = $data['admin_username'];
		
        $this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('admin_email',$email);
		$this->db->where('admin_active_inactive','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
	
	/*	Check Admin Login Function */
	function CheckLogin($data)
	{
		$email = $data['admin_username'];
		$password = $data['admin_password'];
		
        $this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('admin_password',$password);
		$this->db->where('admin_email',$email);
		$this->db->where('admin_active_inactive','1');
		$query = $this->db->get();		
		return $result = $query->result();
	}	
	
	/*	Block User */
	function blockUser($post)
	{
        $data = array(
			'admin_active_inactive'=>$post['admin_active_inactive'],
			'admin_modify_date'=>$post['admin_modify_date'],	
		);		
		$this->db->where('admin_email', $post['admin_email']);
		$this->db->or_where('admin_username',$post['admin_username']);
		$this->db->update('admin', $data); 		
		return true; 
	}
		
	/* Get User Details */
	function getUserProfileDetails($admin_id)
	{
		$this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('admin_id',$admin_id);
		$this->db->where('admin_active_inactive','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
		
	/* Check Old Password */
	function checkpassword($data)
	{
		$admin_id = $data['admin_id'];
		$password = $data['old_password'];
		
        $this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('admin_password',$password);
		$this->db->where('admin_id',$admin_id);
		$this->db->where('admin_active_inactive','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
	
	/*	update User Password	*/
	function updateUserPassword($post)
	{
		$data['admin_password'] = $post['new_password'];
		$this->db->where('admin_id', $post['admin_id']);
		$this->db->update('admin', $data); 		
		return true; 		
	}
	
	/* Check mail for forgot password */
	function CheckEmail($email)
	{
		$this->db->select('*');
		$this->db->from('admin');	
		$this->db->where('admin_email',$email);
		$this->db->where('admin_active_inactive','1');
		$query = $this->db->get();		
		$result=$query->result();
		return $result ;
	}
	
	/*	Reset User Password	*/
	function reset_password($post)
	{
		$data['admin_password'] = $post['password'];
		$this->db->where('admin_email', $post['email']);
		$this->db->where('admin_active_inactive','1');
		$this->db->update('admin', $data); 		
		return true; 		
	}
}
?>