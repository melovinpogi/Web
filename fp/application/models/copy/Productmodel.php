<?php
Class Productmodel extends CI_Model
{
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function category($catid){
		return $this->db->query("select * from subcategory where category_id = $catid");
	}

	public function brand(){
		return $this->db->query("select * from brand")->result();	
	}

	public function product($catid,$subcat = 0,$brandid = 0){
		return $this->db->query("select distinct x.item_description,
										x.id,
										x.price,
										y.model_id,
										x.color_id,
										x.img1,
										x.img2,
										x.img3,
										x.brand_id 
								from 	item as x,
										stock_card y
								where 	y.item_id = x.id
										and x.category_id = $catid
										and	x.brand_id = case when $brandid = 0 then x.brand_id else $brandid end
										and	x.subcategory_id = case when $subcat = 0 then x.subcategory_id else $subcat end
										and (select sum(in_qty) - sum(out_qty) from stock_card as y where y.item_id = x.id) > 0");
	}

	public function singleitem($itemid,$color,$model){
		return $this->db->query("select * 
								from item 
								where id = $itemid
									and color_id = case when $color = 0 then color_id else $color end
									and model_id = $model");
	} 

	public function availcolor($modelid){
		return $this->db->query("select distinct x.color_name,
										y.id as itemid ,
										x.id as colorid,
										y.model_id as modelid
								from 	color x ,
										item y,
										stock_card z
								where 	x.id = y.color_id
										and y.id = z.item_id
										and y.model_id = '$modelid'
										and x.id in (select color_id from stock_card where model_id = $modelid) 
										and (select sum(in_qty) - sum(out_qty) 
											from stock_card 
											where model_id = $modelid and color_id = x.id) > 0");
	}

	public function availstock($itemid,$colorid = 0){
		return $this->db->query("select sum(in_qty) - sum(out_qty) as qty
								from stock_card	 
								where item_id = $itemid
										and color_id = case when $colorid = 0 then color_id else $colorid end");
	}


	/*Customized*/
	public function customize_design(){
		return $this->db->query("select * from shirt_design")->result();
	}


	public function report($user,$from,$to){
		return $this->db->query("SELECT item.item_description,
								color.color_name,
						        model.model_name,
						        brand.brand_name,
						        purchase.qty,
						        purchase.price,
						        purchase.date_purchase,
						        CONCAT(user.lastname,', ',user.firstname) as customer,
						        'Regular Item' as type
						FROM purchase,
								item ,
						        color ,
						        model ,
						        brand ,
						        user
						WHERE purchase.item_id = item.id
								and purchase.color_id = color.id
						        and purchase.model_id = model.id
						        and purchase.brand_id = brand.id
						        and purchase.user_id = user.id
						        and cast(purchase.date_purchase as date) between cast( '$from' as date) and cast('$to' as date)
						        and purchase.user_id = CASE WHEN '$user' = 0 then purchase.user_id else '$user' end
						        
						        
						        UNION ALL
						        
						        
						SELECT user_customized.creation_name,
								'',
						        'Customized',
						        'Customized',
						        purchase.qty,
						        purchase.price,
						        purchase.date_purchase,
						        CONCAT(user.lastname,', ',user.firstname) as customer,
						       'Customized Item' as type
						FROM purchase,
						        user_customized,
						        user
						WHERE 	purchase.user_id = user.id
								and purchase.customized_id = user_customized.id
								and cast(date_purchase as date) between cast( '$from' as date) and cast('$to' as date)
						        and purchase.user_id = CASE WHEN '$user' = 0 then purchase.user_id else '$user' end")->result();
	}
}