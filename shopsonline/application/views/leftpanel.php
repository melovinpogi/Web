<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>Nutritech Shops Online</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <!-- <div class="profile">
            <div class="profile_pic">
              <img src="http://nutritech.ph/images/logo1.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $username; ?></h2>
            </div>
          </div> -->
          <!-- /menu prile quick info -->
          <br />
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Main Menu</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-calendar"></i> Weekly Promo <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                     <?php foreach($promos as $row){ ?>
                        <li><a href="<?= base_url('weeklypromo/' . $row->promo_type . '/W'); ?>"><?php echo $row->promo_type; ?></a></li>
                     <?php }?>
                  </ul>
                </li>
                <li><a><i class="fa fa-calendar"></i> Monthly Promo <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <?php foreach($promosm as $row){ ?>
                        <li><a href="#"><?php echo $row->promo_type; ?></a></li>
                     <?php }?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
          <!-- /sidebar menu -->