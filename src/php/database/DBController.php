<?php
  // 000webhost.com
  // email = chatniil9@gmail.com
  // password = #86535935@Dca

  // DB Host = localhost
  // DB Name = id19397219_danproject
  // DB User = id19397219_daniel
  // DB Pass = AE]3uw?#&jnlh&HT

  // $hostname = "localhost";
  // $username = "id19397219_daniel";
  // $password = "AE]3uw?#&jnlh&HT";
  // $dbname = "id19397219_danproject";

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chatniil";

  $con = mysqli_connect($hostname, $username, $password, $dbname);

  if (!$con) {
    echo "Database connection error ".mysqli_connect_error();
  }
?>