<?php
Class ItemListmodel extends CI_Model
{
     public function ItemList($promo){
        return $this->db->query("pr_shop_item $promo")->result();
    }

    function promo_cat($promotype,$calendar){
	  return $this->db->query("pr_shop_promo_cat $promotype,$calendar")->result();
    }

    function itemname($promo,$class){
        return $this->db->query("select dbo.fn_shop_promotitle($promo,$class) as itemname")->result();
    }

    function itemprice($promo){
        return $this->db->query("select dbo.fn_shop_itemtotalprice($promo) as totalprice")->result();
    }

    function itemComposition($promoid,$userid){
        return $this->db->query("pr_shop_composition $promoid,$userid")->result();
    }


    /* Version 2 Item Model*/
    function ItemCategory($categoryid){
        return $this->db->query("select id, 
                                        item_code,
                                        item_name as item_description,
                                        unit_price,
                                        item_photo 
                                from    item_master_list 
                                where   item_class_id = $categoryid
                                        and item_description not like '%DEMO%'
                                        and main_item = 'y'
                                order by sequence ")->result();
    }

    function ItemDisplayHome($categoryid){
        return $this->db->query("select a.id,
                                        item_code,
                                        item_name as item_description,
                                        item_photo,
                                        unit_price
                                from    item_master_list a

                                        inner join shop_item_front b on
                                        b.item_id = a.id

                                where  b.category_id = $categoryid
                                order by b.id")->result();
    }


    function itemDescription($itemid){
        return $this->db->query("select item_description_shop,
                                        item_photo,
                                        img_thumbnail1,
                                        img_thumbnail2,
                                        img_thumbnail3,
                                        img_thumbnail4,
                                        item_description
                                from item_master_list 
                                where id = $itemid")->result();
    }

    
}
?>