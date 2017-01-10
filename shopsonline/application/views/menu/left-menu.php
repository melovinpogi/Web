<div class="col-md-3 col-sm-3">
    <div class="panel panel-default">
        <div class="panel-heading"><span class="fa fa-list"></span> Menu List</div>
        <div class="list-group">
            <a href="<?= base_url('admin/user') ?>" class="list-group-item"><span class="fa fa-users"></span> Users</a>
            <a href="<?= base_url('admin/feedback') ?>" class="list-group-item"><span class="fa fa-user-plus"></span> Customer Feedback</a>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function($) {
        $('.list-group a').each(function() {
            if($(this).attr('href') == document.URL){
                $(this).addClass('active');
            }
        });
    });
</script> 