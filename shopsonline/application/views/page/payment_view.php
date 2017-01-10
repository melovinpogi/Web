<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center" >
                    <h2 style="font-weight:bold;">CHECKOUT</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="container">
  <div class="x_content center-block"><br><br>
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
               <dt>Shipping Address:</dt>
              <dd><?php if( $row->shipping_address == '') {echo 'Pick Up to NutriTECH Office.';} else{echo $row->shipping_address;} ?></dd>
             
            <?php 
                  $fname = $row->first_name;
                  $mname = $row->middle_name;
                  $lname = $row->last_name;
                  $addr1 = $row->address;
                  $city  = $row->city;
                  $state = $row->state;
                  $country = $row->country;
                  $zip   = $row->zipcode;
                  $mobile = $row->mobile_number;
                  $email = $row->email;
                  $shipping = $row->shipping_address;

                  if($shipping == ''){
                    $shipping = 'Pick Up to NutriTECH Office.';
                  }

          } ?>
            </dl>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6">
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
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0.00;
                          $totalqty = 0;
                          $strxmlx = "";
                          foreach($summarycheckout as $row){ 

                          $strxmlx = $strxmlx . "<Items>";
                          $strxmlx = $strxmlx . "<itemname>" . $row->promo_code . "</itemname> <quantity>" . $row->quantity ."</quantity> <amount>" . $row->amount ."</amount>";
                          $strxmlx = $strxmlx . "</Items>";  ?>

                     <tr id="">
                      <td><?php echo $row->promo_code ?></td>
                      <td>&#8369; <?php echo number_format($row->amount,2) ?></td>
                       <td><?php echo $row->quantity ?></td>
                        <?php if( $row->type == 'P'){ ?>
                        <td><a href="#" id="<?php echo $row->promo_id ?>">View Bonus Product</a></td>
                      <?php }else{ ?>
                        <td></td>
                        <?php } ?>
                      </tr>
                  <?php $total    = $total + $row->amount ?>
                  <?php $totalqty = $totalqty + $row->quantity ?>
                  <?php } ?>
                  <tr style="font-weight: bold;">
                    <b><td>TOTAL </td></b>
                    <td>&#8369; <?php echo number_format($total,2); ?> </td>
                    <td><?php echo $totalqty; ?></td>
                    <td></td>
                      
                  </tr>
                  </tbody>
                </table>
            </div>
          </div>
      </form>
    </div>
   
<?php
          $_mid = "000000090616E1A0B248"; //<-- your merchant id // NUTRITECH MERCHANT ID = 000000090616E1A0B248 // test 00000013041670B45F4E
          $_requestid = substr(uniqid(), 0, 13);
          $_ipaddress = "122.2.48.48";
          $_noturl = 'http://wnutritech.com/payment_notification.php'; // url where response is posted
          $_resurl = 'http://wnutritech.com/test.php'; //url of merchant landing page
          $_cancelurl = 'http://shopsonline.wnutritech.com/';  //url of merchant landing page
          $_fname = $fname;
          $_mname = $mname;
          $_lname = $lname;
          $_addr1 = $shipping;
          $_addr2 = "";
          $_city = $city;
          $_state = $state;
          $_country = $country;
          $_zip = $zip;
          $_sec3d = "try3d";
          $_email = $email;
          $_phone = "";
          $_mobile = $mobile;
          $_clientip = $_SERVER['REMOTE_ADDR'];
          $_amount = sprintf('%0.2f', $total);
          $_currency = "PHP";
          $forSign = $_mid . $_requestid . $_ipaddress . $_noturl . $_resurl .  $_fname . $_lname . $_mname . $_addr1 . $_addr2 . $_city . $_state . $_country . $_zip . $_email . $_phone . $_clientip . $_amount . $_currency . $_sec3d;
          $cert = "85771CAD063E73835F102CDB3659BC3E"; //<-- your merchant key // NUTRITECH MERCHANT KEY = 85771CAD063E73835F102CDB3659BC3E // test EF8F0ACB9EBC9BA83507861419F5D54A
  
          $_sign = hash("sha512", $forSign.$cert);
          $xmlstr = "";
          
          $strxml = "";

          $strxml = $strxml . "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
          $strxml = $strxml . "<Request>";
          $strxml = $strxml . " <orders>";
          $strxml = $strxml . "<items>";
          $strxml = $strxml . $strxmlx;
          $strxml = $strxml . "</items>";
          $strxml = $strxml . "</orders>";
          $strxml = $strxml . "<mid>" . $_mid . "</mid>";
          $strxml = $strxml . "<request_id>" . $_requestid . "</request_id>";
          $strxml = $strxml . "<ip_address>" . $_ipaddress . "</ip_address>";
          $strxml = $strxml . "<notification_url>" . $_noturl . "</notification_url>";
          $strxml = $strxml . "<response_url>" . $_resurl . "</response_url>";
          $strxml = $strxml . "<cancel_url>" . $_cancelurl . "</cancel_url>";
          $strxml = $strxml . "<mtac_url>http://wnutritech.com/termsandcondition.html</mtac_url>";
          $strxml = $strxml . "<descriptor_note>'My Descriptor .18008008008'</descriptor_note>";
          $strxml = $strxml . "<fname>" . $_fname . "</fname>";
          $strxml = $strxml . "<lname>" . $_lname . "</lname>";
          $strxml = $strxml . "<mname>" . $_mname . "</mname>";
          $strxml = $strxml . "<address1>" . $_addr1 . "</address1>";
          $strxml = $strxml . "<address2>" . $_addr2 . "</address2>";
          $strxml = $strxml . "<city>" . $_city . "</city>";
          $strxml = $strxml . "<state>" . $_state . "</state>";
          $strxml = $strxml . "<country>" . $_country . "</country>";
          $strxml = $strxml . "<zip>" . $_zip . "</zip>";
          $strxml = $strxml . "<secure3d>" . $_sec3d . "</secure3d>";
          $strxml = $strxml . "<trxtype>sale</trxtype>";
          $strxml = $strxml . "<email>" . $_email . "</email>";
          $strxml = $strxml . "<phone>" . $_phone . "</phone>";
          $strxml = $strxml . "<mobile>" . $_mobile . "</mobile>";
          $strxml = $strxml . "<client_ip>" . $_clientip . "</client_ip>";
          $strxml = $strxml . "<amount>" . $_amount . "</amount>";
          $strxml = $strxml . "<currency>" . $_currency . "</currency>";
          $strxml = $strxml . "<mlogo_url>http://wnutritech.com/images/logo_final.png</mlogo_url>";
          $strxml = $strxml . "<pmethod></pmethod>";//CC, GC, PP, DP
          $strxml = $strxml . "<signature>" . $_sign . "</signature>";
          $strxml = $strxml . "</Request>";
          $b64string =  base64_encode($strxml);
         
         //echo $_amount;
 		  if($_amount > 0.00 && $shipping != ''){
 		  	 echo '<form name="form1" method="post" action="https://apps.paynamics.net/webpayment/Nutritech/Default.aspx">
                  <input type="hidden" name="paymentrequest" id="paymentrequest" value="'.$b64string.'" style="width:800px; padding: 10px;">
                  <input type="submit" class="btn-block" value="Continue" style="font-size: 25px;">
            </form>';
/*
             echo '<form name="form1" method="post" action="https://test.paynamics.net/apps/webpayment/Nutritech/Default.aspx">
                  <input type="hidden" name="paymentrequest" id="paymentrequest" value="'.$b64string.'" style="width:800px; padding: 10px;">
                  <input type="submit" class="btn-block" value="Continue" style="font-size: 25px;">
            </form>';*/

 		  }
     
?>
  </div>
</div>
<br><br>

<?php $this->load->view('menu/footer-menu'); ?>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Promo Item Breakdown</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $("#payment-option").hide();
  $("#cc1").hide();
  $("#cc2").hide();

// Breakdown
  $("td a").click(function(){
      promoid = $(this).attr("id");
      $("#myModal").modal('show');

      $.ajax({
          url: '<?= base_url("/shop/promobreakdown") ?>/' + promoid,
          type: 'GET',
          dataType: 'html',
          async: true,
          success: function(result) {
            $(".modal-body").html(result);
          },
          error: function(request, status, error) {
            $(".modal-body").html(status + ' , '  + error);
          }
      });
  });

$("#terms").click(function(){
  if( $("#delivery").val() =='' ){
    alert("Delivery Address must not be empty.");
    $("#delivery").focus();
  }
  else{
    $(this).button('loading');
    $("#payment-option").show();
  }
});

 $("#payments").change(function(){
    x = $("#payments option:selected").val();

    switch(x){
      case 'CC': $("#cc1").show();
                 $("#cc2").hide();
      break;
      case 'BN': $("#cc1").hide();
                 $("#cc2").hide();
      break;
      case 'INS': $("#cc2").show();
                  $("#cc1").hide();
      break;
    }
  });

</script>


