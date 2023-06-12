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
        <h2>Choose the Type of CodeFest</h2>
    </center>
    <br>
    <br>
    <a href="../Coding/main.php">
        <div class="container">
            <div class="card-1 card-div">
                <div class="like-icon-div">
                    <label for="card-1-like" class="like-icon-div-child">
                        <input type="checkbox" id="card-1-like">
                    </label>
                </div>

                <div class="gow-img-div img-div">
                    <img src="https://github.com/gerrardNwoke/codePen-imgs/blob/main/imgs/gow-figurine.png?raw=true"
                        alt="god-of-war-figurine">
                </div>
                <div class="text-container">
                    <h2 class="item-name">Coding</h2>
                    <p class="date"> Code a day keeps error away ! lol </p>
                    <div class="pricing-and-cart">
                        <div class="click-now">
                            <p class="current-price">*LIVE</p>
                        </div>
                        
                    </div>
                </div>
            </div>
    </a>

    <a href="../Programming quiz/subject_selection.php">
        <div class="card-2 card-div">
            <div class="like-icon-div">
                <label for="card-2-like" class="like-icon-div-child">
                    <input type="checkbox" id="card-2-like">
                </label>
            </div>
            <div class="sekiro-img-div img-div">
                <img src="https://github.com/gerrardNwoke/codePen-imgs/blob/main/imgs/sekiro-figurine.png?raw=true"
                    alt="sekiro-figurine">
            </div>
            <div class="text-container">
                <h2 class="item-name">Mcqs</h2>
                <p class="date"> quiz to increase your knowledge </p>
                <div class="pricing-and-cart">
                    <div class="click-now">
                        <p class="current-price">*LIVE</p>
                    </div>
                </div>
            </div>
        </div>
    </a>


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
 

    <script src="script.js"></script>
</body>

</html>