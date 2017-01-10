<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="x_content center-block" style="width:50%;"><br><br>
  <div class="x_title">
      <h2>Customer Billing Information</h2>
      <div class="clearfix"></div>
  </div>
    <form class="form-horizontal form-label-left input_mask">
      <div class="row">
         <dl class="dl-horizontal">
          <?php foreach ($customerinfo as $row ) { ?>
            <dt>Customer Name:</dt>
            <dd><?php echo $row->customer_name ?></dd>
            <dt>Address:</dt>
            <dd><?php echo $row->address ?></dd>
            <dt>Email Address:</dt>
            <dd><?php echo $row->email ?></dd>
            <dt>Mobile Number:</dt>
            <dd><?php echo $row->mobile_number ?></dd>
          <?php } ?>
          </dl>
      </div><br><br>
      <div class="x_title">
        <h2>Order Summary Information</h2>
        <div class="clearfix"></div>
      </div>
        <div class="row">
            <table cellspacing="0" class="shop_table cart">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0;
                      $totalqty = 0;
                      foreach($summarycheckout as $row){ ?>
                 <tr id="">
                  <td><?php echo $row->promo_code ?></td>
                  <td>&#8369; <?php echo number_format($row->amount,2) ?></td>
                   <td><?php echo $row->quantity ?></td>
                  </tr>
              <?php $total    = $total + $row->amount ?>
              <?php $totalqty = $totalqty + $row->quantity ?>
              <?php } ?>
              <tr style="font-weight: bold;">
                <b><td>TOTAL: <br><small>(VAT incl.)</small></td></b>
                <td>&#8369; <?php echo number_format($total,2); ?> </td>
                <td><?php echo $totalqty; ?></td>
              </tr>
              </tbody>
            </table>
      </div>
      <br><br>

       <div class="x_title">
        <h2>Terms and Condition</h2>
        <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="well well-lg">...</div>
           <button type="button" class="btn btn-round btn-warning" id="terms" data-loading-text="Terms and Condition Accepted" autocomplete="off">Accept Terms and Conditions</button>
          <br><br>
        </div>

        <div id="payment-option">
          <div class="x_title">
            <h2>Available Payment Method</h2>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
            <label class="col-md-2 col-sm-2 col-xs-12">Select Payment:</label>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <select class="form-control" tabindex="-1" id="payments">
                <option value="NONE">Choose Option</option>
                <option value="CC">Credit / Debit Card</option>
                <option value="BN">BancNet (Local Debit Card [ATM])</option>
              </select>
            </div>
          </div>

        <div id="cc1">
          <div class="panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-sm-4">
                          <label>
                              Credit Card Type
                          </label>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control input-sm">
                              <option>VISA</option>
                              <option>JCB</option>
                              <option>MasterCard</option>
                              <option>American Express</option>
                          </select>
                      </div>
                  </div>
                  <br/>

                  <div class="row">
                      <div class="col-sm-4">
                          <label>
                              Credit Card No.
                          </label>
                      </div>
                      <div class="col-sm-6">
                          <input type="text" class="form-control input-sm"/>
                      </div>
                  </div>
                  <br/>

                  <div class="row">
                      <div class="col-sm-4">
                          <label>
                              Card Expiration Date
                          </label>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control input-sm">
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control input-sm">
                              <option>2014</option>
                              <option>2015</option>
                              <option>2016</option>
                              <option>2017</option>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                          </select>
                      </div>
                  </div>
                  <br/>

                  <div class="row">
                      <div class="col-sm-4">
                          <label>
                              Card CVV
                          </label>
                      </div>
                      <div class="col-sm-6">
                          <input type="text" class="form-control input-sm"/>
                      </div>
                  </div>
                  <br/>

                  <div class="row">
                      <div class="col-sm-4">
                          <label>
                              Cardholder's Name
                          </label>
                      </div>
                      <div class="col-sm-6">
                          <input type="text" class="form-control input-sm"/>
                      </div>
                  </div>
                  <br/>

                  <div class="row">
                      <div class="col-sm-4">
                          <label style="visibility: hidden">
                              Action
                          </label>
                      </div>
                      <div class="col-sm-3">
                          <button type="button" class="btn btn-success" style="width: 100%">Pay Now
                          </button>
                      </div>
                      <div class="col-sm-3">
                          <button type="button" class="btn btn-primary" style="width: 100%">Cancel
                          </button>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $this->load->view('menu/footer-menu'); ?>

<script type="text/javascript">
  $("#payment-option").hide();
  $("#cc1").hide();

 $("#terms").click(function(){
    $(this).button('loading');
    $("#payment-option").show();
  });

 $("#payments").change(function(){
    x = $("#payments option:selected").val();

    switch(x){
      case 'CC': $("#cc1").show();
      break;
      case 'BN': $("#cc1").hide();
      break;
    }
  });

</script>
