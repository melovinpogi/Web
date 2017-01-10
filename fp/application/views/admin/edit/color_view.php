<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
			<form class="form-horizontal" action="<?= base_url('admin/formedit/color/' . $this->uri->segment(4)); ?>" method="post">
			<?php foreach ($updatecolor as $x) { ?>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Color name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Color name" name="colorname" required="" value="<?php echo $x->color_name; ?>">
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
		  			<th>Colorname</th> 
		  			<th></th>
		  			<!-- <th></th> -->
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($color as $key) {
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
		  			<td><?php echo $key->color_name ?></td> 
		  			<td><a href="<?php echo base_url('admin/edit/color/' . $key->id)  ?>" class="btn btn-primary">Edit 
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