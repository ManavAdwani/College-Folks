<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../College Folks/login/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Projects</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
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
            <li><a href="../projects/main.php">Assignment</a></li>
            <li><a href="../CodeFest/choice.php">CodeFest</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
    </nav>

    <ul class="cards">
        <li>
            <a href="/Mini Project/Teacher CF/Theory_Projects/main.php" class="card">
                <img src="../main_img/theory.gif" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="../images/card-logo.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">Theory Assignments</h3>
                            <span class="card__status">All types of Assignments are available here !</span>
                        </div>
                    </div>
                    <p class="card__description">Read More</p>
                </div>
            </a>
        </li>
        <li>
            <a href="/Mini Project/Teacher CF/Practical_Projects/main.php" class="card">
                <img src="../main_img/practical.gif" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="../images/card-logo.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">Practical Assignment</h3>
                            <span class="card__status">All type of Practical Projects are available here !</span>
                        </div>
                    </div>
                    <p class="card__description">Read More</p>
                </div>
            </a>
        </li>
        </li>
    </ul>


    <footer>
        <div class="footer-content">
            <h3>College Folks</h3>
            <p>College Folks A place to connect students of the same age group and same course to enhance your college journy</p>
            <ul class="socials">
                <li><a href="#"><i class="fas fa-facebook"></i></a></li>
                <li><a href="#"><i class="fas fa-twitter"></i></a></li>
                <li><a href="#"><i class="fas fa-instagram"></i></a></li>
                <li><a href="#"><i class="fas fa-youtube"></i></a></li>
                <li><a href="#"><i class="fas fa-linkedin-square"></i></a></li>
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
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="../projects/script.js"></script>
</body>

</html>