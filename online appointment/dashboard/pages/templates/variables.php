<?php
$user_id = $_SESSION['username'];
$username = $_SESSION['fullname'];



$form_employee = array(
    'employee_id' =>'',
    'fname' => '', 
    'lname' => '',
    'email' => '',
    'mobile' => ''
);

$form_service = array(
    'service_id' =>'',
    'service_description' => '',
    'service_amount' => ''
);

$form_customer = array(
    'b.fname as employee' =>'',
    'e.service_description' => '',
    'c.start_time' => '',
    'c.end_time' => '',
    'customer_appointments.fname as customer_fname' => '',
    'customer_appointments.lname as customer_lname' => '',
    'customer_appointments.email as customer_email' => '',
    'customer_appointments.mobile as customer_mobile' => '',
    'customer_appointments.customer_appointment_id as customer_appointment_id' => '',
    'customer_appointments.status as status' => ''
);


$new_appointment 	= array('count(*) as count' => '' );
$new_disapproved 	= array('count(*) as count' => '' );
$new_approved 		= array('count(*) as count' => '' );
