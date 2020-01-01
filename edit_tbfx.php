<?php
$error_fields=array();
$conn=mysqli_connect("fnx6frzmhxw45qcb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","p7pea6nyuhd447xc","o6m61pv5iohheh17","gudvobaxonodgmab");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$selec="SELECT * FROM foods_extra WHERE foods_extra.id='$id' LIMIT 1 ";
$result=mysqli_query($conn,$selec);
$row=mysqli_fetch_assoc($result);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!(isset($_POST['nameEN']) && !empty($_POST['nameEN'])))
	{
		$error_fields[]="nameEN";
	}
	if(!(isset($_POST['nameAR']) && !empty($_POST['nameAR'])))
	{
		$error_fields[]="nameAR";
	}
	if(!(isset($_POST['price']) && !empty($_POST['price'])))
	{
		$error_fields[]="price";
	}
	if(!(isset($_POST['section']) && !empty($_POST['section'])))
	{
		$error_fields[]="section";
	}
	if(!$error_fields)
	{
		$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
		$nameEN= mysqli_escape_string($conn,$_POST['nameEN']);
		$nameAR= mysqli_escape_string($conn,$_POST['nameAR']);
		$price= mysqli_escape_string($conn,$_POST['price']);
		$section=mysqli_escape_string($conn,$_POST['section']);
		$queryupdate="UPDATE foods_extra SET extra_name='$nameEN',extra_name_ar='$nameAR',price='$price',food_section_id='$section' WHERE foods_extra.id='$id' ";
		if(mysqli_query($conn,$queryupdate))
		{
			header("location:table_admin.php?foods=foods");
			exit;
		}
		else
		{
			echo mysqli_error($conn);
		}
	}
}

mysqli_close($conn);
?>

<html>
<head>
 <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="style.css" rel="stylesheet">
<style>
 .button {
  background-color:darkred; 
  border-radius:40%;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
}
 </style>
</head>
<body background="bm.jpg">
<?php
$conn=mysqli_connect("fnx6frzmhxw45qcb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","p7pea6nyuhd447xc","o6m61pv5iohheh17","gudvobaxonodgmab");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
 $result1=mysqli_query($conn,"SELECT * FROM foods"); ?>
 <center>
<form method="post" action="">
			<input type="hidden" name="id" id="id" value="<?=(isset($row['id'])) ? $row['id']:'' ?>"/>
			<br><label for="nameEN"><b>Name EN</label>
			<input  type="text" name="nameEN" id="nameEN" value="<?=(isset($row['extra_name'])) ? $row['extra_name']:'' ?>"/> 
			<?if(in_array("nameEN",$error_fields)) echo " * please enter name_EN of food";?><br/>
			<br><label for="nameAR">Name AR</label>
			<input style='direction:RTL;' type="text" name="nameAR" id="nameAR" value="<?=(isset($row['extra_name_ar'])) ? $row['extra_name_ar']:'' ?>"/> 
			<?if(in_array("nameAR",$error_fields)) echo " * please enter name_AR of extra food";?><br/>
			<br><label for="price">price &nbsp &nbsp </label>
			<input type="number" min="0" name="price" id="price" value="<?=(isset($row['price'])) ? $row['price']:'' ?>"/>
			<?if(in_array("price",$error_fields)) echo " * please enter price of extra food";?><br/>
			<br><label for="section">section &nbsp </label>
			<select name='section'>";
			<?php while ($row = mysqli_fetch_array($result1)) 
			{
				echo"<option value=".$row['id'].">".$row['foods_section']."</option>";
			}echo"</select>"; ?>
			<br><br><input type="submit" class="button" name="submit" value="edit "/>
			
		</form>

</body>
</html>
