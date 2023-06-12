<?php
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}
session_start();
$email = $_SESSION['Email'];

$query = "SELECT * FROM registration WHERE Email = '$email'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);



// $email = $email;
$name = $row['Name'];
// Class
$class = $row['Class'];
$sem = $row['Sem'];

$sql = "SELECT * FROM `java_mcqs_result`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
if ($rows['Email'] == $email) {
    $score = $rows['Result'];
} else {
    $score = $_SESSION['score'];
    $query = "INSERT INTO java_mcqs_result (Name, Email,Class,Sem, Result) VALUES ('{$name}','{$email}','{$class}','{$sem}','{$score}')";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        echo "ERROR";
    }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ - SCORE</title>
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
        <button class="btn btn-danger"><a href="logout.php">LOGOUT</a></button>
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
            <h2>Your result</h2>
            <p><?php echo $row['Name']; ?> have successfully completed the QUIZ !</p>
            <p>Your Score is : <?php echo $score; ?></p>
            
            <?php unset($_SESSION['score']); ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>