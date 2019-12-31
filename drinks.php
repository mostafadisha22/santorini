<html>
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Blood Bank that facilitate the proccess of blood donation" />

    <title>Drinks</title>
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
<h2> Santorini Drinks<h2>
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
	$result=mysqli_query($conn,"SELECT * FROM drinks limit 12 ");
	$result1=mysqli_query($conn,"SELECT * FROM drinks limit 3 ");
	$result2=mysqli_query($conn,"SELECT * FROM drinks where drinks.id in(4,5,6) ");
	$result3=mysqli_query($conn,"SELECT * FROM drinks where drinks.id in(7,8,9) ");
	$result4=mysqli_query($conn,"SELECT * FROM drinks where drinks.id in(10,11,12) ");
	
	echo"<table id='big_td'><tr>";
	echo"<td><table id='smol_tb'><tr>";
	echo"<td id='td_list'><div ><center>";
	while ($row = mysqli_fetch_array($result)) {
	if(!empty($row['drinks_section']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<i>".$row['drinks_section']."</i></a>";
	}
	echo"<br><br>";
    }
	echo"</center></div></td>";
	
	echo "<td><center>";
	while ($row = mysqli_fetch_array($result1)) {
	if(!empty($row['drinks_image']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<p>".$row['drinks_section']."</p>";
		echo"<img src='".$row['drinks_image']."' alrt='".$row['drinks_section']."' title='".$row['drinks_section']."' id='col1_im'></a>";
	}
    }
echo"</center></td>";
	echo"<td><center>";
	while ($row = mysqli_fetch_array($result2)) {
	if(!empty($row['drinks_image']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<p>".$row['drinks_section']."</p>";
		echo"<img src='".$row['drinks_image']."' alrt='".$row['drinks_section']."' title='".$row['drinks_section']."' id='col2_im'></a>";
	}
    }
echo"</center></td>";
	echo"<td><center>";
	while ($row = mysqli_fetch_array($result3)) {
	if(!empty($row['drinks_image']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<p>".$row['drinks_section']."</p>";
		echo"<img src='".$row['drinks_image']."' alrt='".$row['drinks_section']."' title='".$row['drinks_section']."' id='col3_im'></a>";
	}
    }
echo"</center></td>";
	echo"<td><center>";
	while ($row = mysqli_fetch_array($result4)) {
	if(!empty($row['drinks_image']))
	{
		$drinks_section=$row['drinks_section'];
      	echo "<a href='godrinks.php?drinks_section=$drinks_section'>";
		echo "<p>".$row['drinks_section']."</p>";
		echo"<img src='".$row['drinks_image']."' alrt='".$row['drinks_section']."' title='".$row['drinks_section']."' id='col4_im'></a>";
	}
    }
echo"</center></td></tr></table></td>";
	echo"</tr></table>";
?>