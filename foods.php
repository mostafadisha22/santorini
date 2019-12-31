<html>
<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Blood Bank that facilitate the proccess of blood donation" />

    <title>Foods</title>
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
<body>
<a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
				<center>
<h2> Santorini Foods<h2>
</div>

</body>
</html>
<?php

	$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$result=mysqli_query($conn,"SELECT * FROM foods limit 12 ");
	$result1=mysqli_query($conn,"SELECT * FROM foods limit 3 ");
	$result2=mysqli_query($conn,"SELECT * FROM foods where foods.id in(4,5,6) ");
	$result3=mysqli_query($conn,"SELECT * FROM foods where foods.id in(7,8,9) ");
	$result4=mysqli_query($conn,"SELECT * FROM foods where foods.id in(10,11) ");
	
	echo"<table id='big_tb_f'><tr>";
	echo"<td><table id='smol_tb_f'><tr>";
	echo"<td id='td_list'><div><center>";
	while ($row = mysqli_fetch_array($result)) {
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
	echo"</center></div></td>";
	
	echo "<td id='td_img1_f'><center>";
	while ($row = mysqli_fetch_array($result1)) {
	if(!empty($row['foods_image']))
	{
		$foods_section=$row['foods_section'];
      	echo "<a href='gofoods.php?foods_section=$foods_section'>";
		echo "<p>".$row['foods_section']."</p>";
		echo"<img src='".$row['foods_image']."' alrt='".$row['foods_section']."' title='".$row['foods_section']."' id='col1_im_f'></a>";
	}
    }
echo"</center></td>";
	echo"<td id='td_img2_f'><center>";
	while ($row = mysqli_fetch_array($result2)) {
	if(!empty($row['foods_image']))
	{
		$foods_section=$row['foods_section'];
      	echo "<a href='gofoods.php?foods_section=$foods_section'>";
		echo "<p >".$row['foods_section']."</p>";
		echo"<img src='".$row['foods_image']."' alrt='".$row['foods_section']."' title='".$row['foods_section']."' id='col2_im_f'></a>";
	}
    }
echo"</center></td>";
	echo"<td id='td_img3_f'><center>";
	while ($row = mysqli_fetch_array($result3)) {
	if(!empty($row['foods_image']))
	{
		$foods_section=$row['foods_section'];
		$cut_foods_section=substr($foods_section,0,21);
		$cut2_foods_section=substr($foods_section,21,30);
      	echo "<a href='gofoods.php?foods_section=$foods_section'>";
		echo "<p >".$cut_foods_section."</p>";
	//	if(!empty($cut2_foods_section)){echo "<p >".$cut2_foods_section."</p>";}
		echo"<img src='".$row['foods_image']."' alrt='".$row['foods_section']."' title='".$row['foods_section']."' id='col3_im_f'></a>";
	}
    }
echo"</center></td>";
	echo"<td id='td_img4_f'><center>";
	while ($row = mysqli_fetch_array($result4)) {
	if(!empty($row['foods_image']))
	{
		$foods_section=$row['foods_section'];
      	echo "<a href='gofoods.php?foods_section=$foods_section'>";
		echo "<p>".$row['foods_section']."</p>";
		echo"<img src='".$row['foods_image']."' alrt='".$row['foods_section']."' title='".$row['foods_section']."' id='col4_im_f'></a>";
	}
    }
echo"</center></td></tr></table></td>";
	echo"</tr></table>";
	mysqli_free_result($result);
	mysqli_free_result($result1);
	mysqli_free_result($result2);
	mysqli_free_result($result3);
	mysqli_free_result($result4);
	mysqli_close($conn);
?>