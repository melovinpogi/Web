<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS"); 
require_once __DIR__ . '../../core/Messenger.php';
$msg = new Messenger();
$result = $msg->AllUsers($_POST['userid']);


$r = array();
foreach ($result as $key) {
	 $r = array('user_id' => $key['user_id'],
				'userid' => $key['userid'],
				'username' => $key['username'],
				'loggedin' => $key['loggedin']);
}

print_r(json_encode($r));