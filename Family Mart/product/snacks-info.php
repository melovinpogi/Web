<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Family Mart</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="../css/custom.css" rel="stylesheet">

    <link rel="shortcut icon" href="../img/favicon.jpg" type="image/x-icon">

    <!-- DataTables CSS -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="../js/ajax/jquery.min.js"></script>

    <link href="../css/chosen.css" rel="stylesheet">


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
    <body>
    <!-- Social Plugin -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1616106375352103";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Navigation -->
    <!--
      <nav class="navbar navbar-default navbar-static-top" style="background-color: #0079c5;border-color: #0079c5;">
          <div class="container-fluid">
              <ul class="nav navbar-nav navbar-right" >
              <li><a class="first-nav" href="#">How to franchise</a></li>
              <li><a class="first-nav" href="#">Careers</a></li>
              </ul>
          </div>
      </nav>
      -->
      <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #fff;border-color:  #fff;margin-top: ;">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <div class="container-fluid" style="background-color: #0079c5;border-color: #0079c5;">
              <ul class="nav navbar-nav navbar-right" >
              <li><a class="first-nav" href="../franchise/">How to franchise</a></li>
              <li><a class="first-nav" href="../careers/">Careers</a></li>
              </ul>
          </div>
          </div>
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1,#bs-example-navbar-collapse-2" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home" style="padding-right:10px;margin-left: -40px;"><img src="../img/final-company-logov1.jpg" class="img-responsive"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li ><a href="../" class="second-nav">Home <span class="sr-only">(current)</span></a></li>
              <li class="active"><a href="#" class="second-nav">Product</a></li>
              <li><a href="../promo/" class="second-nav">Promos</a></li>
              <!--<li><a href="#morefun" class="second-nav">More Fun in the Philippines</a></li>
              <li><a href="#visitjapan" class="second-nav">Visit Japan</a></li>-->
              <li><a href="../snap/" class="second-nav">Snap Card</a></li>
              <li><a href="../about/" class="second-nav">About</a></li>
              <li><a href="../#branches" class="second-nav">Branches</a></li>
              <li><a href="../#contactus" class="second-nav">Contact</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <header id="product">

    
          <div class='p-header-design'></div>
          
          <div class='product-wrapper'>
            <div class='container-fluid'>
            <div class='row'>
              <div class='col-md-4'>
                <div class='featured-products-title'>
                  <img src='../img/featured-products.png' class='featured-products'>
                </div>
              </div>
              <div class='col-md-4'></div>
              <div class='col-md-4 '>
                <div class='filter-products'>
                  <div class='input-group'>
                    <span class='input-group-addon' style='background-color:#fff;color: #ececec;border-top: 2px solid #00ae4c;border-left: 1px solid #00ae4c;border-bottom: 2px solid #00ae4c;border-right: 0px;'>Filter by:</span>
                    <select class="form-control" name='filter' id='filter' style='background-color:#fff;color: #968d8d;border-top: 2px solid #00ae4c;border-bottom: 2px solid #00ae4c;border-right: 1px solid #00ae4c;border-left : 0px;'>
                      <option value='Chicken'>Chicken</option>
                      <option value='Snacks' >Rice Meals</option>
                      <option value='Sandwiches and Dogs' >Sandwiches and Dogs</option>
                      <option value='Drinks'>Drinks</option>
                      <option value='Desserts'>Desserts</option>
                      <option value='Japanese Treats'>Japanese Treats</option>
                      <option value='Dimsum'>Dimsum</option>
                      <option value='Hot Savories'>Hot Savories</option>
                      <option value='Pasta, Noodles and Soup'>Pasta, Noodles and Soup</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class='featured-product-display-wrapper'>
              
                <div class='featured-product-display-txt'>
                  <p class='featured-title-desc'>COOKIES</p>
                  <p class='featured-desc'>Get that cookie fix with the<br><br>homebaked goodness of<br><br>FamilyMart's Chocolate Walnut<br><br>and Oatmeal Raisin cookies!
                  </p>
                </div>
                <div class='featured-product-display-img'>
                  <img src='../img/featured-product-cookie.jpg' class='img-responsive'>
                </div>
             
            </div>

            <div class='product-info-wrapper'>

              <div class='product-desc-wrapper'>

                <div class='product-info-desc1'>
                  <p class='p-info-title'>Product Information</p>
                  <p class='ingredients text-right'>Ingredients/Flavor</p>
                  <hr class='hr1' >
                  <p class='pieces text-right'>Pieces</p>
                  <hr class='hr1'>
                  <p class='srp text-right'>SRP</p>
                  
                </div>
                <div class='product-info-desc2'>
                  <p class='p-info-title' style='opacity: 0;'>Dummy</p>
                  <p class='ingredients text-left'>Chocolate Walnut and Oatmeal Raisin</p>
                  <hr class='hr2' >
                  <p class='pieces text-left'>1 (one)</p>
                  <hr class='hr2'>
                  <p class='srp text-left'>PHP 38</p>
                  
                </div>

              </div>

              <div class='product-carousel'>
              <p class='see-more-p' style='margin-left: 25px;color: #fff;'>See more afternoon snacks</p>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" id="carousel-meals">
                <ol class="carousel-indicators" style='opacity:0;'>
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <center>
                      <div  id='prod1' class='product' style='display:  inline-block; '>
                        <img class='prod1' class='' src="../img/prod2.png" alt="..." >
                        <br>
                        <button class='btn' style='background-color: #cc7e21;border:1.5px dashed #fff;width:150px;color:#fff;border-radius:8px;'>Hotdog Sandwich</button>
                      </div>
                      <div id='prod2' class='product'  style=''>
                        <img class='prod2' src="../img/prod3.png" alt="..." >
                        <br>
                        <button class='btn prod2' style='background-color: #cc7e21;border:1.5px dashed #fff;width:150px;color:#fff;border-radius:8px;'>Siopao</button>
                      </div>
                      <div id='prod3' class='product' style='display:  inline-block; '>
                        <img class='prod3'  src="../img/prod1.png" alt="..." >
                        <br>
                        <button  class='btn prod3' style='background-color: #cc7e21;border:1.5px dashed #fff;width:150px;color:#fff;border-radius:8px;'>Twirl</button>
                      </div>
                      </center>
                    <div class="carousel-caption">
                      ...
                    </div>
                  </div>
                  ...
                </div>

                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon " aria-hidden="true"><img src='../img/arrow-left.png' class='img-responsive ' style='margin-top: 80px;'></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon " aria-hidden="true"><img src='../img/arrow-right.png' class='img-responsive ' style='margin-top: 80px;'></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </div>

              

            </div>

            

          </div>
          </div>

          <div class='footer-img'>
          </div>

          <div class="footer-default">  
            <div class="container-fluid" style='padding-top: 40px;width:1200px;max-width: 100%;'>
                <div class="row">
                  <div class="col-sm-3">
                    <p >2017 Philippine FamilyMart CVS Inc. |</p>
                  </div>
                  <div class="col-sm-3 col-lg-push-1" style='margin-top: -8px;'>
                    <p class='text-center' style='display: inline-block;'>Follow us on</p> <a href='https://www.facebook.com/familymartph/'><img style='display: inline-block;' src="../img/fb-logo.png" class='img-responsive'></a><a href='https://www.instagram.com/familymartph/'><img style='display: inline-block;' src="../img/insta-logo.png" class='img-responsive'></a>
                    <!--<div class="fb-follow" data-href="https://web.facebook.com/familymartph/" data-layout="button" data-size="small" data-show-faces="false"></div>-->
                  </div>
                  <div class="col-sm-3 col-md-push-1" style=''>
                   <p  style='display: inline-block;'>| Download the Snap App</p>
                  </div>
                  <div class="col-sm-3" style='margin-top: -5px;'>
                  <a href='https://itunes.apple.com/ph/app/familymart-snap-app/id913973376?mt=8'><img style='display: inline-block;' src="../img/footer-ios.png" class='img-responsive'></a><a href='https://play.google.com/store/apps/details?id=com.appsolutely.familymartapppoints&hl=en'><img style='display: inline-block;' src="../img/footer-android.png" class='img-responsive'></a>
                  <!--
                  <div class="fb-follow" data-href="https://web.facebook.com/familymartph/" data-layout="button" data-size="small" data-show-faces="false"></div>-->
                  </div>
              </div>
            </div>
          </div>
      
      
      </header>

          
     

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/storelocator.js"></script>
    <script src="../js/chosen.jquery.min.js"></script>

   

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyATA6S177i1RKmQyzlhj7cc1tIft5ywY6A&libraries=places&callback=initMap">
    </script>

   
</html>