<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
	header("Access-Control-Allow-Methods' : 'POST, GET, OPTIONS, PUT");
	header("Content-Type': 'application/json");
	header("Accept': 'application/json");

	$connection = mysqli_connect("localhost", "root", "","bus");
	//$connection = mysqli_connect("wiser2share.com", "wisertwo_meload", "y_(tE2`+.Dww}","wisertwo_bataantransit");
	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
		return false;
	}
	else{
	$json = $_POST['update'];
	$result = json_decode($json, true);
  	print_r($result);        // Dump all data of the Array
  	//echo $someArray[0]["name"]; // Access Array data


	}


?>
