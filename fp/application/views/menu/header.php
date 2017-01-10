<body>
<!--start-home-->
<div class="top_bg" id="home">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">Delivery information <i class="fa fa-truck"></i></a></li>
					<li><a href="#">Contact <i class="fa fa-map-marker"></i></a></li>

					<?php if(user_id() == 0 || user_id() == ''){ ?>
						<li><a href="<?php echo base_url('account') ?>">Login <i class="fa fa-sign-in"></i></a></li>
					<?php }else{ ?>
						<li><a href="#">Welcome <?php echo Customer(); ?>! <i class="fa fa-user"></i></a></li>
						<?php if(user_type() == 1){ ?>
						<li><a href="<?php echo base_url('admin') ?>">System Config <i class="fa fa-gears"></i></a></li>
						<?php } ?>
						<li><a href="<?php echo base_url('account/logout') ?>">Logout <i class="fa fa-sign-out"></i></a></li>
					<?php } ?>
						<li><a href="#" data-toggle="modal" data-target="#search">Search <i class="fa fa-search"></i></a></li>
				</ul>
			</div>
			<div class="top_left">
				<h6><span></span> Call us : 0916 349 1444</h6>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--header-->
<div class="header_bg">
   <div class="container">
	<div class="header">
	  <div class="head-t">
		 <div class="logo">
			  <a href="<?php echo base_url(); ?>"><h1>Fashion <span>Princess</span></h1> </a>
		  </div>
		  <?php if(user_id() > 0 ){ ?>
		  <div class="header_right">
			<div class="cart box_1">
				<a href="<?php echo base_url('checkout') ?>">
					<div class="total">
						<!-- (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items) -->
						My Cart
					</div>
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</a>
				<!-- <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
				<div class="clearfix"> </div>
			</div>				 
		</div>
		<?php } ?>
		<div class="clearfix"></div>	
	    </div>
		<!--start-header-menu-->
		<ul class="megamenu skyblue">
			<li><a class="color1" href="<?php echo base_url('') ?>">Home</a></li>
			<li><a class="color2" href="<?php echo base_url('product/category/1') ?>">Men's Fashion</a></li>
			<li><a class="color4" href="<?php echo base_url('product/category/2') ?>">Women's Fashion</a></li>				
			<li><a class="color5" href="<?php echo base_url('product/category/3') ?>">For Kids</a></li>
			<li><a class="color6" href="<?php echo base_url('product/category/4') ?>">Accessories & More</a></li>
			<?php if(user_id() != 0 || user_id() <> ''){ ?>				
			<li><a class="color7" href="<?php echo base_url('customizeyourstuff') ?>">Customize Your Stuff</a></li>	
			<?php } ?>			
		 </ul> 
	</div>
</div>
</div>

<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="searchLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="searchLabel">Search Product</h4>
      </div>
      <form action="<?php echo base_url('search'); ?>" method="post">
      <div class="modal-body">
        <input type="search" name="search" class="form-control" placeholder="Search">
      </div>
      <div class="modal-footer">
      	<input type="submit" name="search-submit" value="Submit" class="btn btn-primary">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function($) {
	$('.megamenu a').each(function () {
		if(this.getAttribute('href') == document.URL){
                $(this).parent().addClass('active grid');
        }
	});    
});   
</script> 



