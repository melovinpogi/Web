<?php
header('Access-Control-Allow-Origin:  {$_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]}');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
class Sync extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{

			
 	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }

    	 $postdata = file_get_contents("php://input");
		 if (isset($postdata)) {
		 $request = json_decode($postdata);
		 
		 
		 if($request->type =='bus_transaction'){
            $input = array(
            			'id' => null,
            			'conductor' => $request->conductor,
                        'passenger_id' => $request->passenger_id,
                        'long' => $request->long,
                        'lat' => $request->lat,
                        'transaction_date' => date("Y-m-d H:i:s"),
                        'trans' => $request->transaction,
                        'location' => $request->location,
                        'bus_no' => $request->bus
                        );
            $this->db->insert('bus_transaction',$input);
            $num_inserts = $this->db->affected_rows();
            if ($num_inserts > 0) {
                echo "success";
            }else{
                echo "failed";
            }
		}

		if($request->type =='load'){
            $input = array(
            			'id' => null,
            			'conductor' => $request->conductor,
                        'passenger_id' => $request->passenger_id,
                        'bus_no' => $request->bus_no,
                        'amount_in' =>$request->amount_in,
                        'amount_out' =>$request->amount_out,
                        'bus_transaction_id' =>$request->bus_transaction_id,
                        'transaction_date' =>date("Y-m-d H:i:s"),
                        'trans_no' =>$request->trans_no,
                        );
            $this->db->insert('load',$input);
            $num_inserts = $this->db->affected_rows();
            if ($num_inserts > 0) {
                echo "success";
            }else{
                echo "failed";
            }
		}

		if($request->type =='payment'){
            $input = array(
            			'id' => null,
            			'conductor' => $request->conductor,
                        'passenger_id' => $request->passenger_id,
                        'long1' => $request->long1,
                        'lat1' => $request->lat1,
                        'long2' => $request->long2,
                        'lat2' => $request->lat2,
                        'transaction_date' => date("Y-m-d H:i:s"),
                        'location1' => $request->location1,
                        'location2' => $request->location2,
                        'fare' => $request->fare,
                        'km' => $request->km,
                        'bus_no' => $request->bus_no,
                        'type' => $request->xtype
                        );
            $this->db->insert('payment',$input);
            $num_inserts = $this->db->affected_rows();
            if ($num_inserts > 0) {
                echo "success";
            }else{
                echo "failed";
            }
		}

		//echo $username;
	}
}
}