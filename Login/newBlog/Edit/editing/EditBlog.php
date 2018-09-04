<!DOCTYPE html>
<html>
<head>
    <title>ADD</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="user-scalable = yes">
    <meta name="description" content="DESCRIPTION">
    <link rel="icon" href="../../../../sahand.jpg">
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
    <?php
        session_start();
        if (!isset($_SESSION['userName'])) {
        header('Location: ../../../login.html');
        exit();
        }
        $idEdit = $_SESSION['editSession'];
        
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
    
    
    
        $sql = "SELECT titleOf, titleDescr, blogText, imagePath FROM theBlogs WHERE id = '$idEdit'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
            $titleBL = $row["titleOf"];
            $titleDescBL= $row["titleDescr"];
            $textBL= $row["blogText"];
            $imageBL= $row["imagePath"];
	?>
    
    
    
    <form action="set.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="title" class="form-control" id="title" name="title" placeholder="Title of the post" <?php echo "value='$titleBL'" ?> >
      </div>

      <div class="form-group">
        <input type="title" class="form-control" id="titleDescription" name="titleDescription" placeholder="Title description" <?php echo "value='$titleDescBL'" ?>>
        <input id="date" class="form-control" name="dateOf" type="date">
      </div>
        
      </div>
      <div class="form-group">
        <textarea class="form-control textAr" id="exampleFormControlTextarea1" name="theBlog" rows="6" placeholder="The text" ><?php echo "$textBL" ?></textarea>
      </div>
    
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedCustomFile" required accept="image/x-png,image/gif,image/jpeg" name="imageUpload">
        <label class="custom-file-label" for="validatedCustomFile">Choose the image</label>
      </div>
    
      <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
    </form>
    
    
    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>