<?php include "connect.php"; ?>
<?php
  $sql = "INSERT INTO students (RIN, RCSID, `first-name`, `last-name`, alias, phone, state, city, street, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssssss", $RIN, $RCSID, $firstname, $lastname, $alias, $phone, $state, $city, $street, $zip);
  $RIN = $_POST['RIN'];
  $RCSID = $_POST['RCSID'];
  $firstname = $_POST['first-name'];
  $lastname = $_POST['last-name'];
  $alias = $_POST['alias'];
  $phone = $_POST['phone'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $street = $_POST['street'];
  $zip = $_POST['zip'];
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header("Location: ../students.php");
?>