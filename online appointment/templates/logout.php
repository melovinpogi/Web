<?php  
$xpath =  realpath(__DIR__ . '/../..');
$path = $xpath ."/pages/login.php";
session_start();  
session_unset();
session_destroy();
header("Location: ../");
 ?>  
 

