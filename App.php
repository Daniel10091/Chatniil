<?php
  session_start();
  include_once "./src/php/database/DBController.php";
  
  if (!isset($_SESSION['unique_id'])) {
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatniil</title>
    <link rel="shortcut icon" href="./src/assets/logo/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./src/styles/style.css" attr>
    <link rel="stylesheet" href="./src/icons/styles/Boxicons/boxicons.min.css" attr>
  </head>
  <body class="app__body notranslate" translate="no"> 
    <?php
      $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      }
    ?>
    <main class="app__main"> 
      <header class="app__header_container"> 
        <div class="header__top_bar-content"> 
          <div class="header__title_content"> 
            <h2>People</h2><span id="amountPeople"> </span>
          </div>
          <div class="app__options_menu-content"> 
            <button class="show__app_options"> <img src="./src/assets/images/people/<?php echo $row['picture']; ?>" alt="alt"></button>
            <div class="app__options_menu"> 
              <div class="app__user_account"> 
                <div class="profile_image"> <img src="./src/assets/images/people/<?php echo $row['picture']; ?>" alt="alt"></div>
                <div class="profile_name"> <b><?php echo $row['name']; ?></b></div>
              </div>
              <menu type="toolbar"> 
                <li class="menu-option"> 
                  <button class="show__account_settings"> 
                    <ion-icon name="person-outline"></ion-icon><span>Account Settings</span>
                  </button>
                </li>
                <li class="menu-option"> 
                  <button class="show__app_settings"> 
                    <ion-icon name="settings-outline"></ion-icon><span>Options</span>
                  </button>
                </li>
                <li class="menu-option"> 
                  <button class="btn-primary app__logOut" onclick="window.location='./src/php/logout.php?logout_id=<?php echo $row['unique_id']; ?>'" data-personId="<?php echo $row['unique_id']; ?>"> 
                    <ion-icon name="log-out-outline"></ion-icon><span>Log Out</span>
                  </button>
                </li>
              </menu>
            </div>
          </div>
        </div>
        <div class="header_find_people">
          <div class="app__people_search"> 
            <form action="#" method="get" id="appPeopleSearch"> 
              <ion-icon name="search-outline"></ion-icon>
              <input type="text" name="searchTerm" placeholder="Search people">
            </form>
          </div>
          <button class="add__new_people"> 
            <ion-icon name="add-outline"></ion-icon>
          </button>
        </div>
        <div class="app__people_lists-container"> 
          <menu id="peopleLists_menu" type="toolbar"> 
            <li class="menu-option"> 
              <button data-option="show__all_people-list">All</button>
            </li>
            <li class="menu-option"> 
              <button data-option="show__recent_people-list">Recent</button>
            </li>
            <li class="menu-option"> 
              <button data-option="show__active_people-list">Active Now</button>
            </li>
          </menu>
          <div class="people_lints-content"> 
            <section class="people-list" data-list="all-people">
              <ul class="all_people_list-content"> </ul>
            </section>
            <section class="people-list" data-list="recent-people">
              <ul class="recent_people_list-content"> </ul>
            </section>
            <section class="people-list" data-list="active-people">
              <ul class="active_people_list-content"> </ul>
            </section>
          </div>
        </div>
      </header>
      <div class="app__chat-container example__chat_box"> 
        <iframe id="app__chat_box-iframe" src="" frameborder="0"> </iframe>
        <div class="app__chat_box_container example"> 
          <div class="chat_message no_chat_message"> <img src="./src/assets/icons/add-chat-bubble.png" alt="alt">
            <p>Select a person to chat with.</p>
          </div>
        </div>
      </div>
    </main>
    <script src="./src/scripts/Libraries/jquery-3.6.0.min.js"> </script>
    <script src="./src/scripts/Libraries/jquery-3.5.0.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    <script src="./src/scripts/main.js"> </script>
    <script src="./src/scripts/components/loader/dist/script.dev.js"> </script>
    <script src="./src/scripts/components/Alert/dist/script.dev.js"> </script>
    <script src="./src/scripts/dist/script.dev.js"> </script>
    <script src="./src/scripts/components/People-Lists/script.js"> </script>
    <script src="./src/scripts/components/Search/script.js"> </script>
  </body>
</html>