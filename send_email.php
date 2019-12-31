<?php
//check if user coming from a request
//if ($_SERVER['REQUEST_METHOD'] == 'POST')
//{
	//assign vars
if(isset($_POST['send']) && !empty($_POST['send']))
{
	if(filter_input(INPUT_POST,'vemail',FILTER_VALIDATE_EMAIL))
	{$email= $_POST['vemail'];}
	$first_name=$_POST['vnamef'];
	$last_name=$_POST['vnamel'];
	$phone=$_POST['phone'];
	$nump= $_POST['nump'];
	$numt=$_POST['numt'];
	$msg= $_POST['msg'];
	$day= $_POST['bday'];
	$time= $_POST['usr_time'];	

	$email_message="";
	$email_message .= "First Name: ".$first_name. "<br>";
	$email_message .= "Last Name: ".$last_name. "<br>";
	$email_message .= "Email: ".$email. "<br>";
	$email_message .= "Telephone: ".$phone. "<br>";
	$email_message .= "number of people: ".$nump. "<br>";
	$email_message .= "number of table: ".$numt. "<br>";
	$email_message .= "day: ".$day. "<br>";
	$email_message .= "time: ".$time. "<br>";
	$email_message .= "Comments: ".$msg. "<br>";
//echo $email_message ;
	
	$strmail="sasamostafa500@gmail.com";
	$strSub="Reservation Form";

		mail($strmail, $strSub,$email ,$email_message);
		 header("location:index.php"); 
	
	

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Reservation </title>
<link href="css/elements.css" rel="stylesheet">
<style>

h3 {
text-align:center;
font-family:'Raleway',sans-serif;
color:#006400
}
label
{
text-align:center;
font-family:'Raleway',sans-serif;
color:#006400;
font-size:80%
}
p{
text-align:center;
font-family:'Raleway',sans-serif;
color:#006400;
font-size:80%
}
h2 {
font-family:'Raleway',sans-serif
}
input {
width:100%;
margin-bottom:5%;
padding:2%;
height:10%;
box-shadow:1px 1px 12px gray;
border-radius:4%;
border:none
}
textarea {
width:100%;
margin-top:5%;
padding:2%;
box-shadow:1px 1px 12px gray;
border-radius:2%
}
#send {
width:100%;
margin-top:10%;
border-radius:2%;
background-color:#cd853f;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:100%
}
div#feedback {
text-align:center;
height:80%;
width:35%;
padding:3% 5% 1% 5%;
background-color:#f3f3f3;
border-radius:3%;
border:1px solid #cd853f;
font-family:'Raleway',sans-serif;
float:center
}
.container {
width:100%;
margin:5% auto
}
</style>
</head>
<!-- Body Starts Here -->
<body><center>
<div class="container">
<!-- Feedback Form Starts Here -->

<div id="feedback">
<!-- Heading Of The Form -->
<div class="head">
<h3>Reservation Form</h3>
<p>This is Reservation form. Send us your information !</p>
</div>
<!-- Feedback Form -->
<form action="" id="form" method="post" name="form">
<input type="text" name="vnamef" placeholder="Your First Name" pattern="[a-zA-Z]+" required="required" oninvalid="setCustomValidity('Please enter on alphabets only. ')" value="">
<input type="text" name="vnamel" placeholder="Your Last Name" pattern="[a-zA-Z]+" required="required" oninvalid="setCustomValidity('Please enter on alphabets only. ')" value="">
<input type="email" name="vemail" placeholder="Your Email" required="required" >
<input type="tel" name="phone" placeholder="Your phone" pattern="[0-9]{11}" required="required">
<input type="number" name="nump" min="1" placeholder="number of people" required="required">
<input type="number" name="numt" min="1" max="33" placeholder="number of the table" required="required">
<input type="date" name="bday" title="reserve date" required="required" min="<?=date("Y-m-d");?>">
<input type="time" name="usr_time" title="reserve time" required="required">
<label>Your Suggestion or comment</label>
<textarea name="msg" style='direction:RTL;' placeholder="Type your text here..."></textarea>
<input id="send" name="send" type="submit" value="Reserve">
</form>
<h3></h3>
</div>
<!-- Feedback Form Ends Here -->
</div></center>
</body>
<!-- Body Ends Here -->
</html>