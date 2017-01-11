<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/account
	 *	- or -  
	 * 		http://example.com/index.php/account/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/account/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
	   	$this->load->view('base');
	}

	public function index(){
		$this->load->view('home_view');
	}


	public function Login(){
		$this->load->model('Accountmodel');		

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$exists = $this->Accountmodel->Login($username,$password)->num_rows();
		if($exists > 0){
			$result = $this->Accountmodel->Login($username,$password)->result();

			foreach ($result as $key) {
				$userid   = $key->id;
				$usertype = $key->usertype_id;
				$email    = $key->email_address;
				$mobile   = $key->mobile;
				$firstname= $key->firstname;
				$lastname = $key->lastname;
			}
			
			$userdata = array(
		        'userid'  => $userid,
		        'email'   => $email,
		        'usertype'=> $usertype,
		        'mobile'  => $mobile,
		        'firstname'=>$firstname,
		        'lastname'=>$lastname
			);	

			$this->session->set_userdata('logged_in',$userdata);
			redirect('home', 'refresh');
		}else{
			$data['err'] = '<div class="alert alert-danger alert-dismissible fade in" role="alert">';
			$data['err'] .=  '<strong><i class="fa fa-times-circle"></i> Invalid Username/Password</strong>'; 
			$data['err'] .='</div>';

			$this->load->view('login_view',$data);
		}
		
	}

	public function Logout(){
		$array_items = array('userid' => 0, 
							'email' => '',
							'usertype' => 0,
							'mobile' => '',
							'firstname' => '',
							'lastname' => ''
						);
      	$this->session->unset_userdata($array_items);
      	$this->session->sess_destroy();
      	redirect('home', 'refresh');
	}

	public function Register(){
		$this->load->model('Accountmodel');	
		$newcustomer = array('firstname' 		=> $this->input->post('firstname') , 
								'lastname' 		=> $this->input->post('lastname'),
								'email_address' => $this->input->post('email'),
								'mobile' 		=> $this->input->post('mobile'),
								'home_address' 	=> $this->input->post('homeaddress'),
								'shipping_address'=> $this->input->post('shippingaddress'),
								'username' 		=> $this->input->post('rusername'),
								'password' 		=> $this->input->post('rpassword'),
								'usertype_id'	=> 2
							);

		$checkusername = $this->Accountmodel->CheckUsername($this->input->post('rusername'))->num_rows();
		if($checkusername == 0){
			$result = $this->Accountmodel->NewCustomer($newcustomer);
			//if($result){
				echo "<script>alert('Registration Success!');</script>";
				$config = Array(
			      'protocol' => 'smtp',
			      'smtp_host' => 'ssl://smtp.gmail.com',
			      'smtp_port' => 465,
			      'smtp_user' => 'fashionprincess2k16@gmail.com',
			      'smtp_pass' => 'fashionprincess2016',
			    );


			    $this->load->library('email', $config);
			    $this->email->set_newline("\r\n");

			    $this->email->from('fashionprincess2k16@gmail.com', 'FashionPrincess');
			    $this->email->to($this->input->post('email'));


			    $this->email->subject('Account Activation');
			    $this->email->message('Test');

			     if($this->email->send()){
			     echo '<script>alert("Email Activation was sent.");</script>';
			     }
			     else{
			     show_error($this->email->print_debugger());
			     }
				redirect('account','refresh');

			//}else{
				//echo "<script>alert('Registration Failed!');</script>";
				//redirect('account','refresh');
			//}

		}else{
			echo "<script>alert('Username already exists!');</script>";
			redirect('account','refresh');
		}
	}

}

/* End of file account.php */
/* Location: ./application/controllers/account.php */