<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$error ='';
		$this->load->view('upload_view', array('error' => $error ));

	}

	function do_upload()
	{
		
		/* if ($handle = opendir('uploads')) {
		    while (false !== ($entry = readdir($handle))) {
		        if ($entry != "." && $entry != "..") {
		            $excel = $entry;
		        }
		    }
		    closedir($handle);
		}

		$path = realpath(APPPATH . '../uploads');
		if (!unlink($path)){
		  	echo ("Error deleting $path");
		  }
		else{
		  	echo ("Deleted $file");
		  }*/


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_view2', '$error');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
 

?>