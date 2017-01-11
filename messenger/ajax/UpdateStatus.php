<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS");
@session_start();
if (isset($_POST['userfrom'])) {
	require_once __DIR__ . '../../core/Messenger.php';
	$userfrom = new Messenger();
	$result = $userfrom->UpdateStatus($_POST['userfrom']);
}