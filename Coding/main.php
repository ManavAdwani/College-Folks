<?php
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}
session_start();
$email = $_SESSION['Email'];
// echo $email;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../login/login.php");
    exit;
}


// echo $name;
$sqls = "SELECT * FROM `coding_submission` WHERE Email='$email'";
$result = mysqli_query($conn, $sqls);
$row = mysqli_fetch_assoc($result);
// echo $row['Email'];

?>

<?php
$query = "SELECT * FROM Coding";
$sql = mysqli_query($conn, $query);
$total_question = mysqli_num_rows($sql);
$estimated_time = $total_question * 10;

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
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>


        <button class="btn btn-danger"><a href="logout.php">LOGOUT</a></button>

    </nav>
    <div class="container">
        <h2>Coding Test - To test your skills on DSA</h2>
        <p>All the Questions are DSA based Questions</p>
        <ul>
            <li><Strong>Number of Questions : </Strong><?php echo $total_question; ?></li>
            <li><Strong>Type : </Strong>Coding</li>
            <li><Strong>Estimated Time : </Strong><?php echo $estimated_time; ?> min</li>
        </ul>
        <button class="start btn btn-dark" <?php if ($row) {
                                                                            $disabled = "yes"; ?> disabled <?php   } ?>><a href="question.php?n=1">Start</a></button>
                                                                            <br>
                                                                            <a href="/online-compiler/UI/ide.html">Do the coding on our Own Online IDE</a>
        <button class="logout btn btn-secondary"><a href="logout.php">Logout</a></button>
    </div>
    <?php
    if($disabled=="yes"){
        ?>
        <center><h3>Your submission has already been registered !</h3></center>
         <div class="m-4 ps-4">
<table class="table">
<thead>
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">File Name</th>
      <th scope="colgroup">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM `coding_submission` WHERE Email='$email'";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td data-label='Title'>". $row['Submitted_By'] . "</td>
        <td data-label='File Name'>". $row['File_Name'] . "</td>
        <td data-leble='Actions'><button class='btn btn-danger'><a href='delete.php?sb=$row[Submitted_By]'>Delete</a></button></td>

      </tr>";
    } 
  
      ?>


  </tbody>
</table>
</div>
</div>
        <?php
    }

?>

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