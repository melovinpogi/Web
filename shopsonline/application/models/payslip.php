<?php
Class Payslip extends CI_Model
{
 function payslip_model($id)
 {

  if($id == 1){
    $this -> db -> select('id,name,year,month,cut_off,net_pay,semi_monthly');
    $this -> db -> from('payslip');
  }
  else{

   $this -> db -> select('id,name,year,month,cut_off,net_pay,semi_monthly');
   $this -> db -> from('payslip');
   $this -> db -> where('user_id', $id);
   
}
   $query = $this -> db -> get();

   //return $query->result();

   if ($query->num_rows() > 0){

     return $query->result();
  }
  else
  {
    return false;
  }

 }
}
?>