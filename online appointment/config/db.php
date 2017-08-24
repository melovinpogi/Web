<?php
	$xpath =  realpath(__DIR__ . '/..');
	include($xpath ."/constants.php");

	$connection = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
		return false;
	}
	else{
		return true;
	}



