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
    <link href='css/chat-style.css' rel='stylesheet' type='text/css'>
</head>

<body>
  <header class="stickyNav">
      <div class="mainHeader background-box background-color ", style="background-color:#B71C1C">
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
                  <a href="tenant-chat.php">Chat</a>
                </li>
                <li class="navItems">
                  <a>Account</a>
                </li>
                <li class="navItems">
                  <a>Property Management</a>
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
            <p id="title"> 10 Lords </p>
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
    <script>
    function loadChat(){
      let request = new XMLHttpRequest();
      request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
          document.getElementById('chat').innerHTML = request.responseText;
        }
      }
      request.open('GET','chat-data.php?property_id=<?php echo $GET['property_id']; ?>',true);
      request.send();
    }
    setInterval(function(){loadChat()},1000);
    </script>

    <section onload="loadChat();">
      <div id="container">
        <div class="row">
          <div class="col-sm-2 col-md-6">
            <h1 class="alert alert-success">Live Chat</h1>
            <h1 class="alert alert-success">
              <form method="post">
                <div class="form-group">
                  <textarea class="form-control" placeholder="Your Message" name="message"></textarea>
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-block" name="send"  type="submit" value="Send">
                </div>

              </form>
            </div></h1>

            <div class="col-sm-2 col-md-6">
              <div id="chat" class="chat">

              </div>
            </div>
          </div>
        </div>
        <?php
        $tenant_id = $_SESSION["id"];
        $sql = "SELECT property_id FROM occupant WHERE tenant_id='$tenant_id'";
        $result1 = $link->query($sql);
        $f = $result1->fetch_assoc();
                $property_id= $f['property_id'];
        ?>
                <?php
        if(isset($_POST['send'])){
          $property_id = $_SESSION['property_id'];
          $messsage = $_POST['message'];

          $query = "INSERT INTO chat (property_id,message) values ('$property_id','$messsage')";

          $run = $link->query($query);
        }
        ?>
      </section>
      <section>

        <?php
        $property_id = $_SESSION['property_id'];
        $query = "SELECT * FROM chat WHERE property_id='$property_id'";
        $run = $link->query($query);
        while($row = $run->fetch_array()) :
          ?>
          <div id="chat_data">
            <span style="color:green;"><?php echo $row['message']; ?></span>
          </div>
        <?php endwhile;?>
      </section>


    </div>

  </body>
  </html>
