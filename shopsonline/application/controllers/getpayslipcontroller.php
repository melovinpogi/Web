<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Getpayslipcontroller extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function getpayslip($payslipid)
 {	
 	$this->load->view('header');
  	$this->load->model('getpayslipmodel');
		$data['getpayslip'] = $this->getpayslipmodel->getpayslip($payslipid);
		//  print_r($data['getpayslipmodel']);
		$this->load->view('getpayslipview',$data);

  
 }

 /* function index($payslipid)
	{
		$this->load->model('getpayslipmodel');
		$data['getpayslip'] = $this->getpayslipmodel->getpayslip($payslipid);
		//  print_r($data['getpayslipmodel']);
		$this->load->view('getpayslipview',$data);
	}*/


}

?>