<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/form/brand'); ?>" method="post">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Brand name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Brand name" name="brandname" required="">
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
		  			<th></th>
		  			<!-- <th></th> -->
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($brand as $key) {
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
		  			<td><input type="text" name="brand_<?php echo $key->id ?>" value="<?php echo $key->brand_name ?>" class="form-control"></td> 
		  			<td><a href="<?php echo base_url('admin/edit/brand/' . $key->id)  ?>" class="btn btn-primary">Edit 
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
