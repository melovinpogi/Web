<?= menu(); ?>
 <div class="account">
	  <div class="container">
	       <div class="account-bottom">
				<div class="col-md-6 account-left">
					<form method="post" action="account/register">
					<div class="account-top heading">
						<h3>NEW CUSTOMERS</h3>
					</div>
					<div class="address">
						<span>First Name</span>
						<input type="text" name="firstname" required="" value="">
					</div>
					<div class="address">
						<span>Last Name</span>
						<input type="text" name="lastname" required="">
					</div>
					<div class="address">
						<span>Email Address</span>
						<input type="email" name="email" required="">
					</div>
					<div class="address">
						<span>Mobile</span>
						<input type="number" minlength="11" maxlength="11" name="mobile" required="">
					</div>
					<div class="address">
						<span>Home Address</span>
						<textarea name="homeaddress" required=""></textarea>
					</div>
					<div class="address">
						<span>Shipping Address</span>
						<textarea name="shippingaddress" required=""></textarea>
					</div>
					<div class="address">
						<span>Username</span>
						<input type="text" name="rusername" required="">
					</div>
					<div class="address">
						<span>Password</span>
						<input type="password" name="rpassword" required="">
					</div>
					<div class="address new">
						<input type="submit" value="submit">
					</div>
					</form>
				</div> 
				<div class="col-md-6 account-left second">
					<form method="post" action="account/login" >
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
							<!-- <a class="forgot" href="#">Forgot Your Password?</a> -->
							<input type="submit" value="Login" name="login">
						</div>
					 </form>
					  </div>
				 </div>
				<div class="clearfix"></div>
			</div>
	  </div>

<?php $this->load->view('menu/footer'); ?>