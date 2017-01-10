<?php
Class Shopmodel extends CI_Model
{
     public function ItemSelected($id){
        return $this->db->query("select item_code, item_name as item_description,unit_price,item_name from item_master_list where id = $id")->result();
    }

    public function ItemPromo($itemid,$promotype){
    	return $this->db->query("select distinct a.id,
    									promo_description,
                                        dbo.fn_shop_itemtotalprice(a.id) as orig_price 
    							from 	promo_item a 

    									inner join promo_item_breakdown b on
    									b.con_id = a.id

    							where 	item_id = $itemid
    									and cast(getdate() as date) between cast(promo_period_from as date) and cast(promo_period_to as date)
    									--cast(promo_period_to as date) = '07/11/2016'
                                        and promo_status = 14
    									and promo_type_id = case when $promotype = 0 then promo_type_id else $promotype end");
    }

    public function BonusProduct($promoid,$recipient){
    	return $this->db->query("select item_code,
    									item_name as item_description,
    									a.unit_price,
    									b.transaction_qty,
                                        a.item_photo

    							from item_master_list a

    								inner join promo_item_breakdown b on
    								b.item_id = a.id

    								inner join promo_item c on
    								c.id = b.con_id

    							where c.id = $promoid
    									and recipient = $recipient
    									and distribution_type_id = 2")->result();
    }


    public function insertCart($userid,$promoid,$itemid){
        return $this->db->query("   insert into shop_cart 
                                    select $userid,
                                            $promoid,
                                            case when $promoid = 0 or $promoid = '' then $itemid else 0 end,
                                            1,
                                            case when $promoid = 0 or $promoid = '' then 
                                                (select unit_price from item_master_list where id = $itemid)
                                            else dbo.fn_shop_itemtotalprice($promoid) end,
                                            2, 
                                            getdate(),
                                            null,
                                            null ,
                                            null,
                                            'n'");
    }

    public function CheckOutSummary($userid = 0){
        return $this->db->query("select distinct promo_description as promo_code,
                                        a.quantity,
                                        a.amount,
                                        a.id,
                                        dbo.fn_shop_itemtotalprice(b.id) as orig_price,
                                        'P' as type,
                                        '' as item_photo,
                                        b.id as promo_id

                                from    shop_cart a

                                        inner join promo_item b on
                                        b.id = a.promo_id

                                        inner join promo_item_breakdown c on
                                        c.con_id = b.id

                                where   user_id = $userid 
                                        and date_purchase is null 
                                        and cast(getdate() as date) between cast(b.promo_period_from as date) and cast(b.promo_period_to as date)

                                        union all

                                select  item_description as promo_code,
                                        a.quantity,
                                        a.amount,
                                        a.id,
                                        b.unit_price as orig_price,
                                        'I' as type,
                                        '' as item_photo,
                                        0 as promo_id

                                from    shop_cart a

                                        inner join item_master_list b on
                                        b.id = a.item_id   

                                where   user_id = $userid 
                                        and date_purchase is null ")->result();
    }

    public function countCart($userid = 0){
        return $this->db->query("select * from shop_cart where user_id = $userid and date_purchase is null and promo_expire = 'n' ")->num_rows();
    }

    public function updateCart($cartid,$qty,$type){
        return $this->db->query("update shop_cart set   quantity = $qty, 
                                                        amount = case when item_id = 0 then cast(dbo.fn_shop_itemtotalprice(promo_id) as decimal(18,2)) * $qty 
                                                                else (select unit_price from item_master_list x where id = item_id) * $qty end
                                 where id = $cartid");
    }

    public function Wishlist($userid = 0){
        return $this->db->query("select promo_code,
                                        a.quantity,
                                        a.amount,
                                        a.id

                                from    shop_cart a

                                        inner join promo_item b on
                                        b.id = a.promo_id

                                where   user_id = $userid 
                                        and date_purchase is null
                                        and shop_type_id = 3 ")->result();
    }

    public function Purchase($userid = 0){
        return $this->db->query("select promo_code,
                                        a.quantity,
                                        a.amount,
                                        a.id

                                from    shop_cart a

                                        inner join promo_item b on
                                        b.id = a.promo_id

                                where   user_id = $userid 
                                        and shop_type_id = 1 ")->result();
    }

    public function removeCart($cartid){
       return $this->db->query("delete from shop_cart where id = $cartid");
    }

    public function promoItemBreakdown($promoid){
	return $this->db->query("select	distinct d.item_name as item_description,
                            		d.UNIT_PRICE as tsp,
                            		case when distribution_type_id = 1 then 'Main Product' else 'Bonus Product' end as distribution_type,
                            		promo_code,
                                    c.transaction_qty as quantity
                            		
                            from    shop_cart a

                            		inner join promo_item b on
                            		b.id = a.promo_id

                            		inner join promo_item_breakdown c on
                            		c.con_id = b.id
                            		
                            		inner join item_master_list d on
                            		d.ID = c.item_id

                            where   b.id = $promoid
                            		and date_purchase is null 
                            		and distribution_type_id in (1,2)
                                    and recipient ='CU' ")->result();
    }

    public function payment_transaction($request_id,
                $response_id,
                $timestamp,
                $signature,
                $response_code,
                $response_message,
                $response_advise,
                $processor_response_id,
                $userid,
                $ptype,
                $ip,
                $rbill){
        return $this->db->query("insert into shop_transaction(
                                request_id,
                                response_id,
                                timestamp,
                                signature,
                                response_code,
                                response_message,
                                response_advice,
                                processor_response_id,
                                user_id,
                                ptype,
                                transaction_number,
                                transaction_date,
                                currency,
                                client_ip,
                                card_holder) 

                                select '$request_id',
                                        '$response_id',
                                        '$timestamp',
                                        '$signature',
                                        '$response_code',
                                        '$response_message',
                                        '$response_advise',
                                        '$processor_response_id',
                                        $userid,
                                        '$ptype',
                                        dbo.fn_add_leading_zeroes(dbo.fn_generate_document_number('shop'),10),
                                        getdate(),
                                        'PHP',
                                        '$ip',
                                        '$rbill'");
    }


    public function invoice_email($request_id){
        return $this->db->query("select email from shop_customer_invoice where request_id = '$request_id' ")->result();
    }

}
?>