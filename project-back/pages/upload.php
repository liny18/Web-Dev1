<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="upload.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../resources/pictures/RPIFoodies.png">
    <title>RPI Foodies</title>
    <link rel="stylesheet" href="../resources/styles/style.css">
</head>

<body>
    <!-- ADD HEADER -->
    <header>
        <?php include '../resources/includes/header.php'; ?>
    </header>


    <?php


    // we want to accept the form and upload everything to our server
    
    @session_start();

    $servername = "localhost";
    $database = "rpiFoodies";
    $username = "root";
    $password = "";

    $conn;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if (array_key_exists('submitUpload', $_POST)) {
        // create an insert statement
        $upload = $conn->prepare("INSERT INTO Posts (postTime, userID, likes, mainComment, postPhoto, location, tag1, foodName) VALUES (NOW(), 1, 0, :mainComment, :postPhoto, :location, :tag1, :foodName)");

        // get file name and location
        $fileName = $_FILES['postPhoto']['name'];
        $fileTmpName = $_FILES['postPhoto']['tmp_name'];

        // grab all the data from the form
        //$userID = $_SESSION['userID'];
        $mainComment = $_POST['caption'];
        $location = $_POST['Location'];
        $tag1 = $_POST['tag1'];
        $foodName = $_POST['foodName'];

        // execute the insert statement
        $upload->execute([':mainComment' => $mainComment, ':postPhoto' => $fileName, ':location' => $location, ':tag1' => $tag1, ':foodName' => $foodName]);

        // move the file to the correct location
        $fileDestination = '../postImages/' . $fileName;
        move_uploaded_file($fileTmpName, $fileDestination);


    }

    ?>

    <main>
        <form id="uploadPost" class="container" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <section id="uploadPhoto" class="col shadow-lg p-3 mb-5 bg-body rounded">
                    <h1 class="picTitle">Upload Image</h1>
                    <hr class="bg-dark border-5 border-top border-dark">
                    <input class="form-control" type="file" id="postPhoto" accept="image/jpg, image/png"
                        name="postPhoto" value="" onchange="previewFile()" required />
                    <div class="imgCont"><img src="#" alt="Image preview" class="photo" /></div>
                </section>
                <section class="col shadow-lg p-3 mb-5 bg-body rounded">
                    <h1 class="Caption">Finish Your Post!</h1>
                    <hr class="bg-dark border-5 border-top border-dark">
                    <div id="postText">
                        <div class="form-floating fix-floating-label p-1">
                            <textarea class="form-control" id="Caption" rows="5" name="caption" required></textarea>
                            <label class="form-label" for="Caption">Enter A Caption</label>
                        </div>
                        <div class="row">
                            <div class="col-6 p-3">
                                <select name="Location" id="Location" class="form-select"
                                    aria-label="Dining Hall Selection" required>
                                    <option value="">Select a Dining Hall</option>
                                    <option value="1">Commons</option>
                                    <option value="2">Sage</option>
                                    <option value="3">Blitman</option>
                                    <option value="4">BarH</option>
                                </select>
                            </div>
                            <div class="col-6 p-3">
                                <select class="form-select" aria-label="Dining Hall Selection" name="tag1" required>
                                    <option value="">What type of food was it?</option>
                                    <option value="1">Vegitarian</option>
                                    <option value="2">Beef</option>
                                    <option value="3">Chicken</option>
                                    <option value="4">Non-Dairy</option>
                                    <option value="4">Desert</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!-- WHEN READING THIS IN AS DATA CONVERT IT TO ALL LOWERCASE USING EITHER JS OR PHP CAN DO BOTH -->
                            <div class="form-floating fix-floating-label p-1">
                                <input type="text" class="form-control" id="foodName" placeholder="Name of the Dish"
                                    name="foodName" required>
                                <label for="foodName">Name of the Dish</label>
                            </div>
                        </div>
                        <button type="submit" id="postButton" class="btn" value="submitUpload"
                            name="submitUpload">Post!</button>
                    </div>
                </section>
            </div>
        </form>
    </main>

    <!-- ADD FOOTER -->
    <footer>
        <?php include '../resources/includes/footer.php'; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="../resources/scripts/upload.js"></script>

</body>

</html>