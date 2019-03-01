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
            <span onclick="openNav()">
              <img class="menuNavImg" width="25" height="25" src="MenuNav.png" alt="Menu Navigation Button">
            </span>
          </div>

          <nav id="navigationBar" class="sideNav background-color">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
    <h1><?php echo htmlspecialchars($_GET["property_name"]); ?></h1>



    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add tenant</button>

    <div id="id01" class="modal">

      <form method="post" action="add-property.php">
        <div class="input-group">
          <?php
          $sql = "SELECT * FROM tenant ";
          $result = $link->query($sql);

          if ($result->num_rows > 0) {
            ?><ul><?php
            while($fc_user = $result->fetch_assoc()) {
              ?>
              <li>
                <a href="profile.php?fname=<?php echo $fc_user['fname']; ?>">
                  <?php echo $fc_user['fname']; ?>
                </a>
                <a href="link.php?uid=<?php echo $fc_user['tenant_id']; ?> & property_id=<?php echo $_GET['property_id']; ?>">[add]</a>
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
        <div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  <span class="psw">Forgot <a href="#">password?</a></span>
</div>
      </form>
    </div>

    <?php
    $prop_id = $_GET["property_id"];
    $sql = "SELECT occupant.occupant_id, tenant.fname, tenant.lname FROM occupant INNER JOIN tenant ON occupant.tenant_id = tenant.tenant_id  where property_id = '$prop_id' ";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      ?><ul><?php
      while($fc_user = $result->fetch_assoc()) {
        ?>
        <li>
          <a href="profile.php?fname=<?php echo $fc_user['fname']; ?>">
            <?php echo $fc_user['fname']; ?> <?php echo $fc_user['lname']; ?>
          </a>
          <a href="link.php?uid=<?php echo $fc_user['tenant_id']; ?> & property_id=<?php echo $_GET['property_id']; ?>">[Remove]</a>
        </li>
        <?php
      }
      ?></ul><?php
    } else {
      ?>
      <p class="text-center">No tenants currenly live here</p>
      <?php
    }
    ?>
  </div>

</body>
</html>
