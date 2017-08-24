<?php
session_start();
$xpath =  realpath(__DIR__ . '/../../..');
include($xpath ."/config/functions.php");

if(empty($_POST['username']) || empty($_POST['password'])){
	echo "0";
	return false;
}


$sql = "SELECT FULLNAME,USERNAME,PASSWORD FROM USERS WHERE USERNAME = '".$_POST['username']."' ";

    // run and return the query result resource
    $result = mysqli_query(conn(),$sql);
    if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    		if($row['USERNAME'] == $_POST['username'] && $row['PASSWORD'] == $_POST['password']){
	    			$_SESSION['username'] = $row['USERNAME'];
	    			$_SESSION['fullname'] = $row['FULLNAME'];
	    			echo "1";
	    		}
	    		else{
	    			echo "-1";
	    		}
	    		
	    }
	} 
	else {
	    echo "-1";
	}
