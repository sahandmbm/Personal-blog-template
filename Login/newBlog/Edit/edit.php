<!DOCTYPE html>
<html>
<head>
    <title>EDIT</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <meta name="description" content="DESCRIPTION">
    <link rel="icon" href="../../../sahand.jpg">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive|El+Messiri|Josefin+Sans:400,600|Montserrat:100|Playball|Playfair+Display|Quicksand|Poiret+One|Great+Vibes|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Nova+Mono" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
     
    
    <?php	
        session_start();
        if (!isset($_SESSION['userName'])) {
        header('Location: ../../login.html');
        exit();
        }
    
        //CONNECTING TO DATABASE
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
    

		$sql = "SELECT id, titleOf, titleDescr, dateOf, blogText, imagePath FROM theBlogs";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
            echo '<div class="row">';
            echo '<div class="column">';
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                    $theID = $row['id'];
                    $theID2 = $theID + 10000;
                    echo "<a id='$theID2' class='editbtn'><button type='button'  class='btn btn-info'>Edit</button></a>";
                    echo "<button type='button'  class='btn btn-warning delbtn' id='$theID'> Delete </button>";
                    echo '<h2>' . $row["titleOf"] . '</h2>';
                    echo '<h5>' . $row["titleDescr"] . "," . $row["dateOf"] . "</h5>";
                    $img ="./../../" . $row["imagePath"];
                    echo '<div class="fakeimg" style="height:200px;">' . "<img src='.$img'/>" . "</div>";
                    $firstP = substr($row["blogText"], 0, 900);
                    $secondP = substr($row["blogText"], 900);
                    echo "<p>" . $firstP . "</p>";
                    echo '<p class="hide">' . $secondP . "</p>";
                
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
		} else {
		      echo "0 results";
		}
		
		$conn->close();
    
	?>	
    <script> 
        //TO DELETE 
         $(document).ready(function(){
             $('.delbtn').click(function() {
                    var del_id = $(this).attr('id');
                    $(this).parent().fadeOut(2000);
                     $.ajax({
                          type: "POST",
                          url: "delete.php",
                          data: { delete_id: +del_id }
                    }).done(function( data ) {
                         alert( "BLOG NUMBER " + del_id + " HAS BEEN DELETED" );
                         
                    });    
                });
         });
        //TO EDIT 
         $(document).ready(function(){
             $('.editbtn').click(function() {
                    var blg_id = $(this).attr('id');
                    blg_id = blg_id - 10000;
                    $.ajax({
                          type: "POST",
                          url: "set.php",
                          data: { edit_id: +blg_id }
                    }).done(function( data ) {
                        window.location.href = "editing/EditBlog.php";
                    });  
                        
                });
         });
        
    </script>
   
    
    
    
    
    
    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>