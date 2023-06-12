<?php
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}
session_start();
$number = $_GET['n'];
$email = $_SESSION['Email'];
// Query for questions
$query = "SELECT * FROM questions WHERE Question_Number = $number";
// Get the question
$results = mysqli_query($conn, $query);
$question = mysqli_fetch_assoc($results);

// Get Choices
$query_c = "SELECT * FROM choices WHERE Question_Number = $number";
$choice = mysqli_query($conn, $query_c);
// Get Total Questions
$query_q = "SELECT * FROM questions";
$sql = mysqli_query($conn, $query_q);
$total_question = mysqli_num_rows($sql);

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
        <form action="#">
            
            <button class="logout"><a href="logout.php">LOGOUT</a></button>
        </form>
    </nav>

    <main>
        <div class="container">
            <div class="current h3">Question <?php echo $number; ?> of <?php echo $total_question; ?></div>
            <p class="question"><?php echo $question['Question_text']; ?></p>
            <form action="process.php" method="POST">
                <ul class="choices">
                    <?php
                    while ($row = mysqli_fetch_assoc($choice)) {
                        echo "<li><input type='radio' class='form-check-input' name='choice' value='$row[Id]'>  $row[Options]</li>";
                    }

                    ?>


                </ul>
                <input type="hidden" name="number" value="<?php echo $number; ?>">
                <input type="submit" class="btn btn-primary" name="submit" id="">
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

</html>