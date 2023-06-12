<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Practical Projects</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<h1 class="title">COLLEGE FOLKS</h1>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>College Folks</header>
        <ul>
            <li><a href="#"><i class="fas fa-qrcode"></i>Home</a></li>
            <li><a href="../Teacher CF/admin/manage-students.php"><i class="fas fa-link"></i>Manage Students</a></li>
            <li><a href="../Teacher CF/manage-assignment/manage_assig.php"><i class="fas fa-stream"></i>Manage Assignments</a></li>
            <li><a href="../Teacher CF/coding/add.php"><i class="fas fa-calendar-week"></i>Manage Codefest</a></li>
            <li><a href="../Teacher CF/manage_quiz/"><i class="far fa-question-circle"></i>Manage Quiz</a></li>
            <li><a href="../College Folks/TiimeTable/student.php"><i class="fas fa-sliders-h"></i>Time-Table</a></li>
        </ul>
    </div>
    <br>
    <br>
    <br>
    <center>
        <h1>Assignment Submission</h1>
    </center>

    <!-- Table Projects -->
    <div class="m-4">
<table class="table">
<thead>
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">File Name</th>
      <th scope="col">File</th>
      <th scope="col">Description</th>
      <th scope="colgroup">Course</th>
      <th scope="colgroup">Type</th>
      <th scope="colgroup">Subject</th>
      <th scope="colgroup">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM `projects` WHERE Type = 'Theory'";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td data-label='Question Number'>". $row['title'] . "</td>
        <td data-label='File Name'>". $row['File_Name'] . "</td>
        <td data-label='Submitted by'>". $row['file'] . "</td>
        <td data-label='Date'>". $row['Description'] . "</td>
        <td data-label='Date'>". $row['course'] . "</td>
        <td data-label='Date'>". $row['Type'] . "</td>
        <td data-label='Date'>". $row['Subject'] . "</td>
        <td data-label='Date'>". $row['Dates'] . "</td>
        <td data-leble='Actions'><button class='btn btn-primary'><a href='download.php?fn=$row[File_Name]'>DOWNLOAD</a></button></td>

      </tr>";
    } 
      ?>


  </tbody>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>