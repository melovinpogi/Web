<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/form/stock'); ?>" method="post">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Model</label>
			    <div class="col-sm-10">
			        <select class="form-control" id="model" name="model" required="">
			        <option value="0">Choose</option>
			        <?php foreach ($model as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->id ?> <?php echo $key->model_name ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Color</label>
			    <div class="col-sm-10">
			        <select class="form-control" id="color" name="color" required="">
			        	<option value="0">Choose</option>
			        <?php foreach ($color as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->id ?> <?php echo $key->color_name ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Item</label>
			    <div class="col-sm-10">
			      <select class="form-control" id="item" name="item" required="">
					</select>
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="col-sm-2 control-label">Add Quantity</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="qty" placeholder="Quantity" name="qty" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="price" placeholder="Price" name="price" required="" readonly="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Cost</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="cost" placeholder="Cost" name="cost" required="" readonly="">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info">Save <i class="fa fa-floppy-o"></i></button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('menu/footer'); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$price = 0;

		function ajax(url,method,object){
			$.ajax({
	          url: url,
	          type: method,
	          async: true,
	          beforeSend: function() {
	          	$(object).html('Please Wait...');
		      },
	          success: function(content) {
	          	console.log(content)
	          	switch(object){
	          		case '#item':
	          			$(object).html(content);
	          		break;

	          		case '#price':
	          			$(object).val(content);
	          		break;
	          	}

	            $(object).html(content);
	          },
	          error: function(request, status, error) {
	          	alert(request + ', ' + error);
	          } 
	        });
		}

		$('#model , #color').change(function(){
			var model = $("#model option:selected").val();
			var color = $("#color option:selected").val();
			var url   = '<?php echo base_url('Ajax/itemselected/') ?>/' + color + '/' + model;
			ajax(url,'GET','#item');
			$('#price').val(0);
		});

		$('#item').change(function(){
			var item = $("#item option:selected").val();
			var url  = '<?php echo base_url('Ajax/itemprice/') ?>/' + item;
			ajax(url,'GET','#price');

			$price 	 = $('#price').val();
		});

		$('#qty').change(function(){
			var qty	= $('#qty').val();
			$price 	= $('#price').val();

			$('#cost').val( $price * qty );
		});

	});
</script>