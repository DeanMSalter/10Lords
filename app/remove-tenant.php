<?php
session_start();
  require_once "config.php";
  $tenant_id =$_GET['uid'];
  $sql = "DELETE FROM occupant WHERE tenant_id=$tenant_id";
  $stmt = $link->prepare($sql);
  if ($stmt->execute()) {
    echo "Tenant removed";
  }
  mysqli_close($link);
?>
