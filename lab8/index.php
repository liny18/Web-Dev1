<?php
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
</head>
<style>
    .nav-item a:hover{
        color: white;
    }
    .current {
        color: white;
    }
</style>
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
                <ul class="navbar-nav flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <!-- <li class="nav-item active">
                        <a href="#" class="nav-link px-0 current">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Lectures</span>
                        </a>
                    </li> -->
                    <li class="nav-item dropdown">
                      <a id="labs"class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Labs
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                      </ul>
                    </li>

                    <li class="nav-item dropdown">
                      <a id="lectures"class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lectures
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                      </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="students.php" class="nav-link px-0">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Labs</span> </a>
                    </li> -->
                </ul>
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

        <div class="col py-3 text-center">
            
      </div>
    </div>
  </div>
</body>
</html>