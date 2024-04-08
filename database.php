<?php
  // add lesson code here

  $server="localhost";
  $username="root";
  $password="1234";
  $database="images";

  $conn=mysqli_connect($server,$username,$password,$database);

  if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
  } else {
    echo "Connected successfully";
  }


?>