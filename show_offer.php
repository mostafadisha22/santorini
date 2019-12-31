<html>
<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Blood Bank that facilitate the proccess of blood donation" />

    <title>Offers</title>
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
	
 <link href="style.css" rel="stylesheet">
</head>
<body><a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
				<center>
<h2 style=font-size:185%> Santorini Offers<h2>
</div>

</body>
</html>
<?php
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$result_d=mysqli_query($conn,"SELECT * FROM drinks ");
	$result_f=mysqli_query($conn,"SELECT * FROM foods ");
	$result=mysqli_query($conn,"SELECT * FROM offer ");
	echo "<table id='tb_of'><tr><th><center><h2><b>foods</h2></center></th><th><center><h2><b>Today's Offer</h2></center></th>
	<th><center><h2><b>drinks</h2></center></th></tr><tr><td id='td_links_f_of'><div id='di_links_F_of'><center><br><br>";
	while ($row = mysqli_fetch_array($result_f)) {
	if(!empty($row['foods_section']))
	{
		$foods_section=$row['foods_section'];
		$cut_foods_section=substr($foods_section,0,21);
		$cut2_foods_section=substr($foods_section,21,30);
      	echo "<a href='gofoods.php?foods_section=$foods_section'>";
		echo "<i>".$cut_foods_section."</i>";
	//	if(!empty($cut2_foods_section)){echo "<br><i>".$cut2_foods_section."</i>";}
		echo"</a>";
	}
	echo"<br><br>";
    }
	echo"<br><br></center></div></td>";
		echo"<td ><div id='big_di_img_of'><div id='smal_di_F_of'>";
		 while ($row = mysqli_fetch_array($result))
		{
			if(isset($row['offer_image']) && !empty($row['offer_image']) && isset($row['offer_text']) && !empty($row['offer_text']))
			{
				echo "<center><img src='".$row['offer_image']."' id='img1_of' ><br>";
				echo"<h2 style='direction:RTL;'>".$row['offer_text']."</h2></center>";
			}
			else if(isset($row['offer_image']) && !empty($row['offer_image']) && empty($row['offer_text']))
			{
				echo "<center><img src='".$row['offer_image']."' id='img2_of' ></center><br>";
			}
			else if(isset($row['offer_text']) && !empty($row['offer_text']) && empty($row['offer_image']))
			{
				echo"<h2 style='direction:RTL;'>".$row['offer_text']."</h2><center>";
			}
			
		}
		if(mysqli_num_rows($result)<1)
		{
			echo"<center><h2><b>Offers Are Not Available Now</h2></center>";
		}
	
	echo " </div></div></td><td id='td_links_d_of'><div id='di_links_d_of'><center>";
	while ($row = mysqli_fetch_array($result_d)) {
	if(!empty($row['drinks_section']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<i>".$row['drinks_section']."</i></a>";
	
	}
	echo"<br><br>";
    }
	echo"</center></div></td>";
	
	echo"</tr></table>";
	mysqli_free_result($result);
	mysqli_free_result($result_d);
	mysqli_free_result($result_f);
	mysqli_close($conn);
?>