<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin
	 *	- or -  i    
	 * 		http://example.com/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/admin/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	   	$this->load->view('base');
	}

	public function index(){
		if(user_id() == 0 || user_id() == '' || user_type() != 1 ){
			redirect('home','refresh');
		}else{
			$this->load->view('admin_view');
		}
	}

	public function page($menu){
		if(user_id() == 0 || user_id() == '' || user_type() != 1 ){
			redirect('home','refresh');
		}

		switch ($menu) {
			case 'brand':
				$data['brand'] = $this->db->query('select * from brand')->result();
				$this->load->view('admin/brand_view',$data);
				break;

			case 'color':
				$data['color'] = $this->db->query('select * from color')->result();
				$this->load->view('admin/color_view',$data);
				break;

			case 'item':
				$data['item'] 		 = $this->db->query('select * from item')->result();
				$data['subcategory'] = $this->db->query('select * from subcategory')->result();
				$data['brand']		 = $this->db->query('select * from brand')->result();
				$data['color']		 = $this->db->query('select * from color')->result();
				$data['model']		 = $this->db->query('select * from model')->result();
				$data['category'] 	 = $this->db->query("select 1 as id, 'Mens Fashion' as description union all 
														select 2, 'Womens Fashion' union ALL
														select 3, 'For Kids' union ALL
														select 4, 'Accessories & More'")->result();
				$this->load->view('admin/item_view',$data);
				break;

			case 'model':
				$data['model'] = $this->db->query('select * from model')->result();
				$this->load->view('admin/model_view',$data);
				break;

			case 'shirtdesign':
				$data['shirtdesign'] = $this->db->query('select * from shirt_design')->result();
				$this->load->view('admin/shirtdesign_view',$data);
				break;

			case 'subcategory':
				$data['subcategory'] = $this->db->query('select * from subcategory')->result();
				$data['category'] 	 = $this->db->query("select 1 as id, 'Mens Fashion' as description union all 
														select 2, 'Womens Fashion' union ALL
														select 3, 'For Kids' union ALL
														select  4, 'Accessories & More'")->result();
				$this->load->view('admin/subcategory_view',$data);
				break;

			case 'user':
				$data['users'] = $this->db->query('select * from user')->result();
				$this->load->view('admin/user_view',$data);
				break;

			case 'stock':
				$data['stock'] = $this->db->query('select * from stock_card')->result();
				$data['item']  = $this->db->query('select * from item')->result();
				$data['color'] = $this->db->query('select * from color')->result();
				$data['model'] = $this->db->query('select * from model')->result();
				$this->load->view('admin/stock_view',$data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function form($menu){
		if(user_id() == 0 || user_id() == '' || user_type() != 1 ){
			redirect('home','refresh');
		}

		switch ($menu) {
			case 'brand':

				$input = array('brand_name' => $this->input->post('brandname'));
				$this->db->insert('brand',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding brand success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/brand','refresh');

				break;

			case 'color':

				$input = array('color_name' => $this->input->post('colorname'));
				$this->db->insert('color',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding color success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/color','refresh');

				break;

			case 'item':

				$input = array('item_code' 			=> $this->input->post('itemcode'),
								'item_description' 	=> $this->input->post('itemname'),
								'item_description2' => $this->input->post('itemdesc'),
								'quick_overview' 	=> $this->input->post('quickoverview'),
								'price' 			=> $this->input->post('price'),
								'category_id' 		=> $this->input->post('category'),
								'subcategory_id' 	=> $this->input->post('subcategory'),
								'brand_id' 			=> $this->input->post('brand'),
								'color_id' 			=> $this->input->post('color'),
								'model_id' 			=> $this->input->post('model'),
								'img1' 				=> $this->input->post('img1'),
								'img2' 				=> $this->input->post('img2'),
								'img3' 				=> $this->input->post('img3'));

				$this->db->insert('item',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding item success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/item','refresh');

				break;

			case 'model':
				$input = array('model_name' => $this->input->post('modelname'));
				$this->db->insert('model',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding model success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/model','refresh');
				break;

			case 'shirtdesign':
				$input = array('design_name' => $this->input->post('designame'),
								'design_image' => $this->input->post('img1'));
				$this->db->insert('shirt_design',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding shirtdesign success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/shirtdesign','refresh');
				break;

			case 'subcategory':
				$input = array('subcategory_name' => $this->input->post('subcategory'),
								'category_id' => $this->input->post('category'));
				$this->db->insert('subcategory',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding subcategory success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/subcategory','refresh');
				break;
				
			case 'user':
				$this->load->view('admin/user_view');
				break;

			case 'stock':
				$input = array('item_id' 			=> $this->input->post('item'),
								'in_qty' 			=> $this->input->post('qty'),
								'out_qty' 			=> 0,
								'color_id' 			=> $this->input->post('color'),
								'model_id' 			=> $this->input->post('model'),
								'price' 			=> $this->input->post('price'),
								'unit_cost' 		=> $this->input->post('cost'),
								'transaction_date' 	=> date("Y-m-d H:i:s"),
								'transaction_code' 	=> 'StockAdjustment');

				$this->db->insert('stock_card',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Adding stocks success!');</script>";
				}else{
					echo "<script>alert('Insert Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/page/stock','refresh');
				break;
			
			default:
				# code...
				break;
		}
	}


	public function edit($menu,$id){
		if(user_id() == 0 || user_id() == '' || user_type() != 1 ){
			redirect('home','refresh');
		}

		switch ($menu) {
			case 'brand':
				$data['brand'] = $this->db->query('select * from brand')->result();
				$data['updatebrand'] = $this->db->query('select * from brand where id = ' . $id)->result();
				$this->load->view('admin/edit/brand_view',$data);
				break;

			case 'color':
				$data['color'] = $this->db->query('select * from color')->result();
				$data['updatecolor'] = $this->db->query('select * from color where id = ' . $id)->result();
				$this->load->view('admin/edit/color_view',$data);
				break;

			case 'item':
				$data['item'] 		 = $this->db->query('select * from item')->result();
				$data['subcategory'] = $this->db->query('select * from subcategory')->result();
				$data['brand']		 = $this->db->query('select * from brand')->result();
				$data['color']		 = $this->db->query('select * from color')->result();
				$data['model']		 = $this->db->query('select * from model')->result();
				$data['category'] 	 = $this->db->query("select 1 as id, 'Mens Fashion' as description union all 
														select 2, 'Womens Fashion' union ALL
														select 3, 'For Kids' union ALL
														select 4, 'Accessories & More'")->result();
				$this->load->view('admin/item_view',$data);
				break;

			case 'model':
				$data['model'] = $this->db->query('select * from model')->result();
				$data['updatemodel'] = $this->db->query('select * from model where id = ' . $id)->result();
				$this->load->view('admin/edit/model_view',$data);
				break;

			case 'shirtdesign':
				$data['shirtdesign'] = $this->db->query('select * from shirt_design')->result();
				$data['updateshirtdesign'] = $this->db->query('select * from shirt_design where id = ' . $id)->result();
				$this->load->view('admin/edit/shirtdesign_view',$data);
				break;

			case 'subcategory':
				$data['subcategory'] = $this->db->query('select * from subcategory')->result();
				$data['category'] 	 = $this->db->query("select 1 as id, 'Mens Fashion' as description union all 
														select 2, 'Womens Fashion' union ALL
														select 3, 'For Kids' union ALL
														select  4, 'Accessories & More'")->result();
				$this->load->view('admin/subcategory_view',$data);
				break;

			case 'user':
				$data['users'] = $this->db->query('select * from user')->result();
				$this->load->view('admin/user_view',$data);
				break;

			case 'stock':
				$data['stock'] = $this->db->query('select * from stock_card')->result();
				$data['item']  = $this->db->query('select * from item')->result();
				$data['color'] = $this->db->query('select * from color')->result();
				$data['model'] = $this->db->query('select * from model')->result();
				$this->load->view('admin/stock_view',$data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function formedit($menu,$id){
		if(user_id() == 0 || user_id() == '' || user_type() != 1 ){
			redirect('home','refresh');
		}

		switch ($menu) {
			case 'brand':

				$input = array('brand_name' => $this->input->post('brandname'));
				$this->db->where('id', $id);
				$this->db->update('brand',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Update brand success!');</script>";
				}else{
					echo "<script>alert('Update Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/edit/brand','refresh');

				break;

			case 'color':

				$input = array('color_name' => $this->input->post('colorname'));
				$this->db->where('id', $id);
				$this->db->update('color',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Update color success!');</script>";
				}else{
					echo "<script>alert('Update Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/edit/color','refresh');

				break;

			case 'model':
				$input = array('model_name' => $this->input->post('modelname'));
				$this->db->where('id', $id);
				$this->db->update('model',$input);
				$num_inserts = $this->db->affected_rows();

				if($num_inserts > 0){
					echo "<script>alert('Update model success!');</script>";
				}else{
					echo "<script>alert('Update Failed!' " . $this->db->_error_message() .");</script>";
				}
				
				redirect('admin/edit/model','refresh');
				break;

			case 'shirtdesign':
				$input = array('design_name' => $this->input->post('designame'),
								'design_image' => $this->input->post('img1'));
				$this->db->where('id', $id);
				$this->db->update('shirt_design',$input);
				$num_inserts = $this->db->affected_rows();

				/*if($num_inserts > 0){
					echo "<script>alert('Update shirtdesign success!');</script>";
				}else{
					echo "<script>alert('Update Failed!' " . $this->db->_error_message() .");</script>";
				}*/
				
				redirect('admin/edit/shirtdesign','refresh');
				break;
			
			default:
				# code...
				break;
		}
	}
	



}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */