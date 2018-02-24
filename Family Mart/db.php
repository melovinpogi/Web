<?php
	define(SERVER, "localhost");
	define(USER, "familyma_admin");
	define(PASSWORD, "Admin2017!@#$");
	define(DB, "familyma_admin");

	$connection = mysqli_connect(SERVER, USER, PASSWORD,DB);
	if(!$connection){
		die("Connection failed: " . mysqli_connect_error());
		return false;
	}
	else{
		return true;
	}

?>