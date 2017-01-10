<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Payslip_controller extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function payslip()
 {
  	$session = $this->session->userdata('logged_in');
 	$id = $session["id"];
   	$this->load->model('payslip');

  $data['payslip'] = $this->payslip->payslip_model($id);
 // print_r($data['payslip']);
	$this->load->view('home_view',$data);

  
 }

}

?>