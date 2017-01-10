<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Excel_controller extends CI_Controller 
{
      function __construct()
    {
        parent::__construct();
        
    }

    public function index()
 {
  //load library phpExcel
  $this->load->library("PHPExcel");

  //here i used microsoft excel 2007
  $objReader = PHPExcel_IOFactory::createReader('Excel2007');

  //set to read only
  $objReader->setReadDataOnly(true);

  //get the path and load excel file
  $this->load->helper("file");
 if ($handle = opendir('uploads')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $excel = $entry;
        }
    }
    closedir($handle);
}


  $objPHPExcel = $objReader->load("uploads/".$excel."");

  $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

     foreach ($cell_collection as $cell) {
          $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
          $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
          $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
    
      }

  //load model
 $this->load->model('excel_model');


  //loop from first data until last data
  for($i=2; $i<=$row; $i++){
   $name = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
   $year = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
   $month = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
   $net_pay = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
   $semi_monthly = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
   $lates = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
   $absents = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
   $undertime = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
   $overtime = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
   $sss = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
   $philhealth = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
   $tax = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
   $other_earnings = $objWorksheet->getCellByColumnAndRow(12,$i)->getValue();
   $cut_off = $objWorksheet->getCellByColumnAndRow(13,$i)->getValue();
   $deduction = $objWorksheet->getCellByColumnAndRow(14,$i)->getValue();
   $id = $objWorksheet->getCellByColumnAndRow(15,$i)->getValue();
   $user_id = $objWorksheet->getCellByColumnAndRow(16,$i)->getValue();

   $data_excel = array(
        "name" => $name,
        "year" => $year,
        'month' => $month,
        'net_pay' => $net_pay,
        'semi_monthly' => $semi_monthly,
        'lates' =>$lates,
        'absents' => $absents,
        'undertime' => $undertime,
        'overtime' => $overtime,
        'sss' => $sss,
        'philhealth' => $philhealth,
        'tax' => $tax,
        'other_earnings' => $other_earnings,
        'cut_off' => $cut_off,
        'deduction' => $deduction,
        'id' => $id,
        'user_id' => $user_id);
   $this->excel_model->excelmodel($data_excel);
    //echo base_url("uploads/".$excel."");
  }

  $path = base_url("./uploads/".$excel."");
  $this->load->helper("file");
  delete_files($path,true);
  //echo delete_files($path,true);
   $this->load->view("excel_success");
   
  
   
 }

 

}