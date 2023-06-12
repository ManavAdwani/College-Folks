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
    <title>College Folks</title>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <li><a href="#">Home</a></li>
            <li><a href="../College Folks/Profile/main.php">Your Profile</a></li>
            <li><a href="../College Folks/projects/main.php">Assignment</a></li>
            <li><a href="../College Folks/CodeFest/choice.php">CodeFest</a></li>
            <li><a href="../College Folks/Chat/main.php">Chat</a></li>
            <li><a href="../College Folks/TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
    </nav>


    <div class="container">
        <div class="box-mobile">
            <p>Welcome To</p>
            <h2>College Folks</h2>
            <div class="gs-btn">
                <button><a href="#our-features">GET STARTED</a></button>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <hr>
    <br>
    <h3 id="our-features">Our Features</h3>
    <br>
    <br>
    <div class="our-features">
        <div class="features-content">
            <i id="flex-left" class="uil uil-brackets-curly"></i>
            <p id="flex-right" class="content-heading">Weekly Code Competition</p>
            <p class="flex-right">Practice your coding skills</p>
        </div>
        <div class="features-content">
            <i id="flex-left" class="uil uil-clock"></i>
            <p id="flex-right" class="content-heading">Time-Table Management</p>
            <p class="flex-right">Manage your college time-table</p>
        </div>
        <div class="features-content">
            <i id="flex-left" class="uil uil-comment-alt-message"></i>
            <p id="flex-right" class="content-heading">Chat</p>
            <p class="flex-right">Chat with the Seniors</p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <h3 id="projects">Projects</h3>
    <ul class="cards">
        <li>
            <a href="./project page/python_project.php" class="card">
                <img src="./images/1st.png" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="./images/card-logo.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">Python Project</h3>
                            <span class="card__status">1 hour ago</span>
                        </div>
                    </div>
                    <p class="card__description">Read More</p>
                </div>
            </a>
        </li>
        <li>
        <a href="./project page/html_css_project.php" class="card">
                <img src="./images/2nd.png" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="./images/card-logo.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">HTML & CSS Project</h3>
                            <span class="card__status">3 hours ago</span>
                        </div>
                    </div>
                    <p class="card__description">Read More</p>
                </div>
            </a>
        </li>
        <li>
        <a href="./project page/cpp_project.php" class="card">
                <img src="./images/3rd.png" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path />
                        </svg>
                        <img class="card__thumb" src="./images/card-logo.png" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">C++ Project</h3>
                            <span class="card__status">1 hour ago</span>
                        </div>
                    </div>
                    <p class="card__description">Read More</p>
                </div>
            </a>
        </li>
        <li>

        </li>
    </ul>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <h3 id="online-compiler">CodeFest</h3>
    <br><br>
    <div class="main-box">
        <div class="sub-box">
            <div class="img-section">
                <img src="../College Folks/images/1st.jpg" alt="">
            </div>
            <div class="text-section">
                <h2>Code Fest</h2>
                <p>An Online Coding and Mcqs based Weekly test where you can test your DSA and Programming skills and knowledge about that.</p>
            </div>
            <button><a href="./CodeFest/choice.php">Check Now</a></button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>
    <div class="chat-main">
        <div class="chat-sub">
            <div class="left">
                <i class="uil uil-comment-alt-message"></i>
                <h2>Chat</h2>
                <p>A chat feature on a website allows users to communicate with each other. Chat features can be used for various purposes, such as asking help from seniors, making friends, joining groups and all. Chat features can enhance user experience and improve the overall performance of a website..</p>
                <a href="../College Folks/Chat/main.php"><button class="chat-btn">Let's Chat<i class="uim uim-arrow-circle-right"></i></button></a>
            </div>
            <div class="right">
                <img src="../College Folks/main_img/gig.gif" alt="">
            </div>
        </div>
    </div>
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
                <!-- <li><a href="#">Home</a></li>
            <li><a href="../College Folks/Profile/main.php">Your Profile</a></li>
            <li><a href="../College Folks/projects/main.php">Assignment</a></li>
            <li><a href="../College Folks/CodeFest/choice.php">CodeFest</a></li>
            <li><a href="../College Folks/Chat/main.php">Chat</a></li>
            <li><a href="../College Folks/TiimeTable/student.php">Time-Table</a></li> -->
            <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>

    </footer>

</body>
<script src="main.js"></script>
<script src="signup.js"></script>

</html>