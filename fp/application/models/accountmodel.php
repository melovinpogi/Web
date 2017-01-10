<?php
Class Accountmodel extends CI_Model
{
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function Login($username,$password){
		return $this->db->query("select * from user where username = '$username' and password = '$password' ");
	}

	public function CheckUsername($username){
		return $this->db->query("select username from user where username = '$username'");
	}

	public function NewCustomer($data){
		$this->db->insert('user',$data);
	}

	
}