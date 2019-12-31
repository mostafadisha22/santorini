<html>
<head>
 <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="style.css" rel="stylesheet">
  <title>Edditing</title>
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
	.button {
  background-color: red; 
  border-radius:50%;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.button:hover {
  background-color:blue; 
  color: white;
}
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
.savebutton:hover {
  background-color:darkred;
  color: white;
}
.browsebtn {
  background-color: #4CAF50; 
  border-radius:20px;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
}

	</style>
</head>
<body background='bm.jpg'>
<a class="navbar-brand" href="index.php">
                    <img style= border-radius:22px;width:50px; class="logo-custom" src="assets/img/1.JPG" alt=Santorini" />
                </a><div style=background-color:black;color:white>
				<center>
<h2 style=font-size:185%> Santorini Edditing<h2>
</div>

<?php
session_start();
if(isset($_SESSION['id']))
{
	echo"<center>";
	echo"<form action='table_admin.php' method='get'>
	<button type='submit'  name='drinks' class='button'>Edit Drinks </button>  
	<button type='submit'  name='foods' class='button'>Edit Foods </button>
	</form>";
	////////////////* form of set offer *///////////////
	echo"<form method='post' action='set_offer.php' enctype='multipart/form-data'>
        <input type='file' class='browsebtn' name='file' />
		<div>
      <textarea width='100%'
      	id='text'
      	cols='40' 
      	rows='4' 
      	name='image_text' 
      	placeholder='اكتب ما يحتويه العرض ...'
		autofocus style='direction:RTL;'></textarea>
  	</div>
        <input type='submit' value='Save offer' class='savebutton' name='but_upload'>
        
    </form>";
	
	
	//////////////* table offer *///////////
	$conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
	$offer=mysqli_query($conn,"SELECT * FROM offer ");
	if(mysqli_num_rows($offer)>0)
	{
		echo "<table  style='width:50%;border: 5px solid';><tr><th><center>name</center></th><th><center>offer_text</center></th><th>offer_image</th></tr>";
		
		while ($row = mysqli_fetch_array($offer)) 
		{
			$id=$row['id'];
			echo "<tr style='border: 5px solid';><td style='border: 5px solid'; width='10%'><center><b>".$row['name']."</center></td>
			<td style='border: 5px solid'; width='40%'><center>";
			echo "<b>".$row['offer_text']."</center></td><td style='border: 5px solid';width='40%'><center>";
			echo "<img src='".$row['offer_image']."' width='80%'></center></td>";
			echo"<td style='border: 5px solid';width='10%'><center><a href='delete.php?id=$id&table=offer'><mark style=color:red><b>delete</a></center></td></tr>";
		}
		
		echo"</table>";
	}
	echo"</center>";
	
	echo"<form action='edit_pass.php' method='post'>
	<button type='submit'  name='drinks' class='button'>Change Password </button>  
	</form>";
	
	
	echo '<p> welcom '.$_SESSION['name'].' <a href="logout.php" ><mark style=color:red><b> LOG OUT </a></p>';	


   $conn=mysqli_connect("localhost","root","","santorini_db");
	if(! $conn)
	{
		echo mysqli_connect_error();
		exit;
	}
	
	
}
else
{
	header("location:login.php");
	exit;
}

?>


</body>
</html>