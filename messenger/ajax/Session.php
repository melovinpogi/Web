<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : GET, OPTIONS");
@session_start();
$user_id = isset($_SESSION['username']) ? $_SESSION['user_id'] : 0;

print_r($user_id);