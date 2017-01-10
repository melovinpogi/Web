<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 style="font-weight:bold;">PERSONAL INFORMATION</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="x_content">
   <div class="container">
    <div class="row">
    <?php echo form_open('user/updateprofile',' class="form-horizontal form-label-left input_mask"'); ?>
        <?php foreach ($customerinfo as $row ) { ?>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control has-feedback-left" placeholder="Your Name" disabled value="<?php echo $row->customer_name; ?>">
          <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>
         <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control has-feedback-left" placeholder="E-Mail" disabled value="<?php echo $row->email; ?>">
          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control has-feedback-left" placeholder="Mobile" disabled value="<?php echo $row->mobile_number; ?>">
          <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
        </div>
         <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" class="form-control has-feedback-left" placeholder="Address" disabled value="<?php echo $row->address; ?>">
          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
          <input type="text" name="shipping" required="" class="form-control has-feedback-left" placeholder="Shipping Address" value="<?php echo $row->shipping_address; ?>">
          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
        </div>
        <?php } ?>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12">
          </div>
        </div>
        <button type="submit" class="btn-block">UPDATE <i class="fa fa-refresh"></i></button>
        <a href="<?= base_url('profile/changepassword') ?>" class="btn btn-warning btn-block">CHANGE PASSWORD <i class="fa fa-key"></i></a>
      <?php echo form_close(); ?>
    </div>
  </div>
</div><br><br>

<?php $this->load->view('menu/footer-menu'); ?>



      