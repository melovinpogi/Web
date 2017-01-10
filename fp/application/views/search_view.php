<?php error_reporting(0); ?>
<?= menu(); ?>
<div class="container">
<div class="products">
	<div class="container">
		<div class="products-grids">
			<div class="col-md-12 products-grid-left">
				<div class="products-grid-lft">
				<div id="messagebox" class="alert" role="alert"></div>
				<?php if(empty($product)){
						echo "<h3>no result found</h3>";
					} ?>
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
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	
</div>

<?php $this->load->view('menu/footer'); ?>