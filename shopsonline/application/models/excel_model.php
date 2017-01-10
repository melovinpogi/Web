<?php
Class Excel_model extends CI_Model
{
 function excelmodel($data)
 {
 // Inserting in Table(payslip) of Database(payroll)
	$this->db->insert('payslip', $data);
	
}


}
?>


