<?php
session_start();
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/db.php");
include($xpath ."/config/variables.php");

/************ Database Connection *************/


if(empty($_POST['table_id']) || empty($_POST['table_name'])) {
	echo "<b>No arguments Provided!</b>";
	return false;
 }

function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}

$table_id 	= $_POST['table_id'];
$table_name = $_POST['table_name'];

if($table_name =='employee_services'){


 $sql = "SELECT 0 as SERVICE_ID ,'-- Select Service --' as SERVICE_DESCRIPTION , 0 as SERVICE_AMOUNT
 			union all 
 		SELECT C.SERVICE_ID,C.SERVICE_DESCRIPTION,C.SERVICE_AMOUNT 
 		FROM EMPLOYEE_SERVICES A 
 		INNER JOIN EMPLOYEE B ON B.EMPLOYEE_ID = A.EMPLOYEE_ID 
 		INNER JOIN SERVICE C ON C.SERVICE_ID = A.SERVICE_ID 
 		WHERE A.EMPLOYEE_ID = '".$table_id."'";

}

elseif ($table_name == 'products') {
	$sql = "SELECT 	product_id,
					product_name,
					product_description,
					product_amount,
					product_category_id,
					(SELECT COUNT( * ) FROM user_wishlist AS x WHERE x.product_id = PRODUCTS.product_id) as wishlist
			FROM 	PRODUCTS
			WHERE 	product_category_id = '".$table_id."'";
}
 // run and return the query result resource
  $result = mysqli_query(conn(),$sql);
  //echo $sql;

 if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if($table_name == 'employee_services'){
	              echo "<option name=".$row['SERVICE_ID']." id=".$row['SERVICE_ID']." value=". $row['SERVICE_ID'] .">
                            ".$row['SERVICE_DESCRIPTION']."</option>";

            }
             elseif ($table_name == 'products') {
             	$wishlist = $row['wishlist'];
             	$disabled = '';
             	$class = 'glyphicon-star-empty';
             	if($wishlist > 0){
             		$disabled = 'disabled';
             		$class = 'glyphicon-star';
             	}


                echo "<div class='col-sm-4 col-md-4 product-list' > 
                            <a style='cursor:pointer' >
                                <img  src='https://s3.amazonaws.com/images.ecwid.com/images/1807063/64212792.jpg' alt='...' class='img-thumbnail img-responsive'>
                            </a>
                            <h5><small>".$row['product_name']. " - ₱".$row['product_amount']. "</small></h5>
                            <h6><small>".$row['product_description']. "</small></h6>";


                        if($username !== ''){
                echo "      <button class='btn btn-primary' id='product-".$row['product_id']. "' >
                            	<small>Add to Cart</small> <span class='fa fa-shopping-cart'></span>
                            </button>
                            <button class='btn btn-primary' id='wishlist-".$row['product_id']. "' >
                            	<small>Wishlist</small> <span class='icon glyphicon ".$class."' ></span>
                            </button>
                            <br><br>";
                        }
                echo" </div>";
            }
	    }
}
else {
    echo "0 results";
}
