<?php
$xpath =  realpath(__DIR__ . '/..');
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
    echo $sql;
    // run and return the query result
    return mysqli_query(conn(),$sql);
}
elseif($type =='U'){
    $sql = "UPDATE ".$table_name." SET ".$form_data." WHERE " .$where_clause;
    // run and return the query result
    echo $sql;
    return mysqli_query(conn(),$sql);

}
elseif($type =='D'){
     $sql = "DELETE FROM ".$table_name." WHERE " .$where_clause;
    // run and return the query result
     //echo $sql;
    return mysqli_query(conn(),$sql);
}

elseif($type =='S'){
     if($table_name =='user_ordersx'){
        $new_table = 'user_orders';
        $sql = "SELECT ".$form_data." FROM ".$new_table." " .$where_clause;
     }
     else{
        $sql = "SELECT ".$form_data." FROM ".$table_name." " .$where_clause;
     }

     //echo $sql;

    $result = mysqli_query(conn(),$sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($table_name =='user_orders' ){
                echo $row['quantity'];
            }
             elseif ($table_name == 'user_ordersx') {
                $total = 0;
                $payment = 0;
                $total = $row['count'] * $row['product_amount'];
                $payment = $payment + $total;
                 echo "<div class='col-sm-6 col-md-6 div-". $row['product_id'] ."''> $payment
                            <a style='cursor: pointer' >
                                <img  src='https://s3.amazonaws.com/images.ecwid.com/images/1807063/64212792.jpg' alt='...' class='img-thumbnail img-responsive'>
                            </a>
                        </div>
                        <div class='col-sm-6 col-md-6 div-". $row['product_id'] ."'>
                           <h3>" . $row['product_name'] . "</h3>
                           <h5>Quantity: <input style='width: 50%;' class='form-control text-center' id='input-" . $row['product_id'] . "'
                                            type='number' value='" . $row['count'] . "'></h5>
                           <h5>Price: <span id='price-" . $row['product_id'] . "'>". $row['product_amount'] . "</span></h5>
                           <h5 id='total-" . $row['product_id'] . "'>Total: " . $total . "</h5>
                           <h6><a id='update-". $row['product_id'] ."' style='cursor:pointer'
                                class='btn btn-warning btn-xs' role='button'><span class='glyphicon glyphicon-refresh'></span> Update Cart</a></h6>
                           <h6><a id='remove-". $row['product_id'] ."' style='cursor:pointer'
                                class='btn btn-danger btn-xs' role='button'><span class='glyphicon glyphicon-remove'></span> Remove to Cart</a></h6>
                        </div>
                        <div class='clearfix'></div><br>";
            }
        }
    }
     else{
            echo "<b>0 result.</b>";
        }

}
