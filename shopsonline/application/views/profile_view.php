<?= menu(); ?><!-- End header area -->
<div class="x_content">
   <div class="col-xs-12 col-md-4 col-sm-12">
      <p class="lead">Contact Information</p>
      <form class="form-horizontal form-label-left input_mask">
  <?php foreach ($customerinfo as $row ) { ?>
      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left" placeholder="Your Name" disabled value="<?php echo $username; ?>">
        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
      </div>
       <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left" id="mobile" placeholder="E-Mail" disabled value="<?php echo $useremail; ?>">
        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left" id="mobile" placeholder="E-Mail" disabled value="<?php echo $row->mobile_number; ?>">
        <span class="fa fa-tablet form-control-feedback left" aria-hidden="true"></span>
      </div>
       <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
        <input type="text" class="form-control has-feedback-left" id="mobile" placeholder="Address" disabled value="<?php echo $row->address; ?>">
        <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
      </div>
      <?php } ?>
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- <button type="submit" class="btn btn-success btn-block">Update <i class="fa fa-refresh"></i></button> -->
      </div>
    </div><br><br>
    <p class="lead">Security</p>
    <a href="<?= base_url('profile/changepassword') ?>" class="btn btn-warning btn-block">Change Password <i class="fa fa-key"></i></a>
  </form>
    </div>
  <p class="lead">Transaction History</p>
    <div class="col-md-8 col-sm-12 col-xs-12">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cart <i class="fa fa-shopping-cart"></i></a></li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Wishlist <i class="fa fa-magic"></i></a></li>
        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="purchase-tab" data-toggle="tab" aria-expanded="false">Purchase <i class="fa fa-money"></i></a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
         <div class="x_panel">
              <div class="x_title">
                <h2>Product Details </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0;
                          $totalqty = 0;
                          foreach($summarycheckout as $row){ ?>
                     <tr id="">
                      <td><?php echo $row->promo_code ?></td>
                      <td id="price-<?php echo $row->id ?>"><!-- &#8369; --> <?php echo number_format($row->amount,2) ?></td>
                      <input type="hidden" id="price2-<?php echo $row->id ?>" value="<?php echo $row->amount ?>">
                      <td>x &nbsp;&nbsp;&nbsp;&nbsp;<input id="<?php echo $row->id ?>" type="number" value="<?php echo $row->quantity ?>" style="width: 20%;text-align:center;"> </td>
                      <td>
                          <a href="<?= base_url('remove/' . $row->id) ?>" class="btn btn-danger">
                            <i class="fa fa-times"></i> 
                          </a>
                      </td>
                      </tr>
                  <?php $total    = $total + $row->amount ?>
                  <?php $totalqty = $totalqty + $row->quantity ?>
                  <?php } ?>
                  <tr style="font-weight: bold;">
                    <b><td>TOTAL: <br><small>(VAT incl.)</small></td></b>
                    <td><?php echo number_format($total,2); ?> </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $totalqty; ?></td>
                      
                      <td></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Product Details </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0;
                          $totalqty = 0;
                          foreach($wishlist as $row){ ?>
                     <tr id="">
                      <td><?php echo $row->promo_code ?></td>
                      <td id="price-<?php echo $row->id ?>"><!-- &#8369; --> <?php echo number_format($row->amount,2) ?></td>
                      <input type="hidden" id="price2-<?php echo $row->id ?>" value="<?php echo $row->amount ?>">
                      <td>x &nbsp;&nbsp;&nbsp;&nbsp;<input id="<?php echo $row->id ?>" type="number" value="<?php echo $row->quantity ?>" style="width: 20%;text-align:center;"> </td>
                      <td>
                          <a href="<?= base_url('remove/' . $row->id) ?>" class="btn btn-danger">
                            Remove to cart <i class="fa fa-times"></i> 
                          </a>
                      </td>
                      </tr>
                  <?php $total    = $total + $row->amount ?>
                  <?php $totalqty = $totalqty + $row->quantity ?>
                  <?php } ?>
                  <tr style="font-weight: bold;">
                    <b><td>TOTAL: <br><small>(VAT incl.)</small></td></b>
                    <td><?php echo number_format($total,2); ?> </td>
                    <td><?php echo $totalqty; ?></td>
                      
                      <td></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="purchase-tab">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Product Details </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0;
                          $totalqty = 0;
                          foreach($purchase as $row){ ?>
                     <tr id="">
                      <td><?php echo $row->promo_code ?></td>
                      <td id="price-<?php echo $row->id ?>"><!-- &#8369; --> <?php echo number_format($row->amount,2) ?></td>
                      <input type="hidden" id="price2-<?php echo $row->id ?>" value="<?php echo $row->amount ?>">
                      <td>x &nbsp;&nbsp;&nbsp;&nbsp;<input id="<?php echo $row->id ?>" type="number" value="<?php echo $row->quantity ?>" style="width: 20%;text-align:center;"> </td>
                      <td>
                          <a href="<?= base_url('remove/' . $row->id) ?>" class="btn btn-danger">
                            Remove to cart <i class="fa fa-times"></i> 
                          </a>
                      </td>
                      </tr>
                  <?php $total    = $total + $row->amount ?>
                  <?php $totalqty = $totalqty + $row->quantity ?>
                  <?php } ?>
                  <tr style="font-weight: bold;">
                    <b><td>TOTAL: <br><small>(VAT incl.)</small></td></b>
                    <td><?php echo number_format($total,2); ?> </td>
                    <td><?php echo $totalqty; ?></td>
                      
                      <td></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('menu/footer-menu'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $( "input" ).keyup(function() {
          idnumber  = $(this).attr("id");
          qty       = $("#" + idnumber ).val();
          price     = $("#price2-" + idnumber).val();
          total     = price * qty;

          var number = total.toString(), 
          peso = number.split('.')[0], 
          cents = (number.split('.')[1] || '') +'00';
          peso = peso.split('').reverse().join('').replace(/(\d{3}(?!$))/g, '$1,').split('').reverse().join('');
          $("#subtotal-" + idnumber).html( '&#8369;' + peso + '.' + cents.slice(0, 2) );
          window.location = "<?= base_url('/updatecart/" + idnumber + "/" + qty + "') ?>";
        });
      });
    </script>

      