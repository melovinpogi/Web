<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                    <?php if(check_user() != ''){  ?>
                        <li><a href="<?= base_url('shop/cart') ?>"><i class="fa fa-shopping-cart"></i> My Cart <span class="badge"><?php echo cartCount(); ?></span></a></li>
                        <li><a href="<?= base_url('shop/checkout') ?>"><i class="fa fa-check"></i> Checkout</a></li>
                        <li><a href="<?= base_url('logout') ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                    <?php }?>
                    </ul>
                </div>
            </div>
             <?php if(check_user() != ''){  ?>
            <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                             <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span style="font-family:monotype corsiva;font-style: italic;font-weight: bold;">Happy Day!</span> <?php echo check_user(); ?><b class="caret"></b></a>
                                <ul class="dropdown-menu" style="text-align: left;">
                                     <?php if(user_id() == 1){  ?>
                                      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-user-secret"></i> Administrator</a></li>
                                    <?php }?>
                                    <li><a href="<?= base_url('profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="<?= base_url('profile/changepassword') ?>"><i class="fa fa-key"></i> Change Password</a></li></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
             </div>
             <?php }?>
        </div>
    </div>
</div> <!-- End header area -->
