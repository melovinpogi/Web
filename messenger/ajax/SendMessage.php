<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS");
@session_start();
if (isset($_POST['msg'])) {
	require_once __DIR__ . '../../core/Messenger.php';
	$msg = new Messenger();
	$result = $msg->SendMessage($_POST['userfrom'],$_POST['userto'],$_POST['msg']);
}