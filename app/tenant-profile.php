<?php
// Initialize the session
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: index.html");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="ico2.ico" type="image/x-icon">
  <meta charset="utf-8">
  <title>Landlord Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <link rel="stylesheet" href="css/myStyle.css">
  <link href='css/navStyle.css' rel='stylesheet' type='text/css'>
  <script src="js/script.js"></script>
  <link rel="css/stylesheet" href="index-style.css">
</head>

<body>
  <header class="stickyNav">
    <div class="mainHeader background-box background-color">
      <div class="mainHeader-grid fs">
        <div class="grid-column-33-per content-align-left">
          <div class="menuNavButton">
            <span onclick="toggleNav()">
              <img class="menuNavImg" width="25" height="25" src="MenuNav.png" alt="Menu Navigation Button">
            </span>
          </div>
          <nav id="navigationBar" class="sideNav background-color">
            <div class="navContainer">
              <ul class="navMenu">
                <li class="navItems">
                  <a href="landlord-home.php">Home</a>
                </li>
                <li class="navItems">
                  <a href="chat.php">Chat</a>
                </li>
                <li class="navItems">
                  <a>Acount</a>
                </li>
                <li class="navItems">
                  <a href ="property.php"> Property Management</a>
                </li>
                <li class="navItems">
                  <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                </li>
                <li class="navItems">
                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </li>
              </ul>
              <footer>
                <p>something</p>
              </footer>
            </div>
          </nav>
        </div>
        <div class="grid-column-33-per content-align-center">
          <div class="headerLogo">
            <p>logo</p>
          </div>
        </div>
        <div class="grid-column-33-per content-align-right">
          <div class="socialLayout">
            <ul>
              <li>
                <a href="https://twitter.com/leoclarke_" target="_blank">
                  <img height="20" width="20" src="socials/twitter.png" alt="Twitter Icon">
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/leoclarke_/" target="_blank">
                  <img height="20" width="20" src="socials/instagramPNG.png" alt="Instagram Icon">
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/leo-clarke-663315157/" target="_blank">
                  <img height="20" width="20" src="socials/linkedinPNG.png" alt="Linkedin Icon">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="main" class="main">
    <h1>profile</h1>


    <?php
    $tenant_id = $_GET["tenant_id"];
    $sql = "SELECT * FROM tenant WHERE tenant_id='$tenant_id'";
    $result1 = $link->query($sql);
    $f = $result1->fetch_assoc();
    ?>

    <h2><?php echo $f['fname'];?></h2>
    <h2><?php echo $f['lname']; ?></h2>
    <h2><?php echo $f['tenant_id']; ?></h2>


  </div>
</body>
</html>
