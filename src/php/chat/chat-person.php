<?php
  include_once "../database/DBController.php";
  
  $person_id = mysqli_real_escape_string($con, $_POST['person_id']);
  $output = "";
  $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$person_id}");

  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);

    ($row['status'] === "Offline now") ? $status = "is-offline" : $status = "";

    $output .= '
      <div class="chat__person_info"> 
        <div class="user-status ' . $status . '"></div>
        <div class="user-name">
          <b>' . $row['name'] . '</b>
        </div>
      </div>
    ';
    echo $output;
  }
?>