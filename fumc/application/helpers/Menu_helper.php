<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function menu(){

	$CI =& get_instance();
	$content = $CI->load->view('menu/header');
	   
	return $content;
}

function leftmenu(){
	$CI =& get_instance();
	$content = $CI->load->view('menu/left-menu');
	   
	return $content;
}


/* End of file User_helper.php */
/* Location: ./application/helpers/Menu_helper.php */