<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/form/item'); ?>" method="post">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Item Code</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Item Code" name="itemcode" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Item Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Item Name" name="itemname" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Item Description</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Item Description" name="itemdesc" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Quick Overview</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Quick Overview" name="quickoverview" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" placeholder="Price" name="price" required="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Category</label>
			    <div class="col-sm-10">
			        <select class="form-control" id="cat" name="category" required="">
			        <?php foreach ($category as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->description ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">SubCategory</label>
			    <div class="col-sm-10">
			        <select class="form-control" id="subcat" name="subcategory" required="">
			        <!-- <?php foreach ($subcategory as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->subcategory_name ?></option>
					<?php } ?> -->
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Brand</label>
			    <div class="col-sm-10">
			        <select class="form-control" name="brand" required="">
			        <?php foreach ($brand as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->brand_name ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Color</label>
			    <div class="col-sm-10">
			        <select class="form-control" name="color" required="">
			        	<option></option>
			        <?php foreach ($color as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->color_name ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Model</label>
			    <div class="col-sm-10">
			        <select class="form-control" name="model" required="">
			        <?php foreach ($model as $key) { ?>
						<option value="<?php echo $key->id ?>"><?php echo $key->model_name ?></option>
					<?php } ?>
					</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label" >Image1</label>
			    <div class="col-sm-10">
			    	<input type="file" accept="image/*" onchange="onFileSelected(event)" required="">
			    	<input type="hidden" id="img1" name="img1">
			    	<p class="help-block">PNG Files only</p>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label" >Image2</label>
			    <div class="col-sm-10">
			    	<input type="file" accept="image/*" onchange="onFileSelected2(event)" required="">
			    	<input type="hidden" id="img2" name="img2">
			    	<p class="help-block">PNG Files only</p>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label" >Image3</label>
			    <div class="col-sm-10">
			   		<input type="file" accept="image/*" onchange="onFileSelected3(event)" required="">
			   		<input type="hidden" id="img3" name="img3">
			    	<p class="help-block">PNG Files only</p>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info">Save <i class="fa fa-floppy-o"></i></button>
			    </div>
			  </div>
			</form>
		</div>
		<div class="table-responsive">
		  <table class="table"> 
		  	<thead> 
		  		<tr> 
		  			<th>#</th> 
		  			<th>Brandname</th> 
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($item as $key) {
		  		$i = 0;
		  		$class = '';
		  		if($key->id % 2 != 0){
		  			$class= 'active';
		  		}else{
		  			$class= '';
		  		}
		  	 ?>
		  		<tr class="<?php echo $class; ?>"> 
		  			<th scope="row"><?php echo $key->id ?></th> 
		  			<td><?php echo $key->item_description ?></td> 
		  		</tr> 
		  	<?php } ?>
		  		
		  	</tbody> 
		</table>
		</div>
	</div>
</div>

<?php $this->load->view('menu/footer'); ?>

<script type="text/javascript">
function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("img1");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
    $("#img1").val( event.target.result);
  };
  reader.readAsDataURL(selectedFile);

}

function onFileSelected2(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("img2");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
    $("#img2").val( event.target.result);
  };
  reader.readAsDataURL(selectedFile);
}

function onFileSelected3(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("img3");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
    $("#img3").val( event.target.result);
  };
  reader.readAsDataURL(selectedFile);
}


	$(document).ready(function(){
		$('#cat').change(function(){
			$.ajax({
	          url: '<?php echo base_url('Ajax/subcat/') ?>/' + $(this).val(),
	          type: 'GET',
	          async: true,
	          beforeSend: function() {
	          	$('#subcat').html('<option>Please Wait...</option>');
		      },
	          success: function(content) {
	            $('#subcat').html(content)
	          },
	          error: function(request, status, error) {
	          	alert(request + ', ' + error);
	          } 
	        });
		});
	});
</script>