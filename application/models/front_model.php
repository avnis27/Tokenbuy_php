<?php

class Front_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/* Get all data from database table */
	public function get_allData($table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('status', '1');
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Get all data from database table */
	public function get_allDataAscName($field, $table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('status', '1');
		$this->db->order_by($field, 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Get selected details */
	public function edit_getDetails($table_name, $field_id, $select_id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($field_id, $select_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* Store data from database table */
	public function insert_dataTable($table_name,$post)
	{
		$this->db->insert($table_name, $post);
		$this->result = $this->db->insert_id() ; 
		return $this->result ;
	}
	
	/* Update put data in database table */
	public function update_dataTable($table_name, $post, $field_id, $field_value)
	{
		$this->db->where($field_id, $field_value);
		$this->db->update($table_name, $post);
		return true;
	}
	
	/* Delete detail */
	function delete_fiendDetail($table_name, $select_id)
	{
		$this->db->delete($table_name, array($select_id => $select_id));		
		return 1;		
	}
	
	/* Get Record Count */
	function getRecord_count($user_id)
	{
		$this->db->select('*');
		$this->db->from('transaction'); 
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return count($query->result()) ;
	}
	
	/*	Show all transaction List  */
	public function show_allAdvertiser($limit, $start, $user_id)
	{
		$this->db->select('*');
		$this->db->from('user_booking');
		$this->db->where('user_id',$user_id);
		$this->db->order_by('booking_id', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result() ;
	}
}
?>