<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function check_user(){

	$CI =& get_instance();
	$CI->load->library('session');

	$session_data  = $CI->session->userdata('logged_in');
	return $session_data['username'];
}

function user_id(){

	$CI =& get_instance();
	$CI->load->library('session');

	$session_data  = $CI->session->userdata('logged_in');
	return $session_data['userid'];
}


/* End of file User_helper.php */
/* Location: ./application/helpers/User_helper.php */