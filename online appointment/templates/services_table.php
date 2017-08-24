<?php
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/db.php");

/************ Database Connection *************/


if(empty($_POST['employee_id']) || empty($_POST['service1']) /*|| empty($_POST['service2']) || empty($_POST['service3'])*/ || empty($_POST['schedule']) ){
	echo "<b>No arguments Provided!</b>";
	return;
   }

 if( empty($_POST['service2']) ){
 	$_POST['service2'] = 0;
 }
 elseif ( empty($_POST['service3']) ) {
 	$_POST['service3'] = 0;
 }

function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}

$employee_id 	= $_POST['employee_id'];
$service1 		= $_POST['service1'];
$service2 		= $_POST['service2'];
$service3 		= $_POST['service3'];
$schedule 		= $_POST['schedule'];


 $sql = "SELECT A.EMPLOYEE_SCHEDULE_ID,
 				B.FNAME AS EMPLOYEE,
 				C.SERVICE_DESCRIPTION ,
 				A.START_TIME,
 				A.END_TIME,
 				A.SERVICE_ID,
 				C.SERVICE_AMOUNT

 		FROM 	EMPLOYEE_SCHEDULE A 

 				INNER JOIN EMPLOYEE B ON 
 				B.EMPLOYEE_ID = A.EMPLOYEE_ID 

 				INNER JOIN SERVICE C ON 
 				C.SERVICE_ID = A.SERVICE_ID 

 		WHERE 	A.EMPLOYEE_ID = '".$employee_id."'
 				AND C.SERVICE_ID IN ('".$service1."','".$service2."','".$service3."')
 				AND '".$schedule."' BETWEEN DATE_FORMAT(A.START_TIME, '%Y-%m-%d') AND DATE_FORMAT(A.END_TIME, '%Y-%m-%d')
 				AND A.EMPLOYEE_SCHEDULE_ID NOT IN (SELECT X.EMPLOYEE_SCHEDULE_ID FROM CUSTOMER_APPOINTMENTS AS X)

 		ORDER BY C.SERVICE_DESCRIPTION";

//AND DATE_FORMAT(A.START_TIME, '%Y-%m-%d') = '".$schedule."'
//AND DATE_FORMAT(A.END_TIME, '%Y-%m-%d') = '".$schedule."'  				

 // run and return the query result resource
  $result = mysqli_query(conn(),$sql);
  //echo $sql;

 if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if($table_name ='employee_services'){
	             echo " <tr>
	             			<th scope='row'><h6>".$row['EMPLOYEE_SCHEDULE_ID']."</h6></th>
	             			<td><h6>".$row['EMPLOYEE']."</h6></td>
	             			<td><h6>".$row['SERVICE_DESCRIPTION']."</h6></td>
	             			<td><h6>".$row['START_TIME']."</h6></td>
	             			<td><h6>".$row['END_TIME']."</h6></td>
	             			<td><h6>".$row['SERVICE_AMOUNT']."</h6></td>
	             			<td><input type='radio' id='".$row['EMPLOYEE_SCHEDULE_ID']."' name='".$row['SERVICE_ID']."'></td>
	             		</tr>";
            }
	    }
}
else {
    echo "<b>0 results</b>";
}
