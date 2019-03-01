<?php
session_start();
  require_once "config.php";

  $sql = "INSERT INTO occupant (property_id, tenant_id) VALUES (?, ?)";
  $stmt = $link->prepare($sql);
  $stmt->bind_param('ii', $_GET['property_id'], $_GET['uid']);

  if ($stmt->execute()) {
    echo "Tenant added";
  }
  mysqli_close($link);
?>
