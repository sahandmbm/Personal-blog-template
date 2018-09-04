<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
	<?php
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
    
        
		// sql to create table
		$sql = "CREATE TABLE theBlogs(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		                              titleOf VARCHAR(30) NOT NULL, 
                                      titleDescr VARCHAR(30) NOT NULL, 
                                      dateOf  DATE NOT NULL,
                                      blogText TEXT NOT NULL,
		                              imagePath VARCHAR(60) NOT NULL)";
    
		if ($conn->query($sql) === TRUE) {
		echo "Table MyGuests created successfully";
		} else {
		echo "Error creating table: " . $conn->error;
		}
		$conn->close();
	?>	
	
	
</body>
</html>