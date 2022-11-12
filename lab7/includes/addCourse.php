<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO courses (CRN, prefix, number, title, section, year) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $CRN, $prefix, $number, $title, $section, $year);
  $CRN = $_POST['CRN'];
  $prefix = $_POST['prefix'];
  $number = $_POST['number'];
  $title = $_POST['title'];
  $section = $_POST['section'];
  $year = $_POST['year'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../index.php");
?>