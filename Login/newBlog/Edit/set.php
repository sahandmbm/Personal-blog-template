<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
	<?php
        session_start();
        if (!isset($_SESSION['userName'])) {
        header('Location: ../../login.html');
        exit();
        }

        
		
    
	    $_SESSION['editSession'] = $_POST['edit_id'];
		
	?>	
	
    
	
</body>
</html>