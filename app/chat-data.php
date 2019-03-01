<br>
<?php
require_once 'config.php';
$property_id= $_GET['property_id'];
$query = "SELECT * FROM chat WHERE property_id='$property_id'";
$run = $link->query($query);
while($row = $run->fetch_array()) :
  ?>
  <div id="chat_data">
    <span style="color:green;"><?php echo $row['message']; ?></span>
  </div>
<?php endwhile;?>
