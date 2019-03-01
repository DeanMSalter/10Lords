<?php
session_start();
  require_once "config.php";

  $sql = "INSERT INTO chat (property_id, message) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ss', $_GET['property_id'], $_GET['message']);

  if ($stmt->execute()) {
    header("location: chat-window.php");
  } else {
    echo "Error: " . $link->error;
  }
  mysqli_close($link);
?>
