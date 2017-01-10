<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin2 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin2
	 *	- or -  
	 * 		http://example.com/index.php/admin2/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin2/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('base');		
	}

	
}

/* End of file admin2.php */
/* Location: ./application/controllers/admin2.php */