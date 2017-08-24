<?php

if(empty($_SESSION['username'])){
    $user_id = '';
    $username = '';
    $id     = '';
}
else {
    $user_id    = $_SESSION['username'];
    $username   = $_SESSION['fullname'];
    $id         = $_SESSION['id'];
}


$product_category = array('product_category_id' =>'' ,
                    'product_category_description' =>'',
                    'product_category_name' =>''
);

$products = array('product_id' =>'' ,
                    'product_description' =>'',
                    'product_name' =>'',
                    'product_amount' =>''
);
$count_cart         = array('count(*) as count' => '' );
$total_price        = array('sum(product_amount) as count' => '' );
$total_product       = array('count(product_name) as count' => '',
                            'product_name' => ''
                             );

$orders             = array('distinct products.product_name as product_name' =>'' ,
                            'products.product_amount as product_amount' =>'' ,
                            'products.product_id as product_id' =>'' ,
                            'user_orders.user_id as user_id' =>'' ,
                            "user_orders.quantity as count" =>'' 
);

$wishlist             = array('distinct products.product_name as product_name' =>'' ,
                            'products.product_amount as product_amount' =>'' ,
                            'products.product_id as product_id' =>'' ,
                            'user_wishlist.user_id as user_id' =>'' ,
                            "user_wishlist.quantity as count" =>'' ,
                            "user_wishlist.user_wishlist_id" =>''
);

$comments            = array('customer_name' => '',
                              'comment' => '',
                              'rate' => '',
                              'date_posted' => '' 
                             );



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
