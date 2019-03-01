<?php
session_start();
  require_once "config.php";

  $sql = "INSERT INTO property (landlord_id, property_name) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ss', $_SESSION['id'], $_POST['property_name']);

  if ($stmt->execute()) {
    header("location: property-main.php");
  } else {
    echo "Error: " . $link->error;
  }
  mysqli_close($link);
?>
