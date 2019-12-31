<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

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
	
	
	
	
	
	
	
	<style>
<!--.side_right {
	float: left;
	margin-right: 0px;
	margin-bottom: 1em;
	display:inline;
	
}-->

.block_center {
	
	float:left;
	 margin-right:-28%; 
	 margin-left: 30%; 
	  background-color:white;
	  
	  font-size:145%;
	  color:darkred;
}
</style>
</head>

<body background="123.JPG" style=background-size:35%;>
<a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
<center>
<h2 style=font-size:195%> Santorini Drinks<h2>
</div>
<?php
session_start();
$DB=mysqli_connect("localhost","root","","santorini_db") or die("error:".mysqli_error());
$name=$_GET['drinks_section'];
echo"<center>";

echo"<table width=35% border=5px class='block_center'>";

    echo"<tr><th><center>".$name."</th> ";
	
	
	
	//////////////////////////////////////////////////////////////////
 $getddetail=mysqli_query($DB,"select drinks_details.id,drinks_details.drink_name,drinks_details.drink_comp,drinks.drinks_section
								from  drinks_details inner join drinks on drinks_details.drink_section_id=drinks.id
								where drinks_section='$name'");
while($row=mysqli_fetch_assoc($getddetail))
{
    $iddetail=$row['id'];
    echo"<tr><td><center><b>".$row['drink_name']."<br>".$row['drink_comp']."</td>";
		
    }
	/////////////////////////////////////////////////////////////////////////////////////
	echo"</tr>";
	
 echo"</table>"; 
	
echo"<table style=margin-top:9%;width:10%; border=3px class='block_center'>";


	$getdextra=mysqli_query($DB," select drinks_extra.extra_name,drinks.drinks_section 
								from drinks_extra inner join drinks on drinks_extra.drink_section_id=drinks.id
								where drinks_section='$name'");
								
						   		if(mysqli_num_rows($getdextra)>0)
								{echo"<th><center>Extra<th>";	}
	while($row=mysqli_fetch_assoc($getdextra))
{
  
    echo "<tr><td><center><b>". $row['extra_name']."</td>";
		
    }
	/////////////////////////////////////////////////////////////////////////

							
 echo"</table>"; 
 /**************************************************************************************/
 
?>












</body>
</html>