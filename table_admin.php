<html>
<head>
 <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="style.css" rel="stylesheet">
  <title>Drinks Edditing</title>
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
<body>
<a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
				<center>
<h2 style=font-size:185%> Santorini Edditing<h2>
</div>

<?php
////////////* drinks */////////////
if(isset($_GET['drinks']))
{
		$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	//// table of drinks
	/*
	SELECT * FROM drinks_details ,drinks where drinks_details.drink_section_id=(select drinks.id WHERE drinks.id=1) */
	
$error_arr=array();
if(in_array("undelete",$error_arr)) echo "error , Your Information Has Been not delete";
if(in_array("uninsert",$error_arr)) echo "error , Your Information Has Been not Saved";
if(isset($_GET['error_fields']))
{
	$error_arr= explode(",",$_GET['error_fields']);
}
echo"<center><br>";
$result=mysqli_query($conn,"SELECT * FROM drinks");
if(in_array("table_detail_t",$error_arr)) echo "Thank You! , Your Information Has Been Saved";
if(in_array("table_detail_f",$error_arr)) echo "Thank You! , Your Information Has not Been Saved";
echo"<center><h2 >Drinks<br>----------------</h2></center><form method='post' action='insert.php'>
			<table style='width:100%;color:darkred;'><tr>
			<td><label for='name'>Name of drink</label></td>
			<td><label for='comp'>component of drink</label></td>
			<td><label for='price'>price of drink</label></td>
			<td><label for='section'>section of drink</label></td></tr>";
			echo"<tr><td><input style='width:100%;direction:RTL;' type='text' name='name' id='name'/></td>";
			echo"<td><input style='width:100%;direction:RTL;' type='text' name='comp' id='comp'/></td>";
			echo"<td><input style='width:100%;' type='number' min='0' name='price' id='price'/></td>";
			echo"<td>
			<select  style='width:100%' name='section'>";
			while ($row = mysqli_fetch_array($result)) 
			{
				echo"<option value=".$row['id'].">".$row['drinks_section']."</option>";
			}
			echo"</select></td><td><input type='submit' name='insert_d_t' value='insert'/></td></tr><tr>";
			echo"<td>";if(in_array("name",$error_arr)) echo " * please enter name of drink";
			echo"</td><td></td><td>";if(in_array("price",$error_arr)) echo " * please enter price of drink";
			echo"</td><td>";if(in_array("section",$error_arr)) echo " * please select section of drink";	
			echo"</td></tr></table></form>";
			/*<?php if(in_array("name",$error_arr)) echo " * please enter name of drink"; ?>*/
	
	
$result1=mysqli_query($conn,"SELECT * FROM drinks");	
$result_d=mysqli_query($conn,"SELECT drinks_details.id, drinks_details.drink_name,drinks_details.drink_comp, drinks_details.price,drinks.drinks_section FROM drinks_details ,drinks where drinks_details.drink_section_id=drinks.id  ORDER BY drinks.id");
$result_dex=mysqli_query($conn,"SELECT drinks_extra.id,drinks_extra.extra_name,drinks_extra.price,drinks.drinks_section FROM drinks_extra,drinks where drinks_extra.drink_section_id=drinks.id ORDER BY drinks.id");

echo"<div><table id='big_tb_f' style='width:100%;color:darkred;'>
<tr style='border: 1px solid;'>
<th>number</th>
<th><center>name</th>
<th><center>component</th>
<th><center>price</th>
<th><center>section</th>
<th><center>Action</th>";
$nd=0;
while ($row = mysqli_fetch_array($result_d)) 
{
    $id=$row['id'];
	 echo "<tr><td style=' width:5%; border: 1px solid';><center>".$nd."</center></td><td id='td_links_f_of' width='20' style='font-size:80%; border: 1px solid';><center>".$row['drink_name']."</center></td><td width='35' style='font-size:80%;border: 1px solid';><center>";
	 echo $row['drink_comp']."</center></td><td width='5%' style='border: 1px solid';><center>";
	 echo $row['price']."</center></td><td width='20%' style='font-size:80%;border: 1px solid';><center>";
	 echo $row['drinks_section']."</center></td>";
	 echo"<td width='15%'><center><a href='edit_tbd.php?id=$id'>Edit</a> | <a href='delete.php?id=$id&table=drink_d'>Delete</a></center></td></tr>";
	 $nd++;
	 }
echo"</table></div>";

//// table of foods
if(in_array("tabledex_t",$error_arr)) echo "Thank You! , Your Information Has Been Saved";
if(in_array("tabledex_f",$error_arr)) echo "Thank You! , Your Information Has not Been Saved";
echo"<center><h2>Extra Drinks<br>-----------------</h2></center>";
/////////////////////////////

echo"<form method='post' action='insert.php'>
			<table style='width:100%;display:inline ;color:darkred;'><tr>
			<td><label for='name'>Name of extra drink</label></td>
			<td><label for='price'>price of extra drink</label></td>
			<td><label for='section'>section of extra drink</label></td></tr>";
			echo"<tr><td><input style='width:100%;direction:RTL;' type='text' name='namedex' id='namedex'/></td>";
			echo"<td><input style='width:100%;' type='number' min='0' name='pricedex' id='pricedex'/></td>";
			echo"<td>
			<select style='width:100%; name='sectiondex'>";
			while ($row = mysqli_fetch_array($result1)) 
			{
				echo"<option value=".$row['id'].">".$row['drinks_section']."</option>";
			}
			echo"</select></td><td><input type='submit' name='insertdex' value='insert'/></td></tr><tr>";
			echo"<td style='font-size:80%';>";if(in_array("namedex",$error_arr)) echo " * please enter name of extra drink";
			echo"</td style='font-size:80%';><td>";if(in_array("pricedex",$error_arr)) echo " * please enter price of extra drink";
			echo"</td><td style='font-size:80%';>";if(in_array("sectiondex",$error_arr)) echo " * please select section of extra drink";	
			echo"</td></tr></table></form>";


////////////////////////////////
echo"<table id='big_tb_f'style='width:100% ;color:darkred; '>
<tr style='border: 1px solid';>
<th>number</th>
<th><center>name</th>
<th><center>price</th>
<th><center>section</th><tr>";
$ndx=0;
while ($row = mysqli_fetch_array($result_dex)) 
{
    $id=$row['id'];
	 echo "<tr><td style=' width:5%; border: 1px solid';><center>".$ndx."</center></td><td id='td_links_f_of' width='' style='font-size:80%; border: 1px solid';><center>".$row['extra_name']."</center></td><td width='' style='font-size:80%;border: 1px solid';><center>";
//echo $row['food_comp_eng']."</center></td><td width='5%' style='border: 1px solid';><center>";
	 echo $row['price']."</center></td><td width='' style='font-size:80%;border: 1px solid';><center>";
	 echo $row['drinks_section']."</center></td>";
	 echo"<td width='15%'><center><a href='edit_tbdx.php?id=$id'>Edit</a> | <a href='delete.php?id=$id&table=drink_ex'>Delete</a></center></td></tr>";
	 $ndx++;
 }
echo"</tr></table></center>";

mysqli_free_result($result_dex);
mysqli_free_result($result_d);
mysqli_close($conn);

}

////////////* foods */////////////

else if(isset($_GET['foods']))
{
	$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$error_arr=array();
	if(in_array("undelete",$error_arr)) echo "error , Your Information Has Been not delete";
	if(in_array("uninsert",$error_arr)) echo "error , Your Information Has Been not Saved";
	if(isset($_GET['error_fields']))
	{
		$error_arr= explode(",",$_GET['error_fields']);
	}
	echo"<center><br>";
	$result=mysqli_query($conn,"SELECT * FROM foods");
	$result1=mysqli_query($conn,"SELECT * FROM foods");
	$result_f=mysqli_query($conn,"SELECT foods_details.id,foods_details.food_name,foods_details.food_comp_eng,foods_details.food_comp_ar,foods_details.price,foods.foods_section FROM foods_details ,foods
	where foods_details.food_section_id=foods.id order BY foods.id ");
	$result_fex=mysqli_query($conn,"SELECT foods_extra.id,foods_extra.extra_name,foods_extra.extra_name_ar,foods_extra.price,foods.foods_section 
	FROM foods_extra ,foods where foods_extra.food_section_id=foods.id order BY foods.id");
if(in_array("table_detail_t",$error_arr)) echo "Thank You! , Your Information Has Been Saved";
if(in_array("table_detail_f",$error_arr)) echo "Thank You! , Your Information Has not Been Saved";
echo"<center><h2>Foods<br>-----------</h2></center><form method='post' action='insert.php'>
			<table style='width:100%;display:inline ;color:darkred;'><tr>
			<td><label for='namef'>Name of food</label></td>
			<td><label for='compfEN'>comp of food EN</label></td>
			<td><label for='compfAR'>comp of food AR</label></td>
			<td><label for='pricef'>price of food</label></td>
			<td><label for='sectionf'>section of food</label></td></tr>";
			echo"<tr><td><input style='width:100%;direction:RTL;' type='text' name='namef' id='namef'/></td>";
			echo"<td><input style='width:100%;direction:LTR;' type='text' name='compEN' id='compfEN'/></td>";
			echo"<td><input style='width:100%;direction:RTL;' type='text' name='compER' id='compfAR'/></td>";
			echo"<td><input style='width:100%;' type='number' min='0' name='pricef' id='pricef'/></td>";
			echo"<td>
			<select style='width:100%; name='sectionf'>";
			while ($row = mysqli_fetch_array($result)) 
			{
				echo"<option value=".$row['id'].">".$row['foods_section']."</option>";
			}
			echo"</select></td><td><input type='submit' name='insert_f_t' value='insert'/></td></tr><tr>";
			echo"<td>";if(in_array("namef",$error_arr)) echo " * please enter name of food";
			echo"</td><td></td><td></td><td>";if(in_array("pricef",$error_arr)) echo " * please enter price of food";
			echo"</td><td>";if(in_array("sectionf",$error_arr)) echo " * please select section of food";	
			echo"</td></tr></table></form>";

////////////////////////////////////////////////////////////////////////////////////////
echo"<table id='big_tb_f' style='width:100%;color:darkred;' >
<tr style='border: 1px solid';>
<th>number</th>
<th><center>Name</th>
<th><center>Component EN</th>
<th><center>Component AR</th>
<th><center>Price</th>
<th><center>Section</th>
<th><center>Action</th></tr>";
$nf=0;
while ($row = mysqli_fetch_array($result_f)) 
{
    $id=$row['id'];
	 echo "<tr><td style=' width:5%; border: 1px solid';><center>".$nf."</center></td><td id='td_links_f_of' style='font-size:80%; border: 1px solid';><center>".$row['food_name']."</center></td><td style='font-size:80%;border: 1px solid; width:30%';><center>";
	 echo $row['food_comp_eng']."</center></td><td style='border: 1px solid; font-size:80%';><center>";
	 echo $row['food_comp_ar']."</center></td><td style='font-size:80%;border: 1px solid';><center>";
	 echo $row['price']."</center></td><td style='font-size:80%;border: 1px solid; width:15%';><center>";
	 echo $row['foods_section']."</center></td>";
	 echo"<td width='15%'><center><a href='edit_tbf.php?id=$id'>Edit</a> | <a href='delete.php?id=$id&table=foods_d'>Delete</a></center></td></tr>";
	 $nf++;
}
echo"</tr></table>";

//// table of foods
if(in_array("tablefex_t",$error_arr)) echo "Thank You! , Your Information Has Been Saved";
if(in_array("tablefex_f",$error_arr)) echo "Thank You! , Your Information Has not Been Saved";

echo"<center><h2>Extra Foods<br>----------------</h2></center>";
		echo"<form method='post' action='insert.php'>
			<table style='width:100%;display:inline;color:darkred;'><tr>
			<td><label for='namefex'>Name of extra food</label></td>
			<td><label for='namefex_EN'>Name Ar</label></td>
			<td><label for='pricefex'>price of extra food</label></td>
			<td><label for='sectionfex'>section of extra food</label></td></tr>";
			echo"<tr><td><input style='width:100%;' type='text' name='namefex' id='namefex'/></td>";
			echo"<td><input style='width:100%;direction:RTL;' type='text' name='namefex_EN' id='namefex_EN'/></td>";
			echo"<td><input style='width:100%;' type='number' min='0' name='pricefex' id='pricefex'/></td>";
			echo"<td>
			<select style='width:100%; name='sectionfex'>";
			while ($row = mysqli_fetch_array($result1)) 
			{
				echo"<option value=".$row['id'].">".$row['foods_section']."</option>";
			}
			echo"</select></td><td><input type='submit' name='insertfex' value='insert'/></td></tr><tr>";
			echo"<td style='font-size:80%';>";if(in_array("namefex",$error_arr)) echo " * please enter name of extra food";
			echo"</td ><td></td><td style='font-size:80%';>";if(in_array("pricefex",$error_arr)) echo " * please enter price of extra food";
			echo"</td><td style='font-size:80%';>";if(in_array("sectionfex",$error_arr)) echo " * please select section of extra food";	
			echo"</td></tr></table></form>";


echo"<table id='big_tb_f' style='width:100%;color:darkred; '>
<tr style='border: 1px solid';>
<th>number</th>
<th><center>name</th>
<th ><center>name AR</th>
<th><center>price</th>
<th><center>section</th>
<th><center>Action</th></tr>";
$nfx=0;
while ($row = mysqli_fetch_array($result_fex)) 
{
    $id=$row['id'];
	 echo "<tr><td style=' width:5%; border: 1px solid';><center>".$nfx."</center></td><td id='td_links_f_of' style='font-size:80%; border: 1px solid';><center>".$row['extra_name']."</center></td><td style='font-size:80%;border: 1px solid';><center>";
	 echo $row['extra_name_ar']."</center></td><td style='font-size:80%;border: 1px solid';><center>";
	 echo $row['price']."</center></td><td style='font-size:80%;border: 1px solid';><center>";
	 echo $row['foods_section']."</center></td>";
	 echo"<td width='15%'><center><a href='edit_tbfx.php?id=$id'>Edit</a> | <a href='delete.php?id=$id&table=foods_ex'>Delete</a></center></td></tr>";
	 $nfx++;
}
echo"</tr></table></center>";

}
else
{
header("location:list.php");
exit;	
}
?>


</body>
</html>