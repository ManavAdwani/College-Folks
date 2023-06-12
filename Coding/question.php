<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}

$number = $_GET['n'];
$email = $_SESSION['Email'];
// echo $email;
// Get user details
$q1 = "SELECT * FROM `registration` WHERE `Email` LIKE '$email'";
$r1 = mysqli_query($conn, $q1);
$row = mysqli_fetch_assoc($r1);

// Question Details
$q2 = "SELECT * FROM `coding` WHERE `Question_Number`";
$r1_q = mysqli_query($conn, $q2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Programming Quiz</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>


<?php
if (isset($_POST['submit'])) {
    $name = $row['Name'];
    $email = $row['Email'];
    $question_number = 1;
    $filename = $_FILES["fileupload"]["name"];

    $temp_name = $_FILES["fileupload"]["tmp_name"];
    // print_r($_FILES["uploadfile"]); 
    $folder = "../coding_files/" . $filename;
    $_SESSION['location'] = $folder;

    move_uploaded_file($temp_name, $folder);

    $sql = "INSERT INTO `coding_submission` (Question_Number, File_Name, Submitted_By, Email) VALUES ('$question_number','$filename' ,'$name', '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-primary' role='alert' id='liveAlertPlaceholder'>
       <center> File Uploaded Successfully !</center>
       </div>";
    } else {
        echo "EERROORR";
    }
}
?>

<body>
    <nav id="nav">
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>

        <button class="lg btn btn-danger"><a href="logout.php">LOGOUT</a></button>

    </nav>

    <main>
        <div class="container">
            <div class="current h3">Question <?php echo $number; ?></div>
            <p class="question"> <?php
                                            while ($row_q = mysqli_fetch_assoc($r1_q)) {
                                                echo "Question $row_q[Question_Number] :- ";
                                                echo $row_q['Question_text'];
                                                echo "<br>";
                                            } ?></p>

            <form action="question.php" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <label for="" class="form-label">Upload File to submit</label>
                    <input type="file" name="fileupload" class="form-control">
                </div>
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input type="submit" class="btn btn-primary" name="submit" id="">
                <button class="logout btn btn-secondary"><a href="logout.php">Logout</a></button>
            </form>
        </div>
    </main>


    <footer>
        <div class="footer-content">
            <h3>College Folks</h3>
            <p>College Folks A place to connect students of the same age group and same course to enhance your college journy</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">College Folks</a> </p>
            <div class="footer-menu">
                <ul class="f-menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">Manage Students</a></li>
                    <li><a href="">Manage Assignments</a></li>
                    <li><a href="">Manage CodeFest</a></li>
                </ul>
            </div>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>