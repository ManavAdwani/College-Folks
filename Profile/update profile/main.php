<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}


$email = $_SESSION['Email'];
$sql = "SELECT * FROM `registration` WHERE Email='$email'";
$result = mysqli_query($conn, $sql);
$chk = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>College Folks - Update Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css"> -->
    <link rel="stylesheet" type="text/css" href="util.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <nav id="nav">
        <div class="menu-icon">
            <span class="fa fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <div class="nav-items">
        <li><a href="/Mini Project/College Folks/main.php">Home</a></li>
        <li><a href="../main.php">Your Profile</a></li>
            <li><a href="/Mini Project/College Folks/projects/main.php">Assignment</a></li>
            <li><a href="/Mini Project/College Folks/CodeFest/choice.php">CodeFest</a></li>
            <li><a href="/Mini Project/College Folks/Chat/main.php">Chat</a></li>
            <li><a href="/Mini Project/College Folks/TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fa fa-times"></span>
        </div>
    </nav>

    <?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $enrollment = $_POST['enrollment'];
    $roll = $_POST['rollno'];
    $skills = $_POST['skills'];
    $projects = $_POST['projects'];
    // $result = mysqli_query($conn, $chq);


    $sql = $sql = "INSERT INTO `profiles` (`Name`, `Email`, `Phone`, `DOB`, `Course`, `Year`, `Enrollment`,`Roll`, `Skills`, `Projects`) VALUES ('$name', '$email', '$phone', '$dob', '$course', '$year', '$enrollment','$roll', '$skills', '$projects')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<div class='alert alert-primary' role='alert'>
       Profile Updated !!!!!!!
      </div>";
    } else {
        echo "ERROR";
    }
}


?>

    <!-- Update Form -->
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="" method="POST">
                <span class="contact100-form-title">
                    Update Profile
                </span>
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">FULL NAME *</span>
                    <input class="input100" type="text" value="<?php echo $chk['Name']; ?>" name="name" placeholder="Enter Your Name">
                </div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Enter Your Email (e@a.x)">
                    <span class="label-input100">Email *</span>
                    <input class="input100" type="text" value="<?php echo $email; ?>" name="email" placeholder="Enter Your Email " readonly>
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Phone *</span>
                    <input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
                </div>
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">Date Of Birth *</span>
                    <div>
                        <input type="date" name="dob" id="">
                    </div>
                </div>
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">Course Name *</span>
                    <input class="input100" type="text" name="course" placeholder="Enter Your Course">
                </div>
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">Year *</span>
                    <input class="input100" type="text" name="year" placeholder="Enter Your Year">
                </div>
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">Enrollment Number *</span>
                    <input class="input100" type="number" name="enrollment" placeholder="Enter Your Enrollment Number">
                </div>

                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">Roll Number *</span>
                    <input class="input100" type="number" name="rollno" placeholder="Enter Your Roll Number">
                </div>
                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
                    <span class="label-input100">Your Skills *</span>
                    <textarea class="input100" name="skills" placeholder="Your Skills here..."></textarea>
                </div>
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100">Acedemic Projects Links *</span>
                    <input class="input100" type="text" name="projects" placeholder="Enter Your Project link here * ONLY LINKS *">
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="submit">
                        <span>
                            Update
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
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
                <li><a href="#">Home</a></li>
            <li><a href="../College Folks/Profile/main.php">Your Profile</a></li>
            <li><a href="../College Folks/projects/main.php">Assignment</a></li>
            <li><a href="../College Folks/CodeFest/choice.php">CodeFest</a></li>
            <li><a href="../College Folks/Chat/main.php">Chat</a></li>
            <li><a href="../College Folks/TiimeTable/student.php">Time-Table</a></li>
                </ul>
            </div>
        </div>

    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
<script src="script.js"></script>
</html>


