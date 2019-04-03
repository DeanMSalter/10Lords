<?php
// Initialize the session
session_start();

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
        <div class="mainHeader background-box background-color ", style="background-color:#B71C1C">
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
                  <a href ="property-main.php"> Property Management</a>
                </li>

                <li class="navItems">
                  <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                </li>

                <li class="navItems">
                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </li>

              </ul>

            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div id="main" class="main">
      <img id="logo" src="goldLogoo.jpg" alt="Logo" width="150" height="150">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["fname"]); ?> <?php echo htmlspecialchars($_SESSION["lname"]); ?></b>. Welcome to our site.</h1>
  </div>

</body>
</html>
