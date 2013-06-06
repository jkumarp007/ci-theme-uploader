<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Template Helper
* Auther: Joe Parihar
*/

  if (!function_exists('get_current_theme')){
    function get_current_theme(){
      $CI =& get_instance();
      $CI->session->unset_userdata('preview_theme');
      $CI->load->database();
      $query=$CI->db->get_where('themes',array('is_active'=>1));
      if($query->num_rows()>0)
        return trim($query->row()->dir_path);
      else
        return FALSE; //return 'default';     
    }
  }

  if (!function_exists('get_preview_theme')){
    function get_preview_theme($id=''){
      $CI =& get_instance();
      $CI->load->database();
      $query=$CI->db->get_where('themes',array('id'=>$id));
      if($query->num_rows()>0)
        return trim($query->row()->dir_path);
      else
        return FALSE; //return 'default';     
    }
  }

  if (!function_exists('get_header')){
    function get_header($name=null){
      $CI =& get_instance();
      return $CI->template->get_header($name);
    }
  }

  if (!function_exists('get_sidebar')){
    function get_sidebar($name=null){
      $CI =& get_instance();
      return $CI->template->get_sidebar($name);
    }
  }

  if (!function_exists('get_footer')){
    function get_footer($name=null){
      $CI =& get_instance();
      return $CI->template->get_footer($name);
    }
  }

  if (!function_exists('get_template_part')){
    function get_template_part($slug, $name=null){
      $CI =& get_instance();
      return $CI->template->get_template_part($slug, $name);
    }
  }

  if (!function_exists('get_template_directory_uri')){
    function get_template_directory_uri(){
      $CI =& get_instance();
      return $CI->template->get_current_template_part();
    }
  }

  if (!function_exists('theme_path')){
    function theme_path($filename=''){  
      $CI =& get_instance(); 
      if( $CI->session->userdata('preview_theme'))
        echo base_url().'assets/themes/'. $CI->session->userdata('preview_theme').'/'.$filename;
        else  
        echo base_url().'assets/themes/'.get_current_theme().'/'.$filename;
    }
  }

?>