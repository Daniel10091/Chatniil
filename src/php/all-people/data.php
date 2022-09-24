<?php
  while ($row = mysqli_fetch_assoc($query)) {
    $sql_messages = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                     OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                     OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query_messages = mysqli_query($con, $sql_messages);
    $row_messages = mysqli_fetch_assoc($query_messages);

    (mysqli_num_rows($query_messages) > 0) ? $result = $row_messages['msg'] : $result = "No message available.";
    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
    ($result === "") ? $new_result = '<ion-icon name="document-outline"></ion-icon>' . $row_messages['document'] : $new_result = $msg;

    if (isset($row_messages['outgoing_msg_id'])) {
      ($outgoing_id === $row_messages['outgoing_msg_id']) ? $you = "You: " : $you = "";
    } else {
      $you = "";
    }

    ($row['status'] === "Offline now") ? $status = "is-offline" : $status = "";
    ($outgoing_id === $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '
      <li class="list-person">
        <a class="list_person-link" data-id="' . $row['unique_id'] . '"> 
          <div class="user_image"> <img src="./src/assets/images/people/' . $row['picture'] . '" alt="alt">
            <div class="user-status ' . $status . '"></div>
          </div>
          <div class="user-content"> 
            <div class="user-info">
              <b class="user-name">' . $row['name'] . '</b>
              <span class="online-until"></span>
            </div>
            <div class="user-message"> 
              <p class="last-message">' . $you . $new_result . '</p>
              <span class="new_message-icon"></span>
            </div>
          </div>
        </a>
      </li>
    ';
  }
?>