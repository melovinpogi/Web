<?php
$xpath =  realpath(__DIR__ . '/../../..');
include($xpath ."/config/functions.php");


if(empty($_POST['table_name']) || empty($_POST['form']) || empty($_POST['where'])){
    echo "Incomplete Parameters!.";
    return false;
}

$table_name     = $_POST['table_name'];
$form_data      = $_POST['form'];
$where_clause   = $_POST['where'];

// check for optional where clause
// start the actual SQL statement
$sql = "UPDATE ".$table_name." SET ".$form_data." WHERE " .$where_clause;
echo $sql;

// run and return the query result
return mysqli_query(conn(),$sql);

