<?php
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/db.php");



/************ Database Connection *************/
function conn(){
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD,DATABASE);
	return $conn;
}


/******************** Select **************************/
function select($table_name, $form_data,$limit='',$type='',$join='')
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);
    $new_table = '';
    $total = 0;
    $count = 0;

    if($table_name == 'count_cart' || $table_name == 'total_price' || $table_name == 'total_product'){
        $new_table = 'user_orders';
        $sql = "SELECT ".implode(',', $fields)." FROM ".$new_table." " .$join. " " .$limit;
        //echo $sql;
    }
    elseif($table_name == 'orders' || $table_name == 'payment'){
        $new_table = 'user_orders';
        $sql = "SELECT ".implode(',', $fields)." FROM ".$new_table." " .$join. " " .$limit;

    }
    elseif($table_name == 'count_wishlist'){
        $new_table = 'user_wishlist';
        $sql = "SELECT ".implode(',', $fields)." FROM ".$new_table." " .$join. " " .$limit;
        //echo $sql;
    }
    elseif($table_name == 'count_wishlist'){
        $new_table = 'user_wishlist';
        $sql = "SELECT ".implode(',', $fields)." FROM ".$new_table." " .$join. " " .$limit;
        //echo $sql;
    }
     elseif($table_name == 'user_wishlist'){
        $sql = "SELECT ".implode(',', $fields)." FROM ".$table_name." " .$join. " " .$limit;
        //echo $sql;
    }
    else{
        // build the query
        $sql = "SELECT `".implode('`,`', $fields)."` FROM ".$table_name." " .$join. " " .$limit;

    }
    // run and return the query result resource
    $result = mysqli_query(conn(),$sql);

    if($table_name =='payment'){
        echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="cart" id="form-payment" >
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="upload" value="1">
                        <input type="hidden" name="business" value="salon.360.ph@gmail.com">';
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $total = $row['count'] * $row['product_amount'];
                $count = $count + 1;
                echo '<input type="hidden" name="item_name_'. $count .'" value="'.$row['product_name'].'">
                      <input type="hidden" name="amount_'. $count .'" value="'.$row['product_amount'].'">
                      <input type="hidden" name="quantity_'. $count .'" value="'.$row['count'].'"> ';
            }
        }

        echo ' <input type="hidden" name="email" value="">
                        <input type="hidden" name="night_phone_a" id="night_phone_a" value="">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="currency_code" value="PHP">
                        <input type="hidden" name="lc" value="PH"/>
                      <input type="image" class="reload"
                        src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_paynow_cc_144x47.png" alt="Check out with PayPal"/>
                    </form>';
          return;
    }


    if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if($type == 'DROPDOWN' && $table_name =='employee'){
	    		echo " <option name=". $row['fname'] . " id=". $row['employee_id'] ." value=". $row['employee_id'] .">
                            ". $row['fname'] . " " . $row['lname'] . "</option>";
	    	}
            elseif ($table_name == 'product_category') {
                echo "<div class='col-sm-4 col-md-4 product-category'  >
                            <a style='cursor: pointer' id=".$row['product_category_id']. " >
                                <img  src='https://s3.amazonaws.com/images.ecwid.com/images/1807063/64480923.jpg' alt='...' class='img-thumbnail img-responsive'>
                            </a><h5>" . $row['product_category_name'] . "</h5>
                        </div>";
            }
            elseif ($table_name == 'count_cart') {
                if($row['count'] == 0){
                    return;
                }
                echo "<span class='badge fa fa-shopping-cart'> ".$row['count']." </span>";
            }
            elseif ($table_name == 'orders') {
                $total = $row['count'] * $row['product_amount'];
								$payment = 0;
								$payment .= $payment + $total;
                 echo "<div class='col-sm-6 col-md-6 div-". $row['product_id'] ."'>
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
            elseif ($table_name == 'count_wishlist') {
                if($row['count'] == 0){
                    return;
                }
                echo "<span class='badge fa fa-star'> ".$row['count']." </span>";
            }

            elseif ($table_name == 'user_wishlist') {
                $total = $row['count'] * $row['product_amount'];
                 echo "<div class='col-sm-6 col-md-6 div-". $row['user_wishlist_id'] ."'>
                            <a style='cursor: pointer' >
                                <img  src='https://s3.amazonaws.com/images.ecwid.com/images/1807063/64212792.jpg' alt='...' class='img-thumbnail img-responsive'>
                            </a>
                        </div>
                        <div class='col-sm-6 col-md-6'>
                            <div class='div-". $row['user_wishlist_id'] ."'>
                               <h3>" . $row['product_name'] . "</h3>
                               <h5>Quantity: <input style='width: 50%;' class='form-control text-center' id='input-" . $row['product_id'] . "'
                                                type='number' value='" . $row['count'] . "'></h5>
                               <h5>Price: <span id='price-" . $row['product_id'] . "'>". $row['product_amount'] . "</span></h5>
                               <h5 id='total-" . $row['product_id'] . "'>Total: " . $total . "</h5>
                               <h6><a id='update-". $row['product_id'] ."' style='cursor:pointer'
                                    class='btn btn-warning btn-xs' role='button'><span class='glyphicon glyphicon-refresh'></span> Update Wishlist</a></h6>
                                <h6><a id='wishlist-". $row['product_id'] ."' style='cursor:pointer'
                                    class='btn btn-primary btn-xs' role='button'><span class='fa fa-shopping-cart'></span> Buy Wishlist</a></h6>
                               <h6><a id='remove-". $row['product_id'] ."' style='cursor:pointer'
                                    class='btn btn-danger btn-xs' role='button'><span class='glyphicon glyphicon-remove'></span> Remove to Wishlist</a></h6>
                            </div>
                        </div>
                        <div class='clearfix'></div><br>";
            }
             elseif ($table_name == 'total_price') {
                if($row['count'] == 0){
                    return;
                }
                echo $row['count'];
            }

            elseif ($table_name == 'total_product') {
                echo $row['product_name'] . " - " .$row['count']. " <br> ";
            }

            elseif ($table_name == 'comments') {
                    $rate = $row['rate'];
                    $star = '';
                    if($rate == 1){
                        $star = '<span class="glyphicon glyphicon-star"></span>';
                    }

                    if($rate == 2){
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                    }

                    if($rate == 3){
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                    }

                    if($rate == 4){
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                    }

                    if($rate == 5){
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                        $star .= '<span class="glyphicon glyphicon-star"></span>';
                    }

                echo $row['customer_name'] . " " . $star . " <br>";
                echo $row['comment'] . "<br><br>";
            }
	    }
	}
	else {
	    echo "0 results";
	}


}






/************************************************** Insert - Update - Delete **************************************************/
function insert($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    // run and return the query result resource
    return mysqli_query(conn(),$sql);
}


// the where clause is left optional incase the user wants to delete every row!
function delete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;

    // run and return the query result resource
    return mysqli_query(conn(),$sql);
}


// again where clause is left optional
function update($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;

    // run and return the query result
    return mysqli_query(conn(),$sql);
}
