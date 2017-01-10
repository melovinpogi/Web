<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/ajax
	 *	- or -  
	 * 		http://example.com/index.php/ajax/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/ajax/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if(user_id() == 0 || user_id() == ''){
			redirect('home','refresh');
		}
	}


	public function itemPerBrandAndCat($catid,$subcat,$brand){
		$content = '';
		$result 	= $this->Productmodel->product($catid,$subcat,$brand)->result();
		if( $this->Productmodel->product($catid,$subcat,$brand)->num_rows() > 0){
			foreach ($result as $key) {
				$content .= '';
				$content .='<div class="products-grd">';
				$content .=	'<div class="p-one simpleCart_shelfItem prd">';
				$content .=		'<a href="single.html">';
				$content .=			'<img src="'.$key->img1 .'" alt="" class="img-responsive" />';
				$content .=		'</a>';
				$content .=		'<h4>'. $key->item_description . '</h4>';
				$content .=		'<p>';
				$content .=			'<a class="item_add" href="#">';
				$content .=				'<i class="glyphicon glyphicon-shopping-cart"></i> ';
				$content .=				'<span class=" item_price valsa">&#8369;' . number_format($key->price,2) . '</span>';
				$content .=			'</a>';
				$content .=		'</p>';
				$content .=		'<div class="pro-grd">';
				$content .=			'<a href="'.base_url('product/single/category/' .$this->uri->segment(3). '/' . $key->item_description .'/'. $key->id.'/color/'. $key->color_id.'/model/'. $key->model_id).'">Quick View</a>';
				$content .=		'</div>';
				$content .=	'</div>';	
				$content .='</div>';
			}
			
		}else{
			$content = '<h3>No Record.</h3>';
		}
		echo $content;
	}

	public function addtocart($itemid,$colorid,$modelid,$brandid){
		$unitprice = 0;
		$itemprice = $this->Checkoutmodel->itemprice($itemid);
		$countitem = $this->Checkoutmodel->countitem(user_id(),$itemid)->num_rows();

		foreach ($itemprice as $key) {
			$unitprice = $key->price;
		}

		if($countitem > 0){
			$this->Checkoutmodel->additionaltocart(user_id(),$itemid);
		}else{
			$cart  = array(	'user_id' => user_id(),
						'item_id' => $itemid,
						'qty'	=> 1,
						'color_id' => $colorid,
						'model_id' => $modelid,
						'brand_id' => $brandid,
						'price' => $unitprice,
						'cost' => $unitprice,
						'date_cart' =>  date("Y-m-d H:i:s") );
			$this->Checkoutmodel->addtocart($cart);
		}		
	}


	public function addtocartsingle($itemid,$colorid,$modelid,$brandid,$qty){
		$unitprice = 0;
		$itemprice = $this->Checkoutmodel->itemprice($itemid);
		$countitem = $this->Checkoutmodel->countitem(user_id(),$itemid)->num_rows();

		foreach ($itemprice as $key) {
			$unitprice = $key->price;
		}

		if($countitem > 0){
			$this->Checkoutmodel->additionaltocartsingle(user_id(),$itemid,$qty);
		}else{
			$cart  = array(	'user_id' => user_id(),
						'item_id' => $itemid,
						'qty'	=> $qty,
						'color_id' => $colorid,
						'model_id' => $modelid,
						'brand_id' => $brandid,
						'price' => $unitprice,
						'cost' => $unitprice,
						'date_cart' =>  date("Y-m-d H:i:s") );
			$this->Checkoutmodel->addtocart($cart);
		}		
	}

	public function updatecart($cartid,$qty){
		$this->Checkoutmodel->updatecart($cartid,$qty);
		//redirect('checkout','refresh'); 
	}

	public function deleteitem($cartid){
		$this->Checkoutmodel->deleteitem($cartid);
	}
	public function deletecustomized($cartid){
		$this->Checkoutmodel->deletecustomized($cartid);
	}

	public function subcat($cat){
		$subcat = $this->db->query("select * from subcategory where category_id = '$cat' ")->result();
		$return = '';

		foreach ($subcat as $key) {
			$return .= '<option value="'.$key->id.'">'.$key->subcategory_name.'</option>';
		}

		echo $return;
	}

	public function itemselected($colorid,$modelid){
		$item =  $this->db->query("select * from item where color_id = '$colorid' and model_id = '$modelid' ")->result();
		$return ='';
		foreach ($item as $key) {
			$return .= '<option value="">Choose</option>';
			$return .= '<option value="'.$key->id.'">'.$key->item_description.'</option>';
		}
		echo $return;
	}

	public function itemprice($item){
		$item =  $this->db->query("select * from item where id = '$item'")->result();

		foreach ($item as $key) {
			echo $key->price;
		}
		
	}

	public function edit($table,$id ){
		//$this->load->view('base');
		//$this->load->view('edit_view');
		$display = '';

		$column = $this->db->query("select column_name,data_type from information_schema.columns where table_name = '" . $table . "'")->result();

		/*$display .= menu();
		$display .= '<div class="container">';
		$display .= $this->load->view('menu/left');
		$display .= '	<div class="col-md-9 col-sm-9">';
		$display .= '<div id="content">';*/

		$display .= '<form class="form-horizontal" action="' .base_url('admin/form/brand') . '" method="post">';
		foreach ($column as $col) {
			if($col->column_name != 'id'){
				$display .= '<div class="form-group">';
				$display .= '	<label class="col-sm-2 control-label">' . $col->column_name . '</label>';
				$display .= '	<div class="col-sm-10">';
				$display .= '		<input type="text" class="form-control" placeholder="' . $col->column_name . '" name="'.$table.'" required="">';
				$display .= '	</div>';
				$display .= '</div>';
			}
		}
		$display .='<div class="form-group">';
		$display .='	<div class="col-sm-offset-2 col-sm-10">';
		$display .='		<button type="submit" class="btn btn-info">Update <i class="fa fa-refresh"></i></button>';
		$display .='	</div>';
		$display .='</div>';
		$display .= '</form>';
		/*$display .='	</div>';
		$display .='	</div>';
		$display .='</div>';*/

		echo $display;
	}


	public function payment(){
		$cart 	= $this->Checkoutmodel->getcart(user_id());
		foreach ($cart as $getitem) {
			$x = array('user_id' => user_id(),
							'item_id' => $getitem->item_id,
							'qty' => $getitem->qty,
							'color_id' => $getitem->color_id,
							'model_id' =>$getitem->model_id,
							'brand_id' =>$getitem->brand_id,
							'price' => $getitem->price,
							'date_purchase' => date("Y-m-d H:i:s"),
							'cart_id' => $getitem->cart_id,
							'customized_id' => $getitem->customized_id,
							'item_name' => $getitem->item_description);
			$this->db->insert('purchase',$x);
		}
		
		$num_inserts = $this->db->affected_rows();
		if($num_inserts > 0){
			echo 'success';
		}else{
			echo 'failed';
		}
	}

	public function genreport($user,$from,$to){
		
		$i = 0;
		$date = new DateTime($from);
		$date1 = new DateTime($to);
		$from1 = $date->format('Y-m-d H:i:s');
		$to1 = $date1->format('Y-m-d H:i:s');

		//echo $to;
		$content ='';
		$r 	= $this->Productmodel->report($user,$from1,$to1);
		//print_r($r);
		foreach ($r as $result) {
			
            $class = '';
            if($i % 2 != 0){
                $class= 'active';
            }else{
                $class= '';
            }
            $i++;

            $content .='<tr class="'.$class.'"> 
                    	<th scope="row">'. $i .'</th> 
                    	<td>'.$result->item_description.'</td>
                    	<td>'.$result->color_name.'</td>
                    	<td>'.$result->model_name.'</td>
                    	<td>'.$result->brand_name.'</td>
                    	<td>'.$result->qty.'</td>
                    	<td>'.$result->price.'</td>
                    	<td>'.$result->date_purchase.'</td>
                    	<td>'.$result->customer.'</td>';
                    	/*<td>'.$result->type.'</td>';*/
		}

		echo $content;
	}
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */