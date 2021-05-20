<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $userid='' ; 
	var $usermenu=array() ; 
	var $base_url = ''; // The page we are linking to
    var $prefix = ''; // A custom prefix added to the path.
    var $suffix = ''; // A custom suffix added to the path.
    var $total_rows = 3; // Total number of items (database results)
    var $per_page = 1; // Max number of items you want shown per page
    var $num_links = 1; // Number of "digit" links to show before/after the currently viewed page
    var $cur_page = 1; // The current page being viewed
    var $use_page_numbers = FALSE; // Use page number for segment instead of offset
    var $first_link = '&lsaquo; First';
    var $next_link = 'Next... →';
    var $prev_link = '← pre';
    var $last_link = 'Last &rsaquo;';
    var $uri_segment = 4;
    var $full_tag_open = '';
    var $full_tag_close = '';
    var $first_tag_open = '';
    var $first_tag_close = '&nbsp;';
    var $last_tag_open = '<li>';
    var $last_tag_close = '</li>';
    var $first_url = ''; // Alternative URL for the First Page.
    var $cur_tag_open = '<li class="active"><a href="#">';
    var $cur_tag_close = '</a></li>';
    var $next_tag_open = '<li>';
    var $next_tag_close = '</li>';
    var $prev_tag_open = '<li>';
    var $prev_tag_close = '</li>';
    var $num_tag_open = '<li>';
    var $num_tag_close = '</li>';
    var $page_query_string = FALSE;
    var $query_string_segment = 'per_page';
    var $display_pages = TRUE;
    var $anchor_class = '';
		
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->model('admin/comman_model');
		$this->load->model('front_model');
		$this->data['session'] = $this->session->all_userdata();
		date_default_timezone_set("Asia/Kolkata"); 
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->Ref_UserEmail = $this->session->userdata('Ref_UserEmail');
		$this->Ref_UserName = $this->session->userdata('Ref_UserName');
	}
	
	/* load the view files with dynamic data pass from method in Backend */
	public function show_viewAdmin($view, $data = '') 
	{    
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar'); 
		$this->load->view($view, $data);
		$this->load->view('admin/layout/footer');
    }
		
	/* load the view files with dynamic data pass from method in Frontend */
	public function show_viewFront($view, $data = '') 
	{    
		$data['myobj'] = $this;
		$this->load->view('layout/header',$data);
		$this->load->view('layout/slider',$data);
		$this->load->view($view, $data);
		$this->load->view('layout/footer');		
    }
	
	/* load the view files with dynamic data pass from method in front end without slider */
	public function show_viewFrontInner($view, $data = '') 
	{    
		$data['myobj'] = $this;
		$this->load->view('layout/header',$data);
		$this->load->view($view, $data);
		$this->load->view('layout/footer');	
    }
	
	/*	Check Session Admin */
	public function checkSessionAdmin() 
	{
		$session = $this->session->all_userdata();				
		if(empty($session[0]->admin_id))
		{
			return false;		
		}
		if (isset($session[0]->admin_id))
		{
            $this->user = $session[0]->admin_name;
            $this->email = $session[0]->admin_email;
			$this->admin_id = $session[0]->admin_id;
        }
		return true;
	}
	/*********** Check Frant Session ***************/
	function checkfrantSession(){
 		$s = $this->session->all_userdata();
	 	$id=@$s['Ref_UserID'];
	 	if(@$id!= ""){ 
			return true;
		}
		else
		{
			return false;
		}
	}		
	/*	Check Session For Frontend */
	public function checkSessionFront() 
	{
		$session = $this->session->all_userdata();					
		if(empty($session['user_email']))
		{
			return false;		
		}
		elseif(isset($session['user_fname']))
		{
            $this->front_user = $session['user_fname'].' '.$session['user_lname'];
            $this->front_email = $session['user_email'];
			$this->user_id = $session['user_id'];
        }
		return true;
	}
	
	/*	Mail Send */
	public function send_mail($email, $subject, $message)	
	{
		$config = array(	
			'protocol' => 'SMTP',			
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from('hr@redmapple.com', "UOZEF");	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		return $this->email->send();		
	}

	public function getRandomToken($str, $id)
	{
		$rand_str = str_shuffle(rand().'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'.$id.round(microtime(true)*1000));
		$rand_val = rand(1,40);								  
		$pass_val = substr($rand_str, $rand_val, $str); 
		return $pass_val;
	}

	public function getRandomTokenSpecialCharacter($str, $id)
	{
		$rand_str = str_shuffle(rand().'ABCDEFGHIJKLMNOPQRSTUVWXYZ*$@&()+=#-abcdefghijklmnopqrstuvwxyz'.$id.round(microtime(true)*1000));
		$rand_val = rand(1,40);								  
		$pass_val = substr($rand_str, $rand_val, $str); 
		return $pass_val;
	}

	function sign_value($number) 
	{ 
		return ( $number > 0 ) ? 1 : ( ( $number < 0 ) ? -1 : 0 ); 
	} 

	function valueInRound($number) 
	{ 
		$val = explode('.', $number);
		if(!empty($val[1]))
		{
			$x = '';
			$n_val = strlen($val[1]);
			for ($i=0; $i<8 ; $i++) 
			{ 
				if($i >= $n_val)
				{
					$x = $x.'0';
				}
			}
				$n_val = $val[0].'.'.$val[1].$x;
		}
		else
		{
			if(!empty($val[0]))
			{
				$n_val = $val[0].'.00000000';
			}
			else
			{

			$n_val = '0.00000000';
			}
		}

		return $n_val;
	} 
	
	public function send_mail_to_user($email, $subject, $message, $sender_email, $sender_name)	
	{		
		$config = array(	
			'protocol' => 'SMTP',			
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from($sender_email, $sender_name);	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		return $this->email->send();
	}
	
	public function send_mail_attached($email, $subject, $message, $attach)	
	{		
		$config = array(	
			'protocol' => 'SMTP',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from('hr@redmapple.com', "UOZEF");	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		$this->email->attach($attach);
		return $this->email->send();
	}
	
	/* Upload Image */
	public function ImageUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		//$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$filenew =  str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png | PDF | pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
	
	/* PDF file Upload */
	public function PDFUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		$filenew =  date('d-M-y').'('.str_replace($filename,$name,$filename).')'.rand(). "." .$extension;  	
		$config['file_name'] = $filename;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filename);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();				
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
	
	/* Video Upload	*/
	public function VideoUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		//$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}	
	}
}
?>