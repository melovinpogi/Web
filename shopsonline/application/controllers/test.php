<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Test extends CI_CONTROLLER{

	public function __construct(){
		parent::__construct();

		echo "this is construct or the text header of the page <br>";
	}

	public function index(){

		echo "this is index";
		
	}


	public function one($param1,$param2){

		echo "test only <br>";
		echo "paramenters are: $param1, $param2";
	}

	public function two(){

		echo "this is two";
	}

}

?>