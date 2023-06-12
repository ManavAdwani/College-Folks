<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Quiz</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav id="nav">
        <div class="menu-icon">
            <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <div class="nav-items">
            <li><a href="../main.php">Home</a></li>
            <li><a href="../Profile/main.php">Your Profile</a></li>
            <li><a href="../projects/main.php">Projects</a></li>
            <!-- <li><a href="/main.php">Quiz</a></li> -->
            <li><a href="#online-compiler">CodeFest</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
    </nav>
    <br>
    <br>
    <center>
        <h2>Choose Subject !</h2>
    </center>
    <br>
    <br>

    <div class="container">
        <form action="" method="POST">
            <label for="floatingSelect">Select Subject</label>
            <select class="form-select" name="select" aria-label="Default select example">
                <option selected>Open this select Subject</option>
                <option value="php">PHP</option>
                <option value="java">JAVA</option>
                <option value="python">PYTHON</option>
            </select>
            <center>
            <button class="btn btn-primary m-4" name="submit">Select</button>
            </center>
        </form>
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
                    <li><a href="../logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>

<?php
if(isset($_POST['submit'])){
    $select = $_POST['select'];
    if($select=='php'){
        header("location: main.php");
    }
    elseif($select=='java'){
        header("location: java_mcqs.php");
    }
}


?>