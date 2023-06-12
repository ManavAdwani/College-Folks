<?php
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}
error_reporting(0);
session_start();
$email = $_SESSION['Email'];
// echo $email;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../login/login.php");
    exit;
}

$sql = "SELECT * FROM `java_mcqs_result` WHERE Email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<?php
$query = "SELECT * FROM java_mcqs_question";
$sql = mysqli_query($conn, $query);
$total_question = mysqli_num_rows($sql);
$estimated_time = $total_question * 2;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeFolks - Quiz Of the Day</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav id="nav">
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <!-- <div class="nav-items">
            <li><a href="#">Home</a></li>
            <li><a href="../College Folks/Profile/main.php">Your Profile</a></li>
            <li><a href="../College Folks/projects/main.php">Projects</a></li>
            <li><a href="../College Folks/Quiz/main.html">Quiz</a></li>
            <li><a href="#online-compiler">CodeFest</a></li>
            <li><a href="../College Folks/Chat/main.php">Chat</a></li>
            <li><a href="../College Folks/TiimeTable/student.php">Time-Table</a></li>
        </div> -->
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <button class="btn btn-danger"><a href="logout.php">LOGOUT</a></button>
    </nav>
    <div class="container">
        <h2>Test Your Programming Knowledge</h2>
        <p>This is MCQs based Quiz</p>

        <ul>
            <li><Strong>Number of Questions : </Strong><?php echo $total_question; ?></li>
            <li><Strong>Type : </Strong>MCQs</li>
            <li><Strong>Estimated Time : </Strong><?php echo $estimated_time; ?> min</li>
        </ul>
        <button class="start btn btn-dark" <?php if ($row) {
                                                $disabled = "yes"; ?> disabled <?php   } ?>><a href="java_question.php?n=1">Start Quiz</a></button>
        <button class="logout btn btn-danger"><a href="logout.php">Logout</a></button>
        <?php
        if ($disabled == "yes") {
            echo "<center><h3>Your Submission is registered already</h3></center>";
            echo "<center>";
            echo "<button class='btn btn-primary'><a href='java_verify.php?e=$email'> Verify Answers</a></button>";
            echo "</center>";
        }
        ?>
    </div>


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
</body>

</html>