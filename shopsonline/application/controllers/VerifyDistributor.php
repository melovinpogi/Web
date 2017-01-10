<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class VerifyDistributor extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->model("usermodel");

		$code 	= $this->uri->segment(2);
		$disid 	= $this->usermodel->VerifyDis("'".$code."'");
		

		foreach ($disid as $key ) {
			echo $returnid = $key->id;
		}
	}

}

?>