<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
				 $data['slider'] = $this->HomeModel->content('home','home-slider')->result();
				 $data['simg'] = $this->HomeModel->content('home','single-img')->result();
				 $data['iwc'] = $this->HomeModel->content('home','img-with-content')->result();
				 $data['promos'] = $this->HomeModel->content('promo','promo')->result();
				 $data['snap'] = $this->HomeModel->content('snap','snap')->result();
				 $data['about'] = $this->HomeModel->content('about','about')->result();
				 $data['franchise'] = $this->HomeModel->content('franchise','franchise')->result();
				 $data['careers'] = $this->HomeModel->content('careers','careers')->result();
	     	 $this->load->view('home_view',$data);
	     }
	}

	function submit(){
			$pagename = $this->input->post('page-name');
		  $type = $this->input->post('type');

			$act = $this->input->post('activity');


			if ($act =="update") {
				$tableid = $this->input->post('table_id');
				$content_title1 = $this->input->post('content_title_' .$tableid);
				$content_title2 = $this->input->post('content_title2_' .$tableid);
				$content_title3 = $this->input->post('content_title3_' .$tableid);
				$content_title4 = $this->input->post('content_title4_' .$tableid);
				$content = $this->input->post('content_'.$tableid);
				$content2 = $this->input->post('content2_'.$tableid);
				$content3 = $this->input->post('content3_'.$tableid);
				$content4 = $this->input->post('content4_'.$tableid);

				

				if ($_FILES['file_'.$tableid]["size"] > 0) {
					$this->do_upload('file_'.$tableid);
					$upload_data = $this->upload->data();
					$file_name =   $upload_data['file_name'];
					$file_path =   $upload_data['file_path'];

					$update = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,
													'img_name'					=> $file_name,
													'img_path'					=> $file_path,
													'type'        			=> $type,
													'sequence' 					=>0);

				}

				else{
					$update = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,

													'type'        			=> $type,
													'sequence' 					=>0);
				}
				if ($pagename != "promo") {
					if ($_FILES['file2_'.$tableid]["size"] > 0) {
					$this->do_upload('file2_'.$tableid);
					$upload_data2 = $this->upload->data();
					$file_name2 =   $upload_data2['file_name'];
					$file_path2 =   $upload_data['file_path'];

					$update = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,
													'img_thumb'					=> $file_name2,
													'img_path'					=> $file_path,
													'type'        			=> $type,
													'sequence' 					=>0);
					}

					else{
					$update = array('page_name' 		 	=> $pagename ,
									'content_title' 		=> $content_title1,
									'content_title2'    => $content_title2,
									'content_title3' 		=> $content_title3,
									'content_title4' 		=> $content_title4,
									'content' 		   		=> $content,
									'content2'         	=> $content2,
									'content3'        	=> $content3,
									'content4'    			=> $content4,

									'type'        			=> $type,
									'sequence' 					=>0);
					}
				}
				

				




				//
				// $update = array('page_name' 		 		=> $pagename ,
				// 								'content_title' 		=> $content_title1,
				// 								'content_title2'    => $content_title2,
				// 								'content_title3' 		=> $content_title3,
				// 								'content_title4' 		=> $content_title4,
				// 								'content' 		   		=> $content,
				// 								'content2'         	=> $content2,
				// 								'content3'        	=> $content3,
				// 								'content4'    			=> $content4,
				// 								'img_name'					=> $file_name,
				// 								'img_thumb'					=> $file_name2,
				// 								'img_path'					=> $file_path,
				// 								'type'        			=> $type,
				// 								'sequence' 					=>0);

				 if (!$this->HomeModel->updatecontent($update,$tableid)) {
						   echo "<script>alert('error while updating data')</script>";
				 }
				 else{
					 		 echo "<script>alert('update success')</script>";
				 }
				 redirect("home","refresh");
			}

			if ($act =="insert") {
				$content_title1 = $this->input->post('content_title');
				$content_title2 = $this->input->post('content_title2');
				$content = $this->input->post('content');
				$content2 = $this->input->post('content2');

				if ($_FILES['file_upload'] > 0) {
					$this->do_upload('file_upload');
					$upload_data = $this->upload->data();
					$file_name =   $upload_data['file_name'];
					$file_path =   $upload_data['file_path'];

					$insert = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,
													'img_name'					=> $file_name,
													'img_path'					=> $file_path,
													'type'        			=> $type,
													'sequence' 					=>0);

				}

				else{
					$insert = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,

													'type'        			=> $type,
													'sequence' 					=>0);
				}
				if ($pagename != "promo") {
					if ($_FILES['file_upload2']) {
					$this->do_upload('file_upload2');
					$upload_data2 = $this->upload->data();
					$file_name2 =   $upload_data2['file_name'];
					$file_path2 =   $upload_data['file_path'];

					$insert = array('page_name' 		 		=> $pagename ,
													'content_title' 		=> $content_title1,
													'content_title2'    => $content_title2,
													'content_title3' 		=> $content_title3,
													'content_title4' 		=> $content_title4,
													'content' 		   		=> $content,
													'content2'         	=> $content2,
													'content3'        	=> $content3,
													'content4'    			=> $content4,
													'img_thumb'					=> $file_name2,
													'img_path'					=> $file_path,
													'type'        			=> $type,
													'sequence' 					=>0);
					}

					else{
					$insert = array('page_name' 		 	=> $pagename ,
									'content_title' 		=> $content_title1,
									'content_title2'    => $content_title2,
									'content_title3' 		=> $content_title3,
									'content_title4' 		=> $content_title4,
									'content' 		   		=> $content,
									'content2'         	=> $content2,
									'content3'        	=> $content3,
									'content4'    			=> $content4,

									'type'        			=> $type,
									'sequence' 					=>0);
					}
				}


				
				 if ($this->HomeModel->insertContent($insert) != "") {
						   echo "<script>alert('error while inserting data')</script>";
				 }
				 else{
					 		 echo "<script>alert('insert success')</script>";
				 }
				 redirect("home","refresh");
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
											 redirect("home","refresh");
                }
                else
                {
                      return "success";
                }
        }


    public function product()
	{
		 	$data['category'] = $this->HomeModel->category()->result();
			$data['product'] = $this->HomeModel->product()->result();
		 	$this->load->view('product_view',$data);
	}


	public function delete($id){
		if ($this->HomeModel->delete('content',$id)) {
			echo "<script>Delete Success!</script>";
		}
		else{
			echo "<script>alert('error encounter while updating.')</script>";
		}
		redirect("home","refresh");

	}
}
