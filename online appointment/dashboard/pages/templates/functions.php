<?php
session_start();
function login(){
	if( isset($_SESSION['username']) ){
		print_r($_SESSION);
		header("Location: index");
	}
	
}

function index(){
	if( !isset($_SESSION['username']) ){
		print_r($_SESSION);
		header("Location: login");
	}
	
}

function usertype(){
	if($_SESSION['username'] !=='admin'){
		header("Location: index.html");
	}
}

$xpath =  realpath(__DIR__ . '/../../..');
include($xpath ."/config/db.php");



/************ Database Connection *************/
function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}


/******************** Select **************************/
function select($table_name, $form_data,$join='')
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    $new_table ='';

    if(	$table_name == 'count_appointment' 	|| 
    	$table_name == 'count_approved'		||
    	$table_name == 'count_disapproved'){

    	$new_table = 'customer_appointments';
    	$sql = "SELECT ".implode(',', $fields)." FROM ".$new_table. " " .$join;
    }

    elseif ($table_name == 'employee_services') {
    	$new_table = 'employee';
    	$sql = "SELECT ".implode(',', $fields)." FROM ".$new_table. " " .$join;
    }
    elseif ($table_name == 'dropdown_services') {
    	$new_table = 'service';
    	$sql = "SELECT ".implode(',', $fields)." FROM ".$new_table. " " .$join;
    }
    elseif ($table_name == 'dropdown_employee') {
    	$new_table = 'employee';
    	$sql = "SELECT ".implode(',', $fields)." FROM ".$new_table. " " .$join;
    }

    else{
    	// build the query
    	$sql = "SELECT ".implode(',', $fields)." FROM ".$table_name. " " .$join;
    }

    // run and return the query result resource
    $result = mysqli_query(conn(),$sql);

    /*echo $sql;
    return false;*/


    if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {

	    	//Employee
	    	if($table_name =='employee'){
	    		echo " <tr id='tr-row-".$row['employee_id']."'>
	    				<td><h6>".$row['employee_id']."</h6></td>
	         			<td><h6><input class='form-control employee-input-".$row['employee_id']."' 
	         					id='fname-".$row['employee_id']."' type='text' value='".$row['fname']."' disabled></h6></td>
	         			<td><h6><input class='form-control employee-input-".$row['employee_id']."' 
	         					id='lname-".$row['employee_id']."'  type='text' value='".$row['lname']."' disabled></h6></td>
	         			<td><h6><input class='form-control employee-input-".$row['employee_id']."' 
	         					id='email-".$row['employee_id']."'  type='text' value='".$row['email']."' disabled></h6></td>
	         			<td><h6><input class='form-control employee-input-".$row['employee_id']."' 
	         					id='mobile-".$row['employee_id']."'  type='text' value='".$row['mobile']."' disabled></h6></td>

	         			<td align='center'><h6><a class='btn btn-primary employee-edit employee-edit-".$row['employee_id']."' id='".$row['employee_id']."'
	         				data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Edit ".$row['fname']." '>
	         					<span class='glyphicon glyphicon-edit' ></span> </a></h6></td>
	         			<td align='center'><h6><a class='btn btn-success employee-update employee-update-".$row['employee_id']."' id='".$row['employee_id']."' disabled data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Update ".$row['fname']."'>
	         					<span class='glyphicon glyphicon-retweet'></span> </a></h6></td>
	         			<td align='center'><h6><a class='btn btn-danger employee-delete employee-delete-".$row['employee_id']."' id='".$row['employee_id']."' data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Delete ".$row['fname']."'>
	         					<span class='glyphicon glyphicon-remove'></span> </a></h6></td>
	         		</tr>";
	    	}

	    	//Services
	    	else if($table_name == 'service'){
	    		echo " <tr id='tr-row-".$row['service_id']."'>
	    				<td><h6>".$row['service_id']."</h6></td>
	         			<td style='width: 60%'><h6><input class='form-control service-input-".$row['service_id']."' 
	         					id='service-".$row['service_id']."' type='text' value='".$row['service_description']."' disabled></h6></td>
	         			<td><h6><input class='form-control service-amount-input-".$row['service_id']."' 
	         					id='service-amount-".$row['service_id']."' type='text' value='".$row['service_amount']."' disabled></h6></td>

	         			<td align='center'><h6><a class='btn btn-primary service-edit service-edit-".$row['service_id']."' id='".$row['service_id']."' data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Edit ".$row['service_description']."'>
	         					<span class='glyphicon glyphicon-edit'></span> </a></h6></td>
	         			<td align='center'><h6><a class='btn btn-success service-update service-update-".$row['service_id']."' id='".$row['service_id']."' disabled data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Update ".$row['service_description']."'>
	         					<span class='glyphicon glyphicon-retweet'></span> </a></h6></td>
	         			<td align='center'><h6><a class='btn btn-danger service-delete service-delete-".$row['service_id']."' id='".$row['service_id']."' data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Delete ".$row['service_description']."'>
	         					<span class='glyphicon glyphicon-remove'></span> </a></h6></td>
	         		</tr>";
	    	}

	    	//Customers
	    	else if($table_name == 'customer_appointments'){
	    		$status = $row['status'];
	    		$class = '';
	    		$prop = '';

	    		if($status =='A'){
	    			$class = 'class="success" ';
	    			$prop = 'disabled';
	    		}
	    		elseif ($status =='D') {
	    			$class = 'class="danger" ';
	    			$prop = 'disabled';
	    		}

	    		echo " <tr ".$class." id='tr-row-".$row['customer_appointment_id']."'>
	    				<td><h6>".$row['customer_appointment_id']."</h6></td>
	    				<td><h6>".$row['employee']."</h6></td>
	    				<td><h6>".$row['service_description']."</h6></td>
	    				<td><h6>".$row['start_time']."</h6></td>
	    				<td><h6>".$row['end_time']."</h6></td>
	    				<td><h6>".$row['customer_fname']."</h6></td>
	    				<td><h6>".$row['customer_lname']."</h6></td>
	    				<td><h6>".$row['customer_email']."</h6></td>
	    				<td><h6>".$row['customer_mobile']."</h6></td>
	         			
	         			<td align='center'><h6><a class='btn btn-success customer-approved customer-approved-".$row['customer_appointment_id']."' 
	         						id='".$row['customer_appointment_id']."' ".$prop." data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Approved ".$row['customer_fname']."'>
	         					<span class='fa fa-thumbs-up'></span></a></h6></td>
	         			<td align='center'><h6><a class='btn btn-danger customer-disapproved customer-disapproved-".$row['customer_appointment_id']."' 
	         						id='".$row['customer_appointment_id']."' ".$prop." data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Disapproved ".$row['customer_fname']."'>
	         					<span class='fa fa-thumbs-down'></span></a></h6></td>
	         		</tr>";
	    	}

	    	elseif ($table_name == 'count_appointment') {
	    		echo $row['count'];
	    	}
	    	elseif ($table_name == 'count_approved') {
	    		echo $row['count'];
	    	}
	    	elseif ($table_name == 'count_disapproved') {
	    		echo $row['count'];
	    	}
	    	elseif ($table_name == 'employee_services') {
	    		echo " 	<li class='list-group-item btn btn-default' id='".$row['employee_id']."'>
	    					<p class='text-left'>".$row['fname']." ".$row['lname']."</p>
	    				</li>";
	    	}
	    	elseif ($table_name == 'dropdown_services') {
	    		echo " <option name=". $row['service_description'] . " id=". $row['service_id'] ." value=". $row['service_id'] .">
                            ". $row['service_description']."</option>";
	    	}
	    	elseif ($table_name == 'dropdown_employee') {
	    		echo " <option name=".$row['fname']." value=". $row['employee_id'] .">
                            ".$row['fname']." ".$row['lname']."
                       </option>";
	    	}
	    }
	} 
	else {
	    echo "0 results";
	}

}

