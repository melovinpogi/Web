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




		<div class="content-page">
				<div class="content">
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
					  <li><a data-toggle="tab" href="#menu1">Promos</a></li>
					  <li><a data-toggle="tab" href="#menu2">Snap</a></li>
					  <li><a data-toggle="tab" href="#menu3">About</a></li>
					  <li><a data-toggle="tab" href="#menu4">Franchise</a></li>
					  <li><a data-toggle="tab" href="#menu5">Careers</a></li>
					</ul>

					<div class="tab-content">
					  <div id="home" class="tab-pane fade in active">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
								Add Content for slider
							</button>
							<div class="row">
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Add Content</h4>
								      </div>
								      <div class="modal-body">
												<?php echo form_open_multipart('home/submit'); ?>
													  <div class="form-group">
													    <label for="">Content Title</label>
													    <input type="text" class="form-control" name="content_title"   >
													  </div>
														<div class="form-group">
													    <label for="">Content Title 2</label>
													    <input type="text" class="form-control" name="content_title2"   >
													  </div>
														<div class="form-group">
														 <label for="">Content</label>
														  <input type="text" class="form-control" name="content"    >
													 </div>
													 <div class="form-group">
														 <label for="">Content 2</label>
														  <input type="text" class="form-control" name="content2"   >
													 </div>
													  <div class="form-group">
													    <label for="">Image</label>
													    <input type="file" name="file_upload" required>
													  </div>
													  <div class="form-group">
													    <label for="">Image thumb</label>
													    <input type="file" name="file_upload2" required>
													  </div>
													  <input type="hidden" name="activity" value="insert">
														 <input type="hidden" name="page-name" value="home" >
														 <input type="hidden" class="form-control" name="type" value="home-slider"   >
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-success">Submit</button>
								      </div>
											 <?php echo form_close(); ?>
								    </div>
								  </div>
								</div>

								<div class="col-sm-4 col-md-4">
									<h3>Home Slider</h3>
									<?php foreach ($slider as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="home">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>
											   <div class="form-group">
											    <label>File input thumb</label>
											    <input type="file" id="file2_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
											  </div>

										<input type="hidden" name="type" value="home-slider">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<hr>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
								<div class="col-sm-4 col-md-4">
									<h3>Home Article <small>*image only</small></h3>
									<?php echo form_open_multipart('home/submit'); ?>
									<?php foreach ($simg as $x) { ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" name="content_title_<?php echo $x->id; ?>" value="<?php echo $x->content_title; ?>">
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="<?php echo $x->id; ?>" name="file_<?php echo $x->id; ?>">
													<input type="hidden" name="page-name" value="home">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>
										<input type="hidden" name="type" value="single-img">
										<button type="submit" name="submit2" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
								<div class="col-sm-4 col-md-4">
									<h3>Home Article <small>*image with content</small></h3>
									<?php foreach ($iwc as $x) { ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" name="content_title_<?php echo $x->id; ?>" value="<?php echo $x->content_title; ?>">
										  </div>
											<div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="<?php echo $x->id; ?>" name="file_<?php echo $x->id; ?>">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
											  </div>
										<input type="hidden" name="type" value="img-with-content">
										<input type="hidden" name="page-name" value="home">
										<input type="hidden" name="activity" value="update">
										<button type="submit" name="submit3" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										 <?php echo form_close(); ?>
								<?php } ?>
								</div>
							</div>
					  </div>
					  <div id="menu1" class="tab-pane fade">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalx">
								Add Content
							</button>
							<!-- Modal -->
							<div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Add Content</h4>
										</div>
										 <div class="modal-body">
												<?php echo form_open_multipart('home/submit'); ?>
													  <div class="form-group">
													    <label for="">Content Title</label>
													    <input type="text" class="form-control" name="content_title"   >
													  </div>
														<div class="form-group">
													    <label for="">Content Title 2</label>
													    <input type="text" class="form-control" name="content_title2"   >
													  </div>
														<div class="form-group">
														 <label for="">Content</label>
														  <input type="text" class="form-control" name="content"    >
													 </div>
													 <div class="form-group">
														 <label for="">Content 2</label>
														  <input type="text" class="form-control" name="content2"   >
													 </div>
													  <div class="form-group">
													    <label for="">Image</label>
													    <input type="file" name="file_upload" required>
													  </div>
													  <input type="hidden" name="activity" value="insert">
														 <input type="hidden" name="page-name" value="promo" >
														 <input type="hidden" class="form-control" name="type" value="promo"   >
								      </div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-success">Submit</button>
										</div>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<h3>Promos</h3>
									<?php foreach ($promos as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
									<div class="col-md-4 col-sm-4">
										<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
											<div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="promo">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>

										<input type="hidden" name="type" value="promo">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<a class="btn btn-danger" href='<?php echo base_url('home/delete/'.$x->id.'');?>' 
											onClick='javascript:return confirm(\"Are you sure to Delete?\")'>Delete <i class="fa fa-trash-o"></i></a>
										<hr>
										
									</div>
											
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
							</div>
					  </div>
					  <div id="menu2" class="tab-pane fade">
					    <div class="row">
					    	<div class="col-sm-12 col-md-12">
									<h3>Snap Card</h3>
									<?php foreach ($snap as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
										  <div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="snap">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>

										<input type="hidden" name="type" value="snap">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<hr>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
					    </div>
					  </div>
					  <div id="menu3" class="tab-pane fade">
					    <div class="row">
					    	<div class="col-sm-12 col-md-12">
									<h3>About</h3>
									<?php foreach ($about as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
										  <div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
										  <div class="form-group">
										    <label>Content 2:</label>
										    <textarea class="article" name="content2_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content2; ?></textarea>
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="about">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>

										<input type="hidden" name="type" value="about">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<hr>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
					    </div>
					  </div>

					  <div id="menu4" class="tab-pane fade">
					    <div class="row">
					    	<div class="col-sm-12 col-md-12">
									<h3>Franchise</h3>
									<?php foreach ($franchise as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
										  <div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
										  <div class="form-group">
										    <label>Content 2:</label>
										    <textarea class="article" name="content2_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content2; ?></textarea>
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="franchise">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>

										<input type="hidden" name="type" value="franchise">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<hr>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
					    </div>
					  </div>

					  <div id="menu5" class="tab-pane fade">
					  	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
								Add Content for jobs
							</button>
							<!-- Modal -->
								<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Add Content</h4>
								      </div>
								      <div class="modal-body">
												<?php echo form_open_multipart('home/submit'); ?>
													  <div class="form-group">
													    <label for="">Title</label>
													    <input type="text" class="form-control" name="content_title"   >
													  </div>
														<div class="form-group">
													    <label for="">Modal Target</label>
													    <input type="text" class="form-control" name="content_title2"   >
													  </div>
														<div class="form-group">
														 <label for="">Content</label>
														  <input type="text" class="form-control" name="content"    >
													 </div>
													 <div class="form-group">
														 <label for="">Content 2</label>
														  <input type="text" class="form-control" name="content2"   >
													 </div>
													  <input type="hidden" name="activity" value="insert">
													  <input type="hidden" name="file_upload" value="">
														 <input type="hidden" name="page-name" value="careers" >
														 <input type="hidden" class="form-control" name="type" value="careers"   >
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-success">Submit</button>
								      </div>
											 <?php echo form_close(); ?>
								    </div>
								  </div>
								</div>
					    <div class="row">
					    	<div class="col-sm-12 col-md-12">
									<h3>Careers</h3>
									<?php foreach ($careers as $x) {  ?>
									<?php echo form_open_multipart('home/submit'); ?>
											<div class="form-group">
										    <label>Title: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Content Title" value="<?php echo $x->content_title;?>" name="content_title_<?php echo $x->id; ?>">
										  </div>
										  <div class="form-group">
										    <label>Modal Target: </label>
										    <input type="text" class="form-control" id="<?php echo $x->id; ?>" placeholder="Modal target" value="<?php echo $x->content_title2;?>" name="content_title2_<?php echo $x->id; ?>">
										  </div>
										  <div class="form-group">
										    <label>Content:</label>
										    <textarea class="article" name="content_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content; ?></textarea>
										  </div>
										  <div class="form-group">
										    <label>Content 2:</label>
										    <textarea class="article" name="content2_<?php echo $x->id; ?>" rows="8" class="form-control"><?php echo $x->content2; ?></textarea>
										  </div>
											<div class="form-group">
										    <label>Image: </label>
										    <input type="text" class="form-control"  value="<?php echo $x->img_name;?>"  disabled>
										  </div>
											  <div class="form-group">
											    <label>File input</label>
											    <input type="file" id="file_<?php echo $x->sequence; ?>" name="file_<?php echo $x->id; ?>" >
													<input type="hidden" name="page-name" value="careers">
													<input type="hidden" name="table_id" value="<?php echo $x->id; ?>">
													<input type="hidden" name="activity" value="update">
											  </div>

										<input type="hidden" name="type" value="careers">
										<button type="submit" name="submit1" class="btn btn-success">Save <i class="fa fa-paper-plane"></i></button>
										<hr>
										 <?php echo form_close(); ?>
										 <?php } ?>
								</div>
					    </div>
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
