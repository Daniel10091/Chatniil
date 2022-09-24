<?php
  session_start();
  
  if (isset($_SESSION['unique_id'])) {
    include_once "../database/DBController.php";
    
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['outgoing_msg_id'] === $outgoing_id) {
          if ($row['document'] !== "") {
            $file_size = $row['file_size'];

            (strlen($file_size) > 5) ? $file_size = substr($file_size, 0, 5) : $file_size = $file_size;
            
            $output .= '
              <div class="message outgoing"> 
                <div class="message_content"> 
                  <div class="message-text">
                    <a href="../../src/assets/chat-files/docs/' . $row['file_link'] . '" class="message-document" target="_blank">
                      <img src="../../src/assets/icons/files/' . $row['file_type'] . '-file.png" alt="' . $row['document'] . '">
                      <b>' . $row['document'] . '</b>
                      <span>' . $file_size . ' KB</span>
                    </a>
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          } else if ($row['picture'] !== "" && $row['file_link'] !== "") {
            $output .= '
              <div class="message outgoing"> 
                <div class="message_content"> 
                  <div class="message-text"> 
                    <div class="message-image">
                      <img src="../../src/assets/chat-files/images/' . $row['file_link'] . '" alt="' . $row['file_link'] . '" alt="' . $row['file_link'] . '">
                    </div>
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          } else {
            $output .= '
              <div class="message outgoing"> 
                <div class="message_content"> 
                  <div class="message-text">
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          }
        } else {
          if ($row['document'] !== "") {
            $file_size = $row['file_size'];

            (strlen($file_size) > 5) ? $file_size = substr($file_size, 0, 5) : $file_size = $file_size;
            
            $output .= '
              <div class="message incoming"> 
                <div class="message_content"> 
                  <div class="user-image">
                    <img src="../../src/assets/images/people/' . $row['picture'] . '" alt="' . $row['username'] . '">
                  </div>
                  <div class="message-text">
                    <a href="../../src/assets/chat-files/docs/' . $row['file_link'] . '" class="message-document" target="_blank">
                      <img src="../../src/assets/icons/files/' . $row['file_type'] . '-file.png" alt="' . $row['document'] . '">
                      <b>' . $row['document'] . '</b>
                      <span>' . $file_size . ' KB</span>
                    </a>
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          } else if ($row['picture'] !== "" && $row['file_link'] !== "") {
            $output .= '
              <div class="message incoming"> 
                <div class="message_content"> 
                  <div class="user-image">
                    <img src="../../src/assets/images/people/' . $row['picture'] . '" alt="' . $row['username'] . '">
                  </div>
                  <div class="message-text"> 
                    <div class="message-image">
                      <img src="../../src/assets/chat-files/images/' . $row['file_link'] . '" alt="' . $row['file_link'] . '" alt="' . $row['file_link'] . '">
                    </div>
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          } else {
            $output .= '
              <div class="message incoming">
                <div class="message_content"> 
                  <div class="user-image">
                    <img src="../../src/assets/images/people/' . $row['picture'] . '" alt="' . $row['username'] . '">
                  </div>
                  <div class="message-text"> 
                    <p>' . $row['msg'] . '</p>
                    <span>' . $row['msg_time'] . '</span>
                  </div>
                </div>
              </div>
            ';
          }
        }
      }
    } else {
      $output .= '
        <div class="chat_message no_chat_message">
          <img src="../../src/assets/icons/no-message(02).png" alt="alt">
          <p>No messages available. As soon as you send a message, they appear here.</p>
        </div>
      ';
    }
    echo $output;
  }
?>