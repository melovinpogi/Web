<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- Latest compiled and minified JavaScript -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>


    <title>Welcome to Portal! <?php echo $username; ?> </title>
 </head>
 <body>
   <!-- <h1>Home</h1>
   <h2>Welcome <?php echo $username; ?>!</h2>
   <a href="home/logout">Logout</a> -->

    <style type="text/css">
   .home-row{
     /* margin-left: 34%;*/
      margin-top: 1%;
   }
   body {
    background-image: url("http://fydesigns.ph/sites/all/themes/aqua/styler/bgrs/purty_wood.png");
    }

    .tr-header{
      border-radius: 5px;
      border: 1px solid black;
      color: white !important;
      font-size: 1.2em;
      white-space: nowrap;
      text-overflow: ellipsis;
      text-decoration: none !important;
      cursor: pointer;
      text-align: center;
      background: linear-gradient(#4d4d4d, #2f2f2f);
    }

    .welcome{
      background: linear-gradient(#4d4d4d, #2f2f2f);
    }
   </style>
 
      <div class="container col-xs-4" style="margin: 5% 0% 10% 30%;">
          <div class="logo"><img src="http://shinra.com.ph/sites/default/files/shinra-logo-final.png"></div>
              <div class="row home-row">
                  <div class="col-xs-12 col-sm-12">
                      <div class="panel panel-default customized-panel">
                           <div class="panel-heading text-center customized-panel-heading tr-header">
                              Upload Success!
                               <!--  <ul>
                                    <?php foreach ($upload_data as $item => $value):?>
                                    <li><?php echo $item;?>: <?php echo $value;?></li>
                                    <?php endforeach; ?>
                                </ul> -->
                           </div>
                        </div>
                    </div>
              </div>
             <a href="/portal/home" class="btn btn-default navbar-btn">-> Home</a>
             
              
      </div>

 </body>
</html>