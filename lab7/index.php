<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include "./includes/connect.php";?>
    <div class="container">
      <h1>Grade Book</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Student ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["RIN"] . "</td>";
                echo "<td>" . $row["RCSID"] . "</td>";
                echo "<td>" . $row["first-name"] . "</td>";
                echo "<td>" . $row["last-name"] . "</td>";
                echo "<td>" . $row["grade"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "0 results";
            }
            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>