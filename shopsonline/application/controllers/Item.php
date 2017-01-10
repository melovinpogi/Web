<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();
		$CI =& get_instance();
	   $this->load->view('base');
	   $this->load->view('functions');
	}

	public function index(){
	   	if(check_user() == ''){
	     redirect('login','refresh');
	    }
	}

	public function Category(){
		 $data['x']  = $this->uri->segment(1);
		 $id = $this->uri->segment(3);
		 $this->load->model('Itemlistmodel');
		 
		$data['category'] = $this->Itemlistmodel->ItemCategory($id);
		$this->load->view("page/item-list-page",$data);
	}

	public function Shop(){
		$id  = $this->uri->segment(3);
		echo "test";
	}

	
}

?>