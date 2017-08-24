<?php
	session_start();
	include("config/variables.php");
	include("config/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salon 360 Phillipines</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/veteranz.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Salon 360 Phillipines</a>
            </div>
            <div class="col-md-6 col-sm-8">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter" style="margin-left:10px;"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" style="margin-left:10px;"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-instagram" style="margin-left:10px;"></i></a>
                        </li>
                    </ul>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" id="ul-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                   <!--  <li>
                    	<a href="#appointment" type="button" class="page-scroll" data-toggle="modal" data-target="#veteranz-modal">
                        Appointment
                    </a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="#about">About Us</a>
                    </li>
                     <!-- <li>
                        <a class="page-scroll" href="#announcement">Announcement</a>
                    </li> -->
                     <!-- <li>
                        <a class="page-scroll" href="#promos">Promos</a>
                    </li> -->
                    <?php if($username != ''){?>
                     <li>
                        <a class="page-scroll dropdown" href="#" id="dLabel" data-toggle="dropdown" haspopup="true" aria-expanded="false" data-target="#" >
                        	Shop <span class="caret"></span>
                        	<ul class="dropdown-menu" aria-labelledby="dLabel">
                        		<li><a href="#" id="shop360" data-toggle="modal" data-target="#shop-modal">Shop 360</a></li>
                        		<li><a href="#" id="xorder" data-toggle="modal" data-target="#OrderModal" >Orders
                        			<?php select('count_cart',$count_cart," where user_id =$id and purchase='N'",'',''); ?></a></li>
                        		<li><a href="#" id="wishlist" data-toggle="modal" data-target="#WishlistModal" >Wishlist
                        			<?php select('count_wishlist',$count_cart," where user_id =$id
                        										and user_wishlist_id not in (select user_wishlist_id from user_orders)",'',''); ?></a></li>
                        	</ul>
                        </a>
                    </li>
                     <?php } ?>
                    <!-- <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li> -->
                    <?php if($username != ''){?>
                    <li>
                    	<a class="page-scroll" id="logout" href="#">Sign Out</a>
                    </li>
                    <?php } else{ ?>
                    <li>
                        <a class="page-scroll" id="login" href="#" data-toggle="modal" data-target="#LoginModal">Sign In</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" style="height: 475px; !important">
            <div class="intro-text" style="padding-top: 190px !important">
                <div class="intro-lead-in">Welcome To Salon 360 Phillipines!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
              <!--  <h2 class="section-heading">Announcement to the customers</h2>
                    <h3 class="section-subheading text-muted">We don't have Announcement yet.</h3> -->
                <!-- <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a> -->
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="img/about/2.jpg" alt="...">
		      <div class="carousel-caption">
		        ...
		      </div>
		    </div>
		    <div class="item">
		      <img src="img/about/1.jpg" alt="...">
		      <div class="carousel-caption">
		        ...
		      </div>
		    </div>
		    <div class="item active">
		      <img src="img/about/3.jpg" alt="...">
		      <div class="carousel-caption">
		        ...
		      </div>
		    </div>
		    ...
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	</div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">We offer an excellent selection of services!</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                     <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-child fa-stack-1x fa-inverse"></i>
                        </span>
                     </a>
                        <h4 class="service-heading">Children</h4>
                        <p class="text-muted">We specialize haircuts for children, kids, toddlers & babies.</p>

                </div>
                <div class="col-md-3">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-male fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <h4 class="service-heading">Men</h4>
                    <p class="text-muted">Sample Text Here</p>
                </div>
                <div class="col-md-3">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-female fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <h4 class="service-heading">Women</h4>
                    <p class="text-muted">Sample Text Here.</p>
                </div>
                <div class="col-md-3">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <h4 class="service-heading">Other Services</h4>
                    <p class="text-muted">Sample Text Here.</p>
                </div>
                 <div class="col-md-6">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-bookmark fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <h4 class="service-heading">Make an Appointment</h4>
                </div>
            </div>
        </div><br>
    </section>



    <!-- Announcement Section -->
    <!-- <section id="announcement">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Announcement to the customers</h2>
                    <h3 class="section-subheading text-muted">We don't have Announcement yet.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div><br>
    </section> -->


    <!-- Promo Section -->
    <!-- <section id="promos" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Salon 360 Promos</h2>
                    <h3 class="section-subheading text-muted">Check out our variety of great promos and discounts</h3>
                </div>
            </div>
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                    <a href="#" type="button" class="btn btn-xl">Go to Promos</a><br><br>
                </div>
            </div>
        </div><br>
    </section> -->

    <!-- Contact Section -->
   <!--  <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" id="btn-contact">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

     <!-- About Section -->
    <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Finding Your True Beauty... A Hair Salon that cares about you.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">At Salon360 & Day Spa, our staff of highly trained, professionals will help you find the look that is right for your personality and lifestyle. We are passionate about our work, so we continue our training to master the latest techniques in hairstyling to give you elegant, gorgeous, fun styles to suit your individuality. Because we want you to look your best even days after you leave our salon, we provide you with the tips and tricks to help you maintain your style at home. </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Sample Text Here</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Sample Text Here</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Sample Text Here</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><br>
    </section>

    <!-- Comments -->
    <section>
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 text-center">
                    <h2 class="section-heading">Comments and Suggestions</h2>
                </div>
                <div class="col-md-6 col-sm-6">
                <div class="row">
	                <div id="allcomments">
	                	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwo">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						         <center>View All Comments and Suggestions</center>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="panel-body">
						        <?php select('comments',$comments,' order by comment_id desc','',''); ?>	
						      </div>
						    </div>
						  </div>
						</div>
	                </div>
                </div>
                  <div class="alert-label"></div>
				  <div class="form-group">
				    <label>Your Name</label>
				    <input type="email" class="form-control" id="cname">
				  </div>
				  <div class="form-group">
				    <label>Comment</label>
				    <textarea class="form-control" rows="3" id="comment"></textarea>
				  </div>
				  <div class="form-group">
				    <label>Rate us
				      <span class="glyphicon glyphicon-star-empty" id="rating1"></span>
				      <span class="glyphicon glyphicon-star-empty" id="rating2"></span>
				      <span class="glyphicon glyphicon-star-empty" id="rating3"></span>
				      <span class="glyphicon glyphicon-star-empty" id="rating4"></span>
				      <span class="glyphicon glyphicon-star-empty" id="rating5"></span>
				    </label>
				  </div>
				  <button class="btn btn-primary" id="btn-comment">Submit</button>
				</div>
    		</div>
    	</div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Team Veteranz 2015</span>
                </div>
        </div>
    </footer>

    <!-- Services Modals -->
    <!-- Use the modals below to showcase details about your Services projects! -->

    <!-- Services Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Services Details Go Here -->
                            <h2>Services for Children</h2>
                            <table class="table table-striped table-bordered table-hover">
                            	<thead>
                            		<tr>
                            			<th>Service</th>
                            			<th>Description</th>
                            			<th>Price</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Haircut(Boys)</td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Haircut(Girls)</td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            	</tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal">Make an appointment</button>            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Services Details Go Here -->
                            <h2>Make an Appointment</h2>
                            <div class="row">
                            	<span class="alrt alert alert-danger" style="display:none;"></span>
								<div class="col-xs-6 col-md-10">
									 <h5>Employee
									 	<select id="employee-dropdown" class="selectpicker show-tick form-control">
									 		<option name="Select Employee" id="0" value="0">-- Select Employee -- </option>
									 		<?php select('employee',$form_employee,'','DROPDOWN',''); ?>
							        	</select>
							        </h5>
							        <button id="add-employee" class="btn btn-primary">Add Employee</button><br><br>
							        <div id="div-employee"></div>
								</div>
							</div>
							<div id="employee-detail"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Services Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Services Details Go Here -->
                            <h2>Services for Men</h2>
                             <table class="table table-striped table-bordered table-hover">
                            	<thead>
                            		<tr>
                            			<th>Service</th>
                            			<th>Description</th>
                            			<th>Price</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Cut & style</td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Highlights </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Color  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            	</tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal">Make an appointment</button>            </div>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Services Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Services Details Go Here -->
                            <h2>Services for Women</h2>
                            <table class="table table-striped table-bordered table-hover">
                            	<thead>
                            		<tr>
                            			<th>Service</th>
                            			<th>Description</th>
                            			<th>Price</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Cut & style</td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Highlights </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Blowdry   </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Color  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Up-do  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Perm   </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Deep oil treatment  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer long  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer medium  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer short  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>

                            	</tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal">Make an appointment</button>            </div>
         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Services Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Services Details Go Here -->
                            <h2>Other Services</h2>
                             <table class="table table-striped table-bordered table-hover">
                            	<thead>
                            		<tr>
                            			<th>Service</th>
                            			<th>Description</th>
                            			<th>Price</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            			<td>Cut & style</td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Highlights </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Blowdry   </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Color  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Up-do  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Perm   </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Deep oil treatment  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer long  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer medium  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>
                            		<tr>
                            			<td>Relaxer short  </td>
                            			<td>Sample Description</td>
                            			<td>PHP 100</td>
                            		</tr>

                            	</tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal">Make an appointment</button>            </div>
         					</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- Appointment Modal -->
    <div class="modal fade" id="veteranz-modal" tabindex="-1" role="dialog" aria-labelledby="veteranz-label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="veteranz-label">MAKE AN APPOINTMENT</h4>
          </div>
          <div class="modal-body">
             <div class="alert-label"><div class="alert alert-warning"><b>Book an Appointment: Your Information - Page 1 of 3</b></div></div>
              <h5><small>Booking an appointment is simple!</small></h5>
             <h6><small>Just fill in the information below then press the Next button.</small></h6>
            <div id="appointment-modal">
               <form id="form-appointment" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><h5>Firstname:<h5>
                                <input type="text" class="form-control form-appointment" placeholder="Your FirstName *" id="first-name"
                                    required data-validation-required-message="Please enter your firstname." minlength=3
                                    pattern="[a-zA-Z]+" title="Firstname">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Lastname:<h5>
                                <input type="text" class="form-control form-appointment" placeholder="Your LastName *" id="last-name"
                                    required data-validation-required-message="Please enter your lastname." minlength=3
                                    pattern="[a-zA-Z]+" title="Lastname">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Email Address:<h5>
                                <input type="email" class="form-control form-appointment" placeholder="Your Email *" id="email-address"
                                    required data-validation-required-message="Please enter your email address." title="Email-Address">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Phone Number:<h5>
                                <input type="number" class="form-control form-appointment" placeholder="Your Phone *" id="mobile"
                                    required data-validation-required-message="Please enter your phone number." minlength=11 maxlength=11
                                    title="Mobile Number" >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-default" id="btn-appointment">Next</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <div class="modal-footer form-actions">
            <button type="button" class="btn btn-default reload" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>

    </div>

    <!-- Question Modal -->
    <div class="modal fade" id="question-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="myModalLabel">APPOINTMENT SUMMARY</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="alert-label"></div>
	      	<h6><small>Please verify that the information below is correct.
	      		Press the Finish button below to continue or the Back button to return to the previous page.</small></h6>
	       	<div id="summary-div"></div>
	       	<div id="summary-detail-div">
	       		<br><h4>Appointment Details:</h4>
	       		<table class="table table-bordered table-hover">
			      <thead>
			        <tr>
			          <th>#</th>
			          <th><h6>Employee</h6></th>
			          <th><h6>Service Description</h6></th>
			          <th><h6>Start Time</h6></th>
			          <th><h6>End time</h6></th>
			        </tr>
			      </thead>
			       <tbody id="tbody-summary"></tbody>
			    </table>
	       	</div>
	       	<!-- <textarea rows="4" cols="50" name="request" placeholder="Any Special Requests or Comments"></textarea> -->
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#veteranz-modal">Back</button>
	        <button type="button" class="btn btn-default" id="continue" data-dismiss="modal" data-toggle="modal" data-target=".bs-example-modal-sm">
	        		Continue</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Alert modal -->
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="alert-label"></div>
	      	<div class="row">
	      		<div class="col-sm-12 col-md-12" style="margin-left: 19%;">
			    </div>
		   	</div>
	      <div class="modal-footer">
	    </div>
	  </div>
	</div>
  </div>

	  <!-- Login Modal -->
	<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="LoginModal">Login Form</h4>
	      </div>
	      <div class="modal-body">
	      <div class="alert-label"></div>
	        <form id="loginform" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><h5>Username:<h5>
                                <input type="text" autofocus class="form-control form-appointment" placeholder="Username *" id="username"
                                    required data-validation-required-message="Please enter your Username." title="Username" >
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Password:<h5>
                                <input type="password" class="form-control form-appointment" placeholder="Password *" id="password"
                                    required data-validation-required-message="Please enter your Password." title="Password">
                                <p class="help-block text-danger"></p>
                            </div>
                            <button type="submit" class="btn btn-primary" id="SubmitLogin" >Submit</button>
                            </div>
                    </div>
	      	</div>
	      <div class="modal-footer">
	        
	        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" id="registermodal" data-target="#RegisterModal">Don't have account yet? Click Here</button>
	        
	      </div>
	       </form>
	    </div>
	  </div>
	</div>


	<!-- Shop Modal -->
	<div class="modal fade" id="shop-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title " >Salon 360 Shop <span class="fa fa-shopping-cart"></span> <small><span class="badge-holder"></span></small> </h4>
	         <?php if($username != ''){?>
	        	<h6 class="label label-warning">Hi <?php echo $username; ?> ID # :<span class="label label-default" id="userid"><?php echo $id ?></span></h6>
	        <?php }?>
	      </div>
	       <div id="loading" class="alert alert-info text-center">
               <b><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Please Wait...</b>
           </div>
	       <div class="modal-body">
	      		<div class="alert-label"></div>
	      		<button type="button" class="btn btn-primary back"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	      		<h5><small>Salon 360 & Spa is dedicated to providing superior, customized care through ongoing education and extensive product knowledge.
	      		</small></h5>
	      		<h5><small>We offer a wide array of products and services, including Hair, Nails, Tanning and Skin Care.</small></h5>
	      		 <?php if($username == ''){?>
	      			<h5 class="label label-warning"><small>You need to login to continue shopping. <span class="fa fa-exclamation-triangle"></span></small></h5>
	      			<br><br>
	      		<?php }?>
	      		<h4>Select Category:</h4>
	      		<div class="row">
	      			<div class="col-sm-12 col-md-12">
	      				<div id="category">
	      					<?php select('product_category',$product_category,'','',''); ?>
	      				</div>
	      				<div id="products"></div>
	      			</div>
	      		</div>
	      	</div>
	      	 <div class="modal-footer">
	      	 <button type="button" class="btn btn-primary text-left" id="checkout">
	      	 	<span class="glyphicon glyphicon-inbox"></span>  Summary
	      	 </button>
	        <button type="button" class="btn btn-primary reload" data-dismiss="modal" >Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	<!-- Order Modal -->
	<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="OrderModal">Orders</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="alert-label"></div>
	      	<div class="row">
	      		<div class="col-sm-12 col-md-12">
	      			<div id="orders" >
	      				<?php select('orders',$orders," inner join products on products.product_id = user_orders.product_id
	      												where user_id =$id and purchase='N' " ,'',''); ?>
	      			</div>
	      			<div id="payment" class="text-center">
	      				<?php select('payment',$orders," inner join products on products.product_id = user_orders.product_id
	      												where user_id =$id and purchase='N' " ,'',''); ?>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      <div class="row">
	      	<span style="float: left;margin-left: 5%;">
	      		Total Product: <?php select('total_product',$total_product," inner join products on products.product_id = user_orders.product_id where user_id =$id and purchase='N' group by product_name",'',''); ?>
	      	</span>
	      	<span style="float: left;margin-left: 5%;">
	      		Total Price: <?php select('total_price',$total_price," inner join products on products.product_id = user_orders.product_id where user_id =$id and purchase='N'",'',''); ?>
	      	</span>
	      </div>
	      <button type="button" class="btn btn-primary text-left" id="checkout2">
	      	 	<span class="glyphicon glyphicon-shopping-cart"></span>  Checkout
	      	 </button>
	        <button type="button" class="btn btn-primary reload" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Wishlist Modal -->
	<div class="modal fade" id="WishlistModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="WishlistModal">Wishlist</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="alert-label"></div>
	      	<div class="row">
	      		<div class="col-sm-12 col-md-12">
	      			<div id="wishlist" >
	      				<?php select('user_wishlist',$wishlist," inner join products on products.product_id = user_wishlist.product_id
	      												where user_id =$id and user_wishlist_id not in (select user_wishlist_id from user_orders) " ,'',''); ?>
	      			</div>
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-primary " data-dismiss="modal" id="move-to-orders">
	      	<span class="fa fa-arrow-up"></span>  Move to Orders
	      	</button>
	        <button type="button" class="btn btn-primary reload" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Register Modal -->
	<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="RegisterModal">Registration Form</h4>
	      </div>
	      <div class="modal-body">
	      <div class="alert-label"></div>
	         <form id="form-register" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><h5>Firstname:<h5>
                                <input type="text" class="form-control" placeholder="Your Firstname *" id="fullname"
                                    required data-validation-required-message="Please enter your Firstname." minlength=3
                                    pattern="[a-zA-Z]+" title="Firstname">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Lastname:<h5>
                                <input type="text" class="form-control" placeholder="Your Lastname *" id="lastname"
                                    required data-validation-required-message="Please enter your Lastname." minlength=3
                                    pattern="[a-zA-Z]+" title="Lastname">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Email:<h5>
                                <input type="email" class="form-control" placeholder="Your Email *" id="email"
                                    required data-validation-required-message="Please enter your Email." minlength=3
                                   	title="Email">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Username:<h5>
                                <input type="text" class="form-control" placeholder="Your Username *" id="register-username"
                                    required data-validation-required-message="Please enter your Username." minlength=3 title="Username">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Password:<h5>
                                <input type="password" class="form-control" placeholder="Your Password *" id="register-password"
                                    required data-validation-required-message="Please enter your Password." title="Password">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group"><h5>Confirm Password:<h5>
                                <input type="password" class="form-control" placeholder="Confirm Password *" id="register-passwordx"
                                    required data-validation-required-message="Please confirm your Password." title="Confirm Password">
                                <p class="help-block text-danger"></p>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn-register">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                        	 <button type="button" class="btn btn-primary" data-dismiss="modal" id="loginmodal" data-toggle="modal" data-target="#LoginModal">Go To Login</button>
                        
                            
                        </div>
                    </div>
                </form>
	    </div>
	  </div>
	</div>

	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
    <script src="js/veteranz.js"></script>

</body>

</html>
