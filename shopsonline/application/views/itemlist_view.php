<div class="right_col" role="main">

        <div class="">
          <div class="page-title center-block" style="padding: 10px;height: 80px;">
            <div class="title_left">
              <img src="<?= base_url('assets/images/logo.png'); ?>" class="img-responsive ">
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <ol class="breadcrumb">
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="active">Purchase Item</li>
                  </ol>
                 <h2>Nutritech Shops Online <small>Always on the go!</small> <i class="fa fa-shopping-cart"></i></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-image">
                      <img src="images/prod1.jpg" alt="..." />
                    </div>
                    <div class="product_gallery">
                      <a>
                        <img src="images/prod2.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/prod3.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/prod4.jpg" alt="..." />
                      </a>
                      <a>
                        <img src="images/prod5.jpg" alt="..." />
                      </a>
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title">
                       <?php foreach($itemtitle as $row){ ?>
                          <?php echo $row->itemname; ?>
                      <?php }?>
                    </h3>

                    <p> <?php foreach($itemdesc as $row){ ?>
                          <?php echo $row->itemname; ?>
                      <?php }?></p>
                    <br />

                    <div class="">
                      <div class="product_price">
                        <h1 class="price">&#8369; <?php foreach($itemprice as $row){ 
                                                    $number = $row->totalprice;
                                                      echo number_format($number,2); 
                                                  }?>
                          <br>$ <?php echo currencyConverter("PHP","USD", $row->totalprice); ?>

                        </h1>
                        <!-- <span class="price-tax">Ex Tax: Ksh80.00</span> -->
                        <br>
                      </div>
                    </div>

                    <div class="">
                      <?php if($username == ''){ ?>
                        <a href="<?= base_url('/login') ?>" class="btn btn-success btn-lg">Sign In <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        <a href="<?= base_url('/register') ?>" class="btn btn-warning btn-lg">Register <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <?php } else{ ?>
                        <button type="button" id="getproduct" class="btn btn-success btn-lg">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                       <!--  <a type="button" class="btn btn-warning btn-lg">Add to Wishlist <i class="fa fa-heart"></i></a> -->
                        <?php }?>
                        <?php if($cartcount > 0 ){?>
                            <a type="button" class="btn btn-warning btn-lg" href="<?= base_url('/checkout') ?>">Proceed to Checkout <i class="fa fa-check" aria-hidden="true"></i></a>
                        <?php }?>
                    </div>

                    <!-- <div class="product_social">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                        <li><a href="#"><i class="fa fa-rss-square"></i></a>
                        </li>
                        </li>
                      </ul>
                    </div> -->
                  </div>

                  <div class="col-md-12">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Product Description</a></li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Composition</a></li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="customer-tab" data-toggle="tab" aria-expanded="false">Customer Review</a></li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
                            text ever since the 1500s, when an unknown printer took a galley of type and scrambled it 
                            to make a type specimen book. It has survived not only five centuries, but also the leap 
                            into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                             release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                            software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Product Details </h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <?php if($username == ''){ ?>
                                    <h1>You need to Sign In.</h1>
                                <?php } else{ ?>
                                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                                  <thead>
                                    <tr class="headings">
                                      <th class="column-title">No. </th>
                                      <th class="column-title">Item Code </th>
                                      <th class="column-title">Item Description </th>
                                      <th class="column-title">Distribution Type</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php foreach($composition as $row){ ?>
                                       <tr class="<?php echo $row->status; ?>">
                                        <td class=" "><?php echo $row->row; ?></td>
                                        <td class=" "><?php echo $row->item_code; ?></td>
                                        <td class=" "><?php echo $row->item_description; ?></td>
                                        <td class=" "><?php echo $row->distribution_type; ?></td>
                                      </tr>
                                    <?php }?>
                                  </tbody>
                                </table>
                                <?php }?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="customer-tab">
                          <div class="col-md-6">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Comments </h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div class="well">
                                  <div class="text-left">
                                      <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Leave a Review <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                      </a>
                                      <div class="collapse" id="collapseExample">
                                        <div class="well">
                                          <?php echo form_open('login'); ?>    
                                                <label for="email">Write Comment:</label>
                                                <textarea class="form-control" rows="3" required></textarea>
                                                <p>Rate: 
                                                  <span class="fa fa-star"></span>
                                                  <span class="fa fa-star"></span>
                                                  <span class="fa fa-star"></span>
                                                  <span class="fa fa-star"></span>
                                                  <span class="fa fa-star"></span>
                                                </p>
                                                <br>
                                                <button class="btn btn-success btn-block" type="submit">Submit Review <i class="fa fa-send" aria-hidden="true"></i></button>
                                          <?php echo form_close(); ?>
                                        </div>
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <span class="fa fa-star" style="color: #219FD1;"></span>
                                          <span class="fa fa-star" style="color: #219FD1;"></span>
                                          <span class="fa fa-star" style="color: #219FD1;"></span>
                                          <span class="fa fa-star" style="color: #219FD1;"></span>
                                          <span class="fa fa-star" style="color: #219FD1;"></span>
                                          Anonymous
                                          <span class="pull-right">10 days ago</span>
                                          <p>This product was great in terms of quality. I would definitely buy another!</p>
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                      <div class="col-md-12">
                                        <span class="fa fa-star" style="color: #219FD1;"></span>
                                        <span class="fa fa-star" style="color: #219FD1;"></span>
                                        <span class="fa fa-star" style="color: #219FD1;"></span>
                                        <span class="fa fa-star" style="color: #219FD1;"></span>
                                        <span class="fa fa-star" style="color: #219FD1;"></span>
                                          Anonymous
                                          <span class="pull-right">12 days ago</span>
                                          <p>I've alredy ordered another one!</p>
                                      </div>
                                  </div>
                                    <hr>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right"><a href="http://nutritech.ph">Nutritech Alliance Corporation 2016</a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>


      <script type="text/javascript">
      $(document).on("click","#getproduct",function(){
        BootstrapDialog.show({
            message: 'Are you sure you want to add this to your cart?',
            buttons: [{
                icon: 'glyphicon glyphicon-send',
                label: 'Submit',
                cssClass: 'btn-primary',
                autospin: true,
                action: function(dialogRef){
                    dialogRef.enableButtons(false);
                    dialogRef.setClosable(false);
                    dialogRef.getModalBody().html('Please Wait...');
                    $.ajax({
                      url: 'getproduct',
                      type: 'GET',
                      async: true,
                      success: function(content) {
                         dialogRef.getModalBody().html('<i class="fa fa-check"></i> Item Successfully Added to your cart. <a href="#" onclick="goBack()" class="btn btn-link">Thank you for Shopping. Shop Again!</a>');
                      },
                      error: function(request, status, error) {
                        dialogRef.getModalBody().html('<i class="fa fa-times-circle"></i> Network Error. Please Try again later.');
                      }
                    });
                    // setTimeout(function(){
                    //     dialogRef.close();
                    //     $(location).attr("href","");
                    // }, 2000);
                }
            }, {
                label: 'Close',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }]
          });
        });

      function goBack() {
          window.history.back();
      }
      </script>