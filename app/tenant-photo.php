<?php
  require_once "config.php";
  session_start();
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: index.html");
      exit;
  }
  // Initialize message variable
  $msg = "";
  $property_id = $_SESSION['property_id'];
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($link, $_POST['image_text']);
  	// image file directory
  	$target = "images/";
  	$sql = "INSERT INTO image (image, image_text,property_id) VALUES ('$image', '$image_text','$property_id')";
  	// execute query
  	mysqli_query($link, $sql);
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($link, "SELECT image, image_text FROM image WHERE property_id = $property_id ");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="favicon/favicon.ico" sizes="16x16" type="image/png">
  <link rel="shortcut icon" href="ico2.ico" type="image/x-icon">
  <meta charset="utf-8">
  <title>Tenant Photos </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="css/myStyle.css">
  <link href='css/navStyle.css' rel='stylesheet' type='text/css'>
  <script src="js/script.js"></script>
  <link rel="css/stylesheet" href="index-style.css">
  <link href='css/home-style.css' rel='stylesheet' type='text/css'>
</head>

<body>
  <header class="stickyNav">
    <div class="mainHeader background-box background-color">
      <div class="mainHeader-grid fs">
        <div class="grid-column-33-per content-align-left">
          <div class="menuNavButton">
            <span onclick="openNav()">
              <img class="menuNavImg" width="25" height="25" src="MenuNav.png" alt="Menu Navigation Button">
            </span>
          </div>
          <nav id="navigationBar" class="sideNav background-color">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="navContainer">
              <ul class="navMenu">
                <li class="navItems">
                  <a href="tenant-home.php">Home</a>
                </li>
                <li class="navItems">
                  <a href="chat.php">Chat</a>
                </li>
                  <li class="navItems">
                  <a href="tenant-account.php">Account </a>
                </li>
                <li class="navItems">
                  <a>Photos</a>
                </li>

                <li class="navItems">
                 <a href="tenant-document.php">View Documents</a>
               </li>

                <li class="navItems">
                  <a href ="property.php"> Property Management</a>
                </li>

                <li class="navItems">
                  <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
                </li>
                <li class="navItems">
                  <a href="logout.php" class="btn btn-danger">Sign Out </a>
                </li>
              </ul>
              <footer>
                <p></p>
              </footer>
            </div>
          </nav>
        </div>
        <div class="grid-column-33-per content-align-center">
          <div class="headerLogo">
            <p id="title"> 10 Lords </p>
          </div>
        </div>
        <div class="grid-column-33-per content-align-right">
          <div class="socialLayout">
            <ul>

          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="main" class="main">
    <h1> Upload a Photo: </h1>
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo "<img src='images/".$row['image']."' >";
      echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
    ?>
    <form method="POST" action="tenant-photo.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div>
        <input type="file" name="image">
      </div>
      <div>
        <textarea
        id="text"
        cols="40"
        rows="4"
        name="image_text"
        placeholder="Say something about this image..."></textarea>
      </div>
      <div>
        <button type="submit" name="upload">POST</button>
      </div>
    </form>

  </div>
</body>
</html>
