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
		
        
	    //DELETE FROM DATABASE
        $idOf = $_POST['delete_id'];
		$sql = "DELETE FROM theBlogs WHERE id = '$idOf'";        
        
        mysqli_query($conn,$sql);
    
    
    
            
	?>	
	
    
	
</body>
</html>