<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 style="font-weight:bold;">MY CART</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
    
    
<div class="single-product-area center-block">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <!-- <th class="product-thumbnail">&nbsp;</th> -->
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $ordertotal = 0; ?>
                                <?php foreach ($summarycheckout as $key ) { ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" id="x-<?php echo $key->id ?>" class="remove" style="cursor:pointer;"><i class="fa fa-times" aria-hidden="true"></i></a> 
                                        </td>
                                       <!--  <td class="product-thumbnail">
                                            <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?= base_url('assests/images/products/' . $key->item_photo) ?>"></a>
                                        </td> -->
                                        <td class="product-name">
                                            <a href="#"><?php echo $key->promo_code; ?></a> 
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">Php <?php echo number_format($key->orig_price,2); ?></span> 
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <select id="<?php echo $key->id ?>" value="<?php echo $key->quantity ?>" class="form-control">
                                                    <?php switch ($key->quantity) {
                                                        case 1:
                                                            echo '<option value="1" selected>1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 2:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2" selected>2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 3:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3" selected>3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 4:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4" selected>4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 5:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5" selected>5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 6:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6" selected>6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 7:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7" selected>7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 8:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8" selected>8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 9:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9" selected>9</option>';
                                                            echo '<option value="10">10</option>';
                                                            break;
                                                        case 10:
                                                            echo '<option value="1">1</option>';
                                                            echo '<option value="2">2</option>';
                                                            echo '<option value="3">3</option>';
                                                            echo '<option value="4">4</option>';
                                                            echo '<option value="5">5</option>';
                                                            echo '<option value="6">6</option>';
                                                            echo '<option value="7">7</option>';
                                                            echo '<option value="8">8</option>';
                                                            echo '<option value="9">9</option>';
                                                            echo '<option value="10" selected>10</option>';
                                                            break;
                                                    }
                                                     ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">Php <?php echo number_format($key->amount,2); ?></span> 
                                        </td>
                                    </tr>
                                    <?php $ordertotal = $ordertotal +  $key->amount; ?>
                                    <?php } ?>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <a href="<?= base_url('shop/checkout') ?>"  <?php if($ordertotal == 0){ echo "disabled"; } ?>
                                                class="btn-custom btn-block btn">Proceed to Checkout <i class="fa fa-check"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>
                                <table cellspacing="0">
                                    <tbody>
                                        <!-- <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Pick Up</td>
                                        </tr> -->
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">Php <?php echo number_format($ordertotal,2) ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="<?= base_url('home') ?>" class="btn-custom btn-block btn">Continue Shopping <i class="fa fa-shopping-cart"></i></a>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('menu/footer-menu'); ?>

<script type="text/javascript">
    $( "select" ).change(function() {
      idnumber  = $(this).attr("id");
      qty       = $("#" + idnumber ).val();
      type      = $("#type-" + idnumber).val();
      window.location = "<?= base_url('/shop/updatecart/" + idnumber + "/" + qty + "/X') ?>";
    });

    $(".remove").click(function(){
        idnumber = $(this).attr("id");
        BootstrapDialog.show({
            title: 'Remove Item',
            message: 'Are you sure you want to remove this item?',
            buttons: [{
                label: 'Yes',
                action: function(dialog) {
                    dialog.getModalBody().html("Please Wait...");
                    dialog.getModalBody().html( $("<div></div>").load("<?= base_url('/shop/removecart/" + idnumber.replace("x-","") + "') ?>") );
                    $(location).attr("href","<?= base_url('/shop/cart') ?>")
                }
            }, {
                label: 'No',
                action: function(dialog){
                    dialog.close();
                }
            }]
        });
    });

</script>