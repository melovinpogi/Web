<?php
Class RegisterModel extends CI_Model
{
     public function reg($email,$password,$firstname,$lastname,$middlename,$mobile,$address,$exist,$code,$city,$state,$country,$zip){
        return $this->db->query("pr_shop_insert_user $email,$password,$firstname,$lastname,$middlename,$mobile,$address,$exist,$code,$city,$state,$country,$zip")->result();
    }

    function CustomerMasterlist(){
    	return $this->db->query("select id,ltrim(rtrim(customer_name)) as customer_name from customer order by customer_name")->result();
    }

    function verifyCode($verificationcode){
    	return $this->db->query("update shop_email_code set date_activated = getdate() where email_code = $verificationcode");
    }

    function checkCode($verificationcode){
    	return $this->db->query("select * from shop_email_code where email_code = $verificationcode and date_activated is not null")->num_rows();
    }

    function province(){
        return $this->db->query("select province from shop_province")->result();
    }

    function city(){
        return $this->db->query("select city from shop_city order by city")->result();
    }

    function InsertPassword($email,$password,$userid){
        return $this->db->query(" pr_shop_update_password '$email','$password',$userid ");
    }
}
?>