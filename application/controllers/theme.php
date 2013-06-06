<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class theme extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','template','form'));
		$this->load->library(array('template','session'));
	}
	
	public function index()	{

		// load current theme 
	//  $this->template->set(get_current_theme()); // do not change this line

		//pass custom variable to header page

  		//$header_data['title'] = "Web design and development tutorials";  		
  		//$this->template->set_data('header',$header_data);

  		//pass custom variable to footer page	 

  		//$footer_data['copy_right']="mysite.com";
  		//$this->template->set_data('footer',$footer_data); 	  	
	  	
	  //	$data=array();
	  	
	  	// pass custom variable to content page

	  	//$data['test']='test'; 

	  	//$this->template->set_data('index',$data);

	  	// load default template page ie. index.php page

	  //	$this->template->load(); 

	  	// if you want to load custom template page ie. about-us.php page

	  	//$this->template->load('about-us');

	  	$this->theme_panel();
	}	

	public function upload_theme(){		

		$this->template->upload_theme();

		redirect('theme/theme_panel');
	}
	public function delete_theme(){		

		$this->template->delete_theme($dir='./assets/themes/app/', $deleteRootToo=TRUE);
	}

	public function theme_panel(){
		
		$data['themes']=$this->template->get_all_theme();

		$this->load->view('theme_panel',$data);
	}

	public function preview($id=''){
		//echo get_preview_theme($id);
		$this->session->set_userdata('preview_theme',get_preview_theme($id));
		$this->template->set(get_preview_theme($id)); // load theme

	  	$this->template->load(); // load all teplate page
	}

	public function theme_action($id='',$action=''){

		$this->load->library('template');

		$data['themes']=$this->template->theme_action($id,$action);

		redirect('theme/theme_panel');
	}

}

/* End of file theme.php */
/* Location: ./application/controllers/theme.php */