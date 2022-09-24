<?php
  session_start();
  
  if (isset($_SESSION['unique_id'])) {
    include_once "../database/DBController.php";
    include_once "../date-time.php";
    
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if (!empty($message)) {
      $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, msg_time)
              VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$new_time}')";
      $query = mysqli_query($con, $sql) or die();
      echo "success";
    }
  }
?>