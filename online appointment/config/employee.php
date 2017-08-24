<?php
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/db.php");

function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}

$sql = "SELECT employee_id, fname,lname	 FROM  employee";

$result = mysqli_query(conn(),$sql);

$return = '';
if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            		$return .= " <option name=". $row['fname'] . " id=". $row['employee_id'] ." value=". $row['employee_id'] .">
                            ". $row['fname'] . " " . $row['lname'] . "</option>";
            	}
            }