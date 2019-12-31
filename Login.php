<!DOCTYPE html>

<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
		$conn=mysqli_connect("localhost","root","","santorini_db");
		if(! $conn)
		{
			echo mysqli_connect_error();
			exit;
		}
		$email= mysqli_escape_string($conn,$_POST['email']);
		$password=mysqli_escape_string($conn,$_POST['password']);
		
		$query =" SELECT * FROM admin WHERE admin.email = '$email' and admin.password = '$password' "; 
		$result= mysqli_query($conn,$query);
		
		if($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['id']=$row['id'];
			$_SESSION['name']=$row['name'];
			header("location:list.php");
			exit;
		}
		else
		{
			$error='invalid email or password';
		}
		mysqli_free_result($result);
		mysqli_close($conn);
	}
}
?>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style_log.css" rel="stylesheet">

</head>
<body background="bm.JPG">
<center>
<h2>welcome santorini manager</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log in</button>

<div id="id01">
  		<?php if(isset($error)) echo $error; ?>
  <form id="id01" class="modal-content animate" action="" method="post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="bm.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      	<label for="email">Email</label>
		<input type="email" placeholder="Enter your email" name="email" id="email" required value="<?= (isset($_POST['email'])) ? $_POST['email']: '' ?>" required /> 
	<input type="password"  placeholder="Enter Password" name="password" id="password" required />   
      <button type="submit"  name="submit" >Log in</button>
       </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
