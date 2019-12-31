<?php
$error_fields=array();
$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$selec="SELECT * FROM drinks_extra WHERE drinks_extra.id='$id' LIMIT 1 ";
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
		$price= mysqli_escape_string($conn,$_POST['price']);
		$section=mysqli_escape_string($conn,$_POST['section']);
		$queryupdate="UPDATE drinks_extra SET extra_name='$name',price='$price',drink_section_id='$section' WHERE drinks_extra.id='$id' ";
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
$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
 $result1=mysqli_query($conn,"SELECT * FROM drinks"); ?>
 <center>
<form method="post" action="">
			<input type="hidden" name="id" id="id" value="<?=(isset($row['id'])) ? $row['id']:'' ?>"/>
			<br><label for="name"><b>Name &nbsp &nbsp </label>
			<input style='direction:RTL;' type="text" name="name" id="name" value="<?=(isset($row['extra_name'])) ? $row['extra_name']:'' ?>"/> 
			<?if(in_array("name",$error_fields)) echo " * please enter name of extra drink";?><br/>
			<br><label for="price">price &nbsp &nbsp </label>
			<input  type="number" min="0" name="price" id="price" value="<?=(isset($row['price'])) ? $row['price']:'' ?>"/>
			<?if(in_array("price",$error_fields)) echo " * please enter price of extra drink";?><br/>
			<br><label for="section">section</label>
			<select name='section'>";
			<?php while ($row = mysqli_fetch_array($result1)) 
			{
				echo"<option value=".$row['id'].">".$row['drinks_section']."</option>";
			}echo"</select>"; ?>
			<br><br><input type="submit" class="button" name="submit" value="edit "/>
			
		</form>

</body>
</html>
