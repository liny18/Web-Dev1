<?php
  $serverName = "localhost";
  $username = "phpmyadmin";
  $password = "Xlkswdhood00";
  $dbName = "websyslab7";
  @ $link = new mysqli($serverName, $username, $password, $dbname);
  if ($link -> connect_errno) {
    echo "Failed to connect to MySQL: " . $link -> connect_error;
    exit();
  }