<?php
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/db.php");

/************ Database Connection *************/


if(empty($_POST['employee_id']) || empty($_POST['services']) || empty($_POST['query_type'])){
	echo "<b>No arguments Provided!</b>";
	return;
}
elseif(empty($_POST['request'])){
	$_POST['request'] = '';
  }

function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}

$employee_id 	= $_POST['employee_id'];
$services 		= $_POST['services'];
$request 		= $_POST['request'];
$query_type 	= $_POST['query_type'];
$fname 			= $_POST['fname'];
$lname 			= $_POST['lname'];
$email 			= $_POST['email'];
$mobile 		= $_POST['mobile'];

if($query_type == 'S'){
	$sql = "SELECT A.EMPLOYEE_SCHEDULE_ID,
	 				B.FNAME AS EMPLOYEE,
	 				C.SERVICE_DESCRIPTION ,
	 				A.START_TIME,
	 				A.END_TIME

	 		FROM 	EMPLOYEE_SCHEDULE A 

	 				INNER JOIN EMPLOYEE B ON 
	 				B.EMPLOYEE_ID = A.EMPLOYEE_ID 

	 				INNER JOIN SERVICE C ON 
	 				C.SERVICE_ID = A.SERVICE_ID

	 				LEFT OUTER JOIN customer_appointments D ON
	 				D.EMPLOYEE_SCHEDULE_ID = A.EMPLOYEE_SCHEDULE_ID 

	 		WHERE 	A.EMPLOYEE_ID = '".$employee_id."'
	 				AND A.EMPLOYEE_SCHEDULE_ID IN (".$services.")";

	 // run and return the query result resource
	  $result = mysqli_query(conn(),$sql);

	 if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
	         echo " <tr>
	         			<th scope='row'><h6>".$row['EMPLOYEE_SCHEDULE_ID']."</h6></th>
	         			<td><h6>".$row['EMPLOYEE']."</h6></td>
	         			<td><h6>".$row['SERVICE_DESCRIPTION']."</h6></td>
	         			<td><h6>".$row['START_TIME']."</h6></td>
	         			<td><h6>".$row['END_TIME']."</h6></td>
	         		</tr>";
		    }
	}
	else {
	    echo "<b>0 results</b>";
	}

}


elseif($query_type == 'I'){
	$service = explode(",", $services);
	for($i = 0; $i < count($service); $i++){
		$sql = "INSERT INTO customer_appointments(employee_schedule_id,employee_id,customer_request,fname,lname,email,mobile) 
				SELECT ".$service[$i].",".$employee_id.",'".$request."' ,'".$fname."' ,'".$lname."' ,'".$email."' ,'".$mobile."'";
		$result = mysqli_query(conn(),$sql);
		if(!$result){
			echo "<div class='alert alert-danger'>". mysqli_error(conn())."</div>";
		}
	}
}