<!DOCTYPE html>
<html>
<head>
    <title>My Blog!</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <meta name="description" content="DESCRIPTION">
    <link rel="icon" href="../sahand.jpg">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive|El+Messiri|Josefin+Sans:400,600|Montserrat:100|Playball|Playfair+Display|Quicksand|Poiret+One|Great+Vibes|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Nova+Mono" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    

    
    <!-- NAV -->

    <div id="mySidenav" class="sidenav">
      <a id="close" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="navlink" href="../index.html">About</a>
      <a class="navlink" href="../portfolio/portfolio.html">Portfolio</a>
      <a class="navlink" id="active">Blog</a>
      <a class="navlink" href="../contact/contact.html">Contact</a>
    </div>

    <div id="main">
      <span id="openLogo" style="font-size:30px;cursor:pointer;z-index:10000" onclick="openNav()">&#9776;</span>
    </div>
    
    <!-- BLOGS -->
    <div class="header">
      <h2>Blog Name</h2>
    </div>

    
     <?php	
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
    

		$sql = "SELECT titleOf, titleDescr, dateOf, blogText, imagePath FROM theBlogs";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
            echo '<div class="row">';
            echo '<div class="column">';
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                
                    
                    echo '<h2>' . $row["titleOf"] . '</h2>';
                    echo '<h5>' . $row["titleDescr"] . "," . $row["dateOf"] . "</h5>";
                    $img ="./../../" . $row["imagePath"];
                    echo '<div class="fakeimg" style="height:200px;">' . "<img src='.$img'/>" . "</div>";
                    $firstP = substr($row["blogText"], 0, 900);
                    $secondP = substr($row["blogText"], 900);
                    echo "<p>" . $firstP . "</p>";
                    echo '<button class="shbtn">' . "Show more" . "</button>";
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
   
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        document.getElementById("openLogo").style.width = "0";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
        document.getElementById("openLogo").style.width = "20px";
    }
    </script>

    
    
    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

    <script src="JavaScript.js"></script>

</html>