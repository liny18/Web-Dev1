<?php
  $sql = "INSERT IGNORE INTO content (Title, Description, Link) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $title, $description, $link);
  $title = $_POST['Title'];
  $description = $_POST['Description'];
  $link = $_POST['Link'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: index.php");
?>