<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content"></div>
	</div>
<script>
    $(document).ready(function($) {
        $('.list-group a').each(function() {
    		if(this.getAttribute('href') == document.URL){
            	$(this).parent().addClass('active');
        	}
        });
    });
</script> 
</div>

<?php $this->load->view('menu/footer'); ?>