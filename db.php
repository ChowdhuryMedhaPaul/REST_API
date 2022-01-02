<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db       = 'api';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);
// echo "Database Connected Successfully";
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

// echo 'website maintance is running';
  ?>