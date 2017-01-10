<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Excel_controller extends CI_Controller 
{
      function __construct()
    {
        parent::__construct();
        $this->load->model('excel_model');
    }

     function index()
      {
      

      $this->load->library('PHPExcel');

      $file = 'application/files/test.xlsx';
     
     //read file from path
      $objPHPExcel = PHPExcel_IOFactory::load($file);



      //get only the Cell Collection
      $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

      //extract to a PHP readable array format
      foreach ($cell_collection as $cell) {
          $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
          $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
          $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();


         
          //header will/should be in row 1 only. of course this can be modified to suit your need.
          if ($row == 1) {
              $header[$row][$column] = $data_value;
             // echo $header[$row][$column];
          } else {
              $arr_data[$row][$column] = $data_value;   
              echo $this->excel_model->excelmodel($data_value);
          }

    
      }

      //send the data in an array format
      /*$data['header'] = $header;
      $data['values'] = $arr_data;*/
      
       // Transfering Data To Model
           
       
      




      //To write excel file
       /* $sheet = $this->phpexcel->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->setCellValue('A1','First Row');

        $writer = new PHPExcel_Writer_Excel5($this->phpexcel);
        header('Content-type: application/vnd.ms-excel');
        $writer->save('php://output'); */

      }
}