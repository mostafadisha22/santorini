<?php
////////////* drinks detail *////////
if(isset($_POST['insert_d_t']))
{
$error_fields=array();
	if(!(isset($_POST['name']) && !empty($_POST['name'])))
	{
		$error_fields[]="name";
	}
	if(!(isset($_POST['price']) && !empty($_POST['price'])))
	{
		$error_fields[]="price";
	}
	if(!(isset($_POST['section']) && !empty($_POST['section'])))
	{
		$error_fields[]="section";
	}
	if($error_fields)
	{
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
	}
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$name= mysqli_escape_string($conn,$_POST['name']);
	$comp= mysqli_escape_string($conn,$_POST['comp']);
	$price= mysqli_escape_string($conn,$_POST['price']);
	$section=mysqli_escape_string($conn,$_POST['section']);
	$query="INSERT INTO drinks_details (drinks_details.drink_name,drinks_details.drink_comp,drinks_details.price,drinks_details.drink_section_id)
	VALUES('$name','$comp','$price','$section')";
	if(mysqli_query($conn,$query))
	{
		$error_fields[]="table_detail_t";
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
		//echo "Thank You! , Your Information Has Been Saved";
	}
	else
	{
		$error_fields[]="table_detail_f";
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
	}
////////////* drinks extra *///////////	
else if(isset($_POST['insertdex']))
{
$error_fields=array();
	if(!(isset($_POST['namedex']) && !empty($_POST['namedex'])))
	{
		$error_fields[]="namedex";
	}
	if(!(isset($_POST['pricedex']) && !empty($_POST['pricedex'])))
	{
		$error_fields[]="pricedex";
	}
	if(!(isset($_POST['sectiondex']) && !empty($_POST['sectiondex'])))
	{
		$error_fields[]="sectiondex";
	}
	if($error_fields)
	{
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
	}	
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$namedex= mysqli_escape_string($conn,$_POST['namedex']);
	$pricedex= mysqli_escape_string($conn,$_POST['pricedex']);
	$sectiondex=mysqli_escape_string($conn,$_POST['sectiondex']);
	$query="INSERT INTO drinks_extra (drinks_extra.extra_name,drinks_extra.price,drinks_extra.drink_section_id)
VALUES('$namedex','$pricedex','$sectiondex')";
	if(mysqli_query($conn,$query))
	{
		$error_fields[]="tabledex_t";
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
		//echo "Thank You! , Your Information Has Been Saved";
	}
	else
	{
		$error_fields[]="tabledex_f";
		header("location:table_admin.php?drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
	
	}
/////////////* foods details */////////
else if(isset($_POST['insert_f_t']))
{
	
	$error_fields=array();
	if(!(isset($_POST['namef']) && !empty($_POST['namef'])))
	{
		$error_fields[]="namef";
	}
	if(!(isset($_POST['pricef']) && !empty($_POST['pricef'])))
	{
		$error_fields[]="pricef";
	}
	if(!(isset($_POST['sectionf']) && !empty($_POST['sectionf'])))
	{
		$error_fields[]="sectionf";
	}
	if($error_fields)
	{
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
	}	
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$namef= mysqli_escape_string($conn,$_POST['namef']);
	$compEN= mysqli_escape_string($conn,$_POST['compEN']);
	$compAR= mysqli_escape_string($conn,$_POST['compAR']);
	$pricef= mysqli_escape_string($conn,$_POST['pricef']);
	$sectionf=mysqli_escape_string($conn,$_POST['sectionf']);
	$query="INSERT INTO foods_details (foods_details.food_name,foods_details.food_comp_eng,foods_details.food_comp_ar,foods_details.price,foods_details.food_section_id)
	VALUES('$namef','$compEN','$compAR','$pricef','$sectionf')";
	if(mysqli_query($conn,$query))
	{
		$error_fields[]="table_detail_t";
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
		//echo "Thank You! , Your Information Has Been Saved";
	}
	else
	{
		$error_fields[]="table_detail_f";
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}

else if(isset($_POST['insertfex']))
{
$error_fields=array();
	if(!(isset($_POST['namefex']) && !empty($_POST['namefex'])))
	{
		$error_fields[]="namefex";
	}
	if(!(isset($_POST['pricefex']) && !empty($_POST['pricefex'])))
	{
		$error_fields[]="pricefex";
	}
	if(!(isset($_POST['sectionfex']) && !empty($_POST['sectionfex'])))
	{
		$error_fields[]="sectionfex";
	}
	if($error_fields)
	{
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
	}	
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	$namefex= mysqli_escape_string($conn,$_POST['namefex']);
	$namefex_EN= mysqli_escape_string($conn,$_POST['namefex_EN']);
	$pricefex= mysqli_escape_string($conn,$_POST['pricefex']);
	$sectionfex=mysqli_escape_string($conn,$_POST['sectionfex']);
	$query="INSERT INTO foods_extra (foods_extra.extra_name,foods_extra.extra_name_ar,foods_extra.price,foods_extra.food_section_id)
VALUES('$namefex','$namefex_EN','$pricefex','$sectionfex')";
	if(mysqli_query($conn,$query))
	{
		$error_fields[]="tablefex_t";
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
		//echo "Thank You! , Your Information Has Been Saved";
	}
	else
	{
		$error_fields[]="tablefex_f";
		header("location:table_admin.php?foods=foods&error_fields=".implode(",",$error_fields));
		exit;
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
	
}
else
{
	$error_fields[]="uninsert";
		header("location:table_admin.php?foods=foods&drinks=drinks&error_fields=".implode(",",$error_fields));
		exit;
		echo mysqli_error($conn);
}

	
?>