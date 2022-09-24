<?php
  session_start();
  include_once "../database/DBController.php";
  
  $outgoing_id = $_SESSION['unique_id'];
  $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
  $query = mysqli_query($con, $sql);
  $output = "";

  if (mysqli_num_rows($query) === 0) {
    $output .= '
      <div class="list_message empty_list-message">
        <img src="./src/assets/icons/message-box.png" alt="alt">
        <p>No person is currently available.</p>
      </div>
    ';
  } else if (mysqli_num_rows($query) > 0) {
    include_once "./data.php";
  }
  echo $output;
?>