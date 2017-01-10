<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 class="page-title"><?php echo strtoupper($x); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php foreach ($category as $key) { ?>
            <div class="col-md-3">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <a href="<?= base_url('shop/item/' . $key->id .'/'. $key->item_description) ?>">
                            <img style="border: 1px outset rgb(204, 204, 204);border-style: double;" src="<?= base_url('assets/images/products/' . $key->item_photo) ?>" alt="">
                        </a>
                    </div>
                    <h3 style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;width:100%;display:block;"><small><a href="<?= base_url('shop/item/' . $key->id .'/'. $key->item_description) ?>"><?php echo $key->item_description; ?></a></small></h3>
                    <div class="product-carousel-price">
                        <ins>Php <?php echo number_format($key->unit_price,2); ?></ins> - <ins>USD$ <?php echo number_format($key->unit_price / 47,2);/*currencyConverter("PHP","USD", $key->unit_price);*/ ?></ins> 
                    </div>  
                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?= base_url('shop/item/' . $key->id .'/'. $key->item_description) ?>">Select</a>
                    </div>                       
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>
</div>
<?php $this->load->view('menu/footer-menu'); ?>