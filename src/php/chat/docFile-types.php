<?php
  if (isset($_FILES['document'])) {
    $doc_name = $_FILES['document']['name'];
    $doc_type = $_FILES['document']['type'];
    $doc_size = $_FILES['document']['size'] / 1024;
    $doc_tmp_name = $_FILES['document']['tmp_name'];

    $doc_explore = explode('.', $doc_name);
    $doc_ext = end($doc_explore);

    // echo $doc_type . ' - ';
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
        if ($doc_size <= 1024) {
          echo "File uploaded!";
        } else {
          echo "The file is too big!";
        }
      } else {
        echo "'" . $doc_ext . "' - File is not supported!";
      }
    } else {
      echo "'" . $doc_ext . "' - File is not supported!";
    }
  } else {
    echo "Please, choose a file!";
  }
?>