<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class User extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();
		$this->load->view('base');
	   	$this->load->view('functions');
	}

	public function index(){
		if(check_user() == ''){
			$data['return'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert">';
			$data['return'] .=    '<strong><i class="fa fa-times-circle"></i> Please Sign In</strong>'; 
			$data['return'] .= '</div>';
			$this->load->view('form/login_view',$data);
		}
		else{
			$this->load->view('home_view');
		}
	}

	public function login(){

		if(check_user() != ''){
			redirect('home', 'refresh');
		}

		$this->load->model('usermodel');
		$this->load->model("itemlistmodel");
	    $email    = $this->input->post('login-email');
	    $pw       = $this->input->post('login-password');

	    $data['userlogged'] = $this->usermodel->Login("'".$email."'","'".md5($pw)."'");
	    $result = $this->usermodel->Login("'".$email."'","'".md5($pw)."'");

	    if($result){
	      $sess_data = array();
	       foreach($result as $row){
	         $sess_array = array(
	           'userid' => $row->id,
	           'username' => $row->customer_name,
	           'useremail' => $email
	         );
	       }
	       $this->session->set_userdata('logged_in', $sess_array);
	       //$this->load->view('home_view');
	    }
	    if($this->input->post('login-email') == ''){
	    	$data['return'] = '<div class="alert alert-success alert-dismissible fade in" role="alert">';
			$data['return'] .=    '<strong><i class="fa fa-check"></i> Please Sign In</strong>'; 
			$data['return'] .= '</div>';
	    }
	    else{
	    	$data['return'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert">';
			$data['return'] .=    '<strong><i class="fa fa-times-circle"></i> Invalid Email / Password!</strong>'; 
			$data['return'] .= '</div>';
	    }
	    	
	    if(check_user() == ''){
			$this->load->view('form/login_view',$data);
		}
		else{
	      $data['dining'] = $this->itemlistmodel->ItemDisplayHome(1);
	      $data['living'] = $this->itemlistmodel->ItemDisplayHome(2);
	      $data['giving'] = $this->itemlistmodel->ItemDisplayHome(3);
		  $this->load->view('home_view',$data);
		}
	}

	 public function logout(){
      $array_items = array('username' => '', 'useremail' => '','userid' => 0);
      $this->session->unset_userdata($array_items);
      $this->session->sess_destroy();
      redirect('login', 'refresh');
   }

     public function register(){

     	if(check_user() != ''){
			redirect('', 'refresh');
		}
		

	    $this->load->model('registermodel');

	    $email    = $this->input->post('email');
	    $pw       = $this->input->post('password');
	    $fname    = $this->input->post('first-name');
	    $lname    = $this->input->post('last-name');
	    $mname    = $this->input->post('middle-name');
	    $mobile   = $this->input->post('mobile');
	    $address  = $this->input->post('message');
	    $exist    = $this->input->post('exist');
	    $city     = $this->input->post('city');
	    $state    = $this->input->post('state');
	    $country  = $this->input->post('country');
	    $zip      = $this->input->post('zipcode');

	    if($exist == ''){
	      $exist  = 0;
	    }

	    $data['validate']   = $this->registermodel->reg("'".$email."'","'".md5($pw)."'","'".$fname."'","'".$lname."'","'".$mname."'","'".$mobile."'","'".$address."'",$exist,"'".md5($email)."'","'".$city."'","'".$state."'","'".$country."'","'".$zip."'");
	    $data['customer']   = $this->registermodel->CustomerMasterlist();
	    $data['province']  	= $this->registermodel->province(); 
	    $data['city']   	= $this->registermodel->city();
	    $this->registermodel->InsertPassword($email,$pw,0); 

	    $this->load->view('form/register_view',$data);
	    
	  }

	public function verifydistributor(){
		$this->load->model("usermodel");

		$code 	= $this->uri->segment(2);
		$disid 	= $this->usermodel->VerifyDis("'".$code."'");

		foreach ($disid as $key ) {
			echo $returnid = $key->id;
		}
	}

	public function profile(){
	    $this->load->model('usermodel');
	    $this->load->model('shopmodel');

	    $data['customerinfo']     = $this->usermodel->customerinfo(user_id());
	    $data['summarycheckout']  = $this->shopmodel->CheckOutSummary(user_id());
	    $data['wishlist']  		  = $this->shopmodel->wishlist(user_id());
	   	$data['purchase']  		  = $this->shopmodel->purchase(user_id());
	    $this->load->view('page/profile_view',$data);
	}

	public function changepassword(){
	    $this->load->model('usermodel');

	    $oldpw    = $this->input->post('oldpw');
	    $newpw    = $this->input->post('newpw');

	    $session_data      = $this->session->userdata('logged_in');
	    $data['userid']    = $session_data['userid'];

	    if($session_data['userid'] == 0 || $session_data['userid'] == ''){
	        redirect('home','refresh');
	     }
	     else{
	      if($oldpw == '' || $oldpw == null){
	        $oldpw = 'x';
	      }

	      $data['checkpassword']  = $this->usermodel->checkpassword($session_data['userid'],"'".md5($oldpw)."'");
	      $checkpassword          = $this->usermodel->checkpassword($session_data['userid'],"'".md5($oldpw)."'");

	      if($checkpassword > 0){
	        $update  = $this->usermodel->ChangePassword($session_data['userid'],"'".md5($newpw)."'");
	        $this->usermodel->UpdatePassword('x',$newpw,$session_data['userid']);
	        if($update){
	          $data['response'] = '<div class="alert alert-success"> Password Successfully Updated<i class="fa fa-exclamation" aria-hidden="true"></i></div>';
	        }
	        else{
	          $data['response'] = '<div class="alert alert-danger"> Error while updating password. Please try again<i class="fa fa-exclamation" aria-hidden="true"></i></div> ';
	        }
	      }
	      else{
	        $data['response'] = '';
	      }

	      $this->load->view('page/changepassword_view',$data);
	     }
  	}

  	public function updateprofile(){
  		$this->load->model('usermodel');

	    $shipping = $this->input->post('shipping');

	    if(check_user() == '' || user_id() == ''){
	        redirect('home','refresh');
	     }

	    $return = $this->usermodel->UpdateProfile(user_id(),$shipping);
	    if($return){
	    	echo '<script>alert(" Profile Successfully Updated! ");</script>';
	    }
	    else{
	    	echo '<script>alert(" Error encounter while saving your profile. Please try again.");</script>';
	    }
	    redirect('profile','refresh');
  	}

}

?>