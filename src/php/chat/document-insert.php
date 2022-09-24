<?php
  session_start();
  
  if (isset($_SESSION['unique_id'])) {
    include_once "../database/DBController.php";
    include_once "../date-time.php";
    
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if (isset($_FILES['document'])) {
      $doc_name = $_FILES['document']['name'];
      $doc_type = $_FILES['document']['type'];
      $doc_size = $_FILES['document']['size'] / 1024;
      $doc_tmp_name = $_FILES['document']['tmp_name'];

      $doc_explore = explode('.', $doc_name);
      $doc_ext = end($doc_explore);

      // echo $_FILES['document']['type'] . ' - ';
      // echo $doc_ext . ' - ';

      $doc_extensions = ["txt", "pdf", "doc", "docm", "docx", "pptx", "xlsx", "rar", "zip", "eml", "html", "css", 
                         "js", "jar", "ini", "eps", "mdb", "mpp", "nfo", "obj", "otf", "rtf", "ttf", "vcf"];

      if (in_array($doc_ext, $doc_extensions) === true) {
        $doc_types = [
                      "text/plain", 
                      "application/pdf", 
                      "application/doc", 
                      "application/docm", 
                      "application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
                      "application/vnd.openxmlformats-officedocument.presentationml.presentation", 
                      "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", 
                      "application/octet-stream", 
                      "application/x-zip-compressed", 
                      "text/html", 
                      "text/css", 
                      "text/javascript", 
                      "application/java-archive", 
                      "application/postscript", 
                      "application/msaccess", 
                      "message/rfc822", 
                      "application/vnd.ms-project", 
                      "application/msword", 
                      "text/x-vcard"
                    ];

        if (in_array($doc_type, $doc_types) === true) {
          $time = time();
          $new_doc_name = $time . "_" . $doc_name;

          if (move_uploaded_file($doc_tmp_name, "../../assets/chat-files/docs/" . $new_doc_name)) {
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, document, file_type, file_size, file_link, msg, msg_time)
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$doc_name}', '{$doc_ext}', '{$doc_size}', '{$new_doc_name}', '{$message}', '{$new_time}')";
            $query = mysqli_query($con, $sql) or die();
            echo "success";
          } else {
            echo "Something went wrong. Please try again!";
          }
        } else {
          echo "Unsupported file!";
        }
      } else {
        echo "Unsupported file!";
      }
    } else {
      echo "Please, choose a file!";
    }
  }
?>