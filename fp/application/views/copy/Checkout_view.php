<?= menu(); ?>
<style type="text/css">
.close {
  background: url('<?php echo base_url('assets/images/close.png'); ?>') no-repeat 0px 0px;
  cursor: pointer;
  width: 28px;
  height: 28px;
  position: absolute;
  right: 0px;
  top: 0px;
  -webkit-transition: color 0.2s ease-in-out;
  -moz-transition: color 0.2s ease-in-out;
  -o-transition: color 0.2s ease-in-out;
  transition: color 0.2s ease-in-out;
}
</style>
<div class="cart-items">
	<div class="container">
	 		<?php
	 			$form ='';
	 			$loop = 0;
	 			$c = 0;
	 		 ?>
			 <div id="messagebox" class="alert" role="alert"></div>
			 <h3 class="tittle">My shopping(<?php echo $countcart; ?>)</h3>
			 <?php foreach ($checkout as $key ) { 
			 	$c 	  = $key->id;
			 	$loop = $loop + 1;
			 	$form .= '<input type="hidden" name="item_name_'.$loop.'" value="'.$key->item_description.'">';
			 	$form .= '<input type="hidden" name="amount_'.$loop.'" value="'.$key->price.'">';
			 	$form .= '<input type="hidden" name="quantity_'.$loop. '" value="'.$key->qty.'">';
			 	
			 ?>
			 
				 <div id="cart-header-<?php echo $key->cartid; ?>" class="cart-header">
					 <div id="close-<?php echo $key->cartid; ?>" class="close"> </div>
					 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								 <img src="<?php echo $key->img1; ?>" class="img-responsive" alt="">
							</div>
						   <div class="cart-item-info">
							<h3><a href="#"><?php echo $key->item_description; ?></a></h3>
							<ul class="qty">
								<li><p>Total Qty: <input id="totalqty-<?php echo $key->cartid; ?>" class="form-control" type="number" name="totalqty" value="<?php echo $key->qty; ?>"></p></li>
							</ul>
							<div class="delivery">
								 <p>Sub total : &#8369; <?php echo number_format($key->price,2); ?></p>
								 <div class="clearfix"></div>
					        </div>	
					        <button id="<?php echo $key->cartid; ?>" class="btn btn-success">Update <span class="glyphicon glyphicon-refresh"></span></button>
						   </div>
						   <div class="clearfix"></div>
					  </div>
				 </div>
			 <?php } ?>

			 <?php foreach ($usercustomized as $key ) {
			 		$c   = $key->id;
			 		$loop = $loop + 1;
			 		$total = $key->price_small + $key->price_medium + $key->price_large + $key->price_xl + $key->price_xxl;
			 		$totalqty = $key->size_small + $key->size_medium + $key->size_large + $key->size_xl + $key->size_xxl;
			 		$form .= '<input type="hidden" name="item_name_'.$loop.'" value="Customized Shirt - '.$key->creation_name.'">';
			 		$form .= '<input type="hidden" name="amount_'.$loop. '" value="100"> ';
			 		$form .= '<input type="hidden" name="quantity_'.$loop. '" value="'.$totalqty.'">';


			  ?>
			 	<h3>Customized Item</h3>
				 <div id="cart-header-<?php echo $key->id; ?>" class="cart-header">
					 <div id="close-customized-<?php echo $key->id; ?>" class="close"> </div>
					 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
								 <img src="<?php echo $key->image_front; ?>" class="img-responsive" alt="">
							</div>
						   <div class="cart-item-info">
							<h3><a href="#"><?php echo $key->creation_name; ?></a></h3>
							<ul class="qty">
								<li>
									<p>Total Qty (small): <?php echo $key->size_small; ?> - &#8369; 
									<?php echo number_format($key->price_small,2); ?>
									</p>
								</li><br>
								<li>
									<p>Total Qty (medium): <?php echo $key->size_medium; ?> - &#8369; 
									<?php echo number_format($key->price_medium,2); ?>
									</p>
								</li><br>
								<li>
									<p>Total Qty (large): <?php echo $key->size_large; ?> - &#8369; 
									<?php echo number_format($key->price_large,2); ?>
									</p>
								</li><br>
								<li>
									<p>Total Qty (xl): <?php echo $key->size_xl; ?> - &#8369; 
									<?php echo number_format($key->price_xl,2); ?>
									</p>
								</li><br>
								<li>
									<p>Total Qty (xxl): <?php echo $key->size_xxl; ?> - &#8369; 
									<?php echo number_format($key->price_xxl,2); ?>
									</p>
								</li><br>
							</ul>
							<div class="delivery">
								 <p>Sub total : &#8369; <?php echo number_format($total,2); ?></p>
								 <div class="clearfix"></div>
					        </div>	
						   </div>
						   <div class="clearfix"></div>
					  </div>
				 </div>
			 <?php } ?>
			 <?php if($c > 0){ ?>
			 	<a href="#" id="submit-payment">
			 		<img src="http://unicornomy.com/wp-content/uploads/2016/10/Paypal.png" class="img-responsive center-block" style="width: 300px;">
			 	</a>
			 		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="cart" id="form-payment" 
			 		class="text-center" style="display:none;" >
			             <input type="hidden" name="cmd" value="_cart">
			             <input type="hidden" name="upload" value="1">
			             <input type="hidden" name="business" value="fashionprincess2k16@gmail.com">
                      	<?php echo $form; ?>
                        <input type="hidden" name="currency_code" value="PHP">
                        <input type="hidden" name="lc" value="PH"/>
                      <input type="image" class="reload"
                        src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_paynow_cc_144x47.png" alt="Check out with PayPal"/>
                    </form>
            <?php } ?>
               
	</div>
</div>
<?php $this->load->view('menu/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		function ajax(url,method,msg){
			$.ajax({
	          url: url,
	          type: method,
	          async: true,
	          beforeSend: function() {
	          	$('#messagebox').addClass('alert-info').html('<h3>Please Wait...</h3>');
		      },
	          success: function(content) {
	            $('#messagebox').html(msg);
	            location.reload();
	          },
	          error: function(request, status, error) {
	            $('#messagebox').html(error);
	          }
	        });
		}

		$('button').click(function(){
			var cartid 	= $(this).attr('id');
			var qty 	= $('#totalqty-' + cartid).val();
			var url 	= '<?php echo base_url('Ajax/updatecart/') ?>/' + cartid  +'/' + qty;
			ajax(url,'GET','Update Cart Success!');
			
		});

		$('.close').click(function(){
			var cartid;

			if($(this).attr('id').substring(0,8) == 'close-cu'){
				cartid 	= $(this).attr('id').substring(17);
				$link = '<?php echo base_url('Ajax/deletecustomized/') ?>/' + cartid;
			}else{
				cartid 	= $(this).attr('id').substring(6);
				$link = '<?php echo base_url('Ajax/deleteitem/') ?>/' + cartid;
			}
			ajax($link,'GET','Item Removed!');
		});

		$('#submit-payment').click(function(){
			var url 	= '<?php echo base_url('Ajax/payment/') ?>';

			$.ajax({
	          url: url,
	          type: 'GET',
	          async: true,
	          beforeSend: function() {
	          	$('#messagebox').addClass('alert-info').html('<h3>Please Wait...</h3>');
		      },
	          success: function(r) {
	           if(r =='success'){
	           		$('#form-payment').submit();
	           }else{
	           		 $('#messagebox').html('Error while inserting into table.');
	           }
	          },
	          error: function(request, status, error) {
	            $('#messagebox').html(error);
	          }
	        });
			
		});
	});
</script>