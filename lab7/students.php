<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
  <?php include "includes/connect.php"; ?>
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="w-100 text-center border-bottom">
                  <a href="#" class="pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-1 text-center">Menu</span>
                  </a> 
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-0  current">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Students</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="grades.php" class="nav-link px-0">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Grades</span></a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4 border-top">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/liny18.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Me</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3 text-center">
            <div class="row">
                <div class="col-12">
                  <h1>Students</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">RIN</th>
                        <th scope="col">RCSID</th>
                        <th scope="col">first-name</th>
                        <th scope="col">last-name</th>
                        <th scope="col">alias</th>
                        <th scope="col">phone</th>
                        <th scope="col">state</th>
                        <th scope="col">city</th>
                        <th scope="col">street</th>
                        <th scope="col">zip</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query = "SELECT * FROM students";
                        $result = $conn->query($query);
                        if (!$result) {
                          echo "SELECT failed: $query<br>" . $conn->error . "<br><br>";
                        } else {
                          $rows = $result->num_rows;
                          for ($j = 0; $j < $rows; ++$j) {
                            $result->data_seek($j);
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            echo "<tr>";
                            echo "<td>" . $row['RIN'] . "</td>";
                            echo "<td>" . $row['RCSID'] . "</td>";
                            echo "<td>" . $row['first-name'] . "</td>";
                            echo "<td>" . $row['last-name'] . "</td>";
                            echo "<td>" . $row['alias'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['street'] . "</td>";
                            echo "<td>" . $row['zip'] . "</td>";
                            echo "</tr>";
                          }
                        }
                      ?>
                    </tbody>
                  </table>
              </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2>Add a student</h2>
            </div>
            <form action="includes/addStudents.php" method="post">
              <div class="row">
                <div class="col">
                  <label for="RIN">RIN</label>
                  <input type="text" class="form-control" name="RIN" id="RIN">
                </div>
                <div class="col">
                  <label for="RCSID">RCSID</label>
                  <input type="text" class="form-control" name="RCSID" id="RCSID">
                </div>
                <div class="col">
                  <label for="first-name">first-name</label>
                  <input type="text" class="form-control" name="first-name" id="first-name">
                </div>
                <div class="col">
                  <label for="last-name">last-name</label>
                  <input type="text" class="form-control" name="last-name" id="last-name">
                </div>
                <div class="col">
                  <label for="alias">alias</label>
                  <input type="text" class="form-control" name="alias" id="alias">
                </div>
                <div class="col">
                  <label for="phone">phone</label>
                  <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="col">
                  <label for="state">state</label>
                  <input type="text" class="form-control" name="state" id="state">
                </div>
                <div class="col">
                  <label for="city">city</label>
                  <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="col">
                  <label for="street">street</label>
                  <input type="text" class="form-control" name="street" id="street">
                </div>
                <div class="col">
                  <label for="zip">zip</label>
                  <input type="text" class="form-control" name="zip" id="zip">
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
            </form>
        </div>
</body>
</html>