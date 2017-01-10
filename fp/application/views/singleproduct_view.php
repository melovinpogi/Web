<?= menu(); ?>
<!-- FlexSlider -->
<script src="<?php echo base_url('assets/js/imagezoom.js'); ?>"></script>
<script defer src="<?php echo base_url('assets/js/jquery.flexslider.js'); ?>"></script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
	animation: "slide",
	controlNav: "thumbnails"
  });
});
</script>
<div class="products">
		<div class="container">
			<div id="messagebox" class="alert" role="alert"></div>
			<div class="products-grids">
				<div class="col-md-8 products-single">
				<div class="col-md-5 grid-single">		
						<div class="flexslider">
							  <ul class="slides">
							  <?php foreach ($item as $product) { 
							  	$name 		 = $product->item_description;
							  	$description = $product->item_description2;
							  	$price 		 = $product->price;
							  	$overview 	 = $product->quick_overview;
							  	$brand 		 = $product->brand_id;
							  	$colorx 	 = $product->color_id;
							  	$model 		 = $product->model_id;
							  	$itemid 	 = $product->id;
							  	?>
								<li data-thumb="<?php echo $product->img1; ?>">
									<div class="thumb-image"> 
										<img src="<?php echo $product->img1; ?>" data-imagezoom="true" class="img-responsive" alt=""/>
									</div>
								</li>
								<li data-thumb="<?php echo $product->img2; ?>">
									 <div class="thumb-image"> 
									 	<img src="<?php echo $product->img2 ?>;" data-imagezoom="true" class="img-responsive"  alt=""/> 
									 </div>
								</li>
								<li data-thumb="<?php echo $product->img3; ?>">
								   <div class="thumb-image"> 
								   		<img src="<?php echo $product->img3; ?>" data-imagezoom="true" class="img-responsive" alt=""/> 
								   	</div>
								</li> 
								<?php } ?>
							  </ul>
						</div>
						
					</div>	
				<div class="col-md-7 single-text">
					<div class="details-left-info simpleCart_shelfItem">
						<?php foreach ($availcolor as $color) {
							$colorname = '- ' . $color->color_name;
						} ?>

						<h3><?php echo $name; ?></h3>
						<p class="availability">Availability: <span class="color">In stock</span></p>
						<div class="price_single">
							<span class="actual item_price">&#8369; <?php echo number_format($price,2); ?></span>
						</div>
						<h2 class="quick">Quick Overview</h2>
						<p class="quick_desc"> <?php echo $overview; ?></p>
					    <h3>available Colors</h3>
						<ul class="product-colors">
						<?php foreach ($availcolor as $color) { ?>
							<li>
								<a style="background: <?php echo $color->color_name; ?>;width: 32px;height: 32px;display: inline-block;" href="<?php echo base_url('product/single/category/' .$this->uri->segment(4). '/' . $this->uri->segment(5) .'/'. $color->itemid.'/color/'. $color->colorid.'/model/'. $color->modelid); ?>"><span> </span>
								</a>
							</li>
						<?php } ?>
						</ul>
						<div class="quantity_box">
						    <span>Quantity:</span>
							<div class="product-qty">
								<select id="product-qty">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>
					<div class="clearfix"> </div>
				<?php if(user_id() == 0 || user_id() == ''){ ?>
				<div class="pro-grd" style="top: 93%;left: 25%;">
					<a href="<?php echo base_url('account'); ?>">Login to Buy</a>
				</div>
				<?php }else{ ?>
				<div class="single-but item_add">
					<button class="btn btn-info" id="add-to-cart">add to cart <i class="fa fa-shopping-cart"></i></button>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
				<!-- collapse -->
    <div class="panel-group collpse col-md-4 products-grid-right" id="accordion" role="tablist" aria-multiselectable="true" style="padding:0px;">
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingOne">
	      <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          Description
	        </a>
	      </h4>
	    </div>
	    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	      <div class="panel-body">
	        <?php echo $description;  ?>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading" role="tab" id="headingThree">
	      <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	          reviews
	        </a>
	      </h4>
	    </div>
	    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>
</div>

<?php $this->load->view('menu/footer'); ?>


<script type="text/javascript">
$(document).ready(function() {
	$('#add-to-cart').click(function(){
		$.ajax({
          url: '<?php echo base_url('Ajax/addtocartsingle/') ?>/' + <?php echo $itemid ?>  +'/' + <?php echo $colorx ?> + '/' + <?php echo $model ?> + '/' + <?php echo $brand ?> + '/' + $("#product-qty option:selected").val() ,
          type: 'GET',
          async: true,
          beforeSend: function() {
          	$('#messagebox').show();
	        $('#messagebox').addClass('alert-warning');
	        $('#messagebox').html('Please Wait...');
	      },
          success: function(content) {
            $('#messagebox').removeClass('alert-warning').addClass('alert-success');
	        $('#messagebox').html('Item Added to your cart!').delay(1500).fadeOut();
          },
          error: function(request, status, error) {
            $('#messagebox').removeClass('alert-warning').addClass('alert-danger');
	        $('#messagebox').html(request + ', ' + error).delay(1500).fadeOut();
          } 
        });
	});

});   

</script>