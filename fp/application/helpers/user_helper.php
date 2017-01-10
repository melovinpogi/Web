<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function Customer(){
	$CI =& get_instance();
	$CI->load->library('session');

	$session_data  = $CI->session->userdata('logged_in');
	return $session_data['firstname'] . ' ' . $session_data['lastname'];
}

function user_id(){

	$CI =& get_instance();
	$CI->load->library('session');

	$session_data  = $CI->session->userdata('logged_in');
	return $session_data['userid'];
}

function user_type(){

	$CI =& get_instance();
	$CI->load->library('session');

	$session_data  = $CI->session->userdata('logged_in');
	return $session_data['usertype'];
}


/* End of file User_helper.php */
/* Location: ./application/helpers/User_helper.php */