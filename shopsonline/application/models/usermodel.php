<?php
Class UserModel extends CI_Model
{
 function Login($email,$password){
      return $this->db->query(" select   a.id,
                                         b.customer_name,
                                         a.customer_id

                                from     shop_user a 

                                          inner join customer b on
                                          b.id = a.customer_id

                                          inner join shop_email_code c on
                                          c.email = a.email

                                where     a.email = $email 
                                          and password = $password
                                          and date_activated is not null ")->result();
    }


  function customerInfo($userid){
  	return $this->db->query("select customer_name,
                  									address,
                  									b.mobile_number,
                  									a.email,
                                    city,
                                    state,
                                    country,
                                    zipcode,
                                    first_name,
                                    last_name,
                                    isnull(middle_name,'') as middle_name,
                                    isnull(b.remarks,'') as shipping_address,
                                    password

                  							from 	shop_user a

                  									inner join customer b on
                  									b.id = a.customer_id

                                    inner join distributor c on
                                    c.customer_id = b.id

                  							where 	a.id = $userid")->result();
  } 

  function ChangePassword($userid,$password){
    return $this->db->query("update shop_user set password = $password where id = $userid");
  }

  function CheckPassword($userid,$password){
    return $this->db->query("select * from shop_user where id = $userid and password = $password")->num_rows();
  }

  function VerifyDis($ntacode){
    return $this->db->query("select id from distributor where ltrim(rtrim(distributor_code)) = ltrim(rtrim($ntacode)) and customer_id not in (select customer_id from shop_user)")->result();
  }

  function UpdateProfile($userid,$shipping){
    return $this->db->query("update customer set remarks = '$shipping' 
                              from shop_user a 

                                  inner join customer b on
                                  b.id = a.customer_id 
                              where a.id = $userid ");

  }

    function Userinfo(){
    return $this->db->query("select customer_name,
                                    address,
                                    b.mobile_number,
                                    a.email,
                                    city,
                                    state,
                                    country,
                                    zipcode,
                                    first_name,
                                    last_name,
                                    isnull(middle_name,'') as middle_name,
                                    isnull(b.remarks,'') as shipping_address,
                                    d.password,
                                    a.id

                                from  shop_user a

                                    inner join customer b on
                                    b.id = a.customer_id

                                    inner join distributor c on
                                    c.customer_id = b.id

                                    inner join shop_user_password d on
                                    d.user_id = a.id")->result();
  }

  function UpdatePassword($email,$password,$userid){
        return $this->db->query(" pr_shop_update_password '$email','$password',$userid ");
    }

  function CustomerFeedback(){
    return $this->db->query("select c.customer_name,
                                    b.email,
                                    a.date_created,
                                    a.comment,
                                    row_number() over(order by date_created desc) as id
                            from  shop_customer_feedback a

                                  inner join shop_user b on
                                  b.id = a.user_id

                                  inner join customer c on
                                  c.id = b.customer_id 
                            order by date_created desc")->result();
  }

  function SendMessage($userid,$message){
    return $this->db->query("insert into shop_customer_feedback
                              select $userid,'$message',getdate()");
  }

}
?>