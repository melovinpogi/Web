<?= menu(); ?>
<div class="container">
<?php $this->load->view('menu/left'); ?>
	<div class="col-md-9 col-sm-9">
		<div id="content">
        <h3>Report</h3>
       
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group date' id='customer'>
                         <select class="form-control" id="customer" name="customer" required="">
                            <option value="0">All Customer</option>
                        <?php foreach ($customers as $customer) { ?>
                            <option value="<?php echo $customer->id ?>"><?php echo $customer->customer ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group date' id='from'>
                        <input type='text' class="form-control" id="dfrom" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class='input-group date' id='to'>
                        <input type='text' class="form-control" id="dto" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div>
                        <button id="retrieve" class="btn btn-primary">Retrieve <i class="fa fa-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div class="col-md-9">
        <div class="table-responsive">
          <table class="table" data-tableName=""> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th>Item</th>
                    <th>Color</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Date Purchase</th>
                    <th>Customer</th>
                </tr> 
            </thead> 
            <tbody> 
            </tbody> 
            </table>
            <button class="btn btn-success" id="export">Export <i class="fa fa-file-excel-o"></i></button>
            
        </div>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excel Filename</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="filename" placeholder="Excel filename">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="exprt">Export</button>
      </div>
    </div>
  </div>
</div>


<?php $this->load->view('menu/footer'); ?>

<script type="text/javascript">
    $(function () {
        var $f;
        var $t;
        $("#export").hide();

        $('#from').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#to').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY-MM-DD'
        });

       /* $("#from").on("dp.change", function (e) {
           console.log( $("#dfrom").val() )
        });
        $("#to").on("dp.change", function (e) {
            $t = e.date._i
        });*/

        $("#retrieve").on("click",function(){
            if($("#dfrom").val() == '' || $("#dto").val() == ''){
                return false;
            }
            //console.log( encodeURIComponent($("#dfrom").val()) )
            $.ajax({
              url:  '<?php echo base_url('Ajax/genreport/') ?>/' + $("#customer option:selected").val() +'/' + encodeURIComponent($("#dfrom").val()) + '/' + encodeURIComponent($("#dfrom").val()),
              type: 'POST',
              async: true,
              beforeSend: function() {
                $("#messagebox").html('Please Wait...');
              },
              success: function(content) {
                $("#messagebox").html('');
                $("tbody").html(content);
                $("#export").show();
              },
              error: function(request, status, error) {
                $("#messagebox").html(request + ', ' + error);
                $("#export").hide();
              } 
            });
        });

        $("#export").on("click",function(){
            $("#myModal").modal('show');

            $("#exprt").on("click",function(){
                $(".table").table2excel({
                    exclude: ".noExl",
                    name: "Fashion Princess",
                    filename: $("#filename").val(),
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
                $("#myModal").modal('hide');
            });
        });

    });
</script>