<script>
    $(document).ready(function($) {
        $('.list-group a').each(function() {
            if(this.getAttribute('href') == document.URL){
                $(this).addClass('active');
            }
        });
    });
</script> 
<h3 class="tittle">System Configuration <i class="fa fa-cog fa-spin fa-fw"></i></h3>
 <div id="messagebox" class="alert" role="alert"></div>
<div class="col-md-3 col-sm-3">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-list"></span> Menu List</div>
        <div class="list-group">
            <a id="menu1" href="<?php echo base_url('admin'); ?>" class="list-group-item">
                <span class="fa fa-book"></span> Reports
            </a>
            <a id="menu1" href="<?php echo base_url('admin/page/brand'); ?>" class="list-group-item">
                <span class="fa fa-futbol-o"></span> Brands
            </a>
            <a id="menu2" href="<?php echo base_url('admin/page/color'); ?>" class="list-group-item">
                <span class="fa fa-leaf"></span> Colors
            </a>
            <a id="menu3" href="<?php echo base_url('admin/page/item'); ?>" class="list-group-item">
                <span class="fa fa-shopping-bag"></span> Items
            </a>
            <a id="menu4" href="<?php echo base_url('admin/page/model'); ?>" class="list-group-item">
                <span class="fa fa-industry"></span> Models
            </a>
            <a id="menu5" href="<?php echo base_url('admin/page/shirtdesign'); ?>" class="list-group-item">
                <span class="fa fa-child"></span> Shirt Design
            </a>
            <a id="menu8" href="<?php echo base_url('admin/page/stock'); ?>" class="list-group-item">
                <span class="fa fa-inbox"></span> Stocks
            </a>
            <a id="menu6" href="<?php echo base_url('admin/page/subcategory'); ?>" class="list-group-item">
                <span class="fa fa-list-alt"></span> Sub-Category
            </a>
            <a id="menu7" href="<?php echo base_url('admin/page/user'); ?>" class="list-group-item">
                <span class="fa fa-users"></span> Users
            </a>
        </div>
    </div>  
</div>