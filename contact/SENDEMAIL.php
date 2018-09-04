<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
	<?php
            $to = "email@example.com"; // this is my Email address
            $from = $_POST['email']; // this is the sender's Email address
            $first_name = $_POST['name'];
            
            $subject = "Contact submission";
            $subject2 = "Copy of your contact submission";
            $message = $first_name  . " wrote the following:" . "\n\n" . $_POST['msg'];
            $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['msg'];

            $headers = "From:" . $from;
            $headers2 = "From:" . $to;
            
            mail($to,$subject,$message,$headers);
            
            mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
            echo "  <script>
                        alert('Mail Sent. Thank you " . $first_name . ", we will contact you shortly.');
                        window.location.href='contact.html';
                    </script>";
	?>	
	
	
</body>
</html>