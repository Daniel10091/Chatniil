<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatniil - Recover Password</title>
    <link rel="shortcut icon" href="./src/assets/logo/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./src/styles/components/recover-password/dist/style.css" attr>
    <link rel="stylesheet" href="./src/icons/styles/Boxicons/boxicons.min.css" attr>
  </head>
  <body class="app__recover-body notranslate" translate="no"> 
    <main class="app__main"> 
      <div class="app__recover-frame"> 
        <div class="recover__title"> 
          <h2>Recover Password</h2>
        </div>
        <div class="recover__form"> 
          <form id="recoverForm" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <ion-icon name="person-outline"></ion-icon>
              <input class="form-control" type="name" name="name" autocomplete="off" autofocus required>
              <label for="name">Name</label>
            </div>
            <div class="form-group">
              <ion-icon name="id-card-outline"></ion-icon>
              <input class="form-control" type="text" name="username" autocomplete="off" required>
              <label for="username">Username</label>
            </div>
            <div class="form-group">
              <ion-icon name="mail-outline"></ion-icon>
              <input class="form-control" type="email" name="email" autocomplete="off" required>
              <label for="email">Email</label>
            </div>
            <button class="btn btn-primary" type="submit">Check</button>
          </form>
          <div class="recover__message"> 
            <p></p>
          </div>
        </div>
      </div>
      <div class="app__links"> <a class="login_link" href="./index.php">Back to Login Page</a>
      </div>
    </main>
    <script src="./src/scripts/Libraries/jquery-3.6.0.min.js"> </script>
    <script src="./src/scripts/Libraries/jquery-3.5.0.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    <script src="./src/scripts/components/recover-password/dist/script.dev.js"> </script>
    <script src="./src/scripts/components/loader/dist/script.dev.js"> </script>
  </body>
</html>