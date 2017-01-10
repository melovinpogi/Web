<?= menu(); ?>
<div class="banner">
    <div class="container">
	   <div class="banner-grids">
	       <div class="col-md-6 jocket">
			   <div class="jock-img">
			     <img src="assets/images/sht.jpg" alt="">
			   </div>
			    <div class="jock-text">
			      <h3 class="b-tittle">Men's Jacket</h3>
				 <a class="collection" href="<?php echo base_url('product/category/1') ?>">View collection <i class="glyphicon glyphicon-arrow-right"></i></a>
			   </div>
			   <div class="clearfix"> </div>
		   </div>
		   <div class="col-md-6 shoe">
				   <div class="shoe-img">
					 <img src="assets/images/shoe.jpg" class="img-responsive" alt="">
				   </div>
					<div class="shoe-text">
					   <h3 class="b-tittle">Men's Shoes</h3>
					 <a class="collection" href="<?php echo base_url('product/category/1') ?>">View collection <i class="glyphicon glyphicon-arrow-right"></i></a>
				   </div>
				   <div class="clearfix"> </div>
			<div class="bottom-bags">
				   <div class="col-md-6 pack">
					  <div class="bag-text">
						   <h3 class="b-tittle">Bags</h3>
						 <a class="collection" href="<?php echo base_url('product/category/2') ?>">View collection <i class="glyphicon glyphicon-arrow-right"></i></a>
					   </div>
					   <div class="bag-img">
						 <img src="assets/images/bag.jpg" class="img-responsive" alt="">
					   </div>
					   <div class="clearfix"> </div>
					   
				   </div>	
				   <div class="col-md-6 glass">
					  <div class="glass-text">
						   <h3 class="b-tittle">Glasses</h3>
					 <a class="collection" href="<?php echo base_url('product/category/2') ?>">View collection <i class="glyphicon glyphicon-arrow-right"></i></a>
					   </div>
					   <div class="glass-img">
						 <img src="assets/images/glass.jpg" class="img-responsive" alt="">
					   </div>
					   <div class="clearfix"> </div>
					   
				   </div>	
					<div class="clearfix"> </div>						   
				</div>
		    </div>						   
			   <div class="clearfix"> </div>
	   </div>
	</div>
</div>
<!--/start-fashion-->
<div class="fashion-section">
	 <div class="container"> 
	     <h3 class="tittle">Fashions</h3>
	   <div class="fashion-info">
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f1.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
						<p class="cart"><a href="<?php echo base_url('product/category/2') ?>">Shop</a></p>				
					</figcaption>			
				</figure>		
			</div>
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f2.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
							<p class="cart"><a href="<?php echo base_url('product/category/2') ?>">Shop</a></p>				
					</figcaption>			
				</figure>		
			</div>
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f3.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
						<p class="cart"><a href="<?php echo base_url('product/category/2') ?>">Shop</a></p>							
					</figcaption>			
				</figure>		
			</div>
			<div class="clearfix"></div>
		</div>
	 </div>
</div>
<!--//fashion-->
<!--/start-latest-->
<div class="collection-section">
	<div class="container"> 
	     <h3 class="tittle fea">FEATURED COLLECTIONS</h3>
	   <div class="fashion-info">
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f4.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
						<p class="cart"><a href="<?php echo base_url('product/category/1') ?>">Shop</a></p>				
					</figcaption>			
				</figure>		
			</div>
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f5.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
							<p class="cart"><a href="<?php echo base_url('product/category/1') ?>">Shop</a></p>				
					</figcaption>			
				</figure>		
			</div>
			<div class="col-md-4 fashion-grids">
				<figure class="effect-bubba">
					<img src="assets/images/f6.jpg" alt=""/>
					<figcaption>
						<h4>Fashion Princess</h4>
						<p class="cart"><a href="<?php echo base_url('product/category/1') ?>">Shop</a></p>							
					</figcaption>			
				</figure>		
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
       <!--//latest-->


  <div class="mid-content"> 
    <div class="container"> 
	  <div class="middle">
	    <div class="mid-top"> 
	      <h3>Discover a huge assortment of</h3>
		  <p>women`s handbags at the lowest prices</p>
	    </div>
	 </div>
   </div>
 </div>

<?php $this->load->view('menu/footer'); ?>
