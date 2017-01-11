<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS");

if (isset($_POST['userto'])) {
	require_once __DIR__ . '../../core/Messenger.php';
	$r = new Messenger();
	//$result = $r->Conversation($_SESSION['user_id'],$_POST['userto']);
	print_r( $r->Conversation($_POST['userfrom'],$_POST['userto']) ); 
}