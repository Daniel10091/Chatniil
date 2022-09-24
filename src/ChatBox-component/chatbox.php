<?php
  session_start();
  include_once "../php/database/DBController.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatniil</title>
    <link rel="shortcut icon" href="../../src/assets/logo/logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../../src/styles/style.css" attr>
    <link rel="stylesheet" href="../../src/icons/styles/Boxicons/boxicons.min.css" attr>
  </head>
  <body class="app__chat_box-body notranslate" translate="no"> 
    <?php
      $person_id = mysqli_real_escape_string($con, $_GET['person_id']);
      $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$person_id}");

      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      }
    ?>
    <input type="hidden" class="person_id" name="person_id" value="<?php echo $person_id; ?>">
    <div class="app__chat-container"> 
      <header class="app__chat-header"> 
        <ul class="header_content"> 
          <li class="header-item"> 
            <button class="back__people_lists"> 
              <ion-icon name="arrow-back-outline"></ion-icon>
            </button>
          </li>
          <li class="header-item" id="personInfo"> 
            <!-- <div class="chat__person_info"> 
              <div class="user-status ' . $status . '"></div>
              <div class="user-name">
                <b><?php echo $row['name'] ?></b>
              </div>
            </div> -->
          </li>
          <li class="header-item"> 
            <button class="show__person_options"> 
              <ion-icon name="settings-outline"></ion-icon>
            </button>
          </li>
        </ul>
      </header>
      <div class="app__chat_box_container"> 
        <div class="chat_box_container"> 
          <div class="chat_box_content"> 
            
            <!-- <div class="message outgoing"> 
              <div class="message_content"> 
                <div class="message-text">
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis exercitationem nesciunt cum!</p><span>10:22 am</span>
                </div>
              </div>
            </div>
            <div class="message outgoing"> 
              <div class="message_content"> 
                <div class="message-text"> 
                  <div class="message-image"> <img src="https://i.pinimg.com/564x/29/b5/9a/29b59ae0f86af001856acafb13e1ecbf.jpg" alt="alt"></div>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis exercitationem nesciunt cum!</p><span>10:22 am</span>
                </div>
              </div>
            </div>
            <div class="message incoming">
              <div class="message_content"> 
                <div class="user-image"> <img src="../../src/assets/images/users/Jennie.jpg" alt="alt"></div>
                <div class="message-text"> 
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, sunt.</p><span>10:24 am</span>
                </div>
              </div>
            </div>
            <div class="message incoming">
              <div class="message_content"> 
                <div class="user-image"> <img src="../../src/assets/images/users/Jennie.jpg" alt="alt"></div>
                <div class="typing_icon"> <span></span><span></span><span></span></div>
              </div>
            </div> -->

          </div>
        </div>
        <div class="chat_box_form"> 
          <menu class="app__chat_menu" type="toolbar"> 
            <li class="menu-option"> 
              <button class="show__chat-emogi" data-option="emogiMenu"> 
                <ion-icon name="happy-outline"></ion-icon>
              </button>
              <div class="app__emogi-menu_container"> 
                <div class="emogi__menu"> 
                  <menu id="emogiMenu" type="toolbar"> 
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-01">😀</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-02">🐻</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-03">🍔</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-04">⚽</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-05">🚀</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-06">💡</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-07">💕</button>
                      </li>
                      <li class="menu-item"> 
                        <button class="emogi__option" data-menu="list-08">🎌</button>
                      </li>
                  </menu>
                </div>
                <div class="emogi__lists_container"> 
                  <div class="emogi__lists_content" id="list-01"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">😀</span></li>
                      <li class="emogi__item"> <span role="button">😃</span></li>
                      <li class="emogi__item"> <span role="button">😄</span></li>
                      <li class="emogi__item"> <span role="button">😁</span></li>
                      <li class="emogi__item"> <span role="button">😆</span></li>
                      <li class="emogi__item"> <span role="button">😅</span></li>
                      <li class="emogi__item"> <span role="button">🤣</span></li>
                      <li class="emogi__item"> <span role="button">😂</span></li>
                      <li class="emogi__item"> <span role="button">🙂</span></li>
                      <li class="emogi__item"> <span role="button">🙃</span></li>
                      <li class="emogi__item"> <span role="button">😉</span></li>
                      <li class="emogi__item"> <span role="button">😊</span></li>
                      <li class="emogi__item"> <span role="button">😇</span></li>
                      <li class="emogi__item"> <span role="button">🥰</span></li>
                      <li class="emogi__item"> <span role="button">😍</span></li>
                      <li class="emogi__item"> <span role="button">🤩</span></li>
                      <li class="emogi__item"> <span role="button">😘</span></li>
                      <li class="emogi__item"> <span role="button">😗</span></li>
                      <li class="emogi__item"> <span role="button">😊</span></li>
                      <li class="emogi__item"> <span role="button">😚</span></li>
                      <li class="emogi__item"> <span role="button">😙</span></li>
                      <li class="emogi__item"> <span role="button">😋</span></li>
                      <li class="emogi__item"> <span role="button">😛</span></li>
                      <li class="emogi__item"> <span role="button">😜</span></li>
                      <li class="emogi__item"> <span role="button">🤪</span></li>
                      <li class="emogi__item"> <span role="button">😝</span></li>
                      <li class="emogi__item"> <span role="button">🤑</span></li>
                      <li class="emogi__item"> <span role="button">🤗</span></li>
                      <li class="emogi__item"> <span role="button">🤭</span></li>
                      <li class="emogi__item"> <span role="button">🤫</span></li>
                      <li class="emogi__item"> <span role="button">🤔</span></li>
                      <li class="emogi__item"> <span role="button">🤐</span></li>
                      <li class="emogi__item"> <span role="button">🤨</span></li>
                      <li class="emogi__item"> <span role="button">😐</span></li>
                      <li class="emogi__item"> <span role="button">😑</span></li>
                      <li class="emogi__item"> <span role="button">😶</span></li>
                      <li class="emogi__item"> <span role="button">😏</span></li>
                      <li class="emogi__item"> <span role="button">😒</span></li>
                      <li class="emogi__item"> <span role="button">🙄</span></li>
                      <li class="emogi__item"> <span role="button">😬</span></li>
                      <li class="emogi__item"> <span role="button">🤥</span></li>
                      <li class="emogi__item"> <span role="button">😌</span></li>
                      <li class="emogi__item"> <span role="button">😔</span></li>
                      <li class="emogi__item"> <span role="button">😪</span></li>
                      <li class="emogi__item"> <span role="button">🤤</span></li>
                      <li class="emogi__item"> <span role="button">😴</span></li>
                      <li class="emogi__item"> <span role="button">😷</span></li>
                      <li class="emogi__item"> <span role="button">🤒</span></li>
                      <li class="emogi__item"> <span role="button">🤕</span></li>
                      <li class="emogi__item"> <span role="button">🤢</span></li>
                      <li class="emogi__item"> <span role="button">🤮</span></li>
                      <li class="emogi__item"> <span role="button">🤧</span></li>
                      <li class="emogi__item"> <span role="button">🥵</span></li>
                      <li class="emogi__item"> <span role="button">🥶</span></li>
                      <li class="emogi__item"> <span role="button">🥴</span></li>
                      <li class="emogi__item"> <span role="button">😵</span></li>
                      <li class="emogi__item"> <span role="button">🤯</span></li>
                      <li class="emogi__item"> <span role="button">🤠</span></li>
                      <li class="emogi__item"> <span role="button">🥳</span></li>
                      <li class="emogi__item"> <span role="button">😎</span></li>
                      <li class="emogi__item"> <span role="button">🤓</span></li>
                      <li class="emogi__item"> <span role="button">🧐</span></li>
                      <li class="emogi__item"> <span role="button">😕</span></li>
                      <li class="emogi__item"> <span role="button">😟</span></li>
                      <li class="emogi__item"> <span role="button">🙁</span></li>
                      <li class="emogi__item"> <span role="button">☹️</span></li>
                      <li class="emogi__item"> <span role="button">😮</span></li>
                      <li class="emogi__item"> <span role="button">😯</span></li>
                      <li class="emogi__item"> <span role="button">😲</span></li>
                      <li class="emogi__item"> <span role="button">😳</span></li>
                      <li class="emogi__item"> <span role="button">🥺</span></li>
                      <li class="emogi__item"> <span role="button">😦</span></li>
                      <li class="emogi__item"> <span role="button">😧</span></li>
                      <li class="emogi__item"> <span role="button">😨</span></li>
                      <li class="emogi__item"> <span role="button">😰</span></li>
                      <li class="emogi__item"> <span role="button">😥</span></li>
                      <li class="emogi__item"> <span role="button">😢</span></li>
                      <li class="emogi__item"> <span role="button">😭</span></li>
                      <li class="emogi__item"> <span role="button">😱</span></li>
                      <li class="emogi__item"> <span role="button">😖</span></li>
                      <li class="emogi__item"> <span role="button">😣</span></li>
                      <li class="emogi__item"> <span role="button">😞</span></li>
                      <li class="emogi__item"> <span role="button">😓</span></li>
                      <li class="emogi__item"> <span role="button">😩</span></li>
                      <li class="emogi__item"> <span role="button">😫</span></li>
                      <li class="emogi__item"> <span role="button">🥱</span></li>
                      <li class="emogi__item"> <span role="button">😤</span></li>
                      <li class="emogi__item"> <span role="button">😡</span></li>
                      <li class="emogi__item"> <span role="button">😠</span></li>
                      <li class="emogi__item"> <span role="button">🤬</span></li>
                      <li class="emogi__item"> <span role="button">😈</span></li>
                      <li class="emogi__item"> <span role="button">👿</span></li>
                      <li class="emogi__item"> <span role="button">💀</span></li>
                      <li class="emogi__item"> <span role="button">☠️</span></li>
                      <li class="emogi__item"> <span role="button">💩</span></li>
                      <li class="emogi__item"> <span role="button">🤡</span></li>
                      <li class="emogi__item"> <span role="button">👹</span></li>
                      <li class="emogi__item"> <span role="button">👺</span></li>
                      <li class="emogi__item"> <span role="button">👻</span></li>
                      <li class="emogi__item"> <span role="button">👽</span></li>
                      <li class="emogi__item"> <span role="button">👾</span></li>
                      <li class="emogi__item"> <span role="button">🤖</span></li>
                      <li class="emogi__item"> <span role="button">😺</span></li>
                      <li class="emogi__item"> <span role="button">😸</span></li>
                      <li class="emogi__item"> <span role="button">😹</span></li>
                      <li class="emogi__item"> <span role="button">😻</span></li>
                      <li class="emogi__item"> <span role="button">😼</span></li>
                      <li class="emogi__item"> <span role="button">😽</span></li>
                      <li class="emogi__item"> <span role="button">🙀</span></li>
                      <li class="emogi__item"> <span role="button">😿</span></li>
                      <li class="emogi__item"> <span role="button">😾</span></li>
                      <li class="emogi__item"> <span role="button">💋</span></li>
                      <li class="emogi__item"> <span role="button">👋</span></li>
                      <li class="emogi__item"> <span role="button">🤚</span></li>
                      <li class="emogi__item"> <span role="button">🖐️</span></li>
                      <li class="emogi__item"> <span role="button">✋</span></li>
                      <li class="emogi__item"> <span role="button">🖖</span></li>
                      <li class="emogi__item"> <span role="button">👌</span></li>
                      <li class="emogi__item"> <span role="button">🤏</span></li>
                      <li class="emogi__item"> <span role="button">✌️</span></li>
                      <li class="emogi__item"> <span role="button">🤞</span></li>
                      <li class="emogi__item"> <span role="button">🤟</span></li>
                      <li class="emogi__item"> <span role="button">🤘</span></li>
                      <li class="emogi__item"> <span role="button">🤙</span></li>
                      <li class="emogi__item"> <span role="button">👈</span></li>
                      <li class="emogi__item"> <span role="button">👉</span></li>
                      <li class="emogi__item"> <span role="button">👆</span></li>
                      <li class="emogi__item"> <span role="button">🖕</span></li>
                      <li class="emogi__item"> <span role="button">👇</span></li>
                      <li class="emogi__item"> <span role="button">☝️</span></li>
                      <li class="emogi__item"> <span role="button">👍</span></li>
                      <li class="emogi__item"> <span role="button">👎</span></li>
                      <li class="emogi__item"> <span role="button">✊</span></li>
                      <li class="emogi__item"> <span role="button">👊</span></li>
                      <li class="emogi__item"> <span role="button">🤛</span></li>
                      <li class="emogi__item"> <span role="button">🤜</span></li>
                      <li class="emogi__item"> <span role="button">👏</span></li>
                      <li class="emogi__item"> <span role="button">🙌</span></li>
                      <li class="emogi__item"> <span role="button">👐</span></li>
                      <li class="emogi__item"> <span role="button">🤲</span></li>
                      <li class="emogi__item"> <span role="button">🤝</span></li>
                      <li class="emogi__item"> <span role="button">🙏</span></li>
                      <li class="emogi__item"> <span role="button">✍️</span></li>
                      <li class="emogi__item"> <span role="button">💅</span></li>
                      <li class="emogi__item"> <span role="button">🤳</span></li>
                      <li class="emogi__item"> <span role="button">💪</span></li>
                      <li class="emogi__item"> <span role="button">🦾</span></li>
                      <li class="emogi__item"> <span role="button">🦿</span></li>
                      <li class="emogi__item"> <span role="button">🦵</span></li>
                      <li class="emogi__item"> <span role="button">🦶</span></li>
                      <li class="emogi__item"> <span role="button">👂</span></li>
                      <li class="emogi__item"> <span role="button">🦻</span></li>
                      <li class="emogi__item"> <span role="button">👃</span></li>
                      <li class="emogi__item"> <span role="button">🧠</span></li>
                      <li class="emogi__item"> <span role="button">🧠</span></li>
                      <li class="emogi__item"> <span role="button">🦷</span></li>
                      <li class="emogi__item"> <span role="button">🦴</span></li>
                      <li class="emogi__item"> <span role="button">👀</span></li>
                      <li class="emogi__item"> <span role="button">👁️</span></li>
                      <li class="emogi__item"> <span role="button">👅</span></li>
                      <li class="emogi__item"> <span role="button">👄</span></li>
                      <li class="emogi__item"> <span role="button">👶</span></li>
                      <li class="emogi__item"> <span role="button">🧒</span></li>
                      <li class="emogi__item"> <span role="button">👦</span></li>
                      <li class="emogi__item"> <span role="button">👧</span></li>
                      <li class="emogi__item"> <span role="button">🧑</span></li>
                      <li class="emogi__item"> <span role="button">👱</span></li>
                      <li class="emogi__item"> <span role="button">👨</span></li>
                      <li class="emogi__item"> <span role="button">🧔</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦰</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦱</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦳</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦲</span></li>
                      <li class="emogi__item"> <span role="button">👩</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦰</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦱</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦳</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦲</span></li>
                      <li class="emogi__item"> <span role="button">👱‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">👱‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧓</span></li>
                      <li class="emogi__item"> <span role="button">👴</span></li>
                      <li class="emogi__item"> <span role="button">👵</span></li>
                      <li class="emogi__item"> <span role="button">🙍</span></li>
                      <li class="emogi__item"> <span role="button">🙍‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙍‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🙎</span></li>
                      <li class="emogi__item"> <span role="button">🙎‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙎‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🙅</span></li>
                      <li class="emogi__item"> <span role="button">🙅‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙅‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🙆</span></li>
                      <li class="emogi__item"> <span role="button">🙆‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙆‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">💁</span></li>
                      <li class="emogi__item"> <span role="button">💁‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">💁‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🙋</span></li>
                      <li class="emogi__item"> <span role="button">🙋‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙋‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧏</span></li>
                      <li class="emogi__item"> <span role="button">🧏‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧏‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🙇</span></li>
                      <li class="emogi__item"> <span role="button">🙇‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🙇‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤦</span></li>
                      <li class="emogi__item"> <span role="button">🤦‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤦‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤷</span></li>
                      <li class="emogi__item"> <span role="button">🤷‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤷‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">👨‍⚕️</span></li>
                      <li class="emogi__item"> <span role="button">👩‍⚕️</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🎓</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🎓</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🏫</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🏫</span></li>
                      <li class="emogi__item"> <span role="button">👨‍⚖️</span></li>
                      <li class="emogi__item"> <span role="button">👩‍⚖️</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🌾</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🌾</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🍳</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🍳</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🔧</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🔧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🏭</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🏭</span></li>
                      <li class="emogi__item"> <span role="button">👨‍💼</span></li>
                      <li class="emogi__item"> <span role="button">👩‍💼</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🔬</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🔬</span></li>
                      <li class="emogi__item"> <span role="button">👨‍💻</span></li>
                      <li class="emogi__item"> <span role="button">👩‍💻</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🎤</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🎤</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🎨</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🎨</span></li>
                      <li class="emogi__item"> <span role="button">👨‍✈️</span></li>
                      <li class="emogi__item"> <span role="button">👩‍✈️</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🚀</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🚀</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🚒</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🚒</span></li>
                      <li class="emogi__item"> <span role="button">👮</span></li>
                      <li class="emogi__item"> <span role="button">👮‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🕵️</span></li>
                      <li class="emogi__item"> <span role="button">🕵️‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🕵️‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">💂</span></li>
                      <li class="emogi__item"> <span role="button">💂‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">💂‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">👷</span></li>
                      <li class="emogi__item"> <span role="button">👷‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤴</span></li>
                      <li class="emogi__item"> <span role="button">👸</span></li>
                      <li class="emogi__item"> <span role="button">👳</span></li>
                      <li class="emogi__item"> <span role="button">👳‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">👳‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">👲</span></li>
                      <li class="emogi__item"> <span role="button">🧕</span></li>
                      <li class="emogi__item"> <span role="button">🤵</span></li>
                      <li class="emogi__item"> <span role="button">👰</span></li>
                      <li class="emogi__item"> <span role="button">🤰</span></li>
                      <li class="emogi__item"> <span role="button">🤱</span></li>
                      <li class="emogi__item"> <span role="button">🦸</span></li>
                      <li class="emogi__item"> <span role="button">🦸‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🦸‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🦹</span></li>
                      <li class="emogi__item"> <span role="button">🦹‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🦹‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧙</span></li>
                      <li class="emogi__item"> <span role="button">🧙‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧚</span></li>
                      <li class="emogi__item"> <span role="button">🧚‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧚‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧛</span></li>
                      <li class="emogi__item"> <span role="button">🧛‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧜</span></li>
                      <li class="emogi__item"> <span role="button">🧜‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧜‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧝</span></li>
                      <li class="emogi__item"> <span role="button">🧝‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧝‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧞</span></li>
                      <li class="emogi__item"> <span role="button">🧞‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧟</span></li>
                      <li class="emogi__item"> <span role="button">🧟‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">💆</span></li>
                      <li class="emogi__item"> <span role="button">💆‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">💇‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">💇‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🚶</span></li>
                      <li class="emogi__item"> <span role="button">🚶‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧍</span></li>
                      <li class="emogi__item"> <span role="button">🧍‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧍‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧎</span></li>
                      <li class="emogi__item"> <span role="button">🧎‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧎‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦯</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦯</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦼</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦼</span></li>
                      <li class="emogi__item"> <span role="button">👨‍🦽</span></li>
                      <li class="emogi__item"> <span role="button">👩‍🦽</span></li>
                      <li class="emogi__item"> <span role="button">🏃</span></li>
                      <li class="emogi__item"> <span role="button">🏃‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">💃</span></li>
                      <li class="emogi__item"> <span role="button">🕺</span></li>
                      <li class="emogi__item"> <span role="button">🕴️</span></li>
                      <li class="emogi__item"> <span role="button">👯‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">👯‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧖‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧖‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧘</span></li>
                      <li class="emogi__item"> <span role="button">🧑‍🤝‍🧑</span></li>
                      <li class="emogi__item"> <span role="button">👭</span></li>
                      <li class="emogi__item"> <span role="button">👫</span></li>
                      <li class="emogi__item"> <span role="button">👬</span></li>
                      <li class="emogi__item"> <span role="button">💏</span></li>
                      <li class="emogi__item"> <span role="button">👨‍❤️‍💋‍👨</span></li>
                      <li class="emogi__item"> <span role="button">👩‍❤️‍💋‍👩</span></li>
                      <li class="emogi__item"> <span role="button">💑</span></li>
                      <li class="emogi__item"> <span role="button">👨‍❤️‍👨</span></li>
                      <li class="emogi__item"> <span role="button">👩‍❤️‍👩</span></li>
                      <li class="emogi__item"> <span role="button">👪</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👩‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👩‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👩‍👧‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👩‍👦‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👩‍👧‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👨‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👨‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👨‍👧‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👨‍👦‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👨‍👧‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👩‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👩‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👩‍👧‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👩‍👦‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👩‍👧‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👦‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👧‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👨‍👧‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👦‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👧</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👧‍👦</span></li>
                      <li class="emogi__item"> <span role="button">👩‍👧‍👧</span></li>
                      <li class="emogi__item"> <span role="button">🗣️</span></li>
                      <li class="emogi__item"> <span role="button">👤</span></li>
                      <li class="emogi__item"> <span role="button">👥</span></li>
                      <li class="emogi__item"> <span role="button">👣</span></li>
                      <li class="emogi__item"> <span role="button">🧳</span></li>
                      <li class="emogi__item"> <span role="button">🌂</span></li>
                      <li class="emogi__item"> <span role="button">☂️</span></li>
                      <li class="emogi__item"> <span role="button">🎃</span></li>
                      <li class="emogi__item"> <span role="button">🧵</span></li>
                      <li class="emogi__item"> <span role="button">🧶</span></li>
                      <li class="emogi__item"> <span role="button">👓</span></li>
                      <li class="emogi__item"> <span role="button">🕶️</span></li>
                      <li class="emogi__item"> <span role="button">🥽</span></li>
                      <li class="emogi__item"> <span role="button">🥼</span></li>
                      <li class="emogi__item"> <span role="button">🦺</span></li>
                      <li class="emogi__item"> <span role="button">👔</span></li>
                      <li class="emogi__item"> <span role="button">👕</span></li>
                      <li class="emogi__item"> <span role="button">👖</span></li>
                      <li class="emogi__item"> <span role="button">🧣</span></li>
                      <li class="emogi__item"> <span role="button">🧤</span></li>
                      <li class="emogi__item"> <span role="button">🧥</span></li>
                      <li class="emogi__item"> <span role="button">🧦</span></li>
                      <li class="emogi__item"> <span role="button">👗</span></li>
                      <li class="emogi__item"> <span role="button">👘</span></li>
                      <li class="emogi__item"> <span role="button">🥻</span></li>
                      <li class="emogi__item"> <span role="button">🩱</span></li>
                      <li class="emogi__item"> <span role="button">🩲</span></li>
                      <li class="emogi__item"> <span role="button">🩳</span></li>
                      <li class="emogi__item"> <span role="button">👙</span></li>
                      <li class="emogi__item"> <span role="button">👚</span></li>
                      <li class="emogi__item"> <span role="button">👛</span></li>
                      <li class="emogi__item"> <span role="button">👜</span></li>
                      <li class="emogi__item"> <span role="button">👝</span></li>
                      <li class="emogi__item"> <span role="button">🎒</span></li>
                      <li class="emogi__item"> <span role="button">👞</span></li>
                      <li class="emogi__item"> <span role="button">👟</span></li>
                      <li class="emogi__item"> <span role="button">🥾</span></li>
                      <li class="emogi__item"> <span role="button">🥿</span></li>
                      <li class="emogi__item"> <span role="button">👠</span></li>
                      <li class="emogi__item"> <span role="button">👡</span></li>
                      <li class="emogi__item"> <span role="button">🩰</span></li>
                      <li class="emogi__item"> <span role="button">👢</span></li>
                      <li class="emogi__item"> <span role="button">👑</span></li>
                      <li class="emogi__item"> <span role="button">👒</span></li>
                      <li class="emogi__item"> <span role="button">🎩</span></li>
                      <li class="emogi__item"> <span role="button">🎓</span></li>
                      <li class="emogi__item"> <span role="button">🧢</span></li>
                      <li class="emogi__item"> <span role="button">⛑️</span></li>
                      <li class="emogi__item"> <span role="button">💄</span></li>
                      <li class="emogi__item"> <span role="button">💍</span></li>
                      <li class="emogi__item"> <span role="button">💼</span></li>
                      <li class="emogi__item"> <span role="button">🩸</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-02"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">🙈</span></li>
                      <li class="emogi__item"> <span role="button">🙉</span></li>
                      <li class="emogi__item"> <span role="button">🙊</span></li>
                      <li class="emogi__item"> <span role="button">🐵</span></li>
                      <li class="emogi__item"> <span role="button">🐒</span></li>
                      <li class="emogi__item"> <span role="button">🦍</span></li>
                      <li class="emogi__item"> <span role="button">🦧</span></li>
                      <li class="emogi__item"> <span role="button">🐶</span></li>
                      <li class="emogi__item"> <span role="button">🐕</span></li>
                      <li class="emogi__item"> <span role="button">🦮</span></li>
                      <li class="emogi__item"> <span role="button">🐕‍🦺</span></li>
                      <li class="emogi__item"> <span role="button">🐩</span></li>
                      <li class="emogi__item"> <span role="button">🐺</span></li>
                      <li class="emogi__item"> <span role="button">🦊</span></li>
                      <li class="emogi__item"> <span role="button">🦝</span></li>
                      <li class="emogi__item"> <span role="button">🐱</span></li>
                      <li class="emogi__item"> <span role="button">🐈</span></li>
                      <li class="emogi__item"> <span role="button">🦁</span></li>
                      <li class="emogi__item"> <span role="button">🐯</span></li>
                      <li class="emogi__item"> <span role="button">🐅</span></li>
                      <li class="emogi__item"> <span role="button">🐆</span></li>
                      <li class="emogi__item"> <span role="button">🐴</span></li>
                      <li class="emogi__item"> <span role="button">🐎</span></li>
                      <li class="emogi__item"> <span role="button">🦄</span></li>
                      <li class="emogi__item"> <span role="button">🦓</span></li>
                      <li class="emogi__item"> <span role="button">🦌</span></li>
                      <li class="emogi__item"> <span role="button">🐮</span></li>
                      <li class="emogi__item"> <span role="button">🐂</span></li>
                      <li class="emogi__item"> <span role="button">🐃</span></li>
                      <li class="emogi__item"> <span role="button">🐄</span></li>
                      <li class="emogi__item"> <span role="button">🐷</span></li>
                      <li class="emogi__item"> <span role="button">🐖</span></li>
                      <li class="emogi__item"> <span role="button">🐗</span></li>
                      <li class="emogi__item"> <span role="button">🐽</span></li>
                      <li class="emogi__item"> <span role="button">🐏</span></li>
                      <li class="emogi__item"> <span role="button">🐑</span></li>
                      <li class="emogi__item"> <span role="button">🐐</span></li>
                      <li class="emogi__item"> <span role="button">🐪</span></li>
                      <li class="emogi__item"> <span role="button">🐫</span></li>
                      <li class="emogi__item"> <span role="button">🦙</span></li>
                      <li class="emogi__item"> <span role="button">🦒</span></li>
                      <li class="emogi__item"> <span role="button">🐘</span></li>
                      <li class="emogi__item"> <span role="button">🦏</span></li>
                      <li class="emogi__item"> <span role="button">🦛</span></li>
                      <li class="emogi__item"> <span role="button">🐭</span></li>
                      <li class="emogi__item"> <span role="button">🐁</span></li>
                      <li class="emogi__item"> <span role="button">🐀</span></li>
                      <li class="emogi__item"> <span role="button">🐹</span></li>
                      <li class="emogi__item"> <span role="button">🐰</span></li>
                      <li class="emogi__item"> <span role="button">🐇</span></li>
                      <li class="emogi__item"> <span role="button">🐿️</span></li>
                      <li class="emogi__item"> <span role="button">🦔</span></li>
                      <li class="emogi__item"> <span role="button">🦇</span></li>
                      <li class="emogi__item"> <span role="button">🐻</span></li>
                      <li class="emogi__item"> <span role="button">🐨</span></li>
                      <li class="emogi__item"> <span role="button">🐼</span></li>
                      <li class="emogi__item"> <span role="button">🦥</span></li>
                      <li class="emogi__item"> <span role="button">🦦</span></li>
                      <li class="emogi__item"> <span role="button">🦨</span></li>
                      <li class="emogi__item"> <span role="button">🦘</span></li>
                      <li class="emogi__item"> <span role="button">🦡</span></li>
                      <li class="emogi__item"> <span role="button">🦃</span></li>
                      <li class="emogi__item"> <span role="button">🐔</span></li>
                      <li class="emogi__item"> <span role="button">🐓</span></li>
                      <li class="emogi__item"> <span role="button">🐣</span></li>
                      <li class="emogi__item"> <span role="button">🐤</span></li>
                      <li class="emogi__item"> <span role="button">🐥</span></li>
                      <li class="emogi__item"> <span role="button">🐦</span></li>
                      <li class="emogi__item"> <span role="button">🐧</span></li>
                      <li class="emogi__item"> <span role="button">🕊️</span></li>
                      <li class="emogi__item"> <span role="button">🦅</span></li>
                      <li class="emogi__item"> <span role="button">🦆</span></li>
                      <li class="emogi__item"> <span role="button">🦢</span></li>
                      <li class="emogi__item"> <span role="button">🦉</span></li>
                      <li class="emogi__item"> <span role="button">🦩</span></li>
                      <li class="emogi__item"> <span role="button">🦚</span></li>
                      <li class="emogi__item"> <span role="button">🦜</span></li>
                      <li class="emogi__item"> <span role="button">🐸</span></li>
                      <li class="emogi__item"> <span role="button">🐊</span></li>
                      <li class="emogi__item"> <span role="button">🐢</span></li>
                      <li class="emogi__item"> <span role="button">🦎</span></li>
                      <li class="emogi__item"> <span role="button">🐍</span></li>
                      <li class="emogi__item"> <span role="button">🐲</span></li>
                      <li class="emogi__item"> <span role="button">🐉</span></li>
                      <li class="emogi__item"> <span role="button">🦕</span></li>
                      <li class="emogi__item"> <span role="button">🦖</span></li>
                      <li class="emogi__item"> <span role="button">🐳</span></li>
                      <li class="emogi__item"> <span role="button">🐋</span></li>
                      <li class="emogi__item"> <span role="button">🐬</span></li>
                      <li class="emogi__item"> <span role="button">🐟</span></li>
                      <li class="emogi__item"> <span role="button">🐠</span></li>
                      <li class="emogi__item"> <span role="button">🐡</span></li>
                      <li class="emogi__item"> <span role="button">🦈</span></li>
                      <li class="emogi__item"> <span role="button">🐙</span></li>
                      <li class="emogi__item"> <span role="button">🐚</span></li>
                      <li class="emogi__item"> <span role="button">🐌</span></li>
                      <li class="emogi__item"> <span role="button">🦀</span></li>
                      <li class="emogi__item"> <span role="button">🦞</span></li>
                      <li class="emogi__item"> <span role="button">🦐</span></li>
                      <li class="emogi__item"> <span role="button">🦑</span></li>
                      <li class="emogi__item"> <span role="button">🦋</span></li>
                      <li class="emogi__item"> <span role="button">🐛</span></li>
                      <li class="emogi__item"> <span role="button">🐜</span></li>
                      <li class="emogi__item"> <span role="button">🐝</span></li>
                      <li class="emogi__item"> <span role="button">🐞</span></li>
                      <li class="emogi__item"> <span role="button">🦗</span></li>
                      <li class="emogi__item"> <span role="button">🕷️</span></li>
                      <li class="emogi__item"> <span role="button">🕸️</span></li>
                      <li class="emogi__item"> <span role="button">🦂</span></li>
                      <li class="emogi__item"> <span role="button">🦟</span></li>
                      <li class="emogi__item"> <span role="button">🦠</span></li>
                      <li class="emogi__item"> <span role="button">🐾</span></li>
                      <li class="emogi__item"> <span role="button">💐</span></li>
                      <li class="emogi__item"> <span role="button">🌸</span></li>
                      <li class="emogi__item"> <span role="button">💮</span></li>
                      <li class="emogi__item"> <span role="button">🏵️</span></li>
                      <li class="emogi__item"> <span role="button">🌹</span></li>
                      <li class="emogi__item"> <span role="button">🥀</span></li>
                      <li class="emogi__item"> <span role="button">🌺</span></li>
                      <li class="emogi__item"> <span role="button">🌻</span></li>
                      <li class="emogi__item"> <span role="button">🌼</span></li>
                      <li class="emogi__item"> <span role="button">🌷</span></li>
                      <li class="emogi__item"> <span role="button">🌱</span></li>
                      <li class="emogi__item"> <span role="button">🌲</span></li>
                      <li class="emogi__item"> <span role="button">🌳</span></li>
                      <li class="emogi__item"> <span role="button">🌴</span></li>
                      <li class="emogi__item"> <span role="button">🌵</span></li>
                      <li class="emogi__item"> <span role="button">🌾</span></li>
                      <li class="emogi__item"> <span role="button">🌿</span></li>
                      <li class="emogi__item"> <span role="button">☘️</span></li>
                      <li class="emogi__item"> <span role="button">🍀</span></li>
                      <li class="emogi__item"> <span role="button">🍁</span></li>
                      <li class="emogi__item"> <span role="button">🍂</span></li>
                      <li class="emogi__item"> <span role="button">🍃</span></li>
                      <li class="emogi__item"> <span role="button">🍄</span></li>
                      <li class="emogi__item"> <span role="button">🌰</span></li>
                      <li class="emogi__item"> <span role="button">🎄</span></li>
                      <li class="emogi__item"> <span role="button">🎋</span></li>
                      <li class="emogi__item"> <span role="button">🎍</span></li>
                      <li class="emogi__item"> <span role="button">🔥</span></li>
                      <li class="emogi__item"> <span role="button">💧</span></li>
                      <li class="emogi__item"> <span role="button">🌊</span></li>
                      <li class="emogi__item"> <span role="button">💦</span></li>
                      <li class="emogi__item"> <span role="button">💥</span></li>
                      <li class="emogi__item"> <span role="button">💨</span></li>
                      <li class="emogi__item"> <span role="button">☁️</span></li>
                      <li class="emogi__item"> <span role="button">⛅</span></li>
                      <li class="emogi__item"> <span role="button">⛈️</span></li>
                      <li class="emogi__item"> <span role="button">🌤️</span></li>
                      <li class="emogi__item"> <span role="button">🌥️</span></li>
                      <li class="emogi__item"> <span role="button">🌦️</span></li>
                      <li class="emogi__item"> <span role="button">🌧️</span></li>
                      <li class="emogi__item"> <span role="button">🌨️</span></li>
                      <li class="emogi__item"> <span role="button">🌩️</span></li>
                      <li class="emogi__item"> <span role="button">🌪️</span></li>
                      <li class="emogi__item"> <span role="button">🌫️</span></li>
                      <li class="emogi__item"> <span role="button">🌬️</span></li>
                      <li class="emogi__item"> <span role="button">🌈</span></li>
                      <li class="emogi__item"> <span role="button">☂️</span></li>
                      <li class="emogi__item"> <span role="button">☔</span></li>
                      <li class="emogi__item"> <span role="button">⚡</span></li>
                      <li class="emogi__item"> <span role="button">❄️</span></li>
                      <li class="emogi__item"> <span role="button">☃️</span></li>
                      <li class="emogi__item"> <span role="button">⛄</span></li>
                      <li class="emogi__item"> <span role="button">🌑</span></li>
                      <li class="emogi__item"> <span role="button">🌒</span></li>
                      <li class="emogi__item"> <span role="button">🌓</span></li>
                      <li class="emogi__item"> <span role="button">🌔</span></li>
                      <li class="emogi__item"> <span role="button">🌕</span></li>
                      <li class="emogi__item"> <span role="button">🌖</span></li>
                      <li class="emogi__item"> <span role="button">🌗</span></li>
                      <li class="emogi__item"> <span role="button">🌘</span></li>
                      <li class="emogi__item"> <span role="button">🌙</span></li>
                      <li class="emogi__item"> <span role="button">🌚</span></li>
                      <li class="emogi__item"> <span role="button">🌛</span></li>
                      <li class="emogi__item"> <span role="button">🌜</span></li>
                      <li class="emogi__item"> <span role="button">☀️</span></li>
                      <li class="emogi__item"> <span role="button">🌝</span></li>
                      <li class="emogi__item"> <span role="button">🌞</span></li>
                      <li class="emogi__item"> <span role="button">⭐</span></li>
                      <li class="emogi__item"> <span role="button">🌟</span></li>
                      <li class="emogi__item"> <span role="button">🌠</span></li>
                      <li class="emogi__item"> <span role="button">☄️</span></li>
                      <li class="emogi__item"> <span role="button">💫</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-03"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">🍇</span></li>
                      <li class="emogi__item"> <span role="button">🍈</span></li>
                      <li class="emogi__item"> <span role="button">🍉</span></li>
                      <li class="emogi__item"> <span role="button">🍊</span></li>
                      <li class="emogi__item"> <span role="button">🍋</span></li>
                      <li class="emogi__item"> <span role="button">🍌</span></li>
                      <li class="emogi__item"> <span role="button">🍍</span></li>
                      <li class="emogi__item"> <span role="button">🥭</span></li>
                      <li class="emogi__item"> <span role="button">🍎</span></li>
                      <li class="emogi__item"> <span role="button">🍏</span></li>
                      <li class="emogi__item"> <span role="button">🍐</span></li>
                      <li class="emogi__item"> <span role="button">🍑</span></li>
                      <li class="emogi__item"> <span role="button">🍒</span></li>
                      <li class="emogi__item"> <span role="button">🍓</span></li>
                      <li class="emogi__item"> <span role="button">🥝</span></li>
                      <li class="emogi__item"> <span role="button">🍅</span></li>
                      <li class="emogi__item"> <span role="button">🥥</span></li>
                      <li class="emogi__item"> <span role="button">🥑</span></li>
                      <li class="emogi__item"> <span role="button">🍆</span></li>
                      <li class="emogi__item"> <span role="button">🥔</span></li>
                      <li class="emogi__item"> <span role="button">🥕</span></li>
                      <li class="emogi__item"> <span role="button">🌽</span></li>
                      <li class="emogi__item"> <span role="button">🌶️</span></li>
                      <li class="emogi__item"> <span role="button">🥒</span></li>
                      <li class="emogi__item"> <span role="button">🥬</span></li>
                      <li class="emogi__item"> <span role="button">🥦</span></li>
                      <li class="emogi__item"> <span role="button">🧄</span></li>
                      <li class="emogi__item"> <span role="button">🧅</span></li>
                      <li class="emogi__item"> <span role="button">🍄</span></li>
                      <li class="emogi__item"> <span role="button">🥜</span></li>
                      <li class="emogi__item"> <span role="button">🌰</span></li>
                      <li class="emogi__item"> <span role="button">🍞</span></li>
                      <li class="emogi__item"> <span role="button">🥐</span></li>
                      <li class="emogi__item"> <span role="button">🥖</span></li>
                      <li class="emogi__item"> <span role="button">🥨</span></li>
                      <li class="emogi__item"> <span role="button">🥯</span></li>
                      <li class="emogi__item"> <span role="button">🥞</span></li>
                      <li class="emogi__item"> <span role="button">🧇</span></li>
                      <li class="emogi__item"> <span role="button">🧀</span></li>
                      <li class="emogi__item"> <span role="button">🍖</span></li>
                      <li class="emogi__item"> <span role="button">🍗</span></li>
                      <li class="emogi__item"> <span role="button">🥩</span></li>
                      <li class="emogi__item"> <span role="button">🥓</span></li>
                      <li class="emogi__item"> <span role="button">🍔</span></li>
                      <li class="emogi__item"> <span role="button">🍟</span></li>
                      <li class="emogi__item"> <span role="button">🍕</span></li>
                      <li class="emogi__item"> <span role="button">🌭</span></li>
                      <li class="emogi__item"> <span role="button">🥪</span></li>
                      <li class="emogi__item"> <span role="button">🌮</span></li>
                      <li class="emogi__item"> <span role="button">🌯</span></li>
                      <li class="emogi__item"> <span role="button">🥙</span></li>
                      <li class="emogi__item"> <span role="button">🧆</span></li>
                      <li class="emogi__item"> <span role="button">🥚</span></li>
                      <li class="emogi__item"> <span role="button">🍳</span></li>
                      <li class="emogi__item"> <span role="button">🥘</span></li>
                      <li class="emogi__item"> <span role="button">🍲</span></li>
                      <li class="emogi__item"> <span role="button">🥣</span></li>
                      <li class="emogi__item"> <span role="button">🥗</span></li>
                      <li class="emogi__item"> <span role="button">🍿</span></li>
                      <li class="emogi__item"> <span role="button">🧈</span></li>
                      <li class="emogi__item"> <span role="button">🧂</span></li>
                      <li class="emogi__item"> <span role="button">🥫</span></li>
                      <li class="emogi__item"> <span role="button">🍱</span></li>
                      <li class="emogi__item"> <span role="button">🍘</span></li>
                      <li class="emogi__item"> <span role="button">🍙</span></li>
                      <li class="emogi__item"> <span role="button">🍚</span></li>
                      <li class="emogi__item"> <span role="button">🍛</span></li>
                      <li class="emogi__item"> <span role="button">🍜</span></li>
                      <li class="emogi__item"> <span role="button">🍝</span></li>
                      <li class="emogi__item"> <span role="button">🍠</span></li>
                      <li class="emogi__item"> <span role="button">🍢</span></li>
                      <li class="emogi__item"> <span role="button">🍣</span></li>
                      <li class="emogi__item"> <span role="button">🍤</span></li>
                      <li class="emogi__item"> <span role="button">🍥</span></li>
                      <li class="emogi__item"> <span role="button">🥮</span></li>
                      <li class="emogi__item"> <span role="button">🍡</span></li>
                      <li class="emogi__item"> <span role="button">🥟</span></li>
                      <li class="emogi__item"> <span role="button">🥠</span></li>
                      <li class="emogi__item"> <span role="button">🥡</span></li>
                      <li class="emogi__item"> <span role="button">🦪</span></li>
                      <li class="emogi__item"> <span role="button">🍦</span></li>
                      <li class="emogi__item"> <span role="button">🍧</span></li>
                      <li class="emogi__item"> <span role="button">🍨</span></li>
                      <li class="emogi__item"> <span role="button">🍩</span></li>
                      <li class="emogi__item"> <span role="button">🍪</span></li>
                      <li class="emogi__item"> <span role="button">🎂</span></li>
                      <li class="emogi__item"> <span role="button">🍰</span></li>
                      <li class="emogi__item"> <span role="button">🧁</span></li>
                      <li class="emogi__item"> <span role="button">🥧</span></li>
                      <li class="emogi__item"> <span role="button">🍫</span></li>
                      <li class="emogi__item"> <span role="button">🍬</span></li>
                      <li class="emogi__item"> <span role="button">🍭</span></li>
                      <li class="emogi__item"> <span role="button">🍮</span></li>
                      <li class="emogi__item"> <span role="button">🍯</span></li>
                      <li class="emogi__item"> <span role="button">🍼</span></li>
                      <li class="emogi__item"> <span role="button">🥛</span></li>
                      <li class="emogi__item"> <span role="button">☕</span></li>
                      <li class="emogi__item"> <span role="button">🍵</span></li>
                      <li class="emogi__item"> <span role="button">🍶</span></li>
                      <li class="emogi__item"> <span role="button">🍾</span></li>
                      <li class="emogi__item"> <span role="button">🍷</span></li>
                      <li class="emogi__item"> <span role="button">🍸</span></li>
                      <li class="emogi__item"> <span role="button">🍹</span></li>
                      <li class="emogi__item"> <span role="button">🍺</span></li>
                      <li class="emogi__item"> <span role="button">🍻</span></li>
                      <li class="emogi__item"> <span role="button">🥂</span></li>
                      <li class="emogi__item"> <span role="button">🥃</span></li>
                      <li class="emogi__item"> <span role="button">🥤</span></li>
                      <li class="emogi__item"> <span role="button">🧃</span></li>
                      <li class="emogi__item"> <span role="button">🧉</span></li>
                      <li class="emogi__item"> <span role="button">🧊</span></li>
                      <li class="emogi__item"> <span role="button">🥢</span></li>
                      <li class="emogi__item"> <span role="button">🍽️</span></li>
                      <li class="emogi__item"> <span role="button">🍴</span></li>
                      <li class="emogi__item"> <span role="button">🥄</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-04"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">🕴️</span></li>
                      <li class="emogi__item"> <span role="button">🧗</span></li>
                      <li class="emogi__item"> <span role="button">🧗‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤺</span></li>
                      <li class="emogi__item"> <span role="button">🏇</span></li>
                      <li class="emogi__item"> <span role="button">⛷️</span></li>
                      <li class="emogi__item"> <span role="button">🏂</span></li>
                      <li class="emogi__item"> <span role="button">🏌️</span></li>
                      <li class="emogi__item"> <span role="button">🏌️‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🏄</span></li>
                      <li class="emogi__item"> <span role="button">🏄‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🚣</span></li>
                      <li class="emogi__item"> <span role="button">🚣‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🏊‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🏊‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">⛹️‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">⛹️‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🏋️</span></li>
                      <li class="emogi__item"> <span role="button">🏋️‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🚴‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🚴‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🚵‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🚵‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤸‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤸‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤼</span></li>
                      <li class="emogi__item"> <span role="button">🤼‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤽‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤽‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤾‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤾‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🤹‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🤹‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🧘‍♂️</span></li>
                      <li class="emogi__item"> <span role="button">🧘‍♀️</span></li>
                      <li class="emogi__item"> <span role="button">🎪</span></li>
                      <li class="emogi__item"> <span role="button">🛹</span></li>
                      <li class="emogi__item"> <span role="button">🛶</span></li>
                      <li class="emogi__item"> <span role="button">🎗️</span></li>
                      <li class="emogi__item"> <span role="button">🎟️</span></li>
                      <li class="emogi__item"> <span role="button">🎫</span></li>
                      <li class="emogi__item"> <span role="button">🎖️</span></li>
                      <li class="emogi__item"> <span role="button">🏆</span></li>
                      <li class="emogi__item"> <span role="button">🏅</span></li>
                      <li class="emogi__item"> <span role="button">🥇</span></li>
                      <li class="emogi__item"> <span role="button">🥈</span></li>
                      <li class="emogi__item"> <span role="button">🥉</span></li>
                      <li class="emogi__item"> <span role="button">⚽</span></li>
                      <li class="emogi__item"> <span role="button">⚾</span></li>
                      <li class="emogi__item"> <span role="button">🥎</span></li>
                      <li class="emogi__item"> <span role="button">🏀</span></li>
                      <li class="emogi__item"> <span role="button">🏐</span></li>
                      <li class="emogi__item"> <span role="button">🏈</span></li>
                      <li class="emogi__item"> <span role="button">🏉</span></li>
                      <li class="emogi__item"> <span role="button">🎾</span></li>
                      <li class="emogi__item"> <span role="button">🥏</span></li>
                      <li class="emogi__item"> <span role="button">🎳</span></li>
                      <li class="emogi__item"> <span role="button">🏏</span></li>
                      <li class="emogi__item"> <span role="button">🏑</span></li>
                      <li class="emogi__item"> <span role="button">🏒</span></li>
                      <li class="emogi__item"> <span role="button">🥍</span></li>
                      <li class="emogi__item"> <span role="button">🏓</span></li>
                      <li class="emogi__item"> <span role="button">🏸</span></li>
                      <li class="emogi__item"> <span role="button">🥊</span></li>
                      <li class="emogi__item"> <span role="button">🥋</span></li>
                      <li class="emogi__item"> <span role="button">🥅</span></li>
                      <li class="emogi__item"> <span role="button">⛳</span></li>
                      <li class="emogi__item"> <span role="button">⛸️</span></li>
                      <li class="emogi__item"> <span role="button">🎣</span></li>
                      <li class="emogi__item"> <span role="button">🎽</span></li>
                      <li class="emogi__item"> <span role="button">🎿</span></li>
                      <li class="emogi__item"> <span role="button">🛷</span></li>
                      <li class="emogi__item"> <span role="button">🥌</span></li>
                      <li class="emogi__item"> <span role="button">🎯</span></li>
                      <li class="emogi__item"> <span role="button">🎱</span></li>
                      <li class="emogi__item"> <span role="button">🎮</span></li>
                      <li class="emogi__item"> <span role="button">🎰</span></li>
                      <li class="emogi__item"> <span role="button">🎲</span></li>
                      <li class="emogi__item"> <span role="button">🧩</span></li>
                      <li class="emogi__item"> <span role="button">♟️</span></li>
                      <li class="emogi__item"> <span role="button">🎭</span></li>
                      <li class="emogi__item"> <span role="button">🎨</span></li>
                      <li class="emogi__item"> <span role="button">🧵</span></li>
                      <li class="emogi__item"> <span role="button">🧶</span></li>
                      <li class="emogi__item"> <span role="button">🎼</span></li>
                      <li class="emogi__item"> <span role="button">🎤</span></li>
                      <li class="emogi__item"> <span role="button">🎧</span></li>
                      <li class="emogi__item"> <span role="button">🎷</span></li>
                      <li class="emogi__item"> <span role="button">🎸</span></li>
                      <li class="emogi__item"> <span role="button">🎹</span></li>
                      <li class="emogi__item"> <span role="button">🎺</span></li>
                      <li class="emogi__item"> <span role="button">🎻</span></li>
                      <li class="emogi__item"> <span role="button">🥁</span></li>
                      <li class="emogi__item"> <span role="button">🎬</span></li>
                      <li class="emogi__item"> <span role="button">🏹</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-05"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">🚣</span></li>
                      <li class="emogi__item"> <span role="button">🗾</span></li>
                      <li class="emogi__item"> <span role="button">🏔️</span></li>
                      <li class="emogi__item"> <span role="button">⛰️</span></li>
                      <li class="emogi__item"> <span role="button">🌋</span></li>
                      <li class="emogi__item"> <span role="button">🗻</span></li>
                      <li class="emogi__item"> <span role="button">🏕️</span></li>
                      <li class="emogi__item"> <span role="button">🏖️</span></li>
                      <li class="emogi__item"> <span role="button">🏜️</span></li>
                      <li class="emogi__item"> <span role="button">🏝️</span></li>
                      <li class="emogi__item"> <span role="button">🏞️</span></li>
                      <li class="emogi__item"> <span role="button">🏟️</span></li>
                      <li class="emogi__item"> <span role="button">🏛️</span></li>
                      <li class="emogi__item"> <span role="button">🏗️</span></li>
                      <li class="emogi__item"> <span role="button">🏘️</span></li>
                      <li class="emogi__item"> <span role="button">🏚️</span></li>
                      <li class="emogi__item"> <span role="button">🏠</span></li>
                      <li class="emogi__item"> <span role="button">🏡</span></li>
                      <li class="emogi__item"> <span role="button">🏢</span></li>
                      <li class="emogi__item"> <span role="button">🏣</span></li>
                      <li class="emogi__item"> <span role="button">🏤</span></li>
                      <li class="emogi__item"> <span role="button">🏥</span></li>
                      <li class="emogi__item"> <span role="button">🏦</span></li>
                      <li class="emogi__item"> <span role="button">🏨</span></li>
                      <li class="emogi__item"> <span role="button">🏩</span></li>
                      <li class="emogi__item"> <span role="button">🏪</span></li>
                      <li class="emogi__item"> <span role="button">🏫</span></li>
                      <li class="emogi__item"> <span role="button">🏬</span></li>
                      <li class="emogi__item"> <span role="button">🏭</span></li>
                      <li class="emogi__item"> <span role="button">🏯</span></li>
                      <li class="emogi__item"> <span role="button">🏰</span></li>
                      <li class="emogi__item"> <span role="button">💒</span></li>
                      <li class="emogi__item"> <span role="button">🗼</span></li>
                      <li class="emogi__item"> <span role="button">🗽</span></li>
                      <li class="emogi__item"> <span role="button">⛪</span></li>
                      <li class="emogi__item"> <span role="button">🕌</span></li>
                      <li class="emogi__item"> <span role="button">🛕</span></li>
                      <li class="emogi__item"> <span role="button">🕍</span></li>
                      <li class="emogi__item"> <span role="button">⛩️</span></li>
                      <li class="emogi__item"> <span role="button">🕋</span></li>
                      <li class="emogi__item"> <span role="button">⛲</span></li>
                      <li class="emogi__item"> <span role="button">⛺</span></li>
                      <li class="emogi__item"> <span role="button">🌁</span></li>
                      <li class="emogi__item"> <span role="button">🌃</span></li>
                      <li class="emogi__item"> <span role="button">🏙️</span></li>
                      <li class="emogi__item"> <span role="button">🌄</span></li>
                      <li class="emogi__item"> <span role="button">🌅</span></li>
                      <li class="emogi__item"> <span role="button">🌆</span></li>
                      <li class="emogi__item"> <span role="button">🌇</span></li>
                      <li class="emogi__item"> <span role="button">🌉</span></li>
                      <li class="emogi__item"> <span role="button">🎠</span></li>
                      <li class="emogi__item"> <span role="button">🎡</span></li>
                      <li class="emogi__item"> <span role="button">🎢</span></li>
                      <li class="emogi__item"> <span role="button">🚂</span></li>
                      <li class="emogi__item"> <span role="button">🚃</span></li>
                      <li class="emogi__item"> <span role="button">🚄</span></li>
                      <li class="emogi__item"> <span role="button">🚅</span></li>
                      <li class="emogi__item"> <span role="button">🚆</span></li>
                      <li class="emogi__item"> <span role="button">🚇</span></li>
                      <li class="emogi__item"> <span role="button">🚈</span></li>
                      <li class="emogi__item"> <span role="button">🚉</span></li>
                      <li class="emogi__item"> <span role="button">🚊</span></li>
                      <li class="emogi__item"> <span role="button">🚝</span></li>
                      <li class="emogi__item"> <span role="button">🚞</span></li>
                      <li class="emogi__item"> <span role="button">🚋</span></li>
                      <li class="emogi__item"> <span role="button">🚌</span></li>
                      <li class="emogi__item"> <span role="button">🚍</span></li>
                      <li class="emogi__item"> <span role="button">🚎</span></li>
                      <li class="emogi__item"> <span role="button">🚐</span></li>
                      <li class="emogi__item"> <span role="button">🚑</span></li>
                      <li class="emogi__item"> <span role="button">🚒</span></li>
                      <li class="emogi__item"> <span role="button">🚓</span></li>
                      <li class="emogi__item"> <span role="button">🚔</span></li>
                      <li class="emogi__item"> <span role="button">🚕</span></li>
                      <li class="emogi__item"> <span role="button">🚖</span></li>
                      <li class="emogi__item"> <span role="button">🚗</span></li>
                      <li class="emogi__item"> <span role="button">🚘</span></li>
                      <li class="emogi__item"> <span role="button">🚙</span></li>
                      <li class="emogi__item"> <span role="button">🚚</span></li>
                      <li class="emogi__item"> <span role="button">🚛</span></li>
                      <li class="emogi__item"> <span role="button">🚜</span></li>
                      <li class="emogi__item"> <span role="button">🏎️</span></li>
                      <li class="emogi__item"> <span role="button">🏍️</span></li>
                      <li class="emogi__item"> <span role="button">🛵</span></li>
                      <li class="emogi__item"> <span role="button">🛺</span></li>
                      <li class="emogi__item"> <span role="button">🚲</span></li>
                      <li class="emogi__item"> <span role="button">🛴</span></li>
                      <li class="emogi__item"> <span role="button">🚏</span></li>
                      <li class="emogi__item"> <span role="button">🛣️</span></li>
                      <li class="emogi__item"> <span role="button">🛤️</span></li>
                      <li class="emogi__item"> <span role="button">⛽</span></li>
                      <li class="emogi__item"> <span role="button">🚨</span></li>
                      <li class="emogi__item"> <span role="button">🚥</span></li>
                      <li class="emogi__item"> <span role="button">🚦</span></li>
                      <li class="emogi__item"> <span role="button">🚧</span></li>
                      <li class="emogi__item"> <span role="button">⚓</span></li>
                      <li class="emogi__item"> <span role="button">⛵</span></li>
                      <li class="emogi__item"> <span role="button">🚤</span></li>
                      <li class="emogi__item"> <span role="button">🛳️</span></li>
                      <li class="emogi__item"> <span role="button">⛴️</span></li>
                      <li class="emogi__item"> <span role="button">🛥️</span></li>
                      <li class="emogi__item"> <span role="button">🚢</span></li>
                      <li class="emogi__item"> <span role="button">✈️</span></li>
                      <li class="emogi__item"> <span role="button">🛩️</span></li>
                      <li class="emogi__item"> <span role="button">🛫</span></li>
                      <li class="emogi__item"> <span role="button">🛬</span></li>
                      <li class="emogi__item"> <span role="button">🪂</span></li>
                      <li class="emogi__item"> <span role="button">💺</span></li>
                      <li class="emogi__item"> <span role="button">🚁</span></li>
                      <li class="emogi__item"> <span role="button">🚟</span></li>
                      <li class="emogi__item"> <span role="button">🚠</span></li>
                      <li class="emogi__item"> <span role="button">🚡</span></li>
                      <li class="emogi__item"> <span role="button">🛰️</span></li>
                      <li class="emogi__item"> <span role="button">🚀</span></li>
                      <li class="emogi__item"> <span role="button">🛸</span></li>
                      <li class="emogi__item"> <span role="button">🪐</span></li>
                      <li class="emogi__item"> <span role="button">🌠</span></li>
                      <li class="emogi__item"> <span role="button">🌌</span></li>
                      <li class="emogi__item"> <span role="button">⛱️</span></li>
                      <li class="emogi__item"> <span role="button">🎆</span></li>
                      <li class="emogi__item"> <span role="button">🎇</span></li>
                      <li class="emogi__item"> <span role="button">🎑</span></li>
                      <li class="emogi__item"> <span role="button">💴</span></li>
                      <li class="emogi__item"> <span role="button">💵</span></li>
                      <li class="emogi__item"> <span role="button">💶</span></li>
                      <li class="emogi__item"> <span role="button">💷</span></li>
                      <li class="emogi__item"> <span role="button">🗿</span></li>
                      <li class="emogi__item"> <span role="button">🛂</span></li>
                      <li class="emogi__item"> <span role="button">🛃</span></li>
                      <li class="emogi__item"> <span role="button">🛄</span></li>
                      <li class="emogi__item"> <span role="button">🛅</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-06"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">💌</span></li>
                      <li class="emogi__item"> <span role="button">🕳️</span></li>
                      <li class="emogi__item"> <span role="button">💣</span></li>
                      <li class="emogi__item"> <span role="button">🛀</span></li>
                      <li class="emogi__item"> <span role="button">🛌</span></li>
                      <li class="emogi__item"> <span role="button">🔪</span></li>
                      <li class="emogi__item"> <span role="button">🏺</span></li>
                      <li class="emogi__item"> <span role="button">🗺️</span></li>
                      <li class="emogi__item"> <span role="button">🧭</span></li>
                      <li class="emogi__item"> <span role="button">🧱</span></li>
                      <li class="emogi__item"> <span role="button">💈</span></li>
                      <li class="emogi__item"> <span role="button">🦽</span></li>
                      <li class="emogi__item"> <span role="button">🦼</span></li>
                      <li class="emogi__item"> <span role="button">🛢️</span></li>
                      <li class="emogi__item"> <span role="button">🛎️</span></li>
                      <li class="emogi__item"> <span role="button">🧳</span></li>
                      <li class="emogi__item"> <span role="button">⌛</span></li>
                      <li class="emogi__item"> <span role="button">⏳</span></li>
                      <li class="emogi__item"> <span role="button">⌚</span></li>
                      <li class="emogi__item"> <span role="button">⏰</span></li>
                      <li class="emogi__item"> <span role="button">⏱️</span></li>
                      <li class="emogi__item"> <span role="button">⏲️</span></li>
                      <li class="emogi__item"> <span role="button">🕰️</span></li>
                      <li class="emogi__item"> <span role="button">🌡️</span></li>
                      <li class="emogi__item"> <span role="button">⛱️</span></li>
                      <li class="emogi__item"> <span role="button">🧨</span></li>
                      <li class="emogi__item"> <span role="button">🎈</span></li>
                      <li class="emogi__item"> <span role="button">🎉</span></li>
                      <li class="emogi__item"> <span role="button">🎊</span></li>
                      <li class="emogi__item"> <span role="button">🎎</span></li>
                      <li class="emogi__item"> <span role="button">🎏</span></li>
                      <li class="emogi__item"> <span role="button">🎐</span></li>
                      <li class="emogi__item"> <span role="button">🧧</span></li>
                      <li class="emogi__item"> <span role="button">🎀</span></li>
                      <li class="emogi__item"> <span role="button">🎁</span></li>
                      <li class="emogi__item"> <span role="button">🤿</span></li>
                      <li class="emogi__item"> <span role="button">🪀</span></li>
                      <li class="emogi__item"> <span role="button">🪁</span></li>
                      <li class="emogi__item"> <span role="button">🔮</span></li>
                      <li class="emogi__item"> <span role="button">🧿</span></li>
                      <li class="emogi__item"> <span role="button">🕹️</span></li>
                      <li class="emogi__item"> <span role="button">🧸</span></li>
                      <li class="emogi__item"> <span role="button">🖼️</span></li>
                      <li class="emogi__item"> <span role="button">🧵</span></li>
                      <li class="emogi__item"> <span role="button">🧶</span></li>
                      <li class="emogi__item"> <span role="button">🛍️</span></li>
                      <li class="emogi__item"> <span role="button">📿</span></li>
                      <li class="emogi__item"> <span role="button">💎</span></li>
                      <li class="emogi__item"> <span role="button">📯</span></li>
                      <li class="emogi__item"> <span role="button">🎙️</span></li>
                      <li class="emogi__item"> <span role="button">🎚️</span></li>
                      <li class="emogi__item"> <span role="button">🎛️</span></li>
                      <li class="emogi__item"> <span role="button">📻</span></li>
                      <li class="emogi__item"> <span role="button">🪕</span></li>
                      <li class="emogi__item"> <span role="button">📱</span></li>
                      <li class="emogi__item"> <span role="button">📲</span></li>
                      <li class="emogi__item"> <span role="button">☎️</span></li>
                      <li class="emogi__item"> <span role="button">📞</span></li>
                      <li class="emogi__item"> <span role="button">📟</span></li>
                      <li class="emogi__item"> <span role="button">📠</span></li>
                      <li class="emogi__item"> <span role="button">🔋</span></li>
                      <li class="emogi__item"> <span role="button">🔌</span></li>
                      <li class="emogi__item"> <span role="button">💻</span></li>
                      <li class="emogi__item"> <span role="button">🖥️</span></li>
                      <li class="emogi__item"> <span role="button">🖨️</span></li>
                      <li class="emogi__item"> <span role="button">⌨️</span></li>
                      <li class="emogi__item"> <span role="button">🖱️</span></li>
                      <li class="emogi__item"> <span role="button">🖲️</span></li>
                      <li class="emogi__item"> <span role="button">💽</span></li>
                      <li class="emogi__item"> <span role="button">💾</span></li>
                      <li class="emogi__item"> <span role="button">💿</span></li>
                      <li class="emogi__item"> <span role="button">📀</span></li>
                      <li class="emogi__item"> <span role="button">🧮</span></li>
                      <li class="emogi__item"> <span role="button">🎥</span></li>
                      <li class="emogi__item"> <span role="button">🎞️</span></li>
                      <li class="emogi__item"> <span role="button">📽️</span></li>
                      <li class="emogi__item"> <span role="button">📺</span></li>
                      <li class="emogi__item"> <span role="button">📷</span></li>
                      <li class="emogi__item"> <span role="button">📸</span></li>
                      <li class="emogi__item"> <span role="button">📹</span></li>
                      <li class="emogi__item"> <span role="button">📼</span></li>
                      <li class="emogi__item"> <span role="button">🔍</span></li>
                      <li class="emogi__item"> <span role="button">🔎</span></li>
                      <li class="emogi__item"> <span role="button">🕯️</span></li>
                      <li class="emogi__item"> <span role="button">💡</span></li>
                      <li class="emogi__item"> <span role="button">🔦</span></li>
                      <li class="emogi__item"> <span role="button">🏮</span></li>
                      <li class="emogi__item"> <span role="button">🪔</span></li>
                      <li class="emogi__item"> <span role="button">📔</span></li>
                      <li class="emogi__item"> <span role="button">📕</span></li>
                      <li class="emogi__item"> <span role="button">📖</span></li>
                      <li class="emogi__item"> <span role="button">📗</span></li>
                      <li class="emogi__item"> <span role="button">📘</span></li>
                      <li class="emogi__item"> <span role="button">📙</span></li>
                      <li class="emogi__item"> <span role="button">📚</span></li>
                      <li class="emogi__item"> <span role="button">📓</span></li>
                      <li class="emogi__item"> <span role="button">📒</span></li>
                      <li class="emogi__item"> <span role="button">📃</span></li>
                      <li class="emogi__item"> <span role="button">📜</span></li>
                      <li class="emogi__item"> <span role="button">📄</span></li>
                      <li class="emogi__item"> <span role="button">📰</span></li>
                      <li class="emogi__item"> <span role="button">🗞️</span></li>
                      <li class="emogi__item"> <span role="button">📑</span></li>
                      <li class="emogi__item"> <span role="button">🔖</span></li>
                      <li class="emogi__item"> <span role="button">🏷️</span></li>
                      <li class="emogi__item"> <span role="button">💰</span></li>
                      <li class="emogi__item"> <span role="button">💴</span></li>
                      <li class="emogi__item"> <span role="button">💵</span></li>
                      <li class="emogi__item"> <span role="button">💶</span></li>
                      <li class="emogi__item"> <span role="button">💷</span></li>
                      <li class="emogi__item"> <span role="button">💸</span></li>
                      <li class="emogi__item"> <span role="button">💳</span></li>
                      <li class="emogi__item"> <span role="button">🧾</span></li>
                      <li class="emogi__item"> <span role="button">✉️</span></li>
                      <li class="emogi__item"> <span role="button">📧</span></li>
                      <li class="emogi__item"> <span role="button">📨</span></li>
                      <li class="emogi__item"> <span role="button">📩</span></li>
                      <li class="emogi__item"> <span role="button">📤</span></li>
                      <li class="emogi__item"> <span role="button">📥</span></li>
                      <li class="emogi__item"> <span role="button">📦</span></li>
                      <li class="emogi__item"> <span role="button">📫</span></li>
                      <li class="emogi__item"> <span role="button">📪</span></li>
                      <li class="emogi__item"> <span role="button">📬</span></li>
                      <li class="emogi__item"> <span role="button">📭</span></li>
                      <li class="emogi__item"> <span role="button">📮</span></li>
                      <li class="emogi__item"> <span role="button">🗳️</span></li>
                      <li class="emogi__item"> <span role="button">✏️</span></li>
                      <li class="emogi__item"> <span role="button">✒️</span></li>
                      <li class="emogi__item"> <span role="button">🖋️</span></li>
                      <li class="emogi__item"> <span role="button">🖊️</span></li>
                      <li class="emogi__item"> <span role="button">🖌️</span></li>
                      <li class="emogi__item"> <span role="button">🖍️</span></li>
                      <li class="emogi__item"> <span role="button">📝</span></li>
                      <li class="emogi__item"> <span role="button">📁</span></li>
                      <li class="emogi__item"> <span role="button">📂</span></li>
                      <li class="emogi__item"> <span role="button">🗂️</span></li>
                      <li class="emogi__item"> <span role="button">📅</span></li>
                      <li class="emogi__item"> <span role="button">📆</span></li>
                      <li class="emogi__item"> <span role="button">🗒️</span></li>
                      <li class="emogi__item"> <span role="button">🗓️</span></li>
                      <li class="emogi__item"> <span role="button">📇</span></li>
                      <li class="emogi__item"> <span role="button">📈</span></li>
                      <li class="emogi__item"> <span role="button">📉</span></li>
                      <li class="emogi__item"> <span role="button">📊</span></li>
                      <li class="emogi__item"> <span role="button">📋</span></li>
                      <li class="emogi__item"> <span role="button">📌</span></li>
                      <li class="emogi__item"> <span role="button">📍</span></li>
                      <li class="emogi__item"> <span role="button">📎</span></li>
                      <li class="emogi__item"> <span role="button">🖇️</span></li>
                      <li class="emogi__item"> <span role="button">📏</span></li>
                      <li class="emogi__item"> <span role="button">📐</span></li>
                      <li class="emogi__item"> <span role="button">✂️</span></li>
                      <li class="emogi__item"> <span role="button">🗃️</span></li>
                      <li class="emogi__item"> <span role="button">🗄️</span></li>
                      <li class="emogi__item"> <span role="button">🗑️</span></li>
                      <li class="emogi__item"> <span role="button">🔒</span></li>
                      <li class="emogi__item"> <span role="button">🔓</span></li>
                      <li class="emogi__item"> <span role="button">🔏</span></li>
                      <li class="emogi__item"> <span role="button">🔐</span></li>
                      <li class="emogi__item"> <span role="button">🔑</span></li>
                      <li class="emogi__item"> <span role="button">🗝️</span></li>
                      <li class="emogi__item"> <span role="button">🔨</span></li>
                      <li class="emogi__item"> <span role="button">🪓</span></li>
                      <li class="emogi__item"> <span role="button">⛏️</span></li>
                      <li class="emogi__item"> <span role="button">⚒️</span></li>
                      <li class="emogi__item"> <span role="button">🛠️</span></li>
                      <li class="emogi__item"> <span role="button">🗡️</span></li>
                      <li class="emogi__item"> <span role="button">⚔️</span></li>
                      <li class="emogi__item"> <span role="button">🔫</span></li>
                      <li class="emogi__item"> <span role="button">🛡️</span></li>
                      <li class="emogi__item"> <span role="button">🔧</span></li>
                      <li class="emogi__item"> <span role="button">🔩</span></li>
                      <li class="emogi__item"> <span role="button">⚙️</span></li>
                      <li class="emogi__item"> <span role="button">🗜️</span></li>
                      <li class="emogi__item"> <span role="button">⚖️</span></li>
                      <li class="emogi__item"> <span role="button">🦯</span></li>
                      <li class="emogi__item"> <span role="button">🔗</span></li>
                      <li class="emogi__item"> <span role="button">⛓️</span></li>
                      <li class="emogi__item"> <span role="button">🧰</span></li>
                      <li class="emogi__item"> <span role="button">🧲</span></li>
                      <li class="emogi__item"> <span role="button">⚗️</span></li>
                      <li class="emogi__item"> <span role="button">🧪</span></li>
                      <li class="emogi__item"> <span role="button">🧫</span></li>
                      <li class="emogi__item"> <span role="button">🧬</span></li>
                      <li class="emogi__item"> <span role="button">🔬</span></li>
                      <li class="emogi__item"> <span role="button">🔭</span></li>
                      <li class="emogi__item"> <span role="button">📡</span></li>
                      <li class="emogi__item"> <span role="button">💉</span></li>
                      <li class="emogi__item"> <span role="button">🩸</span></li>
                      <li class="emogi__item"> <span role="button">💊</span></li>
                      <li class="emogi__item"> <span role="button">🩹</span></li>
                      <li class="emogi__item"> <span role="button">🩺</span></li>
                      <li class="emogi__item"> <span role="button">🚪</span></li>
                      <li class="emogi__item"> <span role="button">🛏️</span></li>
                      <li class="emogi__item"> <span role="button">🛋️</span></li>
                      <li class="emogi__item"> <span role="button">🪑</span></li>
                      <li class="emogi__item"> <span role="button">🚽</span></li>
                      <li class="emogi__item"> <span role="button">🚿</span></li>
                      <li class="emogi__item"> <span role="button">🛁</span></li>
                      <li class="emogi__item"> <span role="button">🪒</span></li>
                      <li class="emogi__item"> <span role="button">🧴</span></li>
                      <li class="emogi__item"> <span role="button">🧷</span></li>
                      <li class="emogi__item"> <span role="button">🧹</span></li>
                      <li class="emogi__item"> <span role="button">🧺</span></li>
                      <li class="emogi__item"> <span role="button">🧻</span></li>
                      <li class="emogi__item"> <span role="button">🧼</span></li>
                      <li class="emogi__item"> <span role="button">🧽</span></li>
                      <li class="emogi__item"> <span role="button">🧯</span></li>
                      <li class="emogi__item"> <span role="button">🛒</span></li>
                      <li class="emogi__item"> <span role="button">🚬</span></li>
                      <li class="emogi__item"> <span role="button">⚰️</span></li>
                      <li class="emogi__item"> <span role="button">⚱️</span></li>
                      <li class="emogi__item"> <span role="button">🗿</span></li>
                      <li class="emogi__item"> <span role="button">🚰</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-07"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">💘</span></li>
                      <li class="emogi__item"> <span role="button">💝</span></li>
                      <li class="emogi__item"> <span role="button">💖</span></li>
                      <li class="emogi__item"> <span role="button">💗</span></li>
                      <li class="emogi__item"> <span role="button">💓</span></li>
                      <li class="emogi__item"> <span role="button">💞</span></li>
                      <li class="emogi__item"> <span role="button">💕</span></li>
                      <li class="emogi__item"> <span role="button">💟</span></li>
                      <li class="emogi__item"> <span role="button">❣️</span></li>
                      <li class="emogi__item"> <span role="button">💔</span></li>
                      <li class="emogi__item"> <span role="button">❤️</span></li>
                      <li class="emogi__item"> <span role="button">🧡</span></li>
                      <li class="emogi__item"> <span role="button">💛</span></li>
                      <li class="emogi__item"> <span role="button">💚</span></li>
                      <li class="emogi__item"> <span role="button">💙</span></li>
                      <li class="emogi__item"> <span role="button">💜</span></li>
                      <li class="emogi__item"> <span role="button">🤎</span></li>
                      <li class="emogi__item"> <span role="button">🖤</span></li>
                      <li class="emogi__item"> <span role="button">🤍</span></li>
                      <li class="emogi__item"> <span role="button">💯</span></li>
                      <li class="emogi__item"> <span role="button">💢</span></li>
                      <li class="emogi__item"> <span role="button">💬</span></li>
                      <li class="emogi__item"> <span role="button">👁️‍🗨️</span></li>
                      <li class="emogi__item"> <span role="button">🗨️</span></li>
                      <li class="emogi__item"> <span role="button">🗯️</span></li>
                      <li class="emogi__item"> <span role="button">💭</span></li>
                      <li class="emogi__item"> <span role="button">💤</span></li>
                      <li class="emogi__item"> <span role="button">💮</span></li>
                      <li class="emogi__item"> <span role="button">♨️</span></li>
                      <li class="emogi__item"> <span role="button">💈</span></li>
                      <li class="emogi__item"> <span role="button">🛑</span></li>
                      <li class="emogi__item"> <span role="button">🕛</span></li>
                      <li class="emogi__item"> <span role="button">🕧</span></li>
                      <li class="emogi__item"> <span role="button">🕐</span></li>
                      <li class="emogi__item"> <span role="button">🕜</span></li>
                      <li class="emogi__item"> <span role="button">🕑</span></li>
                      <li class="emogi__item"> <span role="button">🕝</span></li>
                      <li class="emogi__item"> <span role="button">🕒</span></li>
                      <li class="emogi__item"> <span role="button">🕞</span></li>
                      <li class="emogi__item"> <span role="button">🕓</span></li>
                      <li class="emogi__item"> <span role="button">🕟</span></li>
                      <li class="emogi__item"> <span role="button">🕔</span></li>
                      <li class="emogi__item"> <span role="button">🕠</span></li>
                      <li class="emogi__item"> <span role="button">🕕</span></li>
                      <li class="emogi__item"> <span role="button">🕡</span></li>
                      <li class="emogi__item"> <span role="button">🕖</span></li>
                      <li class="emogi__item"> <span role="button">🕢</span></li>
                      <li class="emogi__item"> <span role="button">🕗</span></li>
                      <li class="emogi__item"> <span role="button">🕣</span></li>
                      <li class="emogi__item"> <span role="button">🕘</span></li>
                      <li class="emogi__item"> <span role="button">🕤</span></li>
                      <li class="emogi__item"> <span role="button">🕙</span></li>
                      <li class="emogi__item"> <span role="button">🕥</span></li>
                      <li class="emogi__item"> <span role="button">🕚</span></li>
                      <li class="emogi__item"> <span role="button">🕦</span></li>
                      <li class="emogi__item"> <span role="button">🌀</span></li>
                      <li class="emogi__item"> <span role="button">🃏</span></li>
                      <li class="emogi__item"> <span role="button">🀄</span></li>
                      <li class="emogi__item"> <span role="button">🎴</span></li>
                      <li class="emogi__item"> <span role="button">🔇</span></li>
                      <li class="emogi__item"> <span role="button">🔈</span></li>
                      <li class="emogi__item"> <span role="button">🔉</span></li>
                      <li class="emogi__item"> <span role="button">🔊</span></li>
                      <li class="emogi__item"> <span role="button">📢</span></li>
                      <li class="emogi__item"> <span role="button">📣</span></li>
                      <li class="emogi__item"> <span role="button">📯</span></li>
                      <li class="emogi__item"> <span role="button">🔔</span></li>
                      <li class="emogi__item"> <span role="button">🔕</span></li>
                      <li class="emogi__item"> <span role="button">🎵</span></li>
                      <li class="emogi__item"> <span role="button">🎶</span></li>
                      <li class="emogi__item"> <span role="button">💹</span></li>
                      <li class="emogi__item"> <span role="button">🏧</span></li>
                      <li class="emogi__item"> <span role="button">🚮</span></li>
                      <li class="emogi__item"> <span role="button">🚰</span></li>
                      <li class="emogi__item"> <span role="button">♿</span></li>
                      <li class="emogi__item"> <span role="button">🚹</span></li>
                      <li class="emogi__item"> <span role="button">🚺</span></li>
                      <li class="emogi__item"> <span role="button">🚻</span></li>
                      <li class="emogi__item"> <span role="button">🚼</span></li>
                      <li class="emogi__item"> <span role="button">🚾</span></li>
                      <li class="emogi__item"> <span role="button">⚠️</span></li>
                      <li class="emogi__item"> <span role="button">🚸</span></li>
                      <li class="emogi__item"> <span role="button">⛔</span></li>
                      <li class="emogi__item"> <span role="button">🚫</span></li>
                      <li class="emogi__item"> <span role="button">🚳</span></li>
                      <li class="emogi__item"> <span role="button">🚭</span></li>
                      <li class="emogi__item"> <span role="button">🚯</span></li>
                      <li class="emogi__item"> <span role="button">🚱</span></li>
                      <li class="emogi__item"> <span role="button">🚷</span></li>
                      <li class="emogi__item"> <span role="button">📵</span></li>
                      <li class="emogi__item"> <span role="button">🔞</span></li>
                      <li class="emogi__item"> <span role="button">☢️</span></li>
                      <li class="emogi__item"> <span role="button">☣️</span></li>
                      <li class="emogi__item"> <span role="button">⬆️</span></li>
                      <li class="emogi__item"> <span role="button">↗️</span></li>
                      <li class="emogi__item"> <span role="button">➡️</span></li>
                      <li class="emogi__item"> <span role="button">↘️</span></li>
                      <li class="emogi__item"> <span role="button">⬇️</span></li>
                      <li class="emogi__item"> <span role="button">↙️</span></li>
                      <li class="emogi__item"> <span role="button">⬅️</span></li>
                      <li class="emogi__item"> <span role="button">↖️</span></li>
                      <li class="emogi__item"> <span role="button">↩️</span></li>
                      <li class="emogi__item"> <span role="button">↪️</span></li>
                      <li class="emogi__item"> <span role="button">⤴️</span></li>
                      <li class="emogi__item"> <span role="button">⤵️</span></li>
                      <li class="emogi__item"> <span role="button">🔃</span></li>
                      <li class="emogi__item"> <span role="button">🔄</span></li>
                      <li class="emogi__item"> <span role="button">🔙</span></li>
                      <li class="emogi__item"> <span role="button">🔚</span></li>
                      <li class="emogi__item"> <span role="button">🔛</span></li>
                      <li class="emogi__item"> <span role="button">🔜</span></li>
                      <li class="emogi__item"> <span role="button">🔝</span></li>
                      <li class="emogi__item"> <span role="button">🛐</span></li>
                      <li class="emogi__item"> <span role="button">⚛️</span></li>
                      <li class="emogi__item"> <span role="button">🕉️</span></li>
                      <li class="emogi__item"> <span role="button">✡️</span></li>
                      <li class="emogi__item"> <span role="button">☸️</span></li>
                      <li class="emogi__item"> <span role="button">☯️</span></li>
                      <li class="emogi__item"> <span role="button">✝️</span></li>
                      <li class="emogi__item"> <span role="button">☦️</span></li>
                      <li class="emogi__item"> <span role="button">☪️</span></li>
                      <li class="emogi__item"> <span role="button">☮️</span></li>
                      <li class="emogi__item"> <span role="button">🕎</span></li>
                      <li class="emogi__item"> <span role="button">🔯</span></li>
                      <li class="emogi__item"> <span role="button">♈</span></li>
                      <li class="emogi__item"> <span role="button">♉</span></li>
                      <li class="emogi__item"> <span role="button">♊</span></li>
                      <li class="emogi__item"> <span role="button">♋</span></li>
                      <li class="emogi__item"> <span role="button">♌</span></li>
                      <li class="emogi__item"> <span role="button">♍</span></li>
                      <li class="emogi__item"> <span role="button">♎</span></li>
                      <li class="emogi__item"> <span role="button">♏</span></li>
                      <li class="emogi__item"> <span role="button">♐</span></li>
                      <li class="emogi__item"> <span role="button">♑</span></li>
                      <li class="emogi__item"> <span role="button">♒</span></li>
                      <li class="emogi__item"> <span role="button">♓</span></li>
                      <li class="emogi__item"> <span role="button">⛎</span></li>
                      <li class="emogi__item"> <span role="button">🔀</span></li>
                      <li class="emogi__item"> <span role="button">🔁</span></li>
                      <li class="emogi__item"> <span role="button">🔂</span></li>
                      <li class="emogi__item"> <span role="button">▶️</span></li>
                      <li class="emogi__item"> <span role="button">⏩</span></li>
                      <li class="emogi__item"> <span role="button">⏭️</span></li>
                      <li class="emogi__item"> <span role="button">⏯️</span></li>
                      <li class="emogi__item"> <span role="button">◀️</span></li>
                      <li class="emogi__item"> <span role="button">⏪</span></li>
                      <li class="emogi__item"> <span role="button">⏮️</span></li>
                      <li class="emogi__item"> <span role="button">🔼</span></li>
                      <li class="emogi__item"> <span role="button">⏫</span></li>
                      <li class="emogi__item"> <span role="button">🔽</span></li>
                      <li class="emogi__item"> <span role="button">⏬</span></li>
                      <li class="emogi__item"> <span role="button">⏸️</span></li>
                      <li class="emogi__item"> <span role="button">⏹️</span></li>
                      <li class="emogi__item"> <span role="button">⏺️</span></li>
                      <li class="emogi__item"> <span role="button">⏏️</span></li>
                      <li class="emogi__item"> <span role="button">🎦</span></li>
                      <li class="emogi__item"> <span role="button">🔅</span></li>
                      <li class="emogi__item"> <span role="button">🔆</span></li>
                      <li class="emogi__item"> <span role="button">📶</span></li>
                      <li class="emogi__item"> <span role="button">📳</span></li>
                      <li class="emogi__item"> <span role="button">📴</span></li>
                      <li class="emogi__item"> <span role="button">✖️</span></li>
                      <li class="emogi__item"> <span role="button">➕</span></li>
                      <li class="emogi__item"> <span role="button">➖</span></li>
                      <li class="emogi__item"> <span role="button">➗</span></li>
                      <li class="emogi__item"> <span role="button">♾️</span></li>
                      <li class="emogi__item"> <span role="button">❓</span></li>
                      <li class="emogi__item"> <span role="button">❔</span></li>
                      <li class="emogi__item"> <span role="button">❕</span></li>
                      <li class="emogi__item"> <span role="button">❗</span></li>
                      <li class="emogi__item"> <span role="button">〰️</span></li>
                      <li class="emogi__item"> <span role="button">💱</span></li>
                      <li class="emogi__item"> <span role="button">💲</span></li>
                      <li class="emogi__item"> <span role="button">⚕️</span></li>
                      <li class="emogi__item"> <span role="button">♻️</span></li>
                      <li class="emogi__item"> <span role="button">⚜️</span></li>
                      <li class="emogi__item"> <span role="button">🔱</span></li>
                      <li class="emogi__item"> <span role="button">📛</span></li>
                      <li class="emogi__item"> <span role="button">🔰</span></li>
                      <li class="emogi__item"> <span role="button">⭕</span></li>
                      <li class="emogi__item"> <span role="button">✅</span></li>
                      <li class="emogi__item"> <span role="button">☑️</span></li>
                      <li class="emogi__item"> <span role="button">✔️</span></li>
                      <li class="emogi__item"> <span role="button">❌</span></li>
                      <li class="emogi__item"> <span role="button">❎</span></li>
                      <li class="emogi__item"> <span role="button">➰</span></li>
                      <li class="emogi__item"> <span role="button">➿</span></li>
                      <li class="emogi__item"> <span role="button">〽️</span></li>
                      <li class="emogi__item"> <span role="button">✳️</span></li>
                      <li class="emogi__item"> <span role="button">✴️</span></li>
                      <li class="emogi__item"> <span role="button">❇️</span></li>
                      <li class="emogi__item"> <span role="button">#️⃣</span></li>
                      <li class="emogi__item"> <span role="button">*️⃣</span></li>
                      <li class="emogi__item"> <span role="button">0️⃣</span></li>
                      <li class="emogi__item"> <span role="button">1️⃣</span></li>
                      <li class="emogi__item"> <span role="button">2️⃣</span></li>
                      <li class="emogi__item"> <span role="button">3️⃣</span></li>
                      <li class="emogi__item"> <span role="button">4️⃣</span></li>
                      <li class="emogi__item"> <span role="button">5️⃣</span></li>
                      <li class="emogi__item"> <span role="button">6️⃣</span></li>
                      <li class="emogi__item"> <span role="button">7️⃣</span></li>
                      <li class="emogi__item"> <span role="button">8️⃣</span></li>
                      <li class="emogi__item"> <span role="button">9️⃣</span></li>
                      <li class="emogi__item"> <span role="button">🔟</span></li>
                      <li class="emogi__item"> <span role="button">🔠</span></li>
                      <li class="emogi__item"> <span role="button">🔡</span></li>
                      <li class="emogi__item"> <span role="button">🔢</span></li>
                      <li class="emogi__item"> <span role="button">🔣</span></li>
                      <li class="emogi__item"> <span role="button">🔤</span></li>
                      <li class="emogi__item"> <span role="button">🅰️</span></li>
                      <li class="emogi__item"> <span role="button">🆎</span></li>
                      <li class="emogi__item"> <span role="button">🅱️</span></li>
                      <li class="emogi__item"> <span role="button">🆑</span></li>
                      <li class="emogi__item"> <span role="button">🆒</span></li>
                      <li class="emogi__item"> <span role="button">🆓</span></li>
                      <li class="emogi__item"> <span role="button">🆔</span></li>
                      <li class="emogi__item"> <span role="button">Ⓜ️</span></li>
                      <li class="emogi__item"> <span role="button">🆕</span></li>
                      <li class="emogi__item"> <span role="button">🆖</span></li>
                      <li class="emogi__item"> <span role="button">🅾️</span></li>
                      <li class="emogi__item"> <span role="button">🆗</span></li>
                      <li class="emogi__item"> <span role="button">🅿️</span></li>
                      <li class="emogi__item"> <span role="button">🆘</span></li>
                      <li class="emogi__item"> <span role="button">🆙</span></li>
                      <li class="emogi__item"> <span role="button">🆚</span></li>
                      <li class="emogi__item"> <span role="button">🈁</span></li>
                      <li class="emogi__item"> <span role="button">🈂️</span></li>
                      <li class="emogi__item"> <span role="button">🈷️</span></li>
                      <li class="emogi__item"> <span role="button">🈶</span></li>
                      <li class="emogi__item"> <span role="button">🈯</span></li>
                      <li class="emogi__item"> <span role="button">🉐</span></li>
                      <li class="emogi__item"> <span role="button">🈹</span></li>
                      <li class="emogi__item"> <span role="button">🈚</span></li>
                      <li class="emogi__item"> <span role="button">🈲</span></li>
                      <li class="emogi__item"> <span role="button">🉑</span></li>
                      <li class="emogi__item"> <span role="button">🈸</span></li>
                      <li class="emogi__item"> <span role="button">🈴</span></li>
                      <li class="emogi__item"> <span role="button">🈳</span></li>
                      <li class="emogi__item"> <span role="button">㊗️</span></li>
                      <li class="emogi__item"> <span role="button">㊙️</span></li>
                      <li class="emogi__item"> <span role="button">🈺</span></li>
                      <li class="emogi__item"> <span role="button">🈵</span></li>
                      <li class="emogi__item"> <span role="button">🔴</span></li>
                      <li class="emogi__item"> <span role="button">🟠</span></li>
                      <li class="emogi__item"> <span role="button">🟡</span></li>
                      <li class="emogi__item"> <span role="button">🟢</span></li>
                      <li class="emogi__item"> <span role="button">🔵</span></li>
                      <li class="emogi__item"> <span role="button">🟣</span></li>
                      <li class="emogi__item"> <span role="button">🟤</span></li>
                      <li class="emogi__item"> <span role="button">⚫</span></li>
                      <li class="emogi__item"> <span role="button">⚪</span></li>
                      <li class="emogi__item"> <span role="button">🟥</span></li>
                      <li class="emogi__item"> <span role="button">🟧</span></li>
                      <li class="emogi__item"> <span role="button">🟨</span></li>
                      <li class="emogi__item"> <span role="button">🟩</span></li>
                      <li class="emogi__item"> <span role="button">🟦</span></li>
                      <li class="emogi__item"> <span role="button">🟪</span></li>
                      <li class="emogi__item"> <span role="button">🟫</span></li>
                      <li class="emogi__item"> <span role="button">⬛</span></li>
                      <li class="emogi__item"> <span role="button">⬜</span></li>
                      <li class="emogi__item"> <span role="button">◼️</span></li>
                      <li class="emogi__item"> <span role="button">◻️</span></li>
                      <li class="emogi__item"> <span role="button">◾</span></li>
                      <li class="emogi__item"> <span role="button">◽</span></li>
                      <li class="emogi__item"> <span role="button">🔶</span></li>
                      <li class="emogi__item"> <span role="button">🔷</span></li>
                      <li class="emogi__item"> <span role="button">🔸</span></li>
                      <li class="emogi__item"> <span role="button">🔹</span></li>
                      <li class="emogi__item"> <span role="button">🔺</span></li>
                      <li class="emogi__item"> <span role="button">🔻</span></li>
                      <li class="emogi__item"> <span role="button">💠</span></li>
                      <li class="emogi__item"> <span role="button">🔘</span></li>
                    </ul>
                  </div>
                  <div class="emogi__lists_content" id="list-08"> 
                    <ul class="emogi__list">
                      <li class="emogi__item"> <span role="button">🏁</span></li>
                      <li class="emogi__item"> <span role="button">🚩</span></li>
                      <li class="emogi__item"> <span role="button">🎌</span></li>
                      <li class="emogi__item"> <span role="button">🏴</span></li>
                      <li class="emogi__item"> <span role="button">🏳️</span></li>
                      <li class="emogi__item"> <span role="button">🏳️‍🌈</span></li>
                      <li class="emogi__item"> <span role="button">🏴‍☠️</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="menu-option"> 
              <button class="app__chat-file_upload" data-option="inputFile"> 
                <ion-icon name="add-outline"></ion-icon>
              </button>
              <div class="app__file-menu_container"> 
                <div class="file_options_menu"> 
                  <menu type="context"> 
                    <li class="menu-item"> 
                      <button class="file_menu-option" data-option="picture"> 
                        <ion-icon name="image-outline"></ion-icon><span>Picture</span>
                      </button>
                    </li>
                    <li class="menu-item"> 
                      <button class="file_menu-option" data-option="document"> 
                        <ion-icon name="document-outline"></ion-icon><span>Document</span>
                      </button>
                    </li>
                    <li class="menu-item"> 
                      <button class="file_menu-option" data-option="video"> 
                        <ion-icon name="videocam-outline"></ion-icon><span>Video</span>
                      </button>
                    </li>
                  </menu>
                </div>
                <div class="file_menu_close"> 
                  <button class="close__file_menu">Cancel</button>
                </div>
              </div>
            </li>
            <li class="menu-option"> 
              <button class="app__chat-voice_recorder" data-option="voiceRecorder"> 
                <ion-icon name="mic-outline"></ion-icon>
              </button>
            </li>
          </menu>
          <form action="#" method="POST" id="appChatForm" autocomplete="off"> 
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $person_id; ?>" hidden>
            <input type="text" name="message" id="message" placeholder="Type your message">
            <!-- <textarea name="message" id="message" placeholder="Type your message"></textarea> -->
            <button class="btn btn-primary" type="submit"> 
              <ion-icon name="send"></ion-icon>
            </button>
          </form>
        </div>



        <div class="app__chat-file_container" data-file="picture"> 
          <div class="file_preview"> 
            <div class="picture_file">
              <div class="picture_file_upload"> 
                <div class="title"> <span>Select a picture</span></div>
                <label class="file_container" for="picture"> 
                  <div class="picture_file_preview">
                    <img src="" alt="alt">
                  </div>
                  <div class="picture_file_content"> 
                    <b></b>
                  </div>
                </label>
                <div class="picture_load"> 
                  <div class="load_icon"> 
                    <div class="icon"> </div>
                  </div>
                  <div class="load_success"> <span></span></div>
                  <div class="load_error"> <span></span></div>
                </div>
              </div>
            </div>
            <div class="upload_file__message"> 
              <p></p>
            </div>
          </div>
          <div class="file_form_container"> 
            <button class="cancel__upload_file"> 
              <ion-icon name="close-outline"></ion-icon>
            </button>
            <div class="file_form"> 
              <form action="#" method="POST" id="uploadPictureForm" autocomplete="off"> 
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $person_id; ?>" hidden>
                <input id="picture" type="file" name="picture" onchange="loadPictureFile(event)">
                <input id="message" type="text" name="message" placeholder="Type a description">
                <button class="btn btn-primary" type="submit"> 
                  <ion-icon name="send"></ion-icon>
                </button>
              </form>
            </div>
          </div>
        </div>



        <div class="app__chat-file_container" data-file="document"> 
          <div class="file_preview"> 
            <div class="document_file"> 
              <div class="document_file_upload"> 
                <div class="title"> <span>Select a file</span></div>
                <label class="file_container" for="document"> 
                  <div class="document_file_content"> 
                    <ion-icon name="document-outline"> </ion-icon>
                    <b> </b>
                  </div>
                </label>
                <div class="document_load"> 
                  <div class="load_icon"> 
                    <div class="icon"> </div>
                  </div>
                  <div class="load_success"> <span></span></div>
                  <div class="load_error"> <span></span></div>
                </div>
              </div>
            </div>
            <div class="upload_file__message"> 
              <p></p>
            </div>
          </div>
          <div class="file_form_container"> 
            <button class="cancel__upload_file"> 
              <ion-icon name="close-outline"></ion-icon>
            </button>
            <div class="file_form"> 
              <form action="#" method="POST" id="uploadDocumentForm" autocomplete="off"> 
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $person_id; ?>" hidden>
                <input id="document" type="file" name="document" onchange="loadDocumentFile(event)">
                <input id="message" type="text" name="message" placeholder="Type a description">
                <button class="btn btn-primary" type="submit"> 
                  <ion-icon name="send"></ion-icon>
                </button>
              </form>
            </div>
          </div>
        </div>




      </div>
    </div>
    <script src="../../src/scripts/Libraries/jquery-3.6.0.min.js"> </script>
    <script src="../../src/scripts/Libraries/jquery-3.5.0.js"> </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"> </script>
    <script src="../../src/scripts/components/Alert/dist/script.dev.js"> </script>
    <script src="../../src/scripts/components/Chat/script.js"> </script>
    <script src="../../src/scripts/components/Chat/components/script.js"> </script>
    <script src="../../src/scripts/components/Chat/components/supported-files.js"> </script>
    <script src="../../src/scripts/components/Chat/components/insert-files.js"> </script>
    <script src="../../src/scripts/components/Chat/main.js"> </script>
    <script src="../../src/scripts/components/loader/dist/script.dev.js"> </script>
  </body>
</html>