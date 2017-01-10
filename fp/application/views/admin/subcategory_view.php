<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/form/subcategory'); ?>" method="post">
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Subcategory name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Subcategory name" name="subcategory" required="">
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
		  			<th>Subcategory name</th> 
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($subcategory as $key) {
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
		  			<td><?php echo $key->subcategory_name ?></td> 
		  		</tr> 
		  	<?php } ?>
		  		
		  	</tbody> 
		</table>
		</div>
	</div>

</div>

<?php $this->load->view('menu/footer'); ?>
