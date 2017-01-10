<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 style="font-weight:bold;">SIGN IN</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-2 col-xs-12">
      <div class="form-horizontal form-label-left"><br/>
         <?php echo $return; ?>
        <?php echo form_open('login','id="demo-form" data-parsley-validate'); ?>    
              <label for="email">Email *</label>
              <input type="email" id="login-email" class="form-control" name="login-email" data-parsley-trigger="change" required />
              <label for="password">Password * </label>
              <input type="password" id="login-password" class="form-control" name="login-password" required />
              <br>
              <button type="submit" class="btn-block">Sign In <i class="fa fa-sign-in" aria-hidden="true"></i></button><br>
              <a href="<?= base_url('register') ?>" class="text-left">Don't have an account yet? Sign up now!</a>
              <!-- <p><a href="#" class="text-right"><u>Forgot Password?</u></a></p> -->
        <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div><br/>

<script type="text/javascript">
$(document).ready(function() {
    $.listen('parsley:field:validate', function() {
      validateFront();
    });
    $('#demo-form .btn').on('click', function() {
      $('#demo-form').parsley().validate();
      validateFront();
    });
    var validateFront = function() {
      if (true === $('#demo-form').parsley().isValid()) {
        $('.bs-callout-info').removeClass('hidden');
        $('.bs-callout-warning').addClass('hidden');
      } else {
        $('.bs-callout-info').addClass('hidden');
        $('.bs-callout-warning').removeClass('hidden');
      }
    };
});
</script>


<?php $this->load->view('menu/footer-menu'); ?>