ci-theme-uploader
=================

Codeigniter theme uploader like wordpress


      // load current theme 
	    $this->template->set(get_current_theme()); // do not change this line

		  //pass custom variable to header page

  		$header_data['title'] = "Web design and development tutorials";  		
  		$this->template->set_data('header',$header_data);

  		//pass custom variable to footer page	 

  		//$footer_data['copy_right']="mysite.com";
  		//$this->template->set_data('footer',$footer_data); 	  	
	  	
	    //$data=array();
	  	
	  	// pass custom variable to content page

	  	$data['test']='test'; 

	  	//$this->template->set_data('index',$data);

	  	//load default template page ie. index.php page

	    //$this->template->load(); 

	  	//if you want to load custom template page ie. about-us.php page

	  	//$this->template->load('about-us');
      
      *************************************************************************************
        MORE INFO
      *************************************************************************************
      1. Font url of view : http://localhost/mysite
      2. Band-end url of view url: http://localhost/mysite/theme/theme_panel
      3. for Uploading theme: you need zip file of such file in zip package:
      * index.php
      * header.php
      * footer.php
      * a preview of image ie. named with: screenshot.png
      * a readme.txt file : its has three line ie.:
      
      THEME_NAME : theme name   //Custom Bootstrap, required
      AUTHER_NAME : auther name //Joe Parihar, optional
      VERSION: 0.1  , optional
      
      NOTE:- without readme.txt file does not upload the theme.
      
      optional
      * about.php
      * contact-us.php
      * sidebar.php etc.
      
      4. Basic page configure: 
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
      
      on the controller method
      5.  call header page using get_header(); method.
      6.  call footer page using get_footer(); method.
      7.  call sidebar page using get_sidebar(); method.
      8. call current theme url using theme_path(); method.
      
