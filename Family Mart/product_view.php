<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<?php $this->load->view('menu/topbar'); ?>
<!-- Top Bar End -->
		<!-- Left Sidebar Start -->
		<?php $this->load->view('menu/leftbar'); ?>
		<!-- Left Sidebar End -->
<!-- Start right content -->
<script type="text/javascript">
		tinymce.init({
		    selector: "textarea",
		    plugins: "link image"
		 });
</script>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add Content</h4>
	      </div>
	      <div class="modal-body">
					<?php echo form_open_multipart('product/submit'); ?>
						  <div class="form-group">
						    <label for="">Category</label>
						    <input type="text" class="form-control" name="category"   required="">
						  </div>
							<div class="form-group">
						    <label for="">Title </label>
						    <input type="text" class="form-control" name="title"   required="">
						  </div>
							<div class="form-group">
							 <label for="">Content</label>
							  <input type="text" class="form-control" name="content"    required="">
						 </div>
						 <div class="form-group">
							 <label for="">PCS</label>
							  <input type="text" class="form-control" name="pcs"    required="">
						 </div>
						 <div class="form-group">
							 <label for="">SRP</label>
							  <input type="text" class="form-control" name="srp"    required="">
						 </div>
						  <div class="form-group">
						    <label for="">Image Feature</label>
						    <input type="file" name="file_upload" required>
						  </div>
						  <div class="form-group">
						    <label for="">Image Thumbnail</label>
						    <input type="file" name="file_upload2" required>
						  </div>
						  <input type="hidden" name="activity" value="insert"> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success">Submit</button>
	      </div>
				 <?php echo form_close(); ?>
	    </div>
	  </div>
	</div>

		<div class="content-page">
				<div class="content">
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
								Add Product
							</button>
					<ul class="nav nav-tabs">
						<?php
							foreach ($category as $value) { ?>
								 <li class="<?php  if($value->category == 'Chicken'){echo "active";}?>">
								 	<a data-toggle="tab" href="#<?php echo str_replace(' ','',$value->category);?>"><?php echo $value->category;?></a>
								 </li>
							<?php } ?>
					</ul>

					<div class="tab-content">
						<?php
							foreach ($category as $value) { ?>
							<div id="<?php echo str_replace(' ','',$value->category);?>" 
								class="tab-pane fade <?php  if($value->category == 'Chicken'){echo "in active";}?>">
								<?php
									foreach ($product as $x) {
										if ($x->category == $value->category) { ?>
											<?php echo form_open_multipart('product/submit'); ?>
												  <div class="form-group">
												    <label for="">Category</label>
												    <input type="text" class="form-control" name="category_<?php echo $x->id; ?>" value="<?php echo $x->category; ?>"   required="">
												  </div>
													<div class="form-group">
												    <label for="">Title </label>
												    <input type="text" class="form-control" name="title_<?php echo $x->id; ?>"  value="<?php echo $x->title; ?>"   required="">
												  </div>
													<div class="form-group">
													 <label for="">Content</label>
													  <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control">
													  	<?php echo $x->content; ?></textarea>
													</div>
													<div class="form-group">
														 <label for="">PCS</label>
														  <input type="text" class="form-control" name="pcs_<?php echo $x->id; ?>"    >
													 </div>
													 <div class="form-group">
														 <label for="">SRP</label>
														  <input type="text" class="form-control" name="srp_<?php echo $x->id; ?>"    >
													 </div>
													<div class="form-group">
													 <label for="">Image Feature</label>
													  <input type="text" class="form-control" value="<?php echo $x->img_name; ?>"    disabled>
													</div>
													 <div class="form-group">
												    <label for="">Image</label>
												    <input type="file" name="file_<?php echo $x->id; ?>" required>
												  </div>
													<div class="form-group">
													 <label for="">Image Thumbnail</label>
													  <input type="text" class="form-control" value="<?php echo $x->img_thumbnail; ?>"    disabled>
													</div>
													 <div class="form-group">
												    <label for="">Image</label>
												    <input type="file" name="file2_<?php echo $x->id; ?>" required>
												  </div>
												 
												   <input type="hidden" name="table_id" value="<?php echo $x->id; ?>"> 
												  <input type="hidden" name="activity" value="update"> 
												  <button type="submit" name="submit3" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
												  <a class="btn btn-danger" href='<?php echo base_url('home/delete/'.$x->id.'');?>' 
											onClick='javascript:return confirm(\"Are you sure to Delete?\")'>Delete <i class="fa fa-trash-o"></i></a>
											<?php echo form_close(); ?>
								<?php		
										}
									}
								 ?>
								
							</div>
						<?php } ?>
					  </div>
					</div>

				<!-- Footer Start -->
							<?php $this->load->view('menu/footer'); ?>
			<!-- Footer End -->
				</div>
	<!-- ============================================================== -->
	<!-- End content here -->
	<!-- ============================================================== -->
		</div>
<!-- End right content -->

</div>
<!-- End of page -->
</body>
</html>

<style type="text/css">
	hr{
		border-style: dashed;
    	border-width: 2px;
	}
</style>