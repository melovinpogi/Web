<?= menu(); ?><!-- End header area -->
    
<div class="slider-area">
    <div class="zigzag-bottom"></div>
    <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
        
        <div class="slide-bulletz">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="carousel-indicators slide-indicators">
                            <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                            <li data-target="#slide-list" data-slide-to="1"></li>
                            <li data-target="#slide-list" data-slide-to="2"></li>
                            <li data-target="#slide-list" data-slide-to="3"></li>
                        </ol>                            
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="single-slide">
                    <div class="slide-bg slide-one"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>Who is NutriTECH</h2>
                                            <p>NutriTECH is the premier distributor of EXCLUSIVE Quality Home Living Premium products in the Philippines 
                                                with a complete product line up that promotes healthy living. It is dedicated to increase the people's awareness 
                                                on their health and well-being while attending to their basic needs, i.e., Food, Water and Air. NutriTECH is a two - word composition: Nutrition and TECHnology.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="single-slide">
                    <div class="slide-bg slide-two"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>Our Products</h2>
                                            <p>Smart. Durable. Exclusive Products Right at Home</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="single-slide">
                    <div class="slide-bg slide-three"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>A Healthy Lifestyle</h2>
                                            <p>Get inspired. Living life All you need for a Healthy Lifestyle.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="single-slide">
                    <div class="slide-bg slide-four"></div>
                    <div class="slide-text-wrapper">
                        <div class="slide-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <div class="slide-content">
                                            <h2>Perfection in every home</h2>
                                            <p>Making Healthy Food Tastes Great, Water and Air Pure and Fresh. Making a Family Healthy Living an enjoyable part of our Everyday Lives.</p>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-check"></i>
                    <p>Quality</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-truck"></i>
                    <p>Free shipping</p><small>(Promo Only)</small>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">DINING</h2>
                    <div class="product-carousel">
                        <?php foreach ($dining as $key) { ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="<?= base_url('assets/images/products/' . $key->item_photo) ?>" alt="">
                                <div class="product-hover">
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Select</a>
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            <h2><a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>"><?php echo $key->item_description ?></a></h2>
                            <div class="product-carousel-price">
                                <ins>Php <?php echo number_format($key->unit_price,2); ?></ins> - <ins>USD$ <?php echo number_format($key->unit_price / 47,2);?></ins> 
                            </div> 
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">LIVING</h2>
                    <div class="product-carousel">
                        <?php foreach ($living as $key) { ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="<?= base_url('assets/images/products/' . $key->item_photo) ?>" alt="">
                                <div class="product-hover" style="border:0px;">
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Select</a>
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            <h2><a style="color: white !important;" href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>"><?php echo $key->item_description ?></a></h2>
                            <div class="product-carousel-price">
                                <ins style="color:white;">Php <?php echo number_format($key->unit_price,2) ?></ins> - <ins style="color:white;">USD$ <?php echo number_format($key->unit_price / 47,2);?></ins> 
                            </div> 
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

   <div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">GIVING</h2>
                    <div class="product-carousel">
                        <?php foreach ($giving as $key) { ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="<?= base_url('assets/images/products/' . $key->item_photo) ?>" alt="">
                                <div class="product-hover">
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Select</a>
                                    <a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                </div>
                            </div>
                            <h2><a href="<?= base_url('shop/item/' . $key->id . '/' . $key->item_description) ?>"><?php echo $key->item_description ?></a></h2>
                            <div class="product-carousel-price">
                                <ins>Php <?php echo number_format($key->unit_price,2); ?></ins> - <ins>USD$ <?php echo number_format($key->unit_price / 47,2);?></ins> 
                            </div> 
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php $this->load->view('menu/footer-menu'); ?>


