<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();
	   	$this->load->view('base');
	   	$this->load->view('functions');
	}

	public function index(){
		$this->load->view('admin/admin_view');
	}

	public function user(){
		$this->load->model('usermodel');
		$data['userlist'] = $this->usermodel->Userinfo();
		$this->load->view('admin/user_view',$data);
	}

	public function feedback(){
		$this->load->model('usermodel');
		$data['feedbacklist'] = $this->usermodel->CustomerFeedback();
		$this->load->view('admin/feedback_view',$data);
	}

}

?>