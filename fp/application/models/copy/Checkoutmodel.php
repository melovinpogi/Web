<?php
Class Checkoutmodel extends CI_Model
{
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function addtocart($data){
		$this->db->insert('cart',$data);
	}

	public function addtocustomize($data){
		$this->db->insert('user_customized',$data);
	}

	/*public function addtocartfromuser($userid){
		return $this->db->query("insert into cart(user_id,item_id,qty,color_id,model_id,brand_id,price,cost,date_cart)
								select '$userid'

			");

	}*/

	public function itemprice($itemid){
		return $this->db->query("select price from item where id = '$itemid'")->result();
	}

	public function checkout($userid){
		return $this->db->query("select sum(a.qty) as qty,
										cost as price,
										b.color_name,
										c.model_name,
										d.brand_name,
										e.item_description,
										e.img1,
										e.id,
										(select x.id 
										from cart as x 
										where x.user_id = '$userid' 
											and x.item_id = e.id
											and x.id not in (select cart_id from purchase)
										limit 1) as cartid
								from 	cart as a,
										color as b,
										model as c,
										brand as d,
										item as e
								where 	a.user_id = '$userid'
										and a.color_id = b.id
										and a.model_id = c.id
										and a.brand_id = d.id
										and a.item_id  = e.id
										and a.id not in (select cart_id from purchase)

								group by e.item_description,
										b.color_name, 
										c.model_name,
										d.brand_name,
										e.img1,
										e.id")->result();
	}

	public function customizedcheckout($userid){
		return $this->db->query("select * 
								from user_customized 
								where user_id = '$userid' 
									and id not in (select customized_id from purchase)");
	}

	public function countcart($userid){
		return $this->db->query("select * 
								from cart 
								where id not in (select cart_id from purchase where user_id = '$userid')
										and user_id = '$userid'");
	}

	public function countitem($userid,$itemid){
		return $this->db->query("select * from cart where user_id = '$userid' and item_id = '$itemid' and id not in (select cart_id from purchase)");
	}

	public function updatecart($cartid,$qty){
		return $this->db->query("update cart set qty ='$qty',cost = price * $qty where id = '$cartid' ");
	}

	public function additionaltocart($userid,$itemid){
		return $this->db->query("update cart set qty = qty + 1,cost = price * (qty + 1) where item_id = '$itemid' and user_id = '$userid' ");
	}
	public function additionaltocartsingle($userid,$itemid,$qty){
		return $this->db->query("update cart set qty = $qty,cost = price * $qty where item_id = '$itemid' and user_id = '$userid' ");
	}

	public function deleteitem($cartid){
		return $this->db->query("delete from cart where id = '$cartid'");
	}

	public function deletecustomized($cartid){
		return $this->db->query("delete from user_customized where id = '$cartid'");
	}

	public function getcart($userid){
		return $this->db->query("select a.user_id,
								a.item_id,
						        a.qty,
						        a.color_id,
						        a.model_id,
						        a.brand_id,
						        a.price,
						        a.id as cart_id,
						        b.item_description,
						        0 as customized_id
						from cart a ,
							item b
						where a.item_id = b.id
						and a.user_id = '$userid'
						and a.id not in (select cart_id from purchase) union ALL

						select user_id,
								0,
						        size_small + size_medium + size_large + size_xl + size_xxl,
						        0,
						        0,
						        0,
						        price_small + price_medium + price_large + price_xl + price_xxl,
						        0,
						        creation_name,
						        id
						from user_customized 
						where user_id = '$userid'
						and id not in (select customized_id from purchase)")->result();
	}

	

}