<?php
session_start();
  require_once "config.php";
  $event_id =$_GET['event_id'];
  $sql = "DELETE FROM event WHERE event_id=$event_id";
  $stmt = $link->prepare($sql);
  if ($stmt->execute()) {
    echo "Event removed";
  }
  mysqli_close($link);
?>
