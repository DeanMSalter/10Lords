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
            <span onclick="toggleNav()">
              <img class="menuNavImg" width="25" height="25" src="MenuNav.png" alt="Menu Navigation Button">
            </span>
          </div>
          <nav id="navigationBar" class="sideNav background-color">
            <div class="navContainer">
              <ul class="navMenu">
                <li class="navItems">
                  <a href="tenant-home.php">Home</a>
                </li>
                <li class="navItems">
                  <a href="tenant-chat.php">Chat</a>
                </li>
               <li class="navItems">
                  <a href="tenant-account.php">Account </a>
                </li>
                <li class="navItems">
                  <a>Property Management</a>
                </li>
                <li class="navItems">
                  <a href="reset-password.php">Reset Your Password</a>
                </li>
                <li class="navItems">
                  <a href="logout.php" >Sign Out of Your Account</a>
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
            <h1 id="chatHeader">Live Chat</h1>
            <h1 class="alert alert-success">
              <form method="post">
                <div class="form-group">
                  <textarea id="submitChat" class="form-control" placeholder="Your Message" name="message"></textarea>
                </div>
                <div class="form-group">
                  <input id = "submitButton" class="btn btn-success btn-block" name="send"  type="submit" value="Send">
                </div>

              </form>
            </div></h1>
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
          $fname = $_SESSION['fname'];
          $lname = $_SESSION['lname'];
          $query = "INSERT INTO chat (property_id,fname,lname,message) values ('$property_id','$fname','$lname','$messsage')";

          $run = $link->query($query);
        }
        ?>
      </section>
      <section id="chat-Container">

        <?php
        $property_id = $_SESSION['property_id'];
        $query = "SELECT * FROM chat WHERE property_id='$property_id'";
        $run = $link->query($query);
        while($row = $run->fetch_array()) :
          ?>
          <div id="chat_data">
            <?php echo $row['fname'];  echo " "; echo $row['lname']; ?>
            <span style="color:green;">: <?php echo $row['created_at']; ?> --- <?php echo $row['message']; ?></span>
          </div>
        <?php endwhile;?>
      </section>


    </div>

  </body>
  </html>
