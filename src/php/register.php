<?php
  session_start();
  include_once "./database/DBController.php";
  
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (!empty($name) && !empty($username) && !empty($email) && !empty($password)) {
    $sql_username = mysqli_query($con, "SELECT * FROM users WHERE username = '{$username}'");
    
    if (mysqli_num_rows($sql_username) > 0) {
      echo "$username - This username already exists!";
    } else {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql_email = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
        
        if (mysqli_num_rows($sql_email) > 0) {
          echo "$email - This email already exists!";
        } else if (isset($_FILES['picture'])) {
          $pic_name = $_FILES['picture']['name'];
          $pic_type = $_FILES['picture']['type'];
          $pic_tmp_name = $_FILES['picture']['tmp_name'];
  
          $pic_explore = explode('.', $pic_name);
          $pic_ext = end($pic_explore);
          
          $pic_extensions = ["jpeg", "jpg", "png", "gif"];
  
          if (in_array($pic_ext, $pic_extensions) === true) {
            $pic_types = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
            
            if (in_array($pic_type, $pic_types) === true) {
              $time = time();
              $new_pic_name = $time.$pic_name;
              
              if (move_uploaded_file($pic_tmp_name, "../assets/images/people/" . $new_pic_name)) {
                $ran_id = rand(time(), 100000000);
                $status = "Active now";
                $encrypt_pass = md5($password);
                $insert_query = mysqli_query($con, "INSERT INTO users (unique_id, name, username, email, picture, password, status) 
                                                    VALUES ('{$ran_id}', '{$name}', '{$username}', '{$email}', '{$new_pic_name}', '{$encrypt_pass}', '{$status}')");
                
                if ($insert_query) {
                  $select_sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                  
                  if (mysqli_num_rows($select_sql) > 0) {
                    $result = mysqli_fetch_assoc($select_sql);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    
                    echo "success";
                  } else {
                    echo "This email does not exist!";
                  }
                } else {
                  echo "Something went wrong. Please try again!";
                }
              }
            } else {
              echo "Upload an image file - jpeg, jpg, png, gif";
            }
          } else {
            echo "Upload an image file - jpeg, jpg, png, gif";
          }
        }
      } else {
        echo "$email - Not a valid email!";
      }
    }
  } else {
    echo "All input fields are required!";
  }
?>