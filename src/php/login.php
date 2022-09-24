<?php
  session_start();
  include_once "./database/DBController.php";
  
  $login = mysqli_real_escape_string($con, $_POST['login']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (!empty($login) && !empty($password)) {
    $sql = mysqli_query($con, "SELECT * FROM users WHERE username = '{$login}' OR email = '{$login}'");

    if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
      $user_pass = md5($password);
      $enc_pass = $row['password'];

      if ($user_pass === $enc_pass) {
        $status = "Active now";
        $sql_update = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

        if ($sql_update) {
          $_SESSION['unique_id'] = $row['unique_id'];

          echo "success";
        } else {
          echo "Something went wrong. Please try again!";
        }
      } else {
        echo "The password is incorrect!";
      }
    } else {
      echo "This login does not exist!";
    }
  } else {
    echo "All input fields are required!";
  }
?>