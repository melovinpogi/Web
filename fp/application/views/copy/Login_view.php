<?= menu(); ?>
 <div class="account">
	  <div class="container">
	       <div class="account-bottom">
				<div class="col-md-6 account-left second">
					<?php print_r($err) ?>
					<form method="post" action="login" >
						<div class="account-top heading">
							<h3>REGISTERED CUSTOMERS</h3>
						</div>
						<div class="address">
							<span>Username</span>
							<input type="text" id="username" name="username" required="">
						</div>
						<div class="address">
							<span>Password</span>
							<input type="password" id="password" name="password" required="">
						</div>
						<div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" name="login">
						</div>
					 </form>
					  </div>
				 </div>
				<div class="clearfix"></div>
			</div>
	  </div>

<?php $this->load->view('menu/footer'); ?>