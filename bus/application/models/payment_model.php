<?php
class Payment_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_payment_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }    

    /**
    * Fetch bus data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_payment($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('payment');

		if($search_string){
			$this->db->like('conductor', $search_string);
            $this->db->or_like('passenger_id', $search_string);
            $this->db->or_like('transaction_date', $search_string);
            $this->db->or_like('location1', $search_string);
            $this->db->or_like('location2', $search_string);
            $this->db->or_like('fare', $search_string);
            $this->db->or_like('km', $search_string);
            $this->db->or_like('bus_no', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_payment($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('payment');
		if($search_string){
			$this->db->like('conductor', $search_string);
            $this->db->or_like('passenger_id', $search_string);
            $this->db->or_like('transaction_date', $search_string);
            $this->db->or_like('location1', $search_string);
            $this->db->or_like('location2', $search_string);
            $this->db->or_like('fare', $search_string);
            $this->db->or_like('km', $search_string);
            $this->db->or_like('bus_no', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

   
 
}
?>	
