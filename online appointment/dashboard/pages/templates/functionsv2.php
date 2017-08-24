<?php
$xpath =  realpath(__DIR__ . '/../../..');
include($xpath ."/config/functions.php");


if(empty($_POST['table_name']) || empty($_POST['form']) || empty($_POST['where']) || empty($_POST['type']) ){
    echo "Incomplete Parameters!";
    return false;
}

if(empty($_POST['sql'])){
    $_POST['sql'] = '';
}

$table_name         = $_POST['table_name'];
$form_data          = $_POST['form'];
$where_clause       = $_POST['where'];
$type               = $_POST['type'];
$select             = $_POST['sql'];
$dropdown_schedule  = '';
$new_table          = '';



// check for optional where clause
// start the actual SQL statement
if($type=='I'){
	$sql = "INSERT INTO ".$table_name." (".$form_data.") SELECT ".$where_clause." ";
    //echo $sql;
    // run and return the query result
    return mysqli_query(conn(),$sql);
}
elseif($type =='U'){
    $sql = "UPDATE ".$table_name." SET ".$form_data." WHERE " .$where_clause;
    // run and return the query result
    //echo $sql;
    return mysqli_query(conn(),$sql);

}
elseif($type =='D'){
     $sql = "DELETE FROM ".$table_name." WHERE " .$where_clause;
    // run and return the query result
     echo $sql;
    return mysqli_query(conn(),$sql);
}

elseif($type =='S'){
     $sql = "SELECT ".$form_data." FROM ".$table_name." " .$where_clause;

     if($table_name =='employee_services_schedule' && $select == ''){
        $new_table = 'employee_services';
        $sql = "SELECT ".$form_data." FROM ".$new_table." " .$where_clause;
        //echo $sql;
     }
     elseif ($table_name =='employee_services_schedule' && $select != '') {
        $new_table = 'employee_schedule';
        $sql = "SELECT ".$form_data." FROM ".$new_table." " .$select;
        //echo $sql;
     }
   

    //Dropdown Schedule
    if($table_name =='employee_schedule'){
        
        // run and return the query result
        $resultx = mysqli_query(conn(),$select);

        $dropdown_schedule = "<select class='schedule-dropdown selectpicker show-tick form-control' style='display:none;'
                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Select Service for Employee'> ";
        if ($resultx->num_rows > 0) {
            while($rowx = $resultx->fetch_assoc()) {
                $dropdown_schedule .= " <option name=". $rowx['service_description'] . " id=". $rowx['service_id'] ." value=". $rowx['service_id'] .">
                                        ". $rowx['service_description']."</option>";
            }
        }

    }
    $dropdown_schedule .= "</select>";

    $result = mysqli_query(conn(),$sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($table_name =='employee_services'){
                echo "<li id=".$row['employee_services_id']."  class='list-group-item'> 
                        <a href='#' class='btn btn-danger delete-submit-field btn-xs' data-toggle='tooltip' rel='tooltip' 
                            data-placement='left' data-original-title='Delete'> 
                        <span class='glyphicon glyphicon-remove'></span></a>  ".$row['service_description']."  </li>";
            }
            elseif($table_name =='employee_schedule'){
                 echo " <tr id=".$row['employee_schedule_id']."> 
                            <td><input type='text' value='".$row['service_description']."' class='form-control' 
                                id='schedule-employee-".$row['employee_schedule_id']."' disabled>
                                ".$dropdown_schedule."
                            </td>
                            <td><input type='date' value='".$row['sdate']."' class='form-control text-center sched' 
                                id='schedule-sdate-".$row['employee_schedule_id']."' disabled></td>
                            <td><input type='time' value='".$row['stime']."' class='form-control text-center' 
                                id='schedule-stime-".$row['employee_schedule_id']."' disabled></td>
                            <td><input type='time' value='".$row['etime']."' class='form-control text-center' 
                                id='schedule-etime-".$row['employee_schedule_id']."' disabled></td>

                            <td class='text-center'><a href='#' class='btn btn-primary schedule-edit' id='schedule-edit-".$row['employee_schedule_id']."' 
                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Edit'> 
                            <span class='glyphicon glyphicon-edit'></span></a>  </td>
                            <td class='text-center'><a href='#' class='btn btn-success schedule-update' id='schedule-update-".$row['employee_schedule_id']."' 
                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Update' disabled> 
                            <span class='glyphicon glyphicon-retweet'></span></a>  </td>
                            <td class='text-center'><a href='#' class='btn btn-danger schedule-delete' id='schedule-delete-".$row['employee_schedule_id']."'
                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Delete'> 
                            <span class='glyphicon glyphicon-remove'></span></a>  </td>
                        </tr>";
            }
            elseif($table_name =='employee_services_schedule'){
                echo $row['count'];
            }
        }
    }
     else{
            echo "<b>0 result.</b>";
        }

}

