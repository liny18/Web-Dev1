<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO content (Title, Description, Link) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $title, $description, $link);
  $title = $_POST['title'];
  $description = $_POST['description'];
  $link = $_POST['link'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../index.php");
?>