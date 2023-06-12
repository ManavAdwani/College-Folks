<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}
// $folder = $_SESSION['location'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Theory Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    


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
            <li><a href="../main.php">Home</a></li>
            <li><a href="../Profile/main.php">Your Profile</a></li>
            <li><a href="../projects/main.php">Assignment</a></li>
            <li><a href="../Quiz/main.php">Quiz</a></li>
            <li><a href="#online-compiler">CodeFest</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fa fa-times"></span>
</div>
    </nav>
    <br>
    <br>
    <br>
    <center>
    <h1>THEORY PROJECTS </h1>
    </center>
    <div class="m-4">
<table class="table">
<thead>
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">File Name</th>
      <th scope="col">Description</th>
      <th scope="col">Course</th>
      <th scope="col">Type</th>
      <th scope="col">Subject</th>
      <th scope="col">Date</th>
      <th scope="colgroup">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM `projects` WHERE Type='Theory'";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td data-label='Title'>". $row['title'] . "</td>
        <td data-label='File Name'>". $row['File_Name'] . "</td>
        <td data-label='Description'>". $row['Description'] . "</td>
        <td data-label='Course'>". $row['course'] . "</td>
        <td data-label='Type'>". $row['Type'] . "</td>
        <td data-label='Uploaded By'>". $row['Subject'] . "</td>
        <td data-label='Date'>". $row['Dates'] . "</td>
        <td data-leble='Actions'><button class='btn btn-primary'><a href='download.php?fn=$row[File_Name]'>DOWNLOAD</a></button></td>

      </tr>";
    } 
      ?>


  </tbody>
</table>
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
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</html>