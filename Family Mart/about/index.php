<?php
$xpath=  $_SERVER['DOCUMENT_ROOT'] . '/admin/fm/db.php';
require $xpath;


function conn(){
  $conn = mysqli_connect(SERVER, USER, PASSWORD,DB);
  return $conn;
}

$sql = "SELECT * FROM content where page_name = 'about'";
$result = mysqli_query(conn(),$sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) { 

    switch ($row["id"]) {
      case 22:
        $imgheader = str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        break;
      case 23:
        $img1 = str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        $content1 = $row["content"];
        break;
      case 24:
        $img2 = str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        $content2 = $row["content"];
        break;
       case 25:
        $img3 = str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        $content3 = $row["content"];
      case 26:
        $content4 = $row["content"];
        break;
       case 27:
        $m1 = $row["content"];
        $m2 = $row["content2"];
        $m3 = $row["content3"];
        $m4 = $row["content4"];
        break;
        case 31:
         $v = $row["content"];
        break;
       case 44:
        $title1 = $row["content_title"];
        $c1 = $row["content"];
        break;
      case 45:
        $c2 = $row["content"];
        $i1 =  str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        break;
      case 46:
        $title2 = $row["content_title"];
        $c3 = $row["content"];
        break;
      case 47:
        $c4 = $row["content"];
        $i2 =  str_replace('/home/familyma/public_html','',$row["img_path"]) . "/" . $row["img_name"];
        break;
      default:
        # code...
        break;
    }
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

              <li><a href="../product/" class="second-nav">Product</a></li>

              <li><a href="../promo/" class="second-nav">Promos</a></li>

              <!--<li><a href="#morefun" class="second-nav">More Fun in the Philippines</a></li>

              <li><a href="#visitjapan" class="second-nav">Visit Japan</a></li>-->

              <li><a href="../snap/" class="second-nav">Snap Card</a></li>

              <li class="active"><a href="#" class="second-nav">About</a></li>

              <li><a href="../#branches" class="second-nav">Branches</a></li>

              <li><a href="../#contactus" class="second-nav">Contact</a></li>

            </ul>



          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->

      </nav>



      <header id="about">



    

          <div class='p-header-design'></div>

          

          <div class='about-wrapper'>

            <div class='container-fluid'>

              <div class='about-hdr-img'>

                <img src='<?php echo $imgheader; ?>' class='img-responsive' style='width: 100%;'>

              </div>

            

              <div class='row' style='margin-top: 10px;'>

                <div class='col-md-6'>

                  <div class='about-column-a'>

                    <?php echo $content1; ?>
                    </p>

                  </div>

                </div>

              

                <div class='col-md-6' style=''>

                  <img src=' <?php echo $img1; ?>' class='img-responsive' style='width: 100%;'> 

                </div>

              </div>



              <div class='row' style='margin-top: 10px;'>



                <div class='col-md-6' style=''>

                  <img src=' <?php echo $img2; ?>' class='img-responsive' style='width: 100%;'> 

                </div>



                <div class='col-md-6'>

                  <div class='about-column-d'>

                    <?php echo $content2; ?>

                  </div>

                </div>

              </div>



            </div> <!-- Container fluid -->

          </div> <!-- About wrapper -->



          <div class='container-fluid ' style='background-color: #0079c5;height:  auto;'>

            <div class='whoweare-wrapper'>

              <div class='row' style='margin-top: 10px;'>

                <div class='col-md-6'>

                  <div class='about-column-f'>

                    <p class='text-center about-column-f-title'>WHO WE ARE</p>
                    <p>
                     <?php echo $content3; ?>

                    </p>

                  </div>

                </div>

                <div class='col-md-6'>

                    <img src=' <?php echo $img3; ?>' class='img-responsive' style=''> 

                </div>

              </div>



            </div>

          </div>



          <div class='about-wrapper-2'>

            <hr class='middle-desc-hr'>

            <div class='middle-desc'>

              <p class='text-center '><?php echo  $content4; ?>
              </p>

            </div>

            <hr class='middle-desc-hr'>



            <div class='container-fluid ' style='margin-top:  -30px;padding:  0px 30px 0px 30px;'>

              <h1 class='about-mission'>MISSION</h1>

              <div class='row'>

                <div class='col-md-3'>

                  <div class='mission-desc'>

                    <p><?php echo $m1; ?>
                    </p>

                  </div>

                </div>

                <div class='col-md-3'>

                  <div class='mission-desc'>

                    <p><?php echo $m2; ?>



                    </p>

                  </div>

                </div>

                <div class='col-md-3'>

                  <div class='mission-desc'>

                    <p><?php echo $m3; ?>

                    </p>

                  </div>

                </div>

                <div class='col-md-3'>

                  <div class='mission-desc'>

                    <p><?php echo $m4; ?>

                    </p>

                  </div>

                </div>

              </div>



              <h1 class='about-vision'>vision</h1>

              <div class='vision-desc'>

                  <p>

                    <?php echo $v; ?>

                  </p>

              </div>

            </div><!-- Container-Fluid -->

            <hr class='middle-desc-hr'>



            <div class='container-fluid ' style=''>

              <h1 class='corp-val text-center'>Corporate Values</h1>

              <!--

              <div class='row'>

                <div class='col-md-4' style='background-color: black;' >

                  <div >

                    <img src='../img/corp-val-e.png '>

                  </div>

                </div>

                <div class='col-md-8 ' style='background-color:blue;'>

                  <div class='corp-val-wrapper1'>

                    <p class='text-center '><span class='corp-val-title'>Excellence and Quality</span><br>

                    <span class='corp-val-desc'>High standards, excellence in everything we do,<br>

                    “hindi pwede ang pwede na”</span>

                    </p>

                  </div>

                </div>

              </div>

              -->

              <div class='row'>

                 <?php
                  $sql = "SELECT * FROM content where page_name = 'about' and id between 32 and 37 order by id";
                  $result = mysqli_query(conn(),$sql);

                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>

                    <div class='col-md-12' style='margin-top:20px;margin-bottom:  20px;'>
                      <div class='corp-val-wrapper'>
                        <div  style='position:  absolute;margin-left:-30px;margin-top:-17px;'>
                        <img id='corp-val-e' src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]); ?><?php echo $row["img_name"]; ?>'>
                        </div>
                        <?php echo $row["content"]; ?>
                      </div>
                    </div>
                 <?php   }
                      }
              ?>
                

              </div>

              

              <h1 class='what-brand-stands-for text-center'>What our brand stands for</h1>



              <div class='row'>
                <?php
                  $sql = "SELECT * FROM content where page_name = 'about' and id between 38 and 43 order by id";
                  $result = mysqli_query(conn(),$sql);

                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>

                     <div class='col-md-12' style='margin-top:20px;margin-bottom:  20px;'>
                        <div class='brand-wrapper'>
                          <div  style='position:  absolute;margin-left:-54px;'>
                          <img id='brand-f' src='<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]); ?><?php echo $row["img_name"]; ?>'>
                          </div>
                          <p class='text-center ' style='padding-top:20px;padding-bottom:15px'><span class='brand-title'><?php echo $row["content_title"]; ?></span><br><br>
                          <?php echo $row["content"]; ?>
                          </p>
                        </div>
                      </div>

                 <?php   }
                      }
              ?>

              </div>

              

            </div>

          </div><!-- About Wrapper 2-->



          <div class='container-fluid exp-wrapper'>



            <div class='exp-desc-wrapper'>

              <div class='exp-desc-wrapper-inner'>

                <h1 class='exp-title'><?php echo $title1; ?></h1>

                <?php echo $c1; ?>

              </div>

            </div>



          </div>



          <div class='twirl-wrapper'>

            <div class='container-fluid'>

              <div class='row'>

                <div class='col-md-6'>

                  <center>

                  <img src='<?php echo $i1; ?>' class='img-responsive' style=''>

                  </center>

                </div>

                <div class='col-md-6'>

                  <p class='twirl-desc'>

                    <?php echo $c2; ?>

                  </p>

                </div>

              </div>

            </div>

          </div>



          <div class='container-fluid ' style='background-color: #0079c5;height:  auto;'>

            <div class='store-network-wrapper'>

              <div class='row'>

                <div class='col-md-6'>

                  <p class='store-network-title'>

                    <?php echo $title1; ?>

                  </p>

                  <p class='store-network-desc'>

                    <?php echo $c3; ?>

                  </p>

                </div>

              </div>

            </div>

          </div>



          <div class='bread-wrapper'>

            <div class='container-fluid'>

              <hr class='middle-desc-hr'>

              <div class='row'>

                <div class='col-md-12'>

                  <img src='<?php echo $i2; ?>' class='img-responsive' id='' style=''>

                  <p class='text-center bread-text'>For updates and announcements, find us on Facebook under FamilyMart Philippines 

                  <br>or Instagram at @familymartph.</p>

                </div>

              </div>

            </div>

          </div>



          <div class='our-partners-wrapper'>

            <div class='container-fluid'>

              <h1 class='text-center our-partners-title'>Our Partners</h1>

              <div class='row'>

                <div class='col-md-4' >

                  <center>

                  <a href='https://giftaway.ph/'><img src='../img/partner-giftaway.jpg' class='our-partners-img'></a>

                  </center>

                </div>

                <div class='col-md-4'>

                  <center>

                  <a href='https://www.sharetreats.ph/m/index.do'><img src='../img/partner-mobiletreats.jpg' class='our-partners-img'></a>

                  </center>

                </div>

                <div class='col-md-4'>

                  <center>

                  <a href='https://www.metromart.com'><img src='../img/partner-metromart.jpg' class='our-partners-img'></a>

                  </center>

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

                  <div class="col-sm-3 " style='margin-top: -5px;'>

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