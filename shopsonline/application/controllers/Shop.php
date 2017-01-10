<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();
	   $this->load->view('base');
	   $this->load->view('functions');
	}

	public function index(){
	   if(check_user() == ''){
			redirect('login', 'refresh');
		}
		else{
			redirect('index.html');
		}
	}

	public function Item(){
		if(check_user() == ''){
			redirect('home', 'refresh');
		}
		$id 	 = $this->uri->segment(3);
		
		$this->load->model("Shopmodel");
		$this->load->model("itemlistmodel");

		$data['item'] 		= $this->Shopmodel->itemselected($id);
		$data['cntmonthly'] = $this->Shopmodel->ItemPromo($id,1)->num_rows();
		$data['monthly'] 	= $this->Shopmodel->ItemPromo($id,1)->result();
		$data['cntbooster'] = $this->Shopmodel->ItemPromo($id,2)->num_rows();
		$data['booster'] 	= $this->Shopmodel->ItemPromo($id,2)->result();
		$data['cntspecials']= $this->Shopmodel->ItemPromo($id,3)->num_rows();
		$data['specials'] 	= $this->Shopmodel->ItemPromo($id,3)->result();
		$data['ddpromo'] 	= $this->Shopmodel->ItemPromo($id,0)->result();
		$data['item_description'] = $this->itemlistmodel->itemDescription($id);
		$data['itemid'] 	= $id;

		$this->load->view("page/shop-page",$data);
	}


	public function bonusitem(){
		$bonusid = $this->uri->segment(3);

		if($bonusid == '' || is_numeric($bonusid) === FALSE ){
			$bonusid = 0;
		}

		$this->load->model("Shopmodel");
		//Bonus Product
		$result 	= $this->Shopmodel->BonusProduct($bonusid,"'SD'");
		$result2 	= $this->Shopmodel->BonusProduct($bonusid,"'CU'");
		$content 	= '';

		//SD
		// if($result){
		// 	$content = '<h4>NUTRITECHIAN</h4>';
		// 	$content .= '<table cellspacing="0" class="shop_table cart">';
		// 	$content .= ' <thead>';
		// 	$content .= '	<tr>';
		// 	//$content .= '		<th class="product-thumbnail">&nbsp;</th>';
		// 	$content .= '		<th class="product-name">Product</th>';
		// 	$content .= '		<th class="product-quantity">Quantity</th>';
		// 	$content .= '		<th class="product-subtotal">Price</th>';
		// 	$content .= '	</tr>';
		// 	$content .= ' </thead>';
		// 	$content .= ' <tbody>';

		// 	foreach ($result as $key) {
		// 		$content .= '<tr class="cart_item">';
		// 		// $content .= ' <td class="product-thumbnail">';
		// 		// $content .= '  <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="'. base_url('assets/images/products/' . $key->item_photo) .'"></a>';
		// 		// $content .= ' </td>';
		// 		$content .= ' <td class="product-name">';
		// 		$content .= '  <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="'. base_url('assets/images/products/' . $key->item_photo) .'"></a>';
		// 		$content .= '  <h4>' . $key->item_description .  '</h4>';
		// 		$content .= ' </td>';
		// 		$content .= ' <td class="product-quantity">';
		// 		$content .= '  <h4>' . $key->transaction_qty .  '</h4>';
		// 		$content .= ' </td>';
		// 		$content .= ' <td class="product-price">';
		// 		$content .= '  <h4 class="amount">Php ' . number_format($key->unit_price ,2) .  '</h4> ';
		// 		$content .= ' </td>';
		// 		$content .= '</tr>';
		// 	}
		// 	$content .= ' </tbody>';
		// 	$content .= '</table>';
		// }

		//CU
		if($result2){
			$content .= '<h4>CUSTOMER</h4>';
			$content .= '<table cellspacing="0" class="shop_table cart">';
			$content .= ' <thead>';
			$content .= '	<tr>';
			//$content .= '		<th class="product-thumbnail">&nbsp;</th>';
			$content .= '		<th class="product-name">Product</th>';
			$content .= '		<th class="product-quantity">Quantity</th>';
			$content .= '		<th class="product-subtotal">Price</th>';
			$content .= '	</tr>';
			$content .= ' </thead>';
			$content .= ' <tbody>';

			foreach ($result2 as $key) {
				$content .= '<tr class="cart_item">';
				// $content .= ' <td class="product-thumbnail">';
				// $content .= '  <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="'. base_url('assets/images/products/' . $key->item_photo) .'"></a>';
				// $content .= ' </td>';
				$content .= ' <td class="product-name">';
				$content .= '  <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="'. base_url('assets/images/products/' . $key->item_photo) .'"></a>';
				$content .= '  <h4>' . $key->item_description .  '</h4>';
				$content .= ' </td>';
				$content .= ' <td class="product-quantity">';
				$content .= '  <h4>' . $key->transaction_qty .  '</h4>';
				$content .= ' </td>';
				$content .= ' <td class="product-price">';
				$content .= '  <h4 class="amount">Php ' . number_format($key->unit_price ,2) .  '</h4> ';
				$content .= ' </td>';
				$content .= '</tr>';
			}
			$content .= ' </tbody>';
			$content .= '</table>';
		}
			echo $content;
	}


	public function addtocart(){
      $this->load->model('shopmodel');
	  $id     = $this->uri->segment(3);
	  $itemid = $this->uri->segment(4);
	  $result = $this->shopmodel->insertCart(user_id(),$id,$itemid);

      if($result){
       echo '<h3 class="text-center">Item Successfully Added to your cart <i class="fa fa-check"></i></h3>';
      }
      else{
        echo '<h3>Error encounter while adding to your cart. Please try again <i class="fa fa-times-o"></i></h3>';
      }
	}

	public function cartCount(){
		$this->load->model('shopmodel');
		$cartcount = $this->shopmodel->countCart(user_id());
		echo $cartcount;
	}

	public function cart(){
		$this->load->model('shopmodel');
		$data['summarycheckout']  = $this->shopmodel->CheckOutSummary(user_id());
		$this->load->view('page/checkout_view',$data);
	}

	 public function updatecart(){
	    $this->load->model('shopmodel');
	    $id     = $this->uri->segment(3);
	    $qty    = $this->uri->segment(4);
	    $type   = $this->uri->segment(5);

	    $update = $this->shopmodel->updateCart($id,$qty,$type);

	    if(!$update){
	       echo "<script>alert('Network Error. Please Try Again.')</script>";
	    }
	    redirect('shop/cart','refresh');
	  }

	public function checkout(){
		if(user_id() == ''){
			redirect('home', 'refresh');
		}
	  	$this->load->model('usermodel');
	  	$this->load->model('shopmodel');

		$data['customerinfo'] 	  = $this->usermodel->customerinfo(user_id());
    	$data['summarycheckout']  = $this->shopmodel->CheckOutSummary(user_id());
    	$data['promobreakdown']   = $this->shopmodel->promoItemBreakdown(user_id());
    	$this->load->view('page/payment_view',$data);
	   }

	public function removecart(){
	    $this->load->model('shopmodel');
	    $id     = $this->uri->segment(3);

	    $update = $this->shopmodel->removeCart($id);

	    if(!$update){
	       echo "Network Error. Please Try Again.";
	    }
	    else{
	    	echo "Item Successfully Remove.";
	    }
	    redirect('shop/cart','refresh');
	  }

	public function promobreakdown(){
		$content = '';
		$mprice = 0;
		$totalprice = 0;

		$promo = $this->uri->segment(3);
		$this->load->model('shopmodel');
		$result = $this->shopmodel->promoItemBreakdown($promo);

		if($result){
			$content .= '<table cellspacing="0" class="shop_table cart">';
			$content .= ' <thead>';
			$content .= '	<tr>';
			$content .= '		<th class="product-name">Product</th>';
			$content .= '		<th class="product-quantity">Quantity</th>';
			$content .= '		<th class="product-subtotal">Price</th>';
			$content .= '	</tr>';
			$content .= ' </thead>';
			$content .= ' <tbody>';

			foreach ($result as $key) {
				$totalprice = $totalprice + $key->tsp;

				if( $key->distribution_type == 'Main Product'){
					$mprice = $key->tsp;
				}
				$content .= '<tr class="cart_item">';
				$content .= ' <td class="product-name">';
				$content .= '  <h4>' . $key->distribution_type . '<br>'. $key->item_description .  '</h4>';
				$content .= ' </td>';
				$content .= ' <td class="product-quantity">';
				$content .= '  <h4>' . $key->quantity .  '</h4>';
				$content .= ' </td>';
				$content .= ' <td class="product-price">';
				$content .= '  <h4 class="amount">Php ' . number_format($key->tsp ,2) .  '</h4> ';
				$content .= ' </td>';
				$content .= '</tr>';
			}
			$content .= '<tr>';
			$content .= '<td><h4>Total</h4></td>';
			$content .= '<td></td>';
			$content .= '  <td><h4 class="amount">Php ' . number_format($totalprice ,2) .  '<hr> ';
			$content .= '  Less Discount: Php ' . number_format(($totalprice - $mprice),2).  '</h4></td>';
			$content .= '</tr>';
			$content .= ' </tbody>';
			$content .= '</table>';
		}

		echo $content;
	}


	public function payment(){
		$this->load->model('shopmodel');

		$merchant = $this->uri->segment(3);
		$request_id = $this->uri->segment(4);
		$response_id = $this->uri->segment(5);
		$timestamp = $this->uri->segment(6);
		$signature = $this->uri->segment(7);
		$response_code = $this->uri->segment(8);
		$response_message = $this->uri->segment(9);
		$response_advise = $this->uri->segment(10);
		$processor_response_id = $this->uri->segment(11);
		$ptype = $this->uri->segment(12);
		$rbill = $this->uri->segment(13);
		$client_ip = $this->input->ip_address();

		$result = $this->shopmodel->payment_transaction(
				$request_id,
				$response_id,
				$timestamp,
				$signature,
				$response_code,
				$response_message,
				$response_advise,
				$processor_response_id,
				user_id(),
				$ptype,
				$client_ip,
				$rbill);

		 if($result){
		 	$x = $this->shopmodel->invoice_email($request_id);
		 	foreach ($x as $key) {
				echo $key->email;
			}
	      }
	      else{
	        echo 'fail';
	      }
	}
	    
}

?>