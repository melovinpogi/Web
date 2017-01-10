<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  var $data;

function __construct()
 {
   parent::__construct();
   $this->load->view('base');
   $this->load->view('functions');
 }

  public function index() {
    if(check_user() == '' || user_id() == ''){
      $data['return'] = '';
      $this->load->view('form/login_view',$data);
    }
    else{
      $this->load->model("itemlistmodel");
      $data['dining'] = $this->itemlistmodel->ItemDisplayHome(1);
      $data['living'] = $this->itemlistmodel->ItemDisplayHome(2);
      $data['giving'] = $this->itemlistmodel->ItemDisplayHome(3);

      $this->load->view('home_view',$data);
    }
  }

   function promos(){
        $this->load->model('leftpanelmodel');
        $this->load->model('itemlistmodel');

        $id = $this->uri->segment(2);
        $calendar = $this->uri->segment(3);

        $data['promos']   = $this->leftpanelmodel->PromoList("'W'");
        $data['promosm']  = $this->leftpanelmodel->PromoList("'M'");
        //$data['item']     = $this->itemlistmodel->ItemList($id,$calendar);
        $data['category'] = $this->itemlistmodel->promo_cat($id,$calendar);

         $session_data = $this->session->userdata('logged_in');
         $data['username']  = $session_data['username'];
         $data['userid']    = $session_data['userid'];
         $data['useremail'] = $session_data['useremail'];

        if($session_data['userid'] == 0 || $session_data['userid'] == ''){
          $session_data['userid'] = 0;
        }

         $data['cartcount'] = $this->itemlistmodel->countCart($session_data['userid']);

        $this->load->view('home_view',$data);
   }


   function item(){
      $this->load->model('itemlistmodel');

      $session_data = $this->session->userdata('logged_in');
      $data['username']  = $session_data['username'];
      $data['userid']    = $session_data['userid'];
      $data['useremail'] = $session_data['useremail'];

      if($session_data['userid'] == 0 || $session_data['userid'] == ''){
        $session_data['userid'] = 0;
      }
     
      $id       = $this->uri->segment(2);
      $itemname = $this->uri->segment(3);
      $status   = $this->uri->segment(4);

      $data['item']         = $this->itemlistmodel->ItemList($id);
      $data['itemtitle']    = $this->itemlistmodel->itemname($id,"'t'");
      $data['itemdesc']     = $this->itemlistmodel->itemname($id,"'d'");
      $data['itemprice']    = $this->itemlistmodel->itemprice($id);
      $data['composition']  = $this->itemlistmodel->itemComposition($id,$session_data['userid']);

    

     $data['cartcount'] = $this->itemlistmodel->countCart($session_data['userid']);

      if($status == 'getproduct'){
          $result       = $this->itemlistmodel->insertCart($session_data['userid'],$id);
          if($result){
            $data['response'] = 'Success';
          }
          else{
            $data['response'] = 'Error';
          }
      }
      else{
          $data['response'] = '';
      }


      $this->load->view('itemlist_view',$data);
  }

  public function verifycode(){
    $code     = $this->uri->segment(2);
    $this->load->model('registermodel');
    $this->registermodel->verifyCode("'".$code."'"); 


    $count   = $this->registermodel->checkCode("'".$code."'"); 
      if( $count >0 ){
        echo "<script>alert('Account Successfully Activated!')</script>";
      }
      else{
        echo "<script>alert('Account Activation Error!')</script>";
        echo "<script>alert('Please Contact ICT department!')</script>";
      }
      redirect("home","refresh");
    }


    public function contactus(){
     if(check_user() == '' || user_id() == ''){
        $data['return'] = '';
        $this->load->view('form/login_view',$data);
      }
      else{
        $this->load->view('page/contactus_view');
      }
    }

    public function helpcenter(){
     if(check_user() == '' || user_id() == ''){
        $this->load->view('form/login_view');
      }
      else{
        $this->load->view('page/helpcenter_view');
      }
    }

    public function sendcontact(){
       $message    = $this->input->post('message');

       if($message != ''){
          $this->load->model('usermodel');
          $result = $this->usermodel->SendMessage(user_id(),$message);
          if($result){
            echo "<script>alert('Message Successfully Sent!');</script>";
          }
          else{
            echo "<script>alert('Message error!');</script>";
          }
          redirect('home/contactus','refresh');
       }
    }


}

?>