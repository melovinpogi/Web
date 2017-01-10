<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/formedit/shirtdesign/' . $this->uri->segment(4)); ?>" method="post">
			<?php foreach ($updateshirtdesign as $x) { ?>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Design name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Design name" name="designame" required="" value="<?php echo $x->design_name; ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label" >Image</label>
			    <div class="col-sm-10">
			    	<input type="file" accept="image/*" onchange="onFileSelected(event)" required="" value="<?php echo $x->design_image; ?>">
			    	<input type="hidden" id="img1" name="img1" value="<?php echo $x->design_image; ?>">
			    	<p class="help-block">PNG Files only</p>
			    </div>
			  </div>
			  <?php } ?>
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
		  			<th>Shirtdesign name</th> 
		  			<th></th>
		  			<!-- <th></th> -->
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($shirtdesign as $key) {
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
		  			<td><?php echo $key->design_name ?></td> 
		  			<td><a href="<?php echo base_url('admin/edit/shirtdesign/' . $key->id)  ?>" class="btn btn-primary">Edit 
		  				<i class="fa fa-edit"></i></a></td>
		  			<!-- <td><a href="#" class="btn btn-danger">Delete <i class="fa fa-remove"></i></a></td> -->
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

</script>