<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 class="page-title">SHOP</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <?php foreach ($item_description as $key) { ?>
                                    <div class="product-main-img">
                                        <img src="<?= base_url('assets/images/products/' . $key->item_photo) ?>" alt="">
                                    </div>
                                    <div class="product-gallery">
                                        <img src="<?= base_url('assets/images/products/' . $key->img_thumbnail1) ?>" alt="">
                                        <img src="<?= base_url('assets/images/products/' . $key->img_thumbnail2) ?>" alt="">
                                        <img src="<?= base_url('assets/images/products/' . $key->img_thumbnail3) ?>" alt="">
                                        <img src="<?= base_url('assets/images/products/' . $key->img_thumbnail4) ?>" alt="">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <?php foreach ($item as $key ) { ?>
                                    <h2 class="product-name"><?php echo $key->item_description; ?></h2>
                                    <div class="product-inner-price">
                                        <h3>&#8369; <?php echo number_format($key->unit_price,2); ?> - USD$ <?php echo number_format($key->unit_price / 47,2) ?></h3>
                                    </div>
                                    <?php } ?>    
                                    
                                    <div class="cart">
                                        <select id="ddpromo" class="form-control">
                                                <option value="0">-- SELECT PROMO --</option>
                                            <?php foreach ($ddpromo as $key) { ?> 
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->promo_description;?> - Php<?php echo number_format($key->orig_price, 2);?> - USD$ <?php echo number_format($key->orig_price / 47,2);?></option>
                                            <?php }?>
                                        </select><br>
                                        <button class="add_to_cart_button" >Add to cart <i class="fa fa-shopping-cart"></i></button>
                                    </div><br>

                                    <div role="tabpanel">
                                        <!-- <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description <i class="fa fa-bars"></i></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews <i class="fa fa-edit"></i></a></li>
                                        </ul> -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <?php foreach ($item_description as $key) { ?>
                                                    <p style="font-weight:bold;"><?php echo $key->item_description;?></p>
                                                    <b><p><?php echo $key->item_description_shop;?></p></b>
                                                <?php }?>
                                                
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>
                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-md-12">
                            <h4>View Bonus Product:</h4>
                            <?php if( $cntmonthly > 0 ) {
                                foreach ($monthly as $key) { ?>
                                <a style="cursor:pointer;" class="btn-custom" id="<?php echo $key->id ?>" >Monthly</a>
                            <?php } }?>
                            <?php if( $cntbooster > 0 ) {
                                foreach ($booster as $key) { ?>
                                <a style="cursor:pointer;" class="btn-custom" id="<?php echo $key->id ?>" >Booster</a>
                            <?php } }?>
                            <?php if( $cntspecials > 0 ) {
                                foreach ($specials as $key) { ?>
                                <a style="cursor:pointer;" class="btn-custom" id="<?php echo $key->id ?>" >Specials</a>
                            <?php } }?>
                        </div> -->
                        <br><br><br> 
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('menu/footer-menu'); ?>

     <script type="text/javascript">
     var jq = $.noConflict(true);
      jq(".label-info").hide();
      
      // Bonus Product
      jq("#ddpromo").change(function(){
            jqpromoid = jq("select option:selected").val();
             BootstrapDialog.show({
                type: BootstrapDialog.TYPE_SUCCESS,
                title: 'Bonus Product',
                message: jq('<div></div>').load('<?= base_url("/shop/bonusitem/' + jqpromoid +'")  ?>'),
                closable: true,
                closeByBackdrop: false,
                closeByKeyboard: false,
                buttons: [{
                label: 'Close',
                    action: function(dialog) {
                        dialog.close();
                        $(location).attr("href"," ");
                    }
                }]
            });
        });

        //Select Option
        jq("select").change(function(){
            if( jq("select option:selected").val() > 0 ){
                jq("#quantity").removeAttr("disabled");
            }
            else{
                jq("#quantity").attr("disabled","disabled");
            }
        });


        //Add to Cart
        jq(".add_to_cart_button").click(function(){
             promoid = jq("select option:selected").val();
             BootstrapDialog.show({
                title: 'Add to Cart <i class="fa fa-shopping-cart"></i>',
                message: jq('<div></div>').load('<?= base_url("/shop/addtocart/' + promoid +'/$itemid")  ?>'),
                buttons: [{
                label: 'Ok',
                    action: function(dialog) {
                        jq(location).attr('href','<?= base_url("/shop/checkout")?>');
                    }
                }]
            });
        });
      </script>


