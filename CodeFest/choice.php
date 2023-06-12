<?php
session_start();
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
  echo "Error";
}
$email = $_SESSION['Email'];

$queryy = "SELECT * FROM registration WHERE Email = ('$email')";
$qq = mysqli_query($conn, $queryy);
$row = mysqli_fetch_assoc($qq);
$name=$row['Name'];

$query2 = "SELECT * FROM codefest WHERE Name = ('$name')";
$qq2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($qq2);

// session_start();
if($name==$row2['Name']){
  header("location: main.php");
}

// $name = $_SESSION['name'];
// if ($name) {
 
// }

// $email = $_SESSION['Email'];

$sql2 = "SELECT * FROM registration WHERE Email = '$email'";
$qq = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($qq);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeFest - College Folks</title>
  <link rel="stylesheet" href="choice.css">
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
      <li><a href="/main.php">Quiz</a></li>
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
  <form action="" method="POST">
    <div class="container">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" value="<?php echo $row['Name']; ?>" placeholder="Enter Your Name..." class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Course</label>
        <input type="text" name="course" placeholder="Enter Your Course..." class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Year</label>
        <input type="text" name="year" placeholder="Enter Your Year..." class="form-control">
      </div>
      <label for="exampleInputEmail1" class="form-label">Choose Your Codefest Type :- </label>
      <div class="mb-4">
        <input type="radio" name="type" value="Coding" placeholder="Enter Your Year..." class="formcheckcontrol">
        <label for="exampleInputEmail1" class="formchecklabel">Coding</label>
        <input type="radio" name="type" value="Mcqs" placeholder="Enter Your Year..." class="formcheckcontrol">
        <label for="exampleInputEmail1" class="formchecklabel">Mcqs</label>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


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

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $course = $_POST['course'];
  $year = $_POST['year'];
  $type = $_POST['type'];


  $sql = "INSERT INTO codefest(Name, Course, Year, Type) VALUES ('{$name}', '{$course}', '{$year}', '{$type}')";
  $q1 = mysqli_query($conn, $sql);
  if ($q1) {
    if ($type == 'Coding') {
      $_SESSION['name'] = $name;
      header("location: /quizz/account.php");
    } else {
      $_SESSION['name'] = $name;
      header("location: ../Programming quiz/main.php");
    }
  } else {
    echo "ERROR";
  }
}

?>