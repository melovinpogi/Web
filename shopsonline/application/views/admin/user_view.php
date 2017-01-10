<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 class="page-title">ADMINISTRATOR PAGE</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?= leftmenu(); ?>
            <div class="col-md-9 col-sm-9">
			    <h2><span class="fa fa-users"></span> Users</h2><hr>
			    <table class="table table-hover">
				 	<thead> 
				 		<tr> 
				 			<th>#</th> 
				 			<th>Username</th> 
				 			<th>Email address</th> 
				 			<th>Password</th> 
				 		</tr> 
				 	</thead>
				 	<tbody> 
				 		<?php foreach ($userlist as $key) { ?>
				 		<tr>
				 			<td><?php echo $key->id ?></td> 
				 			<td><?php echo $key->customer_name ?></td> 
				 			<td><?php echo $key->email ?></td> 
				 			<td><?php echo $key->password ?></td> 
				 		</tr> 
				 		<?php } ?>
				 	</tbody>
				</table>
			</div>
        </div>
    </div>
</div>
<?php $this->load->view('menu/footer-menu'); ?>

