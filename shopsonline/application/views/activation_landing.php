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
                    <li class="active">Landing Page</li>
                  </ol>
                 <h2>Nutritech Shops Online <small>Always on the go!</small> <i class="fa fa-shopping-cart"></i></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php foreach($count as $row){ ?>
                      <?php if($row->count > 0){ ?>
                          <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                            <strong><i class="fa fa-check"></i> Account Successfully Activated!</strong> 
                          </div>
                      <?php }else{ ?>
                          <div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
                            <strong><i class="fa fa-times-circle"></i> Activation Error.</strong> 
                          </div>
                      <?php } ?>

                      <script type="text/javascript">
                        setInterval(  function(){ 
                            //window.location = "<?= base_url('/login') ?>";
                            window.location = "http://shopsonline.wnutritech.com/";
                         }, 1300);  
                      </script>

                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
       <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right"><a href="http://wnutritech.com">Nutritech Alliance Corporation 2016</a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>

      