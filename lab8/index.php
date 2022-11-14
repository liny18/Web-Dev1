<?php
include_once "connect.php";
include_once("./CAS-1.4.0/CAS.php");
phpCAS::client(CAS_VERSION_2_0,'cas.auth.rpi.edu',443,'/cas');

// This is not recommended in the real world!
// But we don't have the apparatus to install our own certs...
phpCAS::setNoCasServerValidation();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Websys</title>
  <link href="resources/images/logo.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script defer src="resources/script.js"></script>
  <style>
    .right {
      background-image: url("resources/images/monkey.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .picks:hover {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="w-100 text-center border-bottom">
                  <a href="#" class="pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-1 text-center">Content</span>
                  </a> 
                </div>
                <nav class="navbar nav-tabs nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Labs
                      </a>
                      <ul class="dropdown-menu" id="labs">
                      </ul>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lectures
                      </a>
                      <ul class="dropdown-menu" id="lectures">
                      </ul>
                    </li>
                  </ul>
                </nav>
                <hr>
                <?php 
                  if (!phpCAS::isAuthenticated()) {
                    header("Location: out.php");
                  } else {
                    echo "User: " . phpCAS::getUser();
                    echo '
                    <div class="dropdown pb-4 border-top">
                          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="https://github.com/liny18.png" alt="user" width="30" height="30" class="rounded-circle">
                              <span class="d-none d-sm-inline mx-1">Me</span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                              <li><a class="dropdown-item" href="#">Settings</a></li>
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li>
                                  <hr class="dropdown-divider bg-light">
                              </li>
                              <li class="ms-3"><a href="logout.php" class="btn btn-primary">Logout</a></li>
                          </ul>
                      </div>';
                    } 
                ?>
            </div>
        </div>

        <div class="col py-3 align-content-center text-center right">
            <h2>Pick from the navigation bar on the left</h2>
            <div class="btn btn-success" id="refresh">
              Refresh
            </div>
            <div class="row justify-content-center align-items-center">
              <div class="col-6">       
                  <div class="card p-2 mt-5">
                    <img class="card-img-top" src="resources/images/monkey.jpg" alt="Title">
                    <div class="card-body">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
            <form action="archive.php" method="post">
              <div class="row justify-content-center">
                <div class="col-2">
                  <input type="text" class="form-control" name="Title" id="Title">
                </div>
                <div class="col-2">
                  <input type="text" class="form-control" name="Description" id="Description">
                </div>
                <div class="col-2">
                  <input type="text" class="form-control" name="Link" id="Link">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-danger">Archive</button>
                </div>
              </div>
            </form>
        </div>
    </div>
    <div class="col py-3 text-center">
          <div class="row">
            <div class="col-12">
              <h1>Course Content</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Link</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM content";
                    $result = $conn->query($query);
                    if (!$result) {
                      echo "SELECT failed: $query<br>" . $conn->error . "<br><br>";
                    } else {
                      $rows = $result->num_rows;
                      for ($j = 0; $j < $rows; ++$j) {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<tr>";
                        echo "<td>" . $row['Title'] . "</td>";
                        echo "<td>" . $row['Description'] . "</td>";
                        echo "<td><a href='" . $row['Link'] . "'>Link</a></td>";
                        echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
    </div>
  </div>
</body>
</html>