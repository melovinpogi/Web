<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Admin Bataan Transit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/logo.png">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  
 
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Bataan Transit Admin</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'conductors'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/conductors">Conductors</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'bus'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/bus">Bus</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'load'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/load">Load</a>
	        </li>
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/transaction">Bus Transaction</a>
	              <a href="<?php echo base_url(); ?>admin/payment">Payments</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
