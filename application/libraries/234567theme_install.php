<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Theme Install Theme Library
* Auther: Joe Parihar
*/

class Theme_install{
	function __construct(){
	   $this->CI =& get_instance();      
       
       $this->CI->load->database();
       
       $this->CI->theme_table_name='themes';

       $this->CI->source_path = './assets/'; 
       $this->CI->destination_path = './assets/themes/'; 
       
       $this->_create_theme_table();
	}

	private function _create_theme_table(){
		$this->CI->load->dbforge();
		$fields = array(
					'id' 			=>	array('type' => 'INT','constraint' => 11,'auto_increment' => TRUE),
	                'theme_name' 	=>	array('type' => 'VARCHAR','constraint' => 50),
	                'logo' 			=>	array('type' => 'VARCHAR','constraint' => 255),
	                'description' 	=>	array('type' => 'VARCHAR','constraint' => 255),
	                'is_active' 	=>	array('type' => 'INT','constraint' => 2, 'default' => '0')               
	                );
		$this->CI->dbforge->add_field($fields);
		$this->CI->dbforge->add_key('id', TRUE);
		$this->CI->dbforge->create_table($this->CI->theme_table_name, TRUE);		
	}

	function install(){
		$this->_unzip('app.zip');
		//$this->delete_theme();
	}
	
	private function _unzip($file_name=''){
		$zip = new ZipArchive;
		$this->CI->file=$this->CI->source_path.$file_name;
		if($zip->open($this->CI->file)===TRUE):			
			$zip->extractTo($this->CI->destination_path);
			$zip->close();
			//$this->_delete_zip_file($file_name);
			
			$this->add_to_db(array('theme_name'=>'app'));
			return TRUE;
		else:
			return FALSE;
		endif;
	}

	private function _delete_zip_file($file_name=''){
		if(!empty($file_name)){
			$file_with_path = $this->CI->upload_path.$file_name;
			if(@unlink($file_with_path))
				return TRUE;
		}else
			return FALSE;		
	}

	public function delete_theme($dir, $deleteRootToo){
			
		if(!$dh = @opendir($dir)){
			return FALSE;
		}
		while (FALSE !== ($obj = readdir($dh))){
			if($obj == '.' || $obj == '..')	{
				continue;
			}

			if (!@unlink($dir . '/' . $obj)){
				$this->delete_theme($dir.'/'.$obj, TRUE);
			}
		}

		closedir($dh);

		if ($deleteRootToo){
			@rmdir($dir);
		}

		return TRUE;	
	}

	public function add_to_db($data){
		if(!empty($data['id']))
			return $this->CI->db->update($this->CI->theme_table_name,$data,array('id'=>$data['id']));		
		else	
			return $this->CI->db->insert($this->CI->theme_table_name,$data);		
	}	

	/*public function update_to_db($id,$data){
		return $this->CI->db->update($this->CI->theme_table_name,$data,array('id'=>$id));		
	}*/

	public function get_all_theme(){
		$query=$this->CI->db->get($this->CI->theme_table_name);
		if($query->num_rows()>0)
			return $query->result();
		else
			return FALSE;
	}

	public function theme_action($id,$action){		
		if(strtolower($action)=='activate'):		
			$this->CI->db->update($this->CI->theme_table_name,array('is_active'=>0));
			return $this->CI->db->update($this->CI->theme_table_name,array('is_active'=>1),array('id'=> $id));
		elseif(strtolower($action)=='delete') :		
			return $this->CI->db->delete($this->CI->theme_table_name,array('id'=> $id));		
		else:	
			return FALSE;
		endif;	
	}
}