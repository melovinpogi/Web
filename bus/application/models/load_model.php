<?php
class Load_model extends CI_Model {
 
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
    public function get_load_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('load');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }    

    /**
    * Fetch load data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_load($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('id');
        $this->db->select('conductor');
        $this->db->select('passenger_id');
        $this->db->select('bus_no');
        $this->db->select('amount_in');
        $this->db->select('amount_out');
        $this->db->select('transaction_date');
		$this->db->from('`load`');

		if($search_string){
			$this->db->like('conductor', $search_string);
            $this->db->or_like("passenger_id",$search_string);
            $this->db->or_like("bus_no",$search_string);
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
    function count_load($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('load');
		if($search_string){
			$this->db->like('load.conductor', $search_string);
            $this->db->or_like("load.passenger_id",$search_string);
            $this->db->or_like("load.bus_no",$search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_load($data)
    {
		$insert = $this->db->insert('load', $data);
	    return $insert;
	}

    /**
    * Update load
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_load($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('load', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete loadr
    * @param int $id - load id
    * @return boolean
    */
	function delete_load($id){
		$this->db->where('id', $id);
		$this->db->delete('load'); 
	}
 
}
?>	
