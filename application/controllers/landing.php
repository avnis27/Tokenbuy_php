<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Landing Class
 *
 * @package     
 * @subpackage  Controllers
 * @category    User Dashboard
 * @author      BRInfotech
 * @link        
 */
class Landing extends MY_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','date_helper','html_helper','file'),NUll);
		$this->load->library('form_validation');
		$this->load->library('session');		
		$this->load->library('mycoin');
		$this->load->library('user_agent');
 	}
	/* This is call on controller load */
	public function index()
	{  	   	
		$this->data['title'] = 'Landing';
		$this->data['coin_details'] = $this->db->get_where('token_supply', array('status'=>1))->result();	
		$this->data['coin_record'] = $this->db->get_where('record_coin', array('status'=>1))->row();	
		$this->show_viewFrontInner('landing', $this->data);
 	} 
}	
