<?php
class Conductors_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get conductor by his is
    * @param int $conductor_id 
    * @return array
    */

    public function get_conductor_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('conductors');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Fetch conductors data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_conductors($bus_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('conductors.id');
		$this->db->select('conductors.conductor_number');
		$this->db->select('conductors.firstname');
		$this->db->select('conductors.lastname');
		$this->db->select('conductors.bus_id');
		$this->db->select('bus.bus_name as bus_name');
		$this->db->from('conductors');
		if($bus_id != null && $bus_id != 0){
			$this->db->where('bus_id', $bus_id);
		}
		if($search_string){
			$this->db->like('conductors.firstname', $search_string);
			$this->db->or_like("conductors.lastname",$search_string);
			$this->db->or_like("conductors.conductor_number",$search_string);
		}

		$this->db->join('bus', 'conductors.bus_id = bus.id', 'left');

		$this->db->group_by('conductors.id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('conductors.id', $order_type);
		}


		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $bus_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_conductors($bus_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('conductors');
		if($bus_id != null && $bus_id != 0){
			$this->db->where('bus_id', $bus_id);
		}
		if($search_string){
			$this->db->like('conductors.firstname', $search_string);
			$this->db->or_like("conductors.lastname",$search_string);
			$this->db->or_like("conductors.conductor_number",$search_string);
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
    function store_conductor($data)
    {
		$insert = $this->db->insert('conductors', $data);
	    return $insert;
	}

    /**
    * Update conductor
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_conductor($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('conductors', $data);
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
    * Delete conductor
    * @param int $id - conductor id
    * @return boolean
    */
	function delete_conductor($id){
		$this->db->where('id', $id);
		$this->db->delete('conductors'); 
	}
 
}
?>	
