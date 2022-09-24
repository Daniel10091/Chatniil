<?php
  session_start();

  if (isset($_SESSION['unique_id'])) {
    include_once "../database/DBController.php";
    include_once "../date-time.php";

    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if (isset($_FILES['picture'])) {
      $pic_name = $_FILES['picture']['name'];
      $pic_type = $_FILES['picture']['type'];
      $pic_size = $_FILES['picture']['size'] / 1024;
      $pic_tmp_name = $_FILES['picture']['tmp_name'];

      $pic_explore = explode('.', $pic_name);
      $pic_ext = end($pic_explore);

      $pic_extensions = ["webp", "jpeg", "jpg", "png", "gif"];

      if (in_array($pic_ext, $pic_extensions) === true) {
        $pic_types = ["image/webp", "image/jpeg", "image/jpg", "image/png", "image/gif"];

        if (in_array($pic_type, $pic_types) === true) {
          $time = time();
          $new_pic_name = $time . "_" . $pic_name;

          if (move_uploaded_file($pic_tmp_name, "../../assets/chat-files/images/" . $new_pic_name)) {
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, picture, file_type, file_size, file_link, msg, msg_time)
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$pic_name}', '{$pic_ext}', '{$pic_size}', '{$new_pic_name}', '{$message}', '{$new_time}')";
            $query = mysqli_query($con, $sql) or die();
            echo "success";
          } else {
            echo "Something went wrong. Please ty again!";
          }
        } else {
          echo "Unsupported picture";
        }
      } else {
        echo "Unsupported picture!";
      }
    } else {
      echo "Please, choose a picture!";
    }
  }
?>