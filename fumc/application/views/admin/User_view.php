<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div class="table-responsive">
		  <table class="table"> 
		  	<thead> 
		  		<tr> 
		  			<th>#</th> 
		  			<th>First name</th> 
		  			<th>Last name</th> 
		  			<th>Email</th> 
		  			<th>Mobile</th> 
		  			<th>Home Address</th> 
		  			<th>Shipping Address</th> 
		  			<th>Username</th> 
		  		</tr> 
		  	</thead> 
		  	<tbody> 
		  	<?php foreach ($users as $key) {
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
		  			<td><?php echo $key->firstname ?></td> 
		  			<td><?php echo $key->lastname ?></td> 
		  			<td><?php echo $key->email_address ?></td> 
		  			<td><?php echo $key->mobile ?></td> 
		  			<td><?php echo $key->home_address ?></td> 
		  			<td><?php echo $key->shipping_address ?></td> 
		  			<td><?php echo $key->username ?></td> 
		  		</tr> 
		  	<?php } ?>
		  		
		  	</tbody> 
		</table>
		</div>
	</div>

</div>

<?php $this->load->view('menu/footer'); ?>
