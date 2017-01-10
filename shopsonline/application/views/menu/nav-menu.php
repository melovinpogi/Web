<div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?= base_url('home') ?>">
                          <span style="font-family: Garamond;color: grey;font-style: italic;font-weight: 600;">Nutri</span><span style="font-family: Garamond,Baskerville,Baskerville Old Face,Hoefler Text,Times New Roman,serif;font-weight: 600;">TECH</span>
                          <span> Shops Online</span></a></h1>
                    </div>
                </div>
                <?php if(check_user() != ''){ ?>
                <!-- <div class="col-sm-6">
                    <div class="col-lg-10" style="margin-top:8%;">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </div>
                </div> -->
                <?php } ?>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if(check_user() != ''){ ?>
                            <li class="active"><a href="<?= base_url('/home') ?>">Home</a></li>
                            <li>
                              <a href="#" id="diningdd" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dining
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dLabel" style="background-color:black;">
                               <li><a href="<?= base_url('dining/cookware/1') ?>" id="cookware">Cookware Specials </a></li>
                               <li><a href="<?= base_url('dining/touch/4') ?>" id="touch">A Touch of Class Cookwares</a></li>
                               <li><a href="<?= base_url('dining/china/6') ?>" id="china">Hand crafted prince thobian fine bone China collection</a></li>
                               <li><a href="<?= base_url('dining/crystal/5') ?>" id="crystal">Hand crafted ludovica Francis fine crystal collection</a></li>
                               <li><a href="<?= base_url('dining/adrian/7') ?>" id="adrian">Adrian fine tableware with inlaid gold collection</a></li>
                               <li><a href="<?= base_url('dining/cutlery/12') ?>" id="cutlery">Professional Cutlery Collection</a></li>
                              </ul>
                            </li>
                            <li>
                              <a href="#" id="livingdd" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Living
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dLabel" style="background-color:black;">
                               <li><a href="<?= base_url('living/foodprocessing/3') ?>" id="foodprocessing">Professional Juice and Food Processing System</a></li>
                               <li><a href="<?= base_url('living/waterfiltration/8') ?>" id="waterfiltration">Water Filtration & Air Purification System</a></li>
                              </ul>
                            </li>
                            <li>
                              <a href="#" id="givingdd" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Giving
                                <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dLabel" style="background-color:black;">
                               <li><a href="<?= base_url('giving/fastbreak/2') ?>" id="fastbreak">Fast Break items & Kitchen Accessories</a></li>
                              </ul>
                            </li>
                        <?php } else{ ?>
                            <li class="active"><a href="#"></a></li>
                        <?php } ?>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->