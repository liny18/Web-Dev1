<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO grades (id, CRN, RIN, grade) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $id, $CRN, $RIN, $grade);
  $id = $_POST['id'];
  $CRN = $_POST['CRN'];
  $RIN = $_POST['RIN'];
  $grade = $_POST['grade'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../index.php");
?>