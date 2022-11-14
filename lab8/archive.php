<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO content (title, date, description, link) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $title, $date, $description, $link);
  $title = $_POST['title'];
  $date = $_POST['date'];
  $description = $_POST['description'];
  $link = $_POST['link'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../table.php");
?>