<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
   	 	parent::__construct();
   	 	$this->load->view('base');
	}
	
	public function index()
	{
		$this->load->view('base');
		$this->load->view('home_view');
	}

	public function pagenotfound(){
		$this->load->view('404_view');
	}

	public function search(){
		error_reporting(0);
		if ($this->input->post()) {		
			$search = $this->input->post('search');

			if($this->Productmodel->search($search)->num_rows() > 0){
				$data['product'] = $this->Productmodel->search($search)->result();
			}
		}else{
			$data['product'] = '';
		}
		$this->load->view('search_view',$data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */