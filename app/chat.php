<?php
// Initialize the session
require_once "config.php";
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
  <link rel="icon" href="favicon/favicon.ico" sizes="16x16" type="image/png">
  <link rel="shortcut icon" href="ico2.ico" type="image/x-icon">
  <meta charset="utf-8">
  <title>Landlord Chat</title>
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
                  <a>Chat</a>
                </li>

                <li class="navItems">
                  <a>Account</a>
                </li>

                <li class="navItems">
                  <a href ="property-main.php"> Property Management</a>
                </li>

                <li class="navItems">
                  <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
                </li>

                <li class="navItems">
                  <a href="logout.php" class="btn btn-danger">Sign Out </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>

        <div class="grid-column-33-per content-align-center">
          <div class="headerLogo">
            <p id="title"> 10 Lords </p>
          </div>
        </div>

        </div>
      </div>
    </div>
  </header>

  <div id="main" class="main">
      

  <div id="main" class="main">
    <?php
    $landlord_id = $_SESSION["id"];
    $sql = "SELECT * FROM property WHERE landlord_id='$landlord_id'";
    $result1 = $link->query($sql);

    if ($result1->num_rows > 0) {
      ?><ul><?php
      while($f = $result1->fetch_assoc()) {
        ?>
        <li>
          <a href="chat-window.php?property_name=<?php echo $f['property_name'];?> & property_id=<?php echo $f['property_id']; ?>">
            <?php echo $f['property_name']; ?>
          </a>
        </li>
        <?php
      }
      ?></ul><?php
    } else {
      ?>
      <p class="text-center">No users to add!</p>
      <?php
    }
    ?>
  </div>
</body>
</html>
