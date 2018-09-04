<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
	<?php
        session_start();
        if (!isset($_SESSION['userName'])) {
        header('Location: ../../login.html');
        exit();
        }
    
    
    
        //CONNECTING
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
		}
		
    
	    //UPLOADING THE IMAGE INTO UPLOADS FILE
		$target_dir = "../../../uploads/";
		$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    
		
		if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"],
		$target_file)) {
              echo "The file". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
		} else {
		      echo "Sorry, there was an error uploading your file.";
		}
		


        //SETTING VALUES
        $titleB = $_POST["title"];
		$titleDescB = $_POST["titleDescription"];
        $dateB = new DateTime($_POST["dateOf"]);
		$blogB = $_POST["theBlog"];
        $image=basename($_FILES["imageUpload"]["name"],".jpg");
		$imageB = "uploads/" . $image . ".jpg";  
        
        $newDate = $dateB->format('Y-m-d');

		$sql = "INSERT INTO theBlogs(titleOf, titleDescr, dateOf, blogText, imagePath) VALUES ('$titleB', '$titleDescB', '$newDate', '$blogB', '$imageB')";
		if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
        header('Location: ../home.php');
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
        
		$conn->close();
	?>	
	
    
	
</body>
</html>