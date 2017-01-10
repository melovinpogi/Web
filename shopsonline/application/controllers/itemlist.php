<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Test extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();		
		$this->load->view('base');
	}

	public function index(){

		//echo "this is index";
		
	}
}

?>