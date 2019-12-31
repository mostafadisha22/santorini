<!doctype html>
<html>
<head>
    <?php

	$conn = mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b11561761067aa","47d601df","heroku_2cbb760f9cece40");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
    if(isset($_POST['but_upload'])){
        $name = mysqli_escape_string($conn,$_FILES['file']['name']);
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image_data = 'data:image/'.$imageFileType.';base64,'.$image_base64;
			$image=mysqli_escape_string($conn,$image_data);
			$image_text=mysqli_escape_string($conn,$_POST['image_text']);

            // Insert record
            $query = "insert into offer(name,offer_image,offer_text) values('".$name."','".$image."','".$image_text."')";
          // $query = "UPDATE drinks SET drinks.drinks_image='".$image."' WHERE drinks.id='7'";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            // Upload file
            //move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);
			
			header("location:list.php");

        }
		else
		{
			$image_text=mysqli_escape_string($conn,$_POST['image_text']);
            $query = "insert into offer(offer_text) values('".$image_text."')";
            mysqli_query($conn,$query) or die(mysqli_error($conn));
			header("location:list.php");
		}
    
    }
	
    ?>
<!--<body>
	
    
<a href="show_offer.php">show offer</a>
</body>
</html>-->
