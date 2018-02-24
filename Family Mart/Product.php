<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {

		 parent::__construct();
		  $this->load->model('HomeModel');
		 script_css();
		 script_js();

	 }
	public function index()
	{
		if(user_id() == '' || user_id() == 0 ){
	        $this->load->view('account/login_view');
	     }else{
				$data['category'] = $this->HomeModel->category()->result();
				$data['product'] = $this->HomeModel->product()->result();
	     	 $this->load->view('product_view',$data);
	     }
	}

	function submit(){
			$act = $this->input->post('activity');


			if ($act =="update") {
				$tableid = $this->input->post('table_id');
				$category = $this->input->post('category_' .$tableid);
				$title = $this->input->post('title_' .$tableid);
				$content = $this->input->post('content_' .$tableid);
				$pcs = $this->input->post('pcs_' .$tableid);
				$srp = $this->input->post('srp_' .$tableid);
				

				$this->do_upload('file_'.$tableid);
				$upload_data = $this->upload->data();
				$file_name =   $upload_data['file_name'];
				$file_path =   $upload_data['file_path'];

				$this->do_upload('file2_'.$tableid);
				$upload_data2 = $this->upload->data();
				$file_name2 =   $upload_data2['file_name'];
				$file_path2 =   $upload_data2['file_path'];
				

				$update = array('category' 		 		=> $category ,
								'title' 		=> $title,
								'content'    => $content,
								'pcs'    => $pcs,
								'srp'    => $srp,
								'img_name'					=> $file_name,
								'img_path'					=> $file_path,
								'img_thumbnail'				=> $file_name2,
								'img_path2'					=> $file_path2);

				 if (!$this->HomeModel->updateProduct($update,$tableid)) {
						   echo "<script>alert('error while updating data')</script>";
				 }
				 else{
					 		 echo "<script>alert('update success')</script>";
				 }
				 redirect("product","refresh");
			}

			if ($act =="insert") {
				$category = $this->input->post('category');
				$title = $this->input->post('title');
				$content = $this->input->post('content');
				$pcs = $this->input->post('pcs');
				$srp = $this->input->post('srp');

				$this->do_upload('file_upload');
				$upload_data = $this->upload->data();
				$file_name =   $upload_data['file_name'];
				$file_path =   $upload_data['file_path'];

				$this->do_upload('file_upload2');
				$upload_data2 = $this->upload->data();
				$file_name2 =   $upload_data2['file_name'];
				$file_path2 =   $upload_data2['file_path'];


				$insert = array('category' 		 		=> $category ,
								'title' 		=> $title,
								'content'    => $content,
								'pcs'    => $pcs,
								'srp'    => $srp,
								'img_name'					=> $file_name,
								'img_path'					=> $file_path,
								'img_thumbnail'				=> $file_name2,
								'img_path2'					=> $file_path2);
				 if ($this->HomeModel->insertProduct($insert) != "") {
						   echo "<script>alert('error while inserting data')</script>";
				 }
				 else{
					 		 echo "<script>alert('insert success')</script>";
				 }
				 redirect("product","refresh");
			}


	}

	public function do_upload($name){

                $config['upload_path']          ='../img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 102400;
                $config['max_height']           = 76800;

                $this->load->library('upload', $config);
								$this->upload->initialize($config);
                if ( ! $this->upload->do_upload($name))
                {
                        $error = array('error' => $this->upload->display_errors());

                      echo "<script>alert('".$this->upload->display_errors()."')</script>";
											 redirect("product","refresh");
                }
                else
                {
                      return "success";
                }
        }

        public function delete($id){
		if ($this->HomeModel->delete('product',$id)) {
			echo "<script>Delete Success!</script>";
		}
		else{
			echo "<script>alert('error encounter while updating.')</script>";
		}
		redirect("home","refresh");

	}

 
}
