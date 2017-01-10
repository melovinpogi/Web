<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/product
	 *	- or -  
	 * 		http://example.com/index.php/product/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/product/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	   	$this->load->view('base');
	}

	public function index(){
		//	
	}


	public function category(){
		$id = $this->uri->segment(3);
		$data['category'] 	= $this->Productmodel->category($id)->result();
		$data['brand'] 		= $this->Productmodel->brand();
		$data['product'] 	= $this->Productmodel->product($id)->result();
		$this->load->view('product_view',$data);
	}

	public function customizeyourstuff(){
		if(user_id() == '' || user_id() == 0 ){
	        redirect('home','refresh');
	     }
	     
		$data['shirt_design'] = $this->Productmodel->customize_design();
		$this->load->view('customize_view',$data);	
	}


	public function singleproduct(){
		$itemid 	= $this->uri->segment(6);
		$colorid 	= $this->uri->segment(8);
		$modelid 	= $this->uri->segment(10);

		//$itemid = 1;

		$data['item'] 		= $this->Productmodel->singleitem($itemid,$colorid,$modelid)->result();
		$data['availstock'] = $this->Productmodel->availstock($itemid,$colorid)->result();
		$data['availcolor'] = $this->Productmodel->availcolor($modelid)->result();

		$this->load->view('singleproduct_view',$data);
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */