<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','template'));		
		$this->load->library(array('template','session'));
	}
	
	public function index(){
		// load current theme 
		$this->template->set(get_current_theme()); // do not change this line

		//pass custom variable to header page

  		//$header_data['title'] = "Web design and development tutorials";  		
  		//$this->template->set_data('header',$header_data);

  		//pass custom variable to footer page	 

  		//$footer_data['copy_right']="mysite.com";
  		//$this->template->set_data('footer',$footer_data); 	  	
	  	
	  	$data=array();
	  	
	  	// pass custom variable to content page

	  	//$data['test']='test'; 

	  	$this->template->set_data('index',$data);

	  	// load default template page ie. index.php page

	  	$this->template->load(); 

	  	// if you want to load custom template page ie. about-us.php page

	  	//$this->template->load('about-us');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */