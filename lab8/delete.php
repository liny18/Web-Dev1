<?php include "connect.php"; ?>
<?php
if (isset($_POST['delete'])) {
  $sql = "DELETE FROM content WHERE Title = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $title);
  $title = $_POST['Title'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: table.php");
}
?>