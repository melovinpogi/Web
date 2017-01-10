<?php
Class Getpayslipmodel extends CI_Model
{
 function getpayslip($payslipid)
 {

 

   $this -> db -> select('id,name,year,month,net_pay,semi_monthly,lates,absents,undertime,overtime,sss,philhealth,tax,other_earnings,cut_off,deduction');
   $this -> db -> from('payslip');
   $this -> db -> where('id', $payslipid);
   
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