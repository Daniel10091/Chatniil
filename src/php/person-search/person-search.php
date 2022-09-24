<?php
  session_start();
  include_once "../database/DBController.php";

  $outgoing_id = $_SESSION['unique_id'];
  $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);
  $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND 
         (name LIKE '%{$searchTerm}%' OR username LIKE '%{$searchTerm}%' OR email LIKE '%{$searchTerm}%') ORDER BY user_id DESC";
  $query = mysqli_query($con, $sql);
  $output = "";

  if (mysqli_num_rows($query) > 0) {
    include_once "./data.php";
  } else {
    $output .= '
      <div class="list_message empty_list-message">
        <img src="./src/assets/icons/question-mark.png" alt="alt">
        <p>No person found related to your search term.</p>
      </div>
    ';
  }

  echo $output;
?>