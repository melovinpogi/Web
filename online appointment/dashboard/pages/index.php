<?php
    include("templates/functions.php");
    include("templates/variables.php");
    index();
    usertype();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salon 360 Philippines Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/veteranz.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Salon 360 Phillipines Administrator</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <b><?php echo $username; ?></b> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle="tooltip" rel="tooltip" data-placement="left" data-original-title="User Profile">
                            <i class="fa fa-user fa-fw "></i> User Profile</a>
                        </li>
                        <li><a href="#" data-toggle="tooltip" rel="tooltip" data-placement="left" data-original-title="Settings">
                            <i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li ><a href="#" id="logout" data-toggle="tooltip" rel="tooltip" data-placement="left" data-original-title="Logout" >
                            <i class="fa fa-sign-out fa-fw"> </i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
           
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a data-toggle="tooltip" rel="tooltip" 
                                    data-placement="right" data-original-title="Quick Stats" href="index.php">
                                    <i class="fa fa-dashboard fa-fw "></i> Dashboard</a>
                        </li>
                        <li>
                            <a data-toggle="tooltip" rel="tooltip" 
                                    data-placement="right" data-original-title="Employees" href="#" id="employee-tab">
                                        <i class="fa fa-users fa-fw"></i> Employees</a>

                                <ul class="nav nav-second-level">
                                    <li>
                                        <a data-toggle="tooltip" rel="tooltip" 
                                            data-placement="right" data-original-title="List of Employees Services" href="#" id="employee-services-tab" >
                                            <i class="fa fa-car fa-fw"></i> Employee Services</a>
                                    </li>
                                     <li>
                                        <a data-toggle="tooltip" rel="tooltip" 
                                            data-placement="right" data-original-title="List of Employees Schedule" href="#" id="employee-schedule-tab">
                                            <i class="fa fa-calendar fa-fw"></i> Employee Schedules</a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a data-toggle="tooltip" rel="tooltip" 
                                    data-placement="right" data-original-title="Services" href="#" id="services-tab">
                                        <i class="fa fa-shopping-cart fa-fw"></i> Services</a>
                        </li>
                        <li>
                            <a data-toggle="tooltip" rel="tooltip" 
                                    data-placement="right" data-original-title="Customer Appointments" href="#" id="customer-tab">
                                    <i class="fa fa-list-alt fa-fw"></i> Customer Appointments</a>
                        </li>
                        <!--  <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Users</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
          <!-- Loading -->
          <br>
           <div id="loading" class="alert alert-info text-center">
               <b><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Please Wait...</b>
           </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="alert-label"></div>
            <!-- /.row -->
            <div id="main-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php select("count_appointment",$new_appointment," where status = 'N' ") ?></div>
                                        <div>New Appointments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumbs-up fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php select("count_approved",$new_approved," where status = 'A' ") ?></div>
                                        <div>Total Approved!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumbs-down fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php select("count_disapproved",$new_disapproved," where status = 'D' ") ?></div>
                                        <div>Total Disapproved!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>       
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/veteranz.js"></script>

</body>

</html>
