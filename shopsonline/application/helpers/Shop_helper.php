<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


function cartCount(){

	$CI =& get_instance();
	$CI->load->library('session');
	$CI->load->model('shopmodel');

	$session_data  = $CI->session->userdata('logged_in');

	$cartcount = $CI->shopmodel->countCart($session_data['userid']);
	return $cartcount;
}


/* End of file User_helper.php */
/* Location: ./application/helpers/User_helper.php */