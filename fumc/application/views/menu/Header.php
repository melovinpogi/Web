<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<!--banner-->
<section id="banner" class="banner">
	<div class="bg-color">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		  	<div class="col-md-12">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#"><img src="http://fumc.com.ph/images/misc/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px; height: 50px;"></a>
			    </div>
			    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#banner">Home</a></li>
			        <li class=""><a href="#service">Services</a></li>
			        <li class=""><a href="#about">About</a></li>
			        <li class=""><a href="#testimonial">Testimonial</a></li>
			        <li class=""><a href="#contact">Contact</a></li>
			        <?php if(user_id() == '' || user_id() == 0){ ?>
			        <li class=""><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
			        <?php }else{ ?>
			        <li class=""><a href="#" data-toggle="modal" data-target="#logout">Logout</a></li>
			        <?php }?>
			      </ul>
			    </div>
			</div>
		  </div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="banner-info">
					<div class="banner-logo text-center">
						<img src="http://fumc.com.ph/images/misc/logo.png" class="img-responsive">
					</div>
					<div class="banner-text text-center">
						<h1 class="white">Healthcare at your desk!!</h1>
						<p>Make an Appointment NOW!!!</p>
						<a href="#contact" class="btn btn-appoint">Make an Appointment.</a>
					</div>
					<div class="overlay-detail text-center">
		               <a href="#service"><i class="fa fa-angle-down"></i></a>
		             </div>		
				</div>
			</div>
		</div>
	</div>
</section>
	<!--/ banner-->
<?php if(user_id() == '' || user_id() == 0){ ?>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginLabel">Sign In</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="account/login" method="post">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="">
		    </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel <i class="fa fa-close"></i></button>
        <input type="submit" class="btn btn-success" value="Sign In" name="login" > 
      </div>
      </form>
    </div>
  </div>
</div>
 <?php }else{ ?>
 <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="loginLabel">Sign Out</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
		    <h4>Are you sure you want to Sign Out?</h4>
		</div>
		 <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel <i class="fa fa-close"></i></button>
	        <a href="<?= base_url('account/logout'); ?>" class="btn btn-success">Sign Out <i class="fa fa-sign-out"></i></a>
	      </div>
    </div>
  </div>
</div>

 <?php }?>



