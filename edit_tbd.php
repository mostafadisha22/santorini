<?php
$error_fields=array();
$conn=mysqli_connect("fnx6frzmhxw45qcb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","p7pea6nyuhd447xc","o6m61pv5iohheh17","gudvobaxonodgmab");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$selec="SELECT * FROM drinks_details WHERE drinks_details.id='$id' LIMIT 1 ";
$result=mysqli_query($conn,$selec);
$row=mysqli_fetch_assoc($result);
if($_SERVER['REQUEST_METHOD']=='POST')
{
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
	if(!$error_fields)
	{
		$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
		$name= mysqli_escape_string($conn,$_POST['name']);
		$comp= mysqli_escape_string($conn,$_POST['comp']);
		$price= mysqli_escape_string($conn,$_POST['price']);
		$section=mysqli_escape_string($conn,$_POST['section']);
		$queryupdate="UPDATE drinks_details SET drink_name='$name',drink_comp='$comp',price='$price',drink_section_id='$section' WHERE drinks_details.id='$id' ";
		if(mysqli_query($conn,$queryupdate))
		{
			header("location:table_admin.php?drinks=drinks");
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
 $result1=mysqli_query($conn,"SELECT * FROM drinks"); ?>
 <center>
<form method="post" action="">
			<input type="hidden" name="id" id="id" value="<?=(isset($row['id'])) ? $row['id']:'' ?>"/>
			<br><label for="name"><b>Name &nbsp &nbsp &nbsp &nbsp </label>
			<input style='direction:RTL;'type="text" name="name" id="name" value="<?=(isset($row['drink_name'])) ? $row['drink_name']:'' ?>"/> 
			<?if(in_array("name",$error_fields)) echo " * please enter name of drink";?><br/>
			<br><label for="comp">component</label>
			<input style='direction:RTL;' type="text" name="comp" id="comp" value="<?=(isset($row['drink_comp'])) ? $row['drink_comp']:'' ?>"/> <br/>
			<br><label for="price">price &nbsp &nbsp &nbsp &nbsp </label>
			<input  type="number" min="0" name="price" id="price" value="<?=(isset($row['price'])) ? $row['price']:'' ?>"/>
			<?if(in_array("price",$error_fields)) echo " * please enter price of drink";?><br/>
			<br><label for="section">Section &nbsp &nbsp </label>
			<select name='section'>";
			<?php while ($row = mysqli_fetch_array($result1)) 
			{
				echo"<option value=".$row['id'].">".$row['drinks_section']."</option>";
			}echo"</select>"; ?>
			<br><br><input type="submit" class="button" name="submit" value="edit "/>
			
		</form>

</body>
</html>
