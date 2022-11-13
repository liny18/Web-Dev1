<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO grades (CRN, RIN, grade) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $CRN, $RIN, $grade);
  $CRN = $_POST['CRN'];
  $RIN = $_POST['RIN'];
  $grade = $_POST['grade'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../grades.php");
?>