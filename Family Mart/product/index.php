<?php 
$cat = $_GET["cat"];
$product = $_GET["product"];

if (empty($cat)) {
  $cat = "na";
}

if (empty($product)) {
  $product = "0";
}

echo $cat;

$xpath=  $_SERVER['DOCUMENT_ROOT'] . '/admin/fm/db.php';
require $xpath;


function conn(){
  $conn = mysqli_connect(SERVER, USER, PASSWORD,DB);
  return $conn;
}

if (empty($cat) && $product == "") {
  $sql = "SELECT * FROM product 
        where category = 'Chicken'
        LIMIT 1 order by id";
}
else{

$sql = "SELECT * FROM product 
        where category = case when $cat = '' then category else $cat end
              and id = case when $product = '' then id else $product end";
}

$result = mysqli_query(conn(),$sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { 

    //
  }
}

?>
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

                    <select class="form-control" name='filter' id='filter' style='background-color:#fff;color: #968d8d;border-top: 2px solid #00ae4c;border-bottom: 2px solid #00ae4c;border-right: 1px solid #00ae4c;border-left : 0px;' onchange="window.location.href=this.value"">

                      <?php 
                        $sql = "SELECT distinct category from product ";
                        $result = mysqli_query(conn(),$sql);

                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                             <option value='?cat=<?php echo $row["category"]; ?>' <?php if($row["category"] == $cat){ echo "selected";} ?> ><?php echo $row["category"]; ?></option>
                       <?php  }
                          }
                      ?>

                     

                    </select>

                  </div>

                </div>

              </div>

            </div>


            <?php
                if ($product == 0) {
             ?>
            <div class='featured-product-display-wrapper'>
               <?php 
                    $sql = "SELECT * FROM product WHERE category = case when '$cat' = 'na' then 'chicken' else '$cat' end LIMIT 1 ";
                    $result = mysqli_query(conn(),$sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                         <div class='featured-product-display-txt'>
                            <p class='featured-title-desc-main'><?php echo $row["title"]; ?></p>
                            <p class='featured-desc-main'><?php echo $row["content"]; ?></p>
                            <a style="overflow: hidden;text-overflow: ellipsis;" href='?cat=<?php echo $row["category"]; ?>&product=<?php echo $row["id"]; ?>' class='btn btn-orange' style='margin-left: 20px;margin-bottom: 10px'>Know More</a>
                           </div>
                             <div class='featured-product-display-img'>
                                <img src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"] ?>' class='img-responsive'>
                              </div>
                   <?php  }
                      }
                  ?>
            </div>
             <div class='product-main-wrapper'>
              <div class='product-main'>
                <div class='row'>
                  <center>

                    <?php 
                   $sql = "SELECT * FROM product WHERE category = case when '$cat' = 'na' then category else '$cat' end LIMIT 6";
                    $result = mysqli_query(conn(),$sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                         <div class='col-md-4'>
                            <div  class='product'  style=''>
                                <img src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path2"]) . "/" . $row["img_thumbnail"] ?>" alt="..." class="img-responsive" >
                                <br>
                                <a style="overflow: hidden;text-overflow: ellipsis;" href='?cat=<?php echo $row["category"]; ?>&product=<?php echo $row["id"]; ?>' class='btn btn-orange'><?php echo $row["title"]; ?></a>
                            </div>
                          </div>
                   <?php  }
                      }
                  ?>
                 
                </div>
              </div>
            </div>
            <?php } ?>


            <?php
                if ($product > 0) {
                
             ?>
            <!-- Else -->
            <div class='featured-product-display-wrapper'>
               <?php 
                    $sql = "SELECT * FROM product WHERE id=$product ";
                    $result = mysqli_query(conn(),$sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 

                            $pcs = $row["pcs"];
                            $srp = $row["srp"];
                          ?>

                        <div class='featured-product-display-txt'>
                          <p class='featured-title-desc'><?php echo $row["title"]; ?></p>
                          <p class='featured-desc'><?php echo $row["content"]; ?>
                          </p>
                        </div>
                        <div class='featured-product-display-img'>
                          <img height="358" width="555" src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"] ?>' class='img-responsive'>
                        </div>
                   <?php  }
                      }
                  ?>
              
                
            </div>

            <div class='product-info-wrapper'>

              <div class='product-desc-wrapper'>

                <div class='product-info-desc1'>
                  <p class='p-info-title'>Product Information</p>
                  <!--<p class='ingredients text-right'>Ingredients/Flavor</p>-->
                  <!--<hr class='hr1' >-->
                  <p class='pieces text-right'>Pieces</p>
                  <hr class='hr1'>
                  <p class='srp text-right'>SRP</p>
                  
                </div>
                <div class='product-info-desc2'>
                  <p class='p-info-title' style='opacity: 0;'>Dummy</p>
                  <!--<p class='ingredients text-left'>Chocolate Walnut and Oatmeal Raisin</p>-->
                  <!--<hr class='hr2' >-->
                  <p class='pieces text-left'><?php echo $pcs; ?></p>
                  <hr class='hr2'>
                  <p class='srp text-left'><?php echo $srp; ?></p>
                  
                </div>

              </div>

              <div class='product-carousel'>
              <p class='see-more-p' style='margin-left: 25px;color: #fff;'>See more chicken meals</p>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" id="carousel-meals">
                <ol class="carousel-indicators" style='opacity:0;z-index: -1;'>
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <div class='row'>
                      <center>
                         <?php 
                            $sql = "SELECT * FROM product WHERE category='$cat' ";
                            $result = mysqli_query(conn(),$sql);

                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {?>

                                  <div class='col-md-4'>
                                    <div  class='product'  style=''>
                                        <img src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path2"]) . $row["img_thumbnail"] ?>" alt="..." class="img-responsive" >
                                        <br>
                                        <a  style="overflow: hidden;text-overflow: ellipsis;" 
                                        href='?cat=<?php echo $cat; ?>&product=<?php echo $row["id"]; ?>' class='btn btn-orange'><?php echo $row["title"]; ?></a>
                                    </div>
                                  </div>
                           <?php  }
                              }
                          ?>
                      </center>
                    </div>
                    <div class="carousel-caption">
                      
                    </div>
                  </div>
                </div>

                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon " aria-hidden="true"><img src='../../img/arrow-left.png' class='img-responsive ' style='margin-top: 80px;'></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon " aria-hidden="true"><img src='../../img/arrow-right.png' class='img-responsive ' style='margin-top: 80px;'></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </div>

              

            </div>


            <?php }?>


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



    <script>

      $('#filter').change(function() {

     

        var selected = $(this).val();

        

        if(selected=='Chicken'){

          location.href='chicken.php';

        }

        else if(selected=='Snacks'){

          location.href='snacks.php';

        }

        else if(selected=='Desserts'){

          location.href='desserts.php';

        }

        else if(selected=='Treats'){

          location.href='treats.php';

        }

        else if(selected=='Savories'){

          location.href='savories.php';

        }

        else if(selected=='Dimsum'){

          location.href='dimsum.php';

        }

        else if(selected=='PNS'){

          location.href='pns.php';

        }

        else if(selected=='Sandwiches and Dogs'){

          location.href='sandwiches-and-dogs.php';

        }

        else if(selected=='Drinks'){

          location.href='drinks.php';

        }

        else if(selected=='Rice Meals'){

          location.href='rice-meals.php';

        }
        

      });

    </script>



    <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=

AIzaSyATA6S177i1RKmQyzlhj7cc1tIft5ywY6A&libraries=places&callback=initMap">

    </script>



   

</html>