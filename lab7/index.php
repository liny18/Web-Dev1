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
                        <a href="#" class="nav-link px-0 current">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="students.php" class="nav-link px-0">
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
                        <img src="https://github.com/liny18.png" alt="user" width="30" height="30" class="rounded-circle">
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
                  <h1>Courses</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">CRN</th>
                        <th scope="col">prefix</th>
                        <th scope="col">number</th>
                        <th scope="col">title</th>
                        <th scope="col">section</th>
                        <th scope="col">year</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $columns = array('RIN','last-name','RCSID','first-name');
                      $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                      $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
                        $query = 'SELECT * FROM courses ORDER BY ' .  $column . ' ' . $sort_order;
                        $result = $conn->query($query);
                        if (!$result) {
                          echo "SELECT failed: $query<br>" . $conn->error . "<br><br>";
                        } else {
                          $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                          $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                          $rows = $result->num_rows;
                          for ($j = 0; $j < $rows; ++$j) {
                            $result->data_seek($j);
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            echo "<tr>";
                            echo "<td>" . $row['CRN'] . "</td>";
                            echo "<td>" . $row['prefix'] . "</td>";
                            echo "<td>" . $row['number'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['section'] . "</td>";
                            echo "<td>" . $row['year'] . "</td>";
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
              <h2>Add a course</h2>
            </div>
            <form action="includes/addCourse.php" method="post">
              <div class="row">
                <div class="col-2">
                  <label for="CRN">CRN</label>
                  <input type="text" class="form-control" name="CRN" id="CRN">
                </div>
                <div class="col-2">
                  <label for="prefix">prefix</label>
                  <input type="text" class="form-control" name="prefix" id="prefix">
                </div>
                <div class="col-2">
                  <label for="number">number</label>
                  <input type="text" class="form-control" name="number" id="number">
                </div>
                <div class="col-2">
                  <label for="title">title</label>
                  <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="col-2">
                  <label for="section">section</label>
                  <input type="text" class="form-control" name="section" id="section">
                </div>
                <div class="col-2">
                  <label for="year">year</label>
                  <input type="text" class="form-control" name="year" id="year">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>