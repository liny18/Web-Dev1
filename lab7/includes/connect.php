<?php
  $serverName = "localhost";
  $username = "phpmyadmin";
  $password = "Xlkswdhood00";
  $dbName = "websyslab7";
  @ $conn = new mysqli($serverName, $username, $password, $dbName);
  if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
  }