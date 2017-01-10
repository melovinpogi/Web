<?= menu(); ?>
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-8 products-grid-left">
				<div class="products-grid-lft">
				<div id="messagebox" class="alert" role="alert"></div>
					<?php foreach ($product as $key ) { ?>
						<div class="products-grd">
							<div class="p-one simpleCart_shelfItem prd">
								<a href="<?php echo base_url('product/single/' . $key->item_description .'/'. $key->id.'/'. $key->color_id.'/'. $key->model_id); ?>">
									<img src="<?php echo $key->img1; ?>" 
									style="width:242px; height:178px;" alt="" class="img-responsive" />
								</a>
								<h4 class="truncate"><?php echo $key->item_description; ?></h4>
								<p>
									<a class="item_add" href="#">
										<i class="glyphicon glyphicon-shopping-cart"></i> 
										<span title="<?php echo $key->color_id; ?>" lang="<?php echo $key->model_id; ?>" 
										id="<?php echo $key->id; ?>" tabindex="<?php echo $key->brand_id; ?>" class=" item_price valsa">
										&#8369; <?php echo number_format($key->price,2) ?></span>
									</a>
								</p>
								<div class="pro-grd">
									<a href="<?php echo base_url('product/single/category/' .$this->uri->segment(3). '/' . $key->item_description .'/'. $key->id.'/color/'. $key->color_id.'/model/'. $key->model_id); ?>">Quick View</a>
								</div>
							</div>	
						</div>
					<?php }?>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 products-grid-right">
				<div class="w_sidebar">
					<section  class="sky-form">
						<h4>sub-categories</h4>
						<div class="row1 scroll-pane">
							<div class="col col-4">
							<label class="radio">
								<input type="radio" name="cat" checked=""  id="0"><i></i>none
							</label>
							<?php foreach ($category as $key ) { ?>
								<label class="radio">
									<input type="radio" name="cat" id="<?php echo $key->id; ?>"><i></i><?php echo $key->subcategory_name; ?>
								</label>
							<?php }?>
							</div>
						</div>
					</section>
					<section  class="sky-form">
						<h4>brand</h4>
						<div class="row1 scroll-pane">
							<div class="col col-4">
							<label class="radio">
								<input type="radio" name="brand" checked="" id="0"><i></i>none
							</label>
							<?php foreach ($brand as $key ) { ?>
								<label class="radio">
									<input type="radio" name="brand" id="<?php echo $key->id; ?>"><i></i><?php echo $key->brand_name; ?>
								</label>
							<?php }?>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.item_add span').click(function(){
		var itemid 	= $(this).attr('id');
		var colorid = $(this).attr('title');
		var modelid = $(this).attr('lang');
		var brandid = $(this).attr('tabindex');
		var userid  = <?php echo user_id(); ?>

		if(userid == 0 || userid == ''){
			return false;
		}else{
			$.ajax({
	          url: '<?php echo base_url('Ajax/addtocart/') ?>/' + itemid  +'/' + colorid + '/' + modelid + '/' + brandid ,
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
		}
		
	});


	$('input[type=radio]').click(function(){
		var x 	= '<?php echo $this->uri->segment(3); ?>';
		var cat = $('input[name=cat]:checked').attr('id');
		var bra = $('input[name=brand]:checked').attr('id');

		if (typeof cat === "undefined" ) {
		    cat = 0;
		}
		if (typeof bra === "undefined" ) {
		    bra = 0;
		}
		
		$.ajax({
          url: '<?php echo base_url('Ajax/itemPerBrandAndCat/') ?>/' + x  +'/' + cat + '/' + bra ,
          type: 'GET',
          async: true,
          beforeSend: function() {
	        $('.products-grid-lft').html('<h3>Please Wait...</h3>');
	      },
          success: function(content) {
            $('.products-grid-lft').html(content);
          },
          error: function(request, status, error) {
            $('.products-grid-lft').html(error);
          }
        });
	});  

	$('.scroll-pane').jScrollPane();
});   

</script>
<?php $this->load->view('menu/footer'); ?>