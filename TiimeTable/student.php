<?php
$conn = mysqli_connect('localhost', 'root', '', 'tt');
if (!$conn) {
    echo "ERROR";
}
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Time Table</title>
    <link rel="stylesheet" href="student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="nav-items">
            <li><a href="../main.php">Home</a></li>
            <li><a href="../Profile/main.php">Your Profile</a></li>
            <li><a href="../projects/main.php">Assignments</a></li>
            <li><a href="../CodeFest/choice.php">CodeFest</a></li>
            <li><a href="student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
    </nav>
    <br>
    <div class="container">
        <form action="" method="POST">
            <center>
                <select id="class" name="select_class" class="form-control">
                    <?php
                    $sql = "SELECT * FROM `class`";
                    $res = mysqli_query($conn, $sql);
                    if ($res) {
                        $mystring = '
         <option selected disabled>Select Class</option>';
                        while ($row = mysqli_fetch_assoc($res)) {
                            $mystring .= '<option value="' . $row['Class'] . '">' . $row['Class'] . '</option>';
                        }

                        echo $mystring;
                    }
                    ?>

                </select>
                <br>
                <br>
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
    <br>
    <br>
        <div class="m-4">
        <table class="table">
        <thead>
            <tr>
                <th style="text-align:center" scope="col">WEEKDAYS</th>
                <th style="text-align:center" scope="col">8:00-8:50</th>
                <th style="text-align:center" scope="col">8:55-9:45</th>
                <th style="text-align:center" scope="col">9:50-10:40</th>
                <th style="text-align:center" scope="col">10:45-11:35</th>
                <th style="text-align:center" scope="col">11:40-12:30</th>
                <th style="text-align:center" scope="col">12:30-1:30</th>
            </tr>
        </thead>
                <?php
                if (isset($_POST['submit'])) {
                    $cll = $_POST['select_class'];

                    $sql = "SELECT * FROM `$cll`;";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "
                 <tr><td data-label='WEEKDAYS'>$row[Day]</td>
                 <td data-label='8:00-8:50'>{$row['Lecture_1']}</td>
                <td data-label='8:55-9:45'>{$row['Lecture_2']}</td>
                <td data-label='9:50-10:40'>{$row['Lecture_3']}</td>
                 <td data-label='10:45-11:35'>{$row['Lecture_4']}</td>
                  <td data-label='11:40-12:30'>{$row['Lecture_5']}</td>
                  <td data-label='12:30-1:30'>{$row['Lecture_6']}</td>
                </tr>\n";
                    }
                }



                ?>

                <tr>

                </tr>
        </div>

        </center>

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

        <script src="script.js"></script>
</body>

</html>