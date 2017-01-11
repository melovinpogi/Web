<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS");
require_once __DIR__ . '../../core/Messenger.php';
$msg = new Messenger();
$result = $msg->Logout($_POST['userid']);
print_r($result);
