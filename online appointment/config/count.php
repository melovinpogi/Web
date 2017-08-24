<?php
include("db.php");

function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}

$username = $_POST["username"];

$query = "select count(*) as count from users where username = '" .$username."'";


$result = mysqli_query(conn(),$query);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        		$count = $row["count"];

        		if($count > 0){
        			echo 1;
        		}
        		else{
        			echo 0;
        		}
        	}
        }
