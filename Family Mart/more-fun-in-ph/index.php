<?php
$cat = $_GET["category"];
$article = $_GET["article"];

if (empty($cat)) {
  $cat = "more-in-ph";
}

if (empty($article)) {
  $article = "0";
}


$xpath=  $_SERVER['DOCUMENT_ROOT'] . '/admin/fm/db.php';
require $xpath;

function conn(){
  $conn = mysqli_connect(SERVER, USER, PASSWORD,DB);
  return $conn;
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

              <li ><a href="../product/" class="second-nav">Product</a></li>

              <li><a href="../promo/" class="second-nav">Promos</a></li>

              <li class="dropdown">
                <a class="dropdown-toggle second-nav" data-toggle="dropdown" href="#">
                  Article <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                   <li ><a href="../article/?category=more-in-ph" class="second-nav">It's more fun in the Philippines</a></li>
                    <li ><a href="../article/?category=visit-japan" class="second-nav">Visit Japan</a></li>
                </ul>
              </li>

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

                  <img src='../img/featured-article.png' class='featured-products'>

                </div>

              </div>

              <div class='col-md-4'></div>

              <div class='col-md-4 '>
                <!--
                <div class='filter-products'>

                  <div class='input-group'>

                    <span class='input-group-addon' style='background-color:#fff;color: #ececec;border-top: 2px solid #00ae4c;border-left: 1px solid #00ae4c;border-bottom: 2px solid #00ae4c;border-right: 0px;'>Filter by:</span>

                    <select class="form-control" name='filter' id='filter' style='background-color:#fff;color: #968d8d;border-top: 2px solid #00ae4c;border-bottom: 2px solid #00ae4c;border-right: 1px solid #00ae4c;border-left : 0px;'>

                      <option value='Chicken' selected="">Chicken</option>

                      <option value='Rice Meals'>Rice Meals</option>

                      <option value='Sandwiches and Dogs'>Sandwiches and Dogs</option>

                      <option value='Drinks'>Drinks</option>

                      <option value='Desserts'>Desserts</option>

                      <option value='Treats'>Japanese Treats</option>

                      <option value='Dimsum'>Dimsum</option>

                      <option value='Savories'>Hot Savories</option>

                      <option value='PNS'>Pasta, Noodles and Soup</option>

                    </select>

                  </div>

                </div>
                -->
              </div>

            </div>

            <h1 class='pin-it'>Pint it!</h1>

            
            <div class='row'>
              <div class='col-md-8'>
                 <?php 
                  $sql = "SELECT * from article where category='$cat' and id = case when $article = 0 then (select id from article where category='$cat' order by id desc limit 1) else $article end ";
                  $result = mysqli_query(conn(),$sql);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { ?>
                      <p class='pin-it-desc'><?php echo $row["title"]; ?></p>
                      <p class='pin-it-date'>Posted on <?php echo $row["date_posted"]; ?></p>

                      <div class='featured-article'>
                        <img src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"] ?>' class='img-responsive  ' >
                        <?php echo $row["content"]; ?>
                    </div>
                    
                 <?php  }
                    }
                ?>
              </div>
            
              <div class='col-md-4'>
                <center>
                <img src='../img/most-read-article.png' class=''>
                </center>
                <?php 
                  $sql = "SELECT * from article where category='$cat' and id <> $article ORDER by id desc LIMIT 4 ";
                  $result = mysqli_query(conn(),$sql);

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { ?>
                      <div class='most-read-article'>
                        <a href='/article/?category=<?php echo $cat ?>&article=<?php echo $row["id"] ?>'><img src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"] ?>' class='img-responsive ' width="271"></a>
                        <p class='most-read-title'><?php echo $row["title"]; ?></p>
                        <p class='most-read-desc'><?php echo $row["content"]; ?></p>
                      </div>
                    
                 <?php  }
                    }
                ?>
                
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