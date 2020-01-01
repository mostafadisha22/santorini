<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

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
	
	
	
	
	
	
	
	<style>
<!--.side_right {
	float: left;
	margin-right: 0px;
	margin-bottom: 1em;
	display:inline;
	
}-->

.block_center {
	
	float:left;
	 margin-right: -24%; 
	 margin-left: 26%; 
	  background-color: white;
	  font-size:15px;
	  color:darkred;
	  
}
</style>
</head>

<body background="123.JPG" style=background-size:35%;>
<a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
<center>
<h2 style=font-size:195%> Santorini Foods<h2>
</div>
<?php
session_start();
$DB=mysqli_connect("fnx6frzmhxw45qcb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","p7pea6nyuhd447xc","o6m61pv5iohheh17","gudvobaxonodgmab") or die("error:".mysqli_error());
$name=$_GET['foods_section'];
echo"<center>";

echo"<table width=40% border=5px class='block_center'>";

    echo"<tr><th><center>".$name."</th> ";
	
	
	
	//////////////////////////////////////////////////////////////////
 $getfdetail=mysqli_query($DB,"select foods_details.id,foods_details.food_name,foods_details.food_comp_eng,foods_details.food_comp_ar,
								foods.foods_section,foods.id as a
								from  foods_details inner join foods on foods_details.food_section_id=foods.id
								where foods_section='$name'");
	$n=0;							
while($row=mysqli_fetch_assoc($getfdetail))
{
    $iddetail=$row['id'];
    echo"<tr><td><center><b>".$row['food_name']."<br>".$row['food_comp_eng']."<br>".$row['food_comp_ar']."</td>";
	if($n==0){
		if($row['a']==7){echo"<center><mark style='background-color:darkred;color:yellow'>
All Curses Serve with Tow Chaise from Our Saied Dish
Rice, French Fried, Vegetable Suttee, baked oven fresh potato<br>
جميع الاطباق تقدم مع اثنين من الاصناف الاضافية حسب اختيارك
ارز،بطاطس محمرة،خضار سوتيه، بطاطس مشوية
";
}
	
	else if($row['a']==9){echo"<center><mark style='background-color:darkred;color:yellow'>
Select your favorite pan with herb fries<br>
اختياراتك المفضلة تقدم مع البطاطس المتبلة وصوص الزبادى 
	";}
	
	}
	$n++;
	}
    
	/////////////////////////////////////////////////////////////////////////////////////
	echo"</tr>";
	
 echo"</table>"; 
	
echo"<table style=margin-top:9%;width:20%; border=3px class='block_center'>";


	$getfextra=mysqli_query($DB," select foods_extra.extra_name,foods.foods_section 
								from foods_extra inner join foods on foods_extra.food_section_id=foods.id
								where foods_section='$name'");
								
						   		
								if(mysqli_num_rows($getfextra)>0)
								{echo"<th><center>Extra<th>";	
	while($row=mysqli_fetch_assoc($getfextra))
{
  
    echo "<tr><td><center><b>". $row['extra_name']."</td>";
		
    }}
	/////////////////////////////////////////////////////////////////////////

							
 echo"</table>"; 
 /**************************************************************************************/
 
?>












</body>
</html>
