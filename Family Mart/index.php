<?php 
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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="css/custom.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">

    <!-- DataTables CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="js/ajax/jquery.min.js"></script>

    <link href="css/chosen.css" rel="stylesheet">


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
              <li><a class="first-nav" href="franchise/">How to franchise</a></li>
              <li><a class="first-nav" href="careers/">Careers</a></li>
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
            <a class="navbar-brand" href="#home" style="padding-right:10px;margin-left: -40px;"><img src="img/final-company-logov1.jpg" class="img-responsive"></a>
        </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" >
              <li class="active"><a href="#home" class="second-nav">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="product/" class="second-nav">Product</a></li>
              <li><a href="promo/" class="second-nav">Promos</a></li>
              <!--<li><a href="#morefun" class="second-nav">More Fun in the Philippines</a></li>
              <li><a href="#visitjapan" class="second-nav">Visit Japan</a></li>-->
              <li><a href="snap/" class="second-nav">Snap Card</a></li>
              <li><a href="about/" class="second-nav">About</a></li>
              <li><a href="#branches" class="second-nav">Branches</a></li>
              <li><a href="#contactus" class="second-nav">Contact</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <header id="home">
      <div class="fb-promo-wrapper" style="">
        <div id="fb-wrapper" class="fb-page" data-href="https://www.facebook.com/familymartph/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/familymartph/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/familymartph/">FamilyMart Philippines</a></blockquote></div>
        <div class="promo" style="position: relative;z-index: 2;top: 3px;">
          <?php
              $sql = "SELECT * FROM content where id= 59";
              $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                 <a href='promo/'><img src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]); ?><?php echo $row["img_name"]; ?>" onmouseover="" onmouseout="" width='300' height='300'></a>

             <?php  
                    }
                  }
              ?>
         
        </div>
      </div>

      <center>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="position: relative;z-index: 1;top:  50px;" >
          <!-- Indicators -->
          <ol class="carousel-indicators" id='carousel-hdr'>
             <?php
              $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
              $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
              $slide = 0;
                while($row = $result->fetch_assoc()) { ?>
                 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $slide; ?>" class="<?php if($row["id"] == 1){ echo "active"; } ?>"></li>

             <?php  
                  $slide++; 
                    }
                  }
              ?>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" >
            <?php
            $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
             $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                <div class="item <?php if($row["id"] == 1){ echo "active"; } ?>" >
                  <img id="img-<?php echo $row["id"]; ?>" src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]); ?><?php echo $row["img_name"]; ?>" alt="..." class="img-responsive" >
                  <div class="carousel-caption">
                  </div>
                </div>
                  
             <?php   }
                  }
              ?>
          </div>


          <!-- Controls 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>-->
        </div>
      </center>
        
        
      </header>
      <section class="cravings" id="">
      
        <div class="center-satisfy">
          <img src="img/satisfy.png" class="img-responsive">
        </div>
        <div class="center-filter">
          <div class='input-group'>
          <span class='input-group-addon' style='background-color:#0093d7;color: #4ac3fb;border-top: 1px dashed #fff;border-left: 1px dashed #fff;border-bottom: 1px dashed #fff;border-right: 0px;'>Filter by:</span>
          <select class="form-control" name='filter' id='filter' style='background-color:#0093d7;color: #fff;border-top: 1px dashed #fff;border-bottom: 1px dashed #fff;border-right: 1px dashed #fff;border-left : 0px;' onchange="window.location.href=this.value">

             <?php
              $sql = "SELECT distinct category FROM product order by id";
              $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                 <option value='?cat=<?php echo $row["category"]; ?>' <?php if($row["category"] == "Chicken"){ echo "selected"; } ?>"><?php echo $row["category"]; ?></option>
             <?php  
                    }
                  }
              ?>
          </select>
        </div>
          <!--<img src="img/filterv2-by.png" class="img-responsive" width="300" height="36">-->
        </div>

        <div class="center-carousel" style='width:  80%;'>
          
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" id="carousel-meals">
            <!-- Indicators -->
            <ol class="carousel-indicators" style='opacity:0;'>
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>

            </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <center>

                 <?php
                    $sql = "SELECT * FROM product WHERE category='chicken' ORDER BY ID desc LIMIT 3 ";
                    $result = mysqli_query(conn(),$sql);

                   if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { ?>
                          <div id='meal-<?php echo $row["id"]; ?>' style='display:  inline-block; '>
                            <img src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path2"]); ?><?php echo $row["img_thumbnail"]; ?>" alt="..." class="img-responsive" >
                            <br>
                            <a href='/product/?cat=<?php echo $row["category"]; ?>&product=<?php echo $row["id"]; ?>' class='btn btn-orange-s' ><?php echo $row["title"]; ?></a>
                          </div>
                   <?php  
                          }
                        }
                    ?>
                </center>
              <div class="carousel-caption">
                ...
              </div>
            </div>
            ...
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon " aria-hidden="true"><img src='img/arrow-left.png' class='img-responsive ' style='margin-top: 80px;'></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon " aria-hidden="true"><img src='img/arrow-right.png' class='img-responsive ' style='margin-top: 80px;'></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        
      </div>
      <div class="center-see-more">
          <a href='product/' class='btn' style='background-color: #cc7e21;border:1.5px dashed #fff;width:180px;color:#fff;border-radius:8px;font-size:18px;'>See More</a>
        </div>

      
        
      </section>
    
      <section class="article">
        <div class="center-coffee">
          <?php
              $sql = "SELECT * FROM content where page_name ='home' and type='single-img'";
              $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>
                 <img src="<?php echo str_replace('/home/familyma/public_html','',$row["img_path"]); ?><?php echo $row["img_name"]; ?>" class="img-responsive  ">
             <?php  
                    }
                  }
              ?>
        </div>
      </section>
    <!-- Temporarily removed
      <section class="social">
        <div class="center-social">
            <h1>#FamilyMartPH</h1>
        </div>
        <div class="center-fb">   
            <div class="fb-page" data-href="https://web.facebook.com/familymartph/" data-tabs="timeline" data-width="303" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
        </div>
      </section>
      -->
      <section class="snap" id='snapcard'>
        <div class="header-design">
        </div>
        <div id="snap-wrapper" class="container-fluid" style="">
        <div class="row">
          <div class="col-md-3 col-md-offset-3">
          <img id="snap-img" src="img/snap-card.png" class="" >
          </div>
          <div class="col-md-6">
             <?php
              $sql = "SELECT * FROM content where page_name ='home' and type='img-with-content'";
              $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                  $snap = $row["content"];
                    }
                  }
              ?>
            <p class="snap-text-header">What's Snappening?</p>
            <p class="snap-text-header">Perks and Rewards</p>
            <p class="snap-text-body "><?php echo  $snap; ?></p>

            <a href='http://familymartsnap.appsolutely.ph/portal/login.php' class='btn btn-orange-s'>Learn More</a>
          </div>
        </div>
        </div>
      </section>

      <section class="store-locator" id="branches">
        <div class="footer-design">
        </div>
        <div class="container-fluid" style="max-width: 100%;">
        <div class="row">
          <div class="col-md-1">
          
          </div>
          <div class="col-md-4">
          <h1 class="locator-text-header">Store Locator</h1>
          </div>
        </div>
        </div>

        <!--    -->
        <div class="container-fluid" id="locator-wrapper">
          <div class="row">
            <div class="col-md-4 " >
                <select id="mapSelect" class="form-control" data-placeholder="FIND A BRANCH NEAR YOU" class="chosen-select" style='max-width: 100%;width: 300px;'>
                  <option value="" data-name=""></option>
                  <option value="Global One, Eastwood City">Global One</option>
                  <option value="UP Town Center">UP Town Center</option>
                  <option value="Fairway Residences" data-name="">Fairway Residences</option>
                  <option value="Anonas LRT City Center" data-name="">Anonas</option>
                  <option value="UP Technohub Building O" data-name="">UP Technohub Building O</option>
                  <option value="ABS-CBN" data-name="">ABSCBN</option>
                  <option value="Arlington" data-name="">Arlington</option>
                  <option value="Fairview Terraces" data-name="">Fairview Terraces</option>
                  <option value="Gilmore IT Center" data-name="">Gilmore IT Center</option>
                  <option value="Tomas Morato" data-name="">Tomas Morato</option>
                  <option value="The Rock Lifestyle Hub" data-name="">The Rock Lifestyle Hub</option>
                  <option value="Diamond Arcade" data-name="">Diamond Arcade</option>
                  <option value="Eton Cyberpod" data-name="">Eton Cyberpod</option>
                  <option value="Solenad 3" data-name="">Solenad 3</option>
                  <option value="Ayala Malls Serin" data-name="">Serin</option>
                  <option value="Wynn Plaza" data-name="">Wynn Plaza</option>
                  <option value="Richbelt Tower" data-name="">Richbelt Tower</option>
                  <option value="Blue Baywalk" data-name="">Blue Baywalk</option>
                  <option value="Butterfly Garden Residential Resorts" data-name="">Butterfly Garden</option>
                  <option value="150 Newport Boulevard" data-name="">150 Newport</option>
                  <option value="Phoenix Macapagal" data-name="">Phoenix Macapagal</option>
                  <option value="Petron Macapagal" data-name="">Petron Macapagal</option>
                  <option value="Exchange Regency" data-name="">Exchange Regency</option>
                  <option value="The Linden Suites" data-name="">Linden Suites</option>
                  <option value="Union Bank Plaza" data-name="">Union Bank Plaza</option>
                  <option value="One San Miguel" data-name="">One San Miguel</option>
                  <option value="Casimiro Commercial Center" data-name="">Casimiro</option>
                  <option value="Science Hub Tower 3" data-name="">Science Hub Tower 3</option>
                  <option value="Tuscany" data-name="">Tuscany</option>
                  <option value="Bonifacio One Technology" data-name="">Bonifacio One Techonology</option>
                  <option value="Central Square, BGC" data-name="">Central Square</option>
                  <option value="Trade and Financial Tower" data-name="">Trade and Financial</option>
                  <option value="W Fifth Building" data-name="">W Fifth Building</option>
                  <option value="Bonifacio Stopover Retail" data-name="">Bonifacio Stopover</option>
                  <option value="Fort Victoria Condominium" data-name="">Fort Victoria</option>
                  <option value="Market! Market!" data-name="">Market Market</option>
                  <option value="BGC Corporate Center" data-name="">BGC Corporate Center</option>
                  <option value="Lee Gardens" data-name="">Lee Gardens</option>
                  <option value="GDC Pavillion" data-name="">Greenfield District Pavillion</option>
                  <option value="Glorietta 3" data-name="">Glorietta 3, Ayala Center, Makati City</option>
                  <option value="Ayala MRT" data-name="">Ayala MRT Station, Ayala Center, Makati City</option>
                  <option value="Glorietta 5" data-name="">Glorietta 5, Ayala Center, Makati City</option>
                  <option value="Alco Building" data-name="">Alco Building</option>
                  <option value="Alphaland" data-name="">Alphaland Southgate Mall</option>
                  <option value="The Grand Midori" data-name="">The Grand Midori</option>
                  <option value="Global Enterprise" data-name="">Global Enterprise</option>
                  <option value="Makati Bel Air" data-name="">Makati Bel Air</option>
                  <option value="One Central" data-name="">One Central</option>
                  <option value="Parksquare" data-name="">Parksquare</option>
                  <option value="Keyland Center" data-name="">Keyland Center</option>
                  <option value="Ayala Tower One" data-name="">Ayala Tower One</option>
                  <option value="Aurum One Residences" data-name="">Aurum One</option>
                  <option value="Libran House" data-name="">Libran House</option>
                  <option value="Convergy&#039;s One" data-name="">Convergys One</option>
                  <option value="Valero Plaza" data-name="">Valero Plaza</option>
                  <option value="Filipino Building" data-name="">Filipino Building</option>
                  <option value="The Gramercy Residences" data-name="">Gramercy Residences</option>
                  <option value="Cityland Condominium 10" data-name="">Cityland 10</option>
                  <option value="Aeon Prime Building" data-name="">Aeon Prime</option>
                  <option value="Dela Rosa CP1" data-name="">Dela Rosa CP1</option>
                  <option value="Somerset Millenium Hotel" data-name="">Somerset Millenium Hotel</option>
                  <option value="GDC Pavilion" data-name="">GDC Pavilion</option>
                  <option value="139 Corporate Center" data-name="">139 Corporate Center</option>
                  <option value="La Fayette" data-name="">La Fayatte</option>
                  <option value="Trade & Financial (Ground Floor)" data-name="">Trade & Financial (Ground Floor)</option>
                  <option value="California Garden Square" data-name="">California Garden Square</option>
                  <option value="CAP Building" data-name="">CAP Building</option> 
                  <option value="Ayala Triangle Gardens" data-name="">Ayala Triangle Gardens</option> 
                  <option value="Enterprise Center" data-name="">Enterprise Center</option>
                  <option value="Avida San Lorenzo" data-name="">Avida San Lorenzo</option>
                  <option value="Avida New Manila" data-name="">Avida New Manila</option> 
                  <option value="Oceanaire" data-name="">Oceanaire</option>
                  <option value="Mckinley Exchange Corporate Center" data-name="">Mckinley Exchange Corporate Center</option>
                  <option value="Eton Cetris Walk" data-name="">Eton Cetris Walk</option>
                  <option value="OPL Building" data-name="">OPL Building</option>
                  <option value="National Life Insurance Building" data-name="">National Life Insurance Building</option>
                  <option value="Pioneer Highland South" data-name="">Pioneer Highland South</option>
                  <option value="AIC Grande Tower" data-name="">AIC Grande Tower</option>
                  <option value="Shell Timog" data-name="">Shell Timog</option>
                  <option value="Del Rosario Law Building" data-name="">Del Rosario Law Building</option>
                  <option value="Tuna Hotel ASEANA" data-name="">Tuna Hotel ASEANA</option>
                  <option value="Jollibee Plaza" data-name="">Jollibee Plaza</option>
                  <option value="Wynsum Corporate Plaza" data-name="">Wynsum Corporate Plaza</option>
                  <option value="Kings Court Building" data-name="">Kings Court Building</option>
                  <option value="The Linden Suites" data-name="">The Linden Suites</option>
                  <option value="OCAI Center" data-name="">OCAI Center</option>
                             
                </select>
                <div class="centerAlign" style="">
                    <img id="gpsBtn" src="">
                </div>
                
                <p id="gpsStatus"></p> 
                <div class="divider" style="margin: 0"></div>
                
                <div id="mapInfo">
                  
                    <!--<img src="img/logo.png" style="width:100%;">-->
                
                  <h3 id="mapDataName" class="address-info"></h3>
                    
                    <p></p>
                    <p id="mapDataAddress" class="address-info"></p>

                    <p><!--<a id="mapDataLink" class="address-info" href=""></a>--></p>
<!--                    
                    <p>Telephone Number</p>
                    <p id="mapDataPhone"></p>

                    <p>Store Hours</p>
                    <p id="mapDataHours"></p>
-->
                </div>
                
            </div>
                <div id="map"></div>
                <div id="trigger"></div>
          </div>
        </div>
        
 
  
      </section>

      <section class="contact-us" id="contactus">
        <div class="container-fluid" style="padding-top:  50px;">
        <div class="row">
          <div class="col-md-1">
          
          </div>
          <div class="col-md-4">
              <h1 class="contact-text-header">Contact Us</h1>
          </div>
        </div>
        </div>

          <div class="container-fluid" style="">
          <div class="row">
            <div class="col-md-1">
          
            </div>
            <div class="col-md-4">
              <form style="font-family: 'Comfortaa Light';" action="email.php" method="post">
                <div class="form-group">

                  <input type="text" class="form-control" id="" placeholder="Name" required="" name='c_name'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="" placeholder="Contact No." name='c_contactno' >
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="" placeholder="Email Address" required="" name='c_email'>
                </div>
                <div class="form-group">
                  <textarea  class="form-control" id="" placeholder="Inquiry" rows="7" required="" name='c_message'> </textarea>
                </div>
                <button type="submit" class="btn btn-default" name='send_email' >SEND</button>
              </form>

          </div>

          <div class="col-md-4">
            <p class="contact-text-body">Main Ofﬁce:<br><br>Philippine FamilyMart CVS, Inc.<br>The Penthouse, TARA Building<br>389 Sen. Gil Puyat Ave.,<br>Makati City 1200</p>
            <p class="contact-text-body">Tel. No.:<br>(02) 908-0500</p>
            <!--<p class="contact-text-body">Fax<br>552 3494</p>-->
            <p class="contact-text-body">Ofﬁce Hours:<br>8:00 AM - 5:00 PM</p>
          </div>
        </div>
        </div>
        
        <div class='footer-img'>
        </div>
      </section>

      

          <div class="footer-default">  
            <div class="container-fluid" style='padding-top: 40px;width:1200px;max-width: 100%;'>
                <div class="row">
                  <div class="col-sm-3">
                    <p >2017 Philippine FamilyMart CVS Inc. |</p>
                  </div>
                  <div class="col-sm-3 col-lg-push-1" style='margin-top: -8px;'>
                    <p class='text-center' style='display: inline-block;'>Follow us on</p> <a href='https://www.facebook.com/familymartph/'><img style='display: inline-block;' src="img/fb-logo.png" class='img-responsive'></a><a href='https://www.instagram.com/familymartph/'><img style='display: inline-block;' src="img/insta-logo.png" class='img-responsive'></a>
                    <!--<div class="fb-follow" data-href="https://web.facebook.com/familymartph/" data-layout="button" data-size="small" data-show-faces="false"></div>-->
                  </div>
                  <div class="col-sm-3 col-md-push-1" style=''>
                   <p class=''>| Download the Snap App</p>
                  </div>
                  <div class="col-sm-3" style='margin-top: -5px;'>
                   <a href='https://itunes.apple.com/ph/app/familymart-snap-app/id913973376?mt=8'><img style='display: inline-block;' src="img/footer-ios.png" class='img-responsive'></a><a href='https://play.google.com/store/apps/details?id=com.appsolutely.familymartapppoints&hl=en'><img style='display: inline-block;' src="img/footer-android.png" class='img-responsive'></a>
                  <!--
                  <div class="fb-follow" data-href="https://web.facebook.com/familymartph/" data-layout="button" data-size="small" data-show-faces="false"></div>-->
                  </div>
              </div>
            </div>
          </div>


      

    </body>
     <script type="text/javascript">
  var mapItems = [
    
    {
      name: 'Glorietta 3',
      address: "Space #116, Ground Floor,\r\nGlorietta 3, Ayala Center, \r\nMakati City\r\n",
      phone: '625-0811',
      hours: "24 hours",
      lat: 14.55206700,
      lng: 121.02467900,
            link: ' https://www.google.com.ph/maps/place/Family+Mart/@14.5521052,121.0224943,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c91ad6efe79b:0xaeb7f4e6f1cd10fe!8m2!3d14.5521!4d121.024683',
            isNew: 1
    },
    
    {
      name: 'Ayala MRT',
      address: "Ayala MRT Station, \r\nAyala Center, \r\nMakati City\r\n",
      phone: '625-5811',
      hours: "5:00 AM - 12:00 MN",
      lat: 14.54922400,
      lng: 121.02756600,
            link: 'https://www.google.com.ph/maps/place/Ayala+Center+Station/@14.5492851,121.0279268,19.25z/data=!4m5!3m4!1s0x3397c91c7f40389d:0x956f5ee10466bd37!8m2!3d14.5491802!4d121.0279696',
            isNew: 0
    },
    
    {
      name: 'Glorietta 5',
      address: "Space # 134, Ground Floor, \r\nGlorietta 5, Ayala Center, \r\nMakati City\r\n",
      phone: '625-0924',
      hours: "24 hours",
      lat: 14.55139900,
      lng: 121.02767500,
            link: 'https://www.google.com.ph/maps/place/Glorietta+5/@14.55174,121.0274811,19z/data=!4m5!3m4!1s0x3397c91b51102103:0xdfbe34372edddf55!8m2!3d14.5518921!4d121.0275105',
            isNew: 0
    },
    
    {
      name: 'Exchange Regency',
      address: "Unit R-1, Ground Floor, The Exchange Regency Project along \r\nExchange Road cor. Meralco Ave. and Jade Drive, \r\nOrtigas Center, Pasig City\r\n\r\n\r\n",
      phone: '211-8457',
      hours: "24 hours",
      lat: 14.58316400,
      lng: 121.06354500,
            link: 'https://www.google.com.ph/maps/place/The+Exchange+Regency+Residence+Hotel/@14.5830011,121.0633658,19z/data=!4m5!3m4!1s0x3397c7e19ef41a05:0xc031d8f2f60465eb!8m2!3d14.58323!4d121.063338',
            isNew: 0
    },
    
    {
      name: 'Alco Building',
      address: "Ground Floor, \r\nAlco Building, Sen. Gil Puyat Ave., \r\nMakati City\r\n",
      phone: '954-1585',
      hours: "6:00 AM - 10:00 PM, Monday-Friday",
      lat: 14.55839000,
      lng: 121.03238200,
            link: 'https://www.google.com.ph/maps/place/Alco+Building,+391+Sen.+Gil+J.+Puyat+Ave,+Makati,+Metro+Manila/@14.5584704,121.0302326,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c901c60be201:0xafc43391d8a8bce0!8m2!3d14.5584827!4d121.0323902',
            isNew: 1
    },
    
    {
      name: 'Global One, Eastwood City',
      address: "G/F Retail Global One BLDG., \r\nEastwood City Cyberpark, 188 E \r\nRodriguez Jr. Ave. Bagumbayan, Quezon City \r\n",
      phone: '955-2116',
      hours: "24 hours",
      lat: 14.60775300, 
      lng: 121.08150500,
            link: 'https://www.google.com.ph/maps/place/Family+Mart/@14.6085212,121.0803148,18z/data=!4m8!1m2!2m1!1sGlobal+One,+E-commerce+Road,+Eastwood+City,+Bagumbayan,+Quezon+City+!3m4!1s0x3397b81d0fb79d79:0x46a58782a563ee96!8m2!3d14.608315!4d121.081382',
            isNew: 0
    },
    
    {
      name: 'Science Hub Tower 3',
      address: "Retail 1A, GF Science Hub Tower 3, \r\nMcKinley Hill, \r\nTaguig City\r\n",
      phone: '955-2117',
      hours: "24 hours",
      lat: 14.53150300,
      lng: 121.05216100,
            link: 'https://www.google.com.ph/maps/place/Science+Hub+Tower+3/@14.5313195,121.0518244,20z/data=!4m5!3m4!1s0x3397c8c6937e8265:0x9145013346828ddb!8m2!3d14.5314058!4d121.051986',
            isNew: 0
    },
    
    {
      name: 'Alphaland',
      address: "G\/F, Alphaland Southgate Mall,\r\nEdsa cor. Pasong Tamo St.,\r\nMakati City\r\n",
      phone: '508-3912',
      hours: "24 hours",
      lat: 14.54098800,
      lng: 121.01873500,
            link: 'https://www.google.com.ph/maps/place/Alphaland+Southgate+Mall/@14.5409304,121.0164511,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c93da89def11:0x6b2e985a4a0e4aba!8m2!3d14.5409252!4d121.0186398',
            isNew: 0
    },
    
    {
      name: 'UP Town Center',
      address: "Ground Floor Space # A108,\r\nUP Town Center,\r\nQuezon City\r\n",
      phone: '625-4659',
      hours: "8:00 AM - 12:00 AM",
      lat: 14.64919800,
      lng: 121.07538200,
            link: 'https://www.google.com.ph/maps/place/U.P.+Town+Center/@14.6508791,121.0730796,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b763393faa1d:0xce0fcdf5b38ceb8c!8m2!3d14.6508739!4d121.0752683',
            isNew: 1
    },
    
    {
      name: 'The Grand Midori',
      address: "Ground Floor Unit  G-12 The Grand Midori,\r\nLegaspi St. Legaspi Village,\r\nMakati City\r\n",
      phone: '215-8198',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.55700200,
      lng: 121.01636600,
            link: 'https://www.google.com.ph/maps/place/The+Grand+Midori,+160+Legazpi+Street,+Legazpi+Village,+Makati,+Metro+Manila/@14.5573417,121.0165654,18.25z/data=!4m5!3m4!1s0x3397c90e9ddd1163:0x2ce64f8828d62f4!8m2!3d14.5573474!4d121.0164246',
            isNew: 1
    },
    
    {
      name: 'Richbelt Tower',
      address: "Ground Floor, Unit 102 Richbelt Tower,\r\nAnnapolis St.\r\nSan Juan \r\n",
      phone: '586-8339',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.60428300,
      lng: 121.05238200,
            link: 'https://www.google.com.ph/maps/place/Richbelt+Tower/@14.6053742,121.0523593,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b7ddd96105b1:0x24585ff686b90c9c!8m2!3d14.605369!4d121.054548',
            isNew: 1
    },
    
    {
      name: 'Fairway Residences',
      address: "Fairway Residences\r\nCapitol Hills corner Alpha Drive,\r\nQuezon City\r\n\r\n",
      phone: '957-3387',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.66519900,
      lng: 121.08091900,
            link: 'https://www.google.com.ph/maps/place/Fair+Way+Residences/@14.6653494,121.0802906,19.5z/data=!4m5!3m4!1s0x3397b9e2429fc37f:0x3e91108e124f6999!8m2!3d14.6651254!4d121.0808068',
            isNew: 0
    },
    
    {
      name: 'Global Enterprise',
      address: "Ground Floor, Global Enterprise Bldg.,\r\nH.V. Dela Costa St. Salcedo Village,\r\nMakati City",
      phone: '949-3093',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.56105200,
      lng: 121.02093500,
            link: 'https://www.google.com.ph/maps/place/Global+Enterprise+Inc/@14.561062,121.020902,17z/data=!4m5!3m4!1s0x3397c908616e7c87:0x68280b0e03830b59!8m2!3d14.561062!4d121.020902',
            isNew: 0
    },
    
    {
      name: 'Makati Bel Air',
      address: "Ground Floor, Makati Bel Air Apartment,\r\nP. Burgos cor. Kalayaan Avenue,\r\nMakati City\r\n",
      phone: '622-3754',
      hours: "24 hours",
      lat: 14.56362800,
      lng: 121.03052800,
            link: 'https://www.google.com.ph/maps/place/Makati+Bel+Air+Condominium/@14.5637375,121.0295695,18.5z/data=!4m5!3m4!1s0x3397c9aa5c297a01:0xf47ab927e1566022!8m2!3d14.5636001!4d121.0302373',
            isNew: 1
    },
    
    {
      name: 'The Linden Suites',
      address: "Ground Floor, Linden Suites,\r\nSan Miguel Ave. Ortigas Center,\r\nPasig City",
      phone: '621-5501',
      hours: "24 hours",
      lat: 14.58150100,
      lng: 121.06015000,
            link: 'https://www.google.com.ph/maps/place/The+Linden+Suites/@14.5816984,121.0580447,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8145afdb399:0x324df3a31b58f54f!8m2!3d14.5816932!4d121.0602334',
            isNew: 1
    },
    
    {
      name: 'Anonas LRT City Center',
      address: "Lower Ground Floor, Unit 7, Anonas LRT City Center\r\nAurora Blvd. & Anonas St. \r\nProject 3, Quezon City\r\n",
      phone: '964-8234',
      hours: "24 hours",
      lat: 14.62786100,
      lng: 121.06471900,
            link: 'https://www.google.com.ph/maps/place/Anonas+LRT+City+Center/@14.6279011,121.0625511,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b78572979d37:0xde60c75445d61a65!8m2!3d14.6278959!4d121.0647398',
            isNew: 1
    },
    
    {
      name: 'Tuscany',
      address: "Ground Floor, Tuscany Private Estate Ra-Ram & Rb-Rbn Bldg. 1\r\nUpper Mckinley Road, Mckinley Hill,\r\nFort Bonifacio, Taguig City",
      phone: '950-6054',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.53624700,
      lng: 121.05182000,
            link: 'https://www.google.com.ph/maps/place/Tuscany/@14.5375242,121.0498503,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8c1e8724d35:0x8f0c2a644dcade9c!8m2!3d14.537519!4d121.052039',
            isNew: 0
    },
    
    {
      name: 'UP Technohub Building O',
      address: "G\/F, Space 132 C, UP Technohub,\r\nCommonwealth Ave. Diliman,\r\nQuezon City\r\n\r\n",
      phone: '957-3155',
      hours: "24 hours",
      lat: 14.65744800,
      lng: 121.05580300,
            link: 'https://www.google.com.ph/maps/place/U.P.+Ayala+Land+Technohub/@14.6568546,121.0549926,18.25z/data=!4m5!3m4!1s0x3397b714b259642b:0x85c82d1deddc5804!8m2!3d14.657301!4d121.056243',
            isNew: 0
    },
    
    {
      name: 'One Central',
      address: "Ground Floor, One Central Bldg.,\r\nH.V Dela Costa St. corner Geronimo St.\r\nMakati City",
      phone: '957-3495',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.56099200,
      lng: 121.01745300,
            link: 'https://www.google.com.ph/maps/place/One+Central+Suites/@14.5607604,121.0159232,17.75z/data=!4m5!3m4!1s0x3397c909741bbd89:0xf75e6017704044b2!8m2!3d14.5609468!4d121.0174247',
            isNew: 0
    },
    
    {
      name: 'ABS-CBN',
      address: "Ground Floor, Stall 21, \r\nELJ Communications Center,\r\nQuezon City\r\n",
      phone: '964-8279',
      hours: "24 hours",
      lat: 14.63937900,
      lng: 121.03534000,
            link: 'https://www.google.com.ph/maps/place/ELJ+Communication+Center,+ABS-CBN+Compound+Mother+Ignacia+Ave,+Diliman,+Quezon+City,+Metro+Manila/@14.6395106,121.0332501,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b7ab659a7b39:0xa848a4aa47174989!8m2!3d14.6394837!4d121.0353914',
            isNew: 0
    },
    
    {
      name: 'Arlington',
      address: "Ground Floor, Arlington Memorial Chapel & Crematory,\r\nG. Araneta Avenue,\r\nQuezon City\r\n",
      phone: '964-8247',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.60749300,
      lng: 121.01782000,
            link: 'https://www.google.com.ph/maps/place/Arlington+Memorial+Chapels/@14.6075512,121.0156273,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b6271ed8a3fd:0x162d602a569fada8!8m2!3d14.607546!4d121.017816',
            isNew: 1
    },
    
    {
      name: 'Bonifacio One Technology',
      address: "Ground Floor, Space # 3, Bonifacio One Techonology,\r\nTower Rizal Drive cor 31st St. \r\nFort Bonifacio Global City, Taguig",
      phone: '625-4679',
      hours: "24 hours",
      lat: 14.55392300,
      lng: 121.04582000,
            link: 'https://www.google.com.ph/maps/place/Bonifacio+One+Technology+Tower,+3030+Rizal+Dr,+Taguig,+1634+Metro+Manila/@14.5539921,121.0434432,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8f0af801329:0xa0479539a20f6057!8m2!3d14.5539222!4d121.0456039',
            isNew: 0
    },
    
    {
      name: 'Fairview Terraces',
      address: "PLG 31-32, Ground Floor, Fairview Terraces,\r\nQuirino Highway cor. Maligaya Drive, Brgy. Pasong Putik,\r\nNovaliches, Quezon City",
      phone: '506-9129',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.73587900,
      lng: 121.05970400,
            link: 'https://www.google.com.ph/maps/place/Ayala+Fairview+Terraces/@14.736875,121.0578366,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b068fbc84615:0x3b73d5e307721e90!8m2!3d14.7368698!4d121.0600253',
            isNew: 0
    },
    
    {
      name: 'Gilmore IT Center',
      address: "Unit C-2,  Ground Floor, Gilmore IT Center,\r\nGilmore Avenue cor. 1st St.,\r\nNew Manila, Quezon City\r\n",
      phone: '219-0694',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.61340800,
      lng: 121.03509200,
            link: 'https://www.google.com.ph/maps/place/Gilmore+IT+Center/@14.6117812,121.0373747,16.75z/data=!4m5!3m4!1s0x3397b7cd66fb34f7:0xcf7a022f92d7cb5!8m2!3d14.613526!4d121.035153',
            isNew: 1
    },
    
    {
      name: 'Tomas Morato',
      address: "Tomas Morato,\r\nBrgy. Laging Handa,\r\nQuezon City\r\n",
      phone: '964-8294',
      hours: "24 hours",
      lat: 14.62919000,
      lng: 121.03391100,
            link: 'https://www.google.com.ph/maps/place/Tomas+Morato+Ave,+Quezon+City,+Metro+Manila/@14.6317194,121.0325125,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b7b350156bdd:0x926e828ec16a1c60!8m2!3d14.6317142!4d121.0347012',
            isNew: 1
    },
    
    {
      name: 'Lee Gardens',
      address: "Ground Floor, Unit 1-C Lee Gardens Comm. Center,\r\nShaw Blvd. cor Lee St. Wack-Wack Greenhills,\r\nMandaluyong City\r\n",
      phone: '956-1825 ',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.58756600,
      lng: 121.04633700,
            link: 'https://www.google.com.ph/maps/place/Lee+Gardens,+Mandaluyong,+Metro+Manila/@14.5877157,121.0453967,18.5z/data=!4m5!3m4!1s0x3397c83a641b355d:0x23bf5ae1c5273d7d!8m2!3d14.5877571!4d121.0463205',
            isNew: 1
    },
    
    {
      name: 'GDC Pavillion',
      address: "Ground Floor, Unit L1D101,\r\nGreenfield District Pavillion,\r\nMandaluyong City\r\n",
      phone: '950-4605',
      hours: "24 hours",
      lat: 14.57936600,
      lng: 121.05267500,
            link: 'https://www.google.com.ph/maps/place/Greenfield+District+Pavilion/@14.5794353,121.0506195,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8409d5a2117:0xc5c95937091bf9e7!8m2!3d14.5794301!4d121.0528082',
            isNew: 0
    },
    
    {
      name: 'Parksquare',
      address: "Parksquare Bldg. Space # 12 & 13,\r\nSouth Drive cor. Theater Drive,\r\nAyala Center, Makati City",
      phone: '959-3721',
      hours: "24 hours",
      lat: 14.55472900,
      lng: 121.02444500,
            link: 'https://www.google.com.ph/maps/place/Family+Mart/@14.5497433,121.0250459,18z/data=!4m8!1m2!2m1!1sfamily+mart+near+Park+Square+Drive,+Makati,+NCR!3m4!1s0x0:0xa5c2cdef601f09bc!8m2!3d14.5492631!4d121.0260183',
            isNew: 0
    },
    
    {
      name: 'Blue Baywalk',
      address: "Ground Floor, Bldg. K,\r\nBlue Baywalk Macapagal, Edsa Ext. cor. Macapagal Ave.,\r\nMetropark, Pasay City\r\n",
      phone: '218-9335',
      hours: "24 hours",
      lat: 14.53700200,
      lng: 120.98971200,
            link: 'https://www.google.com.ph/maps/place/Blue+Bay+Walk/@14.5387428,120.9875037,17z/data=!4m5!3m4!1s0x3397c9584fbb9447:0x27f9a8308d6d53ed!8m2!3d14.5384743!4d120.9898782',
            isNew: 0
    },
    
    {
      name: 'Central Square, BGC',
      address: "4th Floor Northwest Global Cinema, \r\nBonifacio Highstreet, BGC,\r\nTaguig",
      phone: '958-5026',
      hours: "9:00 AM - 12:00 MN\r\n9:00 AM - 1:00 AM, Friday and Saturday",
      lat: 14.55186400,
      lng: 121.04836200,
            link: 'https://www.google.com.ph/maps/place/Central+Square,+Taguig,+Metro+Manila/@14.551467,121.047462,17.25z/data=!4m5!3m4!1s0x3397c8f106476559:0xad27c46dd6321ffe!8m2!3d14.5518189!4d121.0483808',
            isNew: 0
    },
    
    {
      name: 'Keyland Center',
      address: "Ground Floor, Keyland Center,\r\nDela Rosa St. cor. Adelantado St.,\r\nLegaspi Village, Makati City",
      phone: '503-0670',
      hours: "5:30 AM - 2:00 AM, Monday-Saturday",
      lat: 14.55859800,
      lng: 121.01488000,
            link: 'https://www.google.com.ph/maps/place/Keyland+Centre/@14.5585502,121.0128433,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c90c0d747769:0xbebba805ded5021b!8m2!3d14.558545!4d121.015032',
            isNew: 0
    },
    
    {
      name: 'Butterfly Garden Residential Resorts',
      address: "Ground Floor, Unit 9 & 10, \r\nButterfly Garden, Newport Circle\r\nNewport City\r\n",
      phone: '964-1433',
      hours: "24 hours",
      lat: 14.52222200,
      lng: 121.01639200,
            link: 'https://www.google.com.ph/maps/search/butterfly+garden+newport/@14.5216527,121.0158952,18.5z',
            isNew: 0
    },
    
    {
      name: 'Ayala Tower One',
      address: "Ground Floor, Unit C-1,\r\nAyala Tower One & Exchange Plaza Ayala Triangle,\r\nAyala Ave. Makati City\r\n",
      phone: '625-0446',
      hours: "24 hours",
      lat: 14.55637900,
      lng: 121.02237900,
            link: 'https://www.google.com.ph/maps/place/Ayala+Tower+One,+Ayala+Ave,+Makati,+Metro+Manila/@14.5565155,121.0202089,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c9058bb670b5:0xf815eba9b0abaa3!8m2!3d14.5565232!4d121.022311',
            isNew: 1
    },
    
    {
      name: '150 Newport Boulevard',
      address: "Ground Floor, Unit 2 & 3,\r\n150 Newport Blvd.,\r\nPasay City",
      phone: '504-1324',
      hours: "8:00 AM - 12:00 MN",
      lat: 14.52062800,
      lng: 121.01750200,
            link: 'https://www.google.com.ph/maps/place/Newport+Blvd,+Pasay,+Metro+Manila/@14.5207102,121.0150249,17z/data=!3m1!4b1!4m5!3m4!1s0x3397cecc58ac6cc3:0x50b2f70ec92e3389!8m2!3d14.520705!4d121.0172136',
            isNew: 0
    },
    
    {
      name: 'Aurum One Residences',
      address: "Ground Floor, Aurum One Residences,\r\nEvangelista St. cor. Del Pilar St.,\r\nBrgy. Bangkal, Makati City\r\n",
      phone: '503-0630',
      hours: "6:00 AM - 12:00 MN",
      lat: 14.54181600,
      lng: 121.01180100,
            link: 'https://www.google.com.ph/maps/place/aurumOne+Makati/@14.5420138,121.0094917,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c93f986e2a03:0x16022b8b46e6b950!8m2!3d14.5420086!4d121.0116804',
            isNew: 1
    },
    
    {
      name: 'Wynn Plaza',
      address: "Ground Floor, Wynn Plaza,\r\nLeon Guinto St. cor. Gen. Malvar St.,\r\nMalate, Manila\r\n",
      phone: '503-0641',
      hours: "5:00 AM - 1:00 AM",
      lat: 14.57509300,
      lng: 120.98990400,
            link: 'https://www.google.com.ph/maps/place/Wynn+Plaza/@14.5755192,120.9881973,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c987004c70fd:0xef7ba26e0874d256!8m2!3d14.575514!4d120.990386',
            isNew: 1
    },
    
    {
      name: 'Libran House',
      address: "Ground Floor, Libran House Bldg.,\r\n144 Legaspi St. cor. V.A Rufino & Bolanos St.,\r\nLegaspi Village, Makati City\r\n",
      phone: '621-6191',
      hours: "24 hours",
      lat: 14.55668000,
      lng: 121.01692400,
            link: 'https://www.google.com.ph/maps/place/Libran+House/@14.5558608,121.0162856,18.75z/data=!4m5!3m4!1s0x3397c90e797f3701:0x46e332ddb0bb7e9a!8m2!3d14.555822!4d121.016646',
            isNew: 1
    },
    
    {
      name: 'Union Bank Plaza',
      address: "Ground Floor, Union Bank Plaza,\r\nMeralco Ave. cor. Onyx Road,\r\nOrtigas Center, Pasig City",
      phone: '625-2465',
      hours: "24 hours",
      lat: 14.58697000,
      lng: 121.06342700,
            link: 'https://www.google.com.ph/maps/place/Union+Bank+Plaza/@14.5871459,121.0615066,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c810bfab854b:0xf8c20acd3453706!8m2!3d14.5871407!4d121.0636953',
            isNew: 1
    },
    
    {
      name: 'Phoenix Macapagal',
      address: "Ground Floor, Phoenix Macapagal,\r\nRoxas Blvd.,\r\nPasay City",
      phone: '219-0699',
      hours: "8:00 AM - 12:00 MN",
      lat: 0.00000000,
      lng: 0.00000000,
            link: 'https://www.google.com.ph/maps/place/Phoenix+Fuels+Life/@14.5352232,120.9868196,15.75z/data=!4m5!3m4!1s0x3397cbfd64c091f1:0x1dc9b4dfc104f348!8m2!3d14.5355912!4d120.9873691',
            isNew: 0
    },
    
    {
      name: 'Petron Macapagal',
      address: "Petron Gas Station,\r\nMacapagal Avenue,\r\nPasay City",
      phone: '504-8139',
      hours: "24 hours",
      lat: 14.53650100,
      lng: 120.98817200,
            link: 'https://www.google.com.ph/maps/place/Petron/@14.5366599,120.9877843,18.25z/data=!4m5!3m4!1s0x3397c955ca064cdf:0xd003b47a49502a61!8m2!3d14.5366998!4d120.9881698',
            isNew: 0
    },
    
    {
      name: 'The Rock Lifestyle Hub',
      address: "The Rock Lifestyle Hub,\r\nHoly Spirit Drive,\r\nQuezon City",
      phone: '507-6312',
      hours: "24 hours",
      lat: 14.68547100,
      lng: 121.07680300,
            link: 'https://www.google.com.ph/maps/place/The+Rock/@14.6845349,121.0748564,17z/data=!4m8!1m2!2m1!1sthe+rock+lifestyle+hub!3m4!1s0x3397b0aa284d67eb:0xf713866ecfb342d!8m2!3d14.6845648!4d121.0769343',
            isNew: 1
    },
    
    {
      name: 'Convergy&#039;s One',
      address: "Convergy's One,\r\nAyala Ave. cor. Salcedo St.,\r\nMakati City",
      phone: '729-0390',
      hours: "24 hours, Monday-Friday\r\nSaturday (until 10 PM)",
      lat: 14.55934300,
      lng: 121.01621200,
            link: 'https://www.google.com.ph/maps/place/Convergys+One+Building,+6796+Ayala+Ave,+Legazpi+Village,+Makati,+Metro+Manila/@14.5593828,121.0141706,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c90bfdb8d407:0xff275c01789d798a!8m2!3d14.5593279!4d121.0163975',
            isNew: 1
    },
    
    {
      name: 'Trade and Financial Tower',
      address: "The Trade and Financial Tower,\r\n7th Ave. cor. 32nd St.\r\nBGC, Taguig City",
      phone: '958-5027',
      hours: "5:00 AM - 2:00 AM, Monday-Friday",
      lat: 14.55334000,
      lng: 121.05061400,
            link: 'https://www.google.com.ph/maps/place/Trade+and+Financial+Tower,+Lane+Q,+Taguig,+Metro+Manila/@14.5532131,121.0484517,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8f1583d4331:0xdfb11d591d06e95b!8m2!3d14.5532216!4d121.050665',
            isNew: 1
    },
    
    {
      name: 'Valero Plaza',
      address: "Ground Floor Unit G26 & 253 Valero Plaza,\r\n124 Valero St., Salcedo Village,\r\nMakati City",
      phone: '503-7848',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.55893000,
      lng: 121.02058800,
            link: 'https://www.google.com.ph/maps/place/Valero+Plaza+Condominium,+124+Valero,+Makati,+1227+Metro+Manila/@14.5588117,121.0184866,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c908c82be317:0x17d63414da169ba9!8m2!3d14.5588866!4d121.020519',
            isNew: 1
    },
    
    {
      name: 'Filipino Building',
      address: "Ground Floor Filipino Building,\r\nDela Rosa St. corner Legaspi  St.,\r\nLegaspi Village, Makati City\r\n",
      phone: '504-1364',
      hours: "5:30 AM - 2:00 AM, Monday-Friday",
      lat: 14.55798300,
      lng: 121.01641300,
            link: 'https://www.google.com.ph/maps/place/Filipino+Bldg./@14.5581302,121.0142833,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c90ea7ac7619:0xd573b1a6311e1536!8m2!3d14.558125!4d121.016472',
            isNew: 1
    },
    
    {
      name: 'Diamond Arcade',
      address: "Ground Floor Diamond Arcade.\r\nAurora Boulevard corner St. Mary's St.,\r\nBrgy. E. Rodriguez, Cubao, Quezon City\r\n",
      phone: '504-1361',
      hours: "24 hours",
      lat: 14.62279500,
      lng: 121.05225200,
            link: 'https://www.google.com.ph/maps/place/Diamond+Arcade/@14.6227699,121.0501246,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b7bf17a0283d:0xa6c0f90c9f2caaa4!8m2!3d14.6227647!4d121.0523133',
            isNew: 1
    },
    
    {
      name: 'Eton Cyberpod',
      address: "Ground Floor UG-66 Eton Cyberpod Corinthian,\r\nOrtigas Avenue cor. Edsa,\r\nBrgy. Ugong Norte, Quezon City\r\n\r\n",
      phone: '504-8241',
      hours: "24 hours",
      lat: 14.59227700,
      lng: 121.05993300,
            link: 'https://www.google.com.ph/maps/place/Eton+Cyberpod/@14.5919905,121.0580653,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c818d66f614d:0x6bb34d354be83c7e!8m2!3d14.5919853!4d121.060254',
            isNew: 1
    },
    
    {
      name: 'The Gramercy Residences',
      address: "Ground Floor Unit 4, The Gramercy Residences,\r\nCentury City, Kalayaan Ave. cor. Salamanca St.,\r\nBrgy. Poblacion, Makati City ",
      phone: '587-2541',
      hours: "24 hours",
      lat: 14.56557300,
      lng: 121.02830800,
            link: 'https://www.google.com.ph/maps/place/The+Gramercy+Residences,+Makati,+Metro+Manila/@14.5652832,121.0261443,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c9abd181598d:0x438add4924ee94da!8m2!3d14.565278!4d121.028333',
            isNew: 0
    },
    
    {
      name: 'One San Miguel',
      address: "Lower Ground 2, One San Miguel Avenue Bldg.,\r\nShaw Boulevard cor. San Miguel Ave.,\r\nOrtigas Center, Pasig City\r\n\r\n",
      phone: '625-6774',
      hours: "6:00 AM - 2:00 AM, Monday-Saturday",
      lat: 14.57785800,
      lng: 121.05765500,
            link: 'https://www.google.com.ph/maps/place/One+San+Miguel+Avenue+Condominium+Unitowers+Association+Incorporated/@14.5780972,121.055423,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c81530eebb55:0x6a99dcfe757cd8fc!8m2!3d14.578092!4d121.0576117',
            isNew: 1
    },
    
    {
      name: 'Casimiro Commercial Center',
      address: "Casimiro Commercial Center, J. Aguilar Avenue cor. Alabang-Zapote Rd, Talon, Las Pinas City",
      phone: '09175827498',
      hours: "24 hours",
      lat: 0.00000000,
      lng: 0.00000000,
            link: 'https://www.google.com.ph/maps/place/Casimiro+Ave,+Las+Pinas,+Metro+Manila/@14.465995,120.9684772,17.25z/data=!4m5!3m4!1s0x3397cdea1df3d5ad:0x4f857337ae1cc347!8m2!3d14.4665015!4d120.9702854',
            isNew: 1
    },
    
    {
      name: 'W Fifth Building',
      address: "L\/G Floor, W Fifth Avenue, Bonifacio Global City, Taguig",
      phone: '507-6391',
      hours: "5:00 AM - 2:00 AM, Monday-Saturday",
      lat: 14.55362600,
      lng: 121.04868600,
            link: 'https://www.google.com.ph/maps/place/The+W+Fifth+Avenue,+5th+Ave,+Taguig,+Metro+Manila/@14.5534042,121.0488733,20z/data=!4m13!1m7!3m6!1s0x3397c8f136cec06b:0xb66cdf7abea0bd3!2sThe+W+Fifth+Avenue,+5th+Ave,+Taguig,+Metro+Manila!3b1!8m2!3d14.5532835!4d121.0487834!3m4!1s0x3397c8f136cec06b:0xb66cdf7abea0b',
            isNew: 1
    },
    
    {
      name: 'Ayala Malls Serin',
      address: "G\/F, Ayala Malls Serin, Tagaytay City",
      phone: '(046) 235-1812',
      hours: "6:00 AM - 10:00 PM",
      lat: 14.11249100,
      lng: 120.95891200,
            link: 'https://www.google.com.ph/maps/place/Ayala+Malls+Serin/@14.1126651,120.9570878,17.25z/data=!4m5!3m4!1s0x33bd776402113327:0xadaa3af7088dde94!8m2!3d14.112621!4d120.958679',
            isNew: 1
    },
    
    {
      name: 'Solenad 3',
      address: "UNIT GFF-6, G\/F SOLENAD 3, NUVALI, STA. ROSA, LAGUNA",
      phone: '(049) 250-7132',
      hours: "24 hours",
      lat: 14.23745400,
      lng: 121.05680300,
            link: 'https://www.google.com.ph/maps/place/Solenad+3/@14.1365081,120.9832282,17z/data=!3m1!4b1!4m5!3m4!1s0x33bd798ae59a3ab1:0x5863ce1dbb0f2d2e!8m2!3d14.1365029!4d120.9854169',
            isNew: 0
    },
    
    {
      name: 'Bonifacio Stopover Retail',
      address: "UNIT R-101, G\/F BONIFACIO STOPOVER (RETAIL), BONIFACIO GLOBAL CITY,  TAGUIG",
      phone: '507-5941',
      hours: "24 hours",
      lat: 14.55427900,
      lng: 121.04609700,
            link: 'https://www.google.com.ph/maps/place/Bonifacio+Stopover,+31st+Street,+Taguig,+Metro+Manila/@14.5544136,121.0437324,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8f0b33761ed:0x5ddc7723e47e2ef6!8m2!3d14.5544084!4d121.0459211',
            isNew: 0
    },
    
    {
      name: 'Fort Victoria Condominium',
      address: "G\/F FORT VICTORIA, 5TH AVE., COR., RIZAL AVE., BGC, TAGUIG CITY",
      phone: '587-5463',
      hours: "6:00 AM - 2:00 AM",
      lat: 14.54689700,
      lng: 121.04564500,
            link: 'https://www.google.com.ph/maps/place/Fort+Victoria/@14.5472389,121.0436087,17z/data=!4m8!1m2!2m1!1sfort+victoria+condominium!3m4!1s0x3397c8ef7803e0d5:0x81a7d7a5daf6a1bc!8m2!3d14.5468958!4d121.0456705',
            isNew: 0
    },
    
    {
      name: 'Market! Market!',
      address: "SPACE FFV46, FIESTA MARKET, MARKET MARKET, BGC, TAGUIG CITY",
      phone: '507-6363',
      hours: "24 hours",
      lat: 14.54902800,
      lng: 121.05529600,
            link: 'https://www.google.com.ph/maps/place/Market!+Market!/@14.5495522,121.0538863,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8f2ca652c83:0x62c8011c6abe662e!8m2!3d14.549547!4d121.056075',
            isNew: 1
    },
    
    {
      name: 'Aeon Prime Building',
      address: "G\/F AEON PRIME BUILDING, ALABANG-ZAPOTE ROAD COR. NORTHGATE BRIDGEWAY, MUNTINLUPA CITY",
      phone: '507-6276',
      hours: "24 hours",
      lat: 14.42309600,
      lng: 121.03985000,
            link: 'https://www.google.com.ph/maps/place/Aeon+Prime+Building,+N+Bridgeway,+Alabang,+Muntinlupa,+1781+Metro+Manila/@14.4231007,121.0376616,17z/data=!3m1!4b1!4m5!3m4!1s0x3397d031653f3fd9:0x85e75e427f90127e!8m2!3d14.423123!4d121.0398706',
            isNew: 0
    },
    
    {
      name: 'Cityland Condominium 10',
      address: "G\/F. CITYLAND CONDOMINIUM 10 TOWER 2, 6817 HV DELA COSTA STREET, SALCEDO VILLAGE, MAKATI CITY\r\n",
      phone: '978-0141',
      hours: "24 hours",
      lat: 14.56081200,
      lng: 121.01741100,
            link: 'https://www.google.com.ph/maps/place/Cityland+10+Tower+2,+156+H.V.+Dela+Costa,+Makati,+Metro+Manila/@14.5609153,121.0155228,17z/data=!4m5!3m4!1s0x3397c9096f41e023:0x4c8f3f5a1dd77144!8m2!3d14.5604561!4d121.0172487',
            isNew: 0
    },
    
    {
      name: 'BGC Corporate Center',
      address: "11th Ave Cor 30th St., Bonifacio Global City",
      phone: '',
      hours: "24 hours",
      lat: 14.55124200,
      lng: 121.05347100,
            link: '',
            isNew: 1
    },
    // Newly Added
    {
      name: 'Dela Rosa CP1',
      address: "Dela Rosa Carpark 1 Dela Rosa St.,\r\n Legaspi Village Makaty City",
      phone: '',
      hours: "24 hours",
      lat: 14.5550627,
      lng: 121.0203304,
            link: 'https://www.google.com.ph/maps/place/Family+Mart/@14.5550627,121.0203304,18z/data=!4m5!1m2!2m1!1sDELA+ROSA+CARPARK+1+DELA+ROSA+ST.+LEGASPI+VILLAGE+MAKATI+CITY!3m1!1s0x3397c90f82532927:0xb2948fe4af2943f0',
            isNew: 1
    },
    {
      name: 'Somerset Millenium Hotel',
      address: "G/F Somerset Millenium Hotel Aguirre ST.\r\n Legaspi Village Makaty City",
      phone: '',
      hours: "5:30am - 2am",
      lat: 14.5544856,
      lng: 121.0173835,
            link: 'https://www.google.com.ph/maps/place/Somerset+Millennium+Makati/@14.5544856,121.0173835,16z/data=!4m8!1m2!2m1!1sSomerset+Millenium+Hotel!3m4!1s0x3397c9a589a9d163:0xc222f051cf61390f!8m2!3d14.5526662!4d121.0177337?hl=en',
            isNew: 1
    },
    {
      name: 'GDC Pavilion',
      address: "G/F Unit L1D101, Greenfield District Pavillion,\r\n Mandaluyong City",
      phone: '',
      hours: "24 hours",
      lat: 14.5799755,
      lng: 121.0518054,
            link: 'https://www.google.com.ph/maps/place/Greenfield+District+Branch/@14.5799755,121.0518054,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c83f9b444e85:0xb9e4918c24f8f40c!8m2!3d14.5799755!4d121.0539941?hl=en',
            isNew: 1
    },
    {
      name: '139 Corporate Center',
      address: "G/F 139 Corporate Center, Valero St. Salcedo Village,\r\n MAKATI CITY",
      phone: '',
      hours: "24 hours Mon-Fri Sat - til 10 pm",
      lat: 14.5580158,
      lng: 121.0198277,
            link: 'https://www.google.com.ph/maps/place/139+Corporate+Center,+Valero,+Makati,+Metro+Manila/@14.5580158,121.0198277,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c90f5567387b:0x901b6018f662bac0!8m2!3d14.5579833!4d121.0219974?hl=en',
            isNew: 1
    },
    {
      name: 'La Fayatte',
      address: "G/F Unit 1 La Fayatte 1, Eastwoord City Cyberpark,\r\n Brgy. Bagumbayan, Quezon City",
      phone: '',
      hours: "24 hours",
      lat: 14.6087333,
      lng: 121.0710013,
            link: 'https://www.google.com.ph/maps/place/Eastwood+Lafayette+1/@14.6087333,121.0710013,15z/data=!4m8!1m2!2m1!1sLa+Fayatte!3m4!1s0x3397b81d7c8180c9:0x2b722c8ab3d0392c!8m2!3d14.6087333!4d121.079756?hl=en',
            isNew: 1
    },
    {
      name: 'Trade & Financial (Ground Floor)',
      address: "G/F Unit 9,The Trade and Financial Tower 7th Ave. Cor. 32nd St.\r\n BGC,Taguig City",
      phone: '',
      hours: "5am - 11pm Mon-Fri",
      lat: 14.5532079,
      lng: 121.0484518,
            link: 'https://www.google.com.ph/maps/place/Trade+and+Financial+Tower,+Lane+Q,+Taguig,+Metro+Manila/@14.5532079,121.0484518,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c8f1583d4331:0xdfb11d591d06e95b!8m2!3d14.5532216!4d121.050665?hl=en',
            isNew: 1
    },
    {
      name: 'California Garden Square',
      address: "G/F Cluster Dayton R55-R56, California Garden Square, D.M. Guevarra (Libertad) St.\r\n Mandaluyong City",
      phone: '',
      hours: "24 hours",
      lat: 14.5786156,
      lng: 121.0452963,
            link: 'https://www.google.com.ph/maps/place/California+Garden+Square/@14.5786156,121.0452963,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c847a525de4d:0x78460188f954d4d3!8m2!3d14.5786156!4d121.047485?hl=en',
            isNew: 1
    },
    {
      name: 'CAP Building',
      address: "G/F CAP Building, Amorsolo Corner V.A. Rufino and Adelantado Streets,\r\n Legaspi Village, Makati City",
      phone: '',
      hours: "6am - 2am",
      lat: 14.555554,
      lng: 121.0145808,
            link: 'https://www.google.com.ph/maps/place/C+A+P+Life+Insurance+Corporation/@14.555554,121.0145808,19z/data=!4m8!1m2!2m1!1sCAP+Building+makati!3m4!1s0x0:0xfa0a4f75b3fb994e!8m2!3d14.555552!4d121.014929?hl=en',
            isNew: 1
    },
    {
      name: 'Ayala Triangle Gardens',
      address: "Ayala Triangle Gardens Ayala Ave.,\r\n Makati City",
      phone: '',
      hours: "5am - 11pm",
      lat: 14.5571467,
      lng: 121.0222191,
            link: 'https://www.google.com.ph/maps/place/Ayala+Triangle+Gardens/@14.5571467,121.0222191,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c905c953e8df:0xd3d03ade4df31dab!8m2!3d14.5571467!4d121.0244078?hl=en',
            isNew: 1
    },
    {
      name: 'Enterprise Center',
      address: "Upper Lobby, The Enterprise Center, Ayala Ave Cor. Paseo De Roxas,\r\n Legaspi Village, Makati City",
      phone: '',
      hours: "5am - 2am",
      lat: 14.5561656,
      lng: 121.0189466,
            link: 'https://www.google.com.ph/maps/place/The+Enterprise+Center/@14.5561656,121.0189466,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c90f6f8d72d9:0xabf9b284dc09d022!8m2!3d14.5561656!4d121.0211353?hl=en',
            isNew: 1
    },
    {
      name: 'Avida San Lorenzo',
      address: "G/F Retail Space 2-4, Avida Towers San Lorenzo, Chino Roces Ave.,\r\n Makati City",
      phone: '',
      hours: "24 hours",
      lat: 14.5501809,
      lng: 121.0103085,
            link: 'https://www.google.com.ph/maps/place/Avida+Towers+San+Lorenzo/@14.5501809,121.0103085,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b5fd613ebced:0x4ea0a9433b48ae97!8m2!3d14.5501809!4d121.0124972?hl=en',
            isNew: 1
    },
    {
      name: 'Avida New Manila',
      address: "Avida Towers New Manila (TOWER# 5), B. Serrano Ave.,\r\n Brgy. Bagong Lipunan Ng Crame, Quezon City",
      phone: '',
      hours: "24 hours",
      lat: 14.6095039,
      lng: 121.044595,
            link: 'https://www.google.com.ph/maps/place/Avida+Towers+New+Manila/@14.6095039,121.044595,17z/data=!3m1!4b1!4m5!3m4!1s0x3397b72fc9ab9b0b:0xda2c83c53aa7aba3!8m2!3d14.6095039!4d121.0467837?hl=en',
            isNew: 1
    },
    {
      name: 'Oceanaire',
      address: "G/F Unit 106 & 107 Oceanaire Manila, Coral Way,\r\n Pasay City",
      phone: '',
      hours: "24 hours",
      lat: 14.5322315,
      lng: 120.9847115,
            link: 'https://www.google.com.ph/maps/place/Oceanaire+Luxurious+Residences/@14.5322315,120.9847115,17z/data=!4m8!1m2!2m1!1sOceanaire!3m4!1s0x3397cbfdde96d281:0xf509173ea8a92899!8m2!3d14.5325826!4d120.9860368?hl=en',
            isNew: 1
    },
    
  ];
</script>
<script type="text/javascript "> 
$('#carousel-meals').carousel({
  interval: true;
})
</script>
<script>
    $(document).ready(function () {

      var img1 = $(".carousel-inner .item img");
      // var img2 = $("img#slide2");
      // var img3 = $("img#slide3");
      // var img4 = $("img#slide4");
      // var img5 = $("img#slide5");
      // var img6 = $("img#slide6");

      var width = $(window).width();

          if (width <= 480) {

            <?php
            $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
             $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                $("#img-<?php echo $row["id"]; ?>").attr("src","<?php echo str_replace('/home/familyma/public_html','http://familymart.com.ph',$row["img_path"]); ?><?php echo $row["img_thumb"]; ?>");
               $("#img-<?php echo $row["id"]; ?>").attr("height","300");
               $("#img-<?php echo $row["id"]; ?>").attr("width","300");
                  
             <?php   }
                  }
              ?>
              // img2.attr("src","http://familymart.com.ph/img/Twirl-square.jpg");
              // img2.attr("height","300");
              // img2.attr("width","300");
              // img3.attr("src","http://familymart.com.ph/img/Tempura-square.jpg");
              // img3.attr("height","300");
              // img3.attr("width","300");
              // img4.attr("src","http://familymart.com.ph/img/SuperFreeze-square.jpg");
              // img4.attr("height","300");
              // img4.attr("width","300");
              // img5.attr("src","http://familymart.com.ph/img/Donburi-square.jpg");
              // img5.attr("height","300");
              // img5.attr("width","300");
              // img6.attr("src","http://familymart.com.ph/img/home-hdr-mobile.jpg");
              // img6.attr("height","300");
              // img6.attr("width","300");
          } else {
            <?php
            $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
             $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                $("#img-<?php echo $row["id"]; ?>").attr("src","<?php echo str_replace('/home/familyma/public_html','http://familymart.com.ph',$row["img_path"]); ?><?php echo $row["img_name"]; ?>");
               $("#img-<?php echo $row["id"]; ?>").attr("height","");
               $("#img-<?php echo $row["id"]; ?>").attr("width","");
                  
             <?php   }
                  }
              ?>
              // img1.attr("src","http://familymart.com.ph/img/final-slide.png");
              // img2.attr("src","http://familymart.com.ph/img/Twirl.jpg");
              // img3.attr("src","http://familymart.com.ph/img/Tempura.jpg");
              // img4.attr("src","http://familymart.com.ph/img/SuperFreeze.jpg");
              // img5.attr("src","http://familymart.com.ph/img/Donburi.jpg");
              // img6.attr("src","http://familymart.com.ph/img/final-slide1.png");
              // img1.attr("height","");
              // img1.attr("width","");
              // img2.attr("height","");
              // img2.attr("width","");
              // img3.attr("height","");
              // img3.attr("width","");
              // img4.attr("height","");
              // img4.attr("width","");
              // img5.attr("height","");
              // img5.attr("width","");
              // img6.attr("height","");
              // img6.attr("width","");
          }

      var $window = $(window).on('resize', function(){
      var width_resize = $window.width();

        if (width_resize <= 500) {
              // img1.attr("src","http://familymart.com.ph/img/home-hdr-mobile.jpg");
              // img1.attr("height","300");
              // img1.attr("width","300");
              // img2.attr("src","http://familymart.com.ph/img/Twirl-square.jpg");
              // img2.attr("height","300");
              // img2.attr("width","300");
              // img3.attr("src","http://familymart.com.ph/img/Tempura-square.jpg");
              // img3.attr("height","300");
              // img3.attr("width","300");
              // img4.attr("src","http://familymart.com.ph/img/SuperFreeze-square.jpg");
              // img4.attr("height","300");
              // img4.attr("width","300");
              // img5.attr("src","http://familymart.com.ph/img/Donburi-square.jpg");
              // img5.attr("height","300");
              // img5.attr("width","300");
              // img6.attr("src","http://familymart.com.ph/img/home-hdr-mobile.jpg");
              // img6.attr("height","300");
              // img6.attr("width","300");
               <?php
              $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
               $result = mysqli_query(conn(),$sql);

               if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) { ?>

                  $("#img-<?php echo $row["id"]; ?>").attr("src","<?php echo str_replace('/home/familyma/public_html','http://familymart.com.ph',$row["img_path"]); ?><?php echo $row["img_thumb"]; ?>");
                 $("#img-<?php echo $row["id"]; ?>").attr("height","300");
                 $("#img-<?php echo $row["id"]; ?>").attr("width","300");
                    
               <?php   }
                    }
                ?>

        } else {
              // img1.attr("src","http://familymart.com.ph/img/final-slide.png");
              // img2.attr("src","http://familymart.com.ph/img/Twirl.jpg");
              // img3.attr("src","http://familymart.com.ph/img/Tempura.jpg");
              // img4.attr("src","http://familymart.com.ph/img/SuperFreeze.jpg");
              // img5.attr("src","http://familymart.com.ph/img/Donburi.jpg");
              // img6.attr("src","http://familymart.com.ph/img/final-slide1.png");
              // img1.attr("height","");
              // img1.attr("width","");
              // img2.attr("height","");
              // img2.attr("width","");
              // img3.attr("height","");
              // img3.attr("width","");
              // img4.attr("height","");
              // img4.attr("width","");
              // img5.attr("height","");
              // img5.attr("width","");
              // img6.attr("height","");
              // img6.attr("width","");
              <?php
            $sql = "SELECT * FROM content where page_name ='home' and type='home-slider'";
             $result = mysqli_query(conn(),$sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?>

                $("#img-<?php echo $row["id"]; ?>").attr("src","<?php echo str_replace('/home/familyma/public_html','http://familymart.com.ph',$row["img_path"]); ?><?php echo $row["img_name"]; ?>");
               $("#img-<?php echo $row["id"]; ?>").attr("height","");
               $("#img-<?php echo $row["id"]; ?>").attr("width","");
                  
             <?php   }
                  }
              ?>
        }
        });
    });
</script>

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/storelocator.js"></script>
    <script src="js/chosen.jquery.min.js"></script>

   

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyATA6S177i1RKmQyzlhj7cc1tIft5ywY6A&libraries=places&callback=initMap">
    </script>

   
</html>