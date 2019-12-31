<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Blood Bank that facilitate the proccess of blood donation" />

    <title>Santorini C & R</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />

    <!--Angular Framework-->
    <script src="assets/js/angular.1.6.min.js"></script>

    <!--App Module-->
    <script src="assets/js/app.js"></script>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="Articles/css/article1.css" rel="stylesheet" />
    <link href="Articles/css/footer.css" rel="stylesheet" />
    <link href="assets/css/topback.css" rel="stylesheet"/>
    
    <!--<link href="Articles/css/article2.css" rel="stylesheet" />-->

    <!--JS Code-->
    <script src="Articles/js/article1.js"></script>
    <!--<script src="Articles/js/article2.js"></script>-->
</head>

<body ng-app="BloodBankMod" ng-controller="homeCtrl">

    <div class="mynav navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a>
                <h1 style=font-size:8px>&nbsp &nbsp &nbsp Santorini<br> Cafe & Resturant</h1>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                       <!-- <a href="menu.php">Menu</a>-->
					   <div class="btn-group" role="group">
    <button  style=margin:10px;background-color:gray;color:white; type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Menu
      <span class="caret"></span>
    </button>
    <ul style=background-color:black; class="dropdown-menu">
      <li><a href="drinks.php"><b>Drinks</b></a></li>
      <li><a href="foods.php"><b>Foods</b></a></li>
    </ul>
  </div>
                    </li>
					 <li>
                        <a href="show_offer.php">Offers</a>
                    </li>
					
                   
					<li>
                       <a href="send_email.php">Reserve</a>
                    </li>
					
                    <li>
                       <a href="login.php ">Log In</a>
                    </li>
					

                </ul>
            </div>

        </div>
    </div>
    <!--NAVBAR SECTION END-->

    <div class="home-sec" id="home">

        <div class="overlay">

            <div class="container">

                <div class="row text-center ">

                    <div class="col-lg-12  col-md-12 col-sm-12">

                        <div class="flexslider set-flexi" id="main-section">
							<h2><B>Welcome To Santorini <br> Cafe & Resturant</h2>
                            <ul class="slides move-me">

                                <!-- Slider 01 -->
                      
                                <!-- Slider 02 -->
                                <li>
                                   


                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    

    <div id="about-sec" class="container set-pad">
        <div class="row text-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <h1 data-scroll-reveal="enter from the bottom after 0.2s" class="header-line">About Santorini</h1>
                <p data-scroll-reveal="enter from the bottom after 0.3s">
                       Greek ambiance on Egyptian soil, where the splendor of Greek design and international quality meets Egyptian aesthetic views. Welcome to Santorini restaurant and café.</p>
            </div>

        </div>
     


    </div>
    
    <!-- FOOTER SECTION END-->



    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
    <script src="assets/js/jquery.flexslider.js"></script>
    <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/topback.js"></script>
                                    
</body>

</html>