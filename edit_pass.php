<?php
$error_fields=array();
$conn=mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
$selec="SELECT * FROM admin LIMIT 1 ";
$result=mysqli_query($conn,$selec);
$row=mysqli_fetch_assoc($result);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!(isset($_POST['name']) && !empty($_POST['name'])))
	{
		$error_fields[]="name";
	}
	if(!(isset($_POST['password']) && !empty($_POST['password'])))
	{
		$error_fields[]="password";
	}
	if(!(isset($_POST['email']) && !empty($_POST['email'])))
	{
		$error_fields[]="email";
	}
	if(!$error_fields)
	{
		$id= mysqli_escape_string($conn,$_POST['id']);
		$name= mysqli_escape_string($conn,$_POST['name']);
		$password= mysqli_escape_string($conn,$_POST['password']);
		$email= mysqli_escape_string($conn,$_POST['email']);
		$sha1_pass=sha1($password);
		$queryupdate="UPDATE admin SET admin.name='$name',admin.email='$email',admin.password='$password',admin.sha1_password='$sha1_pass' WHERE admin.id='$id' ";
		if(mysqli_query($conn,$queryupdate))
		{
			header("location:list.php");
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
 <script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 </script>
 <style>
 .savebutton {
  background-color: #4CAF50; 
  border-radius:12px;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
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
 $result1=mysqli_query($conn,"SELECT * FROM admin"); ?>
 <center>
<form method="post" action="">
			<input type="hidden" name="id" id="id" value="<?=(isset($row['id'])) ? $row['id']:'' ?>"/>
			<br><label for="name"><b>Name &nbsp &nbsp &nbsp </label>
			<input type="text" name="name" id="name" required="required" value="<?=(isset($row['name'])) ? $row['name']:'' ?>"/> 
			<?if(in_array("name",$error_fields)) echo " * please enter your name";?><br/>
			<br><label for="password">password</label>
			<input type="password" name="password" id="password" required="required" value="<?=(isset($row['password'])) ? $row['password']:'' ?>"/> <br/>
			<?if(in_array("password",$error_fields)) echo " * please enter your password";?><br/>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			<input type="checkbox" onclick="myFunction()">Show Password
			<br><br><label for="email">Email &nbsp  &nbsp &nbsp </label>
			<input type="email" name="email" id="email" required="required" value="<?=(isset($row['email'])) ? $row['email']:'' ?>"/>
			<?if(in_array("email",$error_fields)) echo " * please enter your email";?><br/>
			<br><br><input type="submit" name="submit" class="savebutton" value="Change"/>
			
		</form>

</body>
</html>
