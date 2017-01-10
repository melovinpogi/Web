<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/checkout
	 *	- or -  i    
	 * 		http://example.com/index.php/checkout/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/checkout/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if(user_id() == 0 || user_id() == ''){
			redirect('home','refresh');
		}

		$this->load->view('base');
		$data['checkout'] = $this->Checkoutmodel->checkout(user_id());
		$data['countcart'] = $this->Checkoutmodel->countcart(user_id())->num_rows();
		$data['usercustomized'] = $this->Checkoutmodel->customizedcheckout(user_id())->result();
		$this->load->view('checkout_view',$data);
	}


	public function createShirt(){
		$customized = array('user_id' => user_id(),
							'image_front' => $this->input->post('img_front'),
							'image_back' => $this->input->post('img_back'),
							'size_small' => $this->input->post('size_small'),
							'size_medium' => $this->input->post('size_medium'),
							'size_large' => $this->input->post('size_large'),
							'size_xl' => $this->input->post('size_xl'),
							'size_xxl' => $this->input->post('size_xxl'),
							'price_small' => $this->input->post('price_small'),
							'price_medium' => $this->input->post('price_medium'),
							'price_large' => $this->input->post('price_large'),
							'price_xl' => $this->input->post('price_xl'),
							'price_xxl' => $this->input->post('price_xxl'),
							'date_created' => date("Y-m-d H:i:s"),
							'creation_name' => $this->input->post('creation_name'));

		$this->Checkoutmodel->addtocustomize($customized);
		//echo "<script>alert('Creation of Shirt Success!');</script>";
		redirect('checkout');
	}
}

/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */