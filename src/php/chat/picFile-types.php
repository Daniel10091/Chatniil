<?php
  if (isset($_FILES['picture'])) {
    $doc_name = $_FILES['picture']['name'];
    $doc_type = $_FILES['picture']['type'];
    $doc_size = $_FILES['picture']['size'] / 1024;
    $doc_tmp_name = $_FILES['picture']['tmp_name'];

    $doc_explore = explode('.', $doc_name);
    $doc_ext = end($doc_explore);

    // echo $doc_type . ' - ';
    // echo $doc_ext . ' - ';

    $doc_extensions = ["webp", "jpeg", "jpg", "png", "gif"];

    if (in_array($doc_ext, $doc_extensions) === true) {
      $doc_types = [
                    "image/webp", 
                    "image/jpeg", 
                    "image/jpg", 
                    "image/png", 
                    "image/gif" 
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