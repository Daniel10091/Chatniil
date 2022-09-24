<?php
  session_start();
  include_once "./src/php/database/DBController.php";
  if (isset($_SESSION['unique_id'])) {
    header("location: App.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatniil - Register</title>
    <link rel="shortcut icon" href="./src/assets/logo/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./src/styles/components/register/dist/style.css" attr>
    <link rel="stylesheet" href="./src/icons/styles/Boxicons/boxicons.min.css" attr>
  </head>
  <body class="app__register-body notranslate" translate="no"> 
    <main class="app__main"> 
      <div class="app__register-frame"> 
        <div class="register__title"> 
          <h2>Register</h2>
        </div>
        <div class="register__form"> 
          <form id="registerForm" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <ion-icon name="person-outline"></ion-icon>
              <input class="form-control" type="text" name="name" autofocus required>
              <label for="name">Name</label>
            </div>
            <div class="form-group">
              <ion-icon name="id-card-outline"></ion-icon>
              <input class="form-control" type="text" name="username" required>
              <label for="username">Username</label>
            </div>
            <div class="form-group">
              <ion-icon name="mail-outline"></ion-icon>
              <input class="form-control" type="email" name="email" required>
              <label for="email">Email</label>
            </div>
            <div class="form-group password">
              <ion-icon name="keypad-outline"></ion-icon>
              <input class="form-control" type="password" name="password" required><span class="show-password" role="button"> 
                <ion-icon name="eye-off-outline"></ion-icon></span>
              <label for="password">Password</label>
            </div>
            <div class="form-group file">
              <ion-icon name="image-outline"></ion-icon>
              <input class="form-control" type="file" name="picture" id="picture" accept="image/x-png,image/gif,image/jpeg,image/jpg" onchange="loadPictureFile(event)" required>
              <label for="picture">Picture</label>
              <div class="load_progress_bar"> 
                <div class="icon"> <span></span></div>
              </div>
              <div class="load_ckeck"> <span></span></div>
            </div>
            <button class="btn btn-primary" type="submit">Register</button>
          </form>
          <div class="register__message"> 
            <p></p>
          </div>
        </div>
      </div>
      <div class="app__links"> 
        <p>Already have an account?</p><a class="login_link" href="./index.php">Log-in Here</a>
      </div>
    </main>
    <script src="./src/scripts/Libraries/jquery-3.6.0.min.js"> </script>
    <script src="./src/scripts/Libraries/jquery-3.5.0.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    <script src="./src/scripts/components/register/script.js"> </script>
    <script src="./src/scripts/components/loader/dist/script.dev.js"> </script>
  </body>
</html>