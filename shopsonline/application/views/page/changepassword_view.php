<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="product-bit-title text-center">
                  <h2>Change Password</h2>
              </div>
          </div>
      </div>
  </div>
</div> <br><br><!-- End Page title area -->
<div class="x_content center-block">
     <div class="container" style="width:50%;">
      <div class="row" >
        <?php if($checkpassword == 0){ ?>
          <div class="alert alert-danger"> Incorrect Password<i class="fa fa-exclamation" aria-hidden="true"></i></div>
        <?php } ?>
        <?php echo $response; ?>
        <div class="alert alert-danger err"> Password does not match<i class="fa fa-exclamation" aria-hidden="true"></i></div>
        <div class="x_content">
            <?php echo form_open('profile/changepassword','class="form-horizontal form-label-left input_mask"'); ?>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="password" class="form-control has-feedback-left" placeholder="Current Password" name="oldpw" required >
              <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="password" class="form-control has-feedback-left" placeholder="New Password" name="newpw" id="newpw" required>
              <span class="fa fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <input type="password" class="form-control has-feedback-left" placeholder="Retype New Password" name="rnewpw" id="rnewpw" required>
              <span class="fa fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <input type="submit" class="btn btn-warning btn-block" value="Change Password" id="sbmit">
              <a href="<?= base_url('profile') ?>" class="btn btn-danger btn-block">CANCEL</a>
            </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
</div><br><br><br>
<?php $this->load->view('menu/footer-menu'); ?>

<style type="text/css">
th {
  text-align: center;
}
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $(".err").hide();

    $("#rnewpw").change(function(){
        if( $("#newpw").val() !== $("#rnewpw").val() ){
          $(".err").show();
          $("#sbmit").attr("disabled","disabled");
        }
        else{
          $("#sbmit").removeAttr("disabled");
        }
    });
  });
</script>

      