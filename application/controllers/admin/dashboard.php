<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	/* Dashboard Show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{
			$this->show_viewAdmin('admin/dashboard', $this->data);
		}
		else
		{
			redirect(base_url().'admin');
		}
    }
}

/* End of file */?>