<?php
  session_start();
  // include_once "./src/php/database/DBController.php";
  
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
    <title>Chatniil - Log-in</title>
    <link rel="shortcut icon" href="./src/assets/logo/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./src/styles/components/login/dist/style.css" attr>
    <link rel="stylesheet" href="./src/icons/styles/Boxicons/boxicons.min.css" attr>
  </head>
  <body class="app__login-body notranslate" translate="no"> 
    <main class="app__main"> 
      <div class="app__login-frame"> 
        <div class="loign__title"> 
          <div class="user_image"> <img src="./src/assets/icons/user-profile.webp" alt="alt"></div>
          <h2>Sign In</h2>
        </div>
        <div class="login__form"> 
          <form id="loginForm" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <ion-icon name="person-outline"></ion-icon>
              <input class="form-control" type="text" name="login" autocomplete="off" autofocus required>
              <label for="login">Email or Username</label>
            </div>
            <div class="form-group password">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input class="form-control" type="password" name="password" required><span class="show-password" role="button"> 
                <ion-icon name="eye-off-outline"></ion-icon></span>
              <label for="password">Password</label>
            </div>
            <button class="btn btn-primary" type="submit">Log-in</button>
            <div class="login__links"> 
              <div class="remenber_check"> 
                <input type="checkbox" name="remember" id="remember">
                <label for="remember"> 
                  <div class="checkbox">
                    <div class="check_icon"> <span></span></div>
                  </div><span>Remember me</span>
                </label>
              </div><a class="recover-password_link" href="./recover-password.php">Fogout Password?</a>
            </div>
          </form>
          <div class="login__message"> 
            <p></p>
          </div>
        </div>
      </div>
      <div class="app__links"> 
        <p>Don't have a account?</p><a class="register_link" href="./register.php">Register Here</a>
      </div>
    </main>
    <script src="./src/scripts/Libraries/jquery-3.6.0.min.js"> </script>
    <script src="./src/scripts/Libraries/jquery-3.5.0.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    <script src="./src/scripts/components/login/script.js"> </script>
    <script src="./src/scripts/components/loader/dist/script.dev.js"> </script>
  </body>
</html>