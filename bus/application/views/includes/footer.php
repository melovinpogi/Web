	<div id="footer">
		<hr>
		<div class="inner">
			<div class="container">
				<button class="btn btn-success" id="export">Export to Excel</button>
				<p class="right"><a href="#">Back to top</a></p>
				<p>
				</p>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.table2excel.min.js'); ?>"></script>

	<script type="text/javascript">
		$("#export").on("click",function(){
            $(".table").table2excel({
                    exclude: ".noExl",
                    name: "Fashion Princess",
                    filename: '<?php echo ucfirst($this->uri->segment(2));?>' ,
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
        });
	</script>
</body>
</html>


