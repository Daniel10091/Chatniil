<?php
  session_start();

  if (isset($_SESSION['unique_id'])) {
    include_once "./database/DBController.php";
    
    $logout_id = mysqli_real_escape_string($con, $_GET['logout_id']);

    if (isset($logout_id)) {
      $status = "Offline now";
      $sql = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id = {$_GET['logout_id']}");

      if ($sql) {
        session_unset();
        session_destroy();
        header("location: ../../index.php");
      }
    } else {
      header("location: ../../App.php");
    }
  } else {
    header("location: ../../index.php");
  }
?>