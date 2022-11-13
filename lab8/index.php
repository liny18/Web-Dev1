<?php
include_once("./CAS-1.4.0/CAS.php");
phpCAS::client(CAS_VERSION_2_0,'cas.auth.rpi.edu',443,'/cas');

// This is not recommended in the real world!
// But we don't have the apparatus to install our own certs...
phpCAS::setNoCasServerValidation();

if (phpCAS::isAuthenticated()) {
  echo "User: " . phpCAS::getUser();
  echo "<a href='logout.php'>Logout</a>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Websys</title>
</head>
<body>
  <?php
    echo "<a href='login.php'>Login</a>";
  ?>
</body>
</html>
<?php
}
?>
