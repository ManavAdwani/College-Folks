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
  <!-- <link rel="stylesheet" href="cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
      <li><a href="/Mini Project/Teacher CF/admin.php"><i class="fas fa-qrcode"></i>Home</a></li>
      <li><a href="/Mini Project/Teacher CF/admin/manage-students.php"><i class="fas fa-link"></i>Students</a></li>
      <li><a href="/Mini Project/Teacher CF/manage-assignment/manage_assig.php"><i class="fas fa-stream"></i>Assignments</a></li>
      <li><a href="/Mini Project/Teacher CF/coding/add.php"><i class="fas fa-calendar-week"></i>Coding-Codefest</a></li>
      <li><a href="/Mini Project/Teacher CF/programming.php/add.php"><i class="far fa-question-circle"></i>Quiz-Codefest</a></li>
      <li><a href="/Mini Project/Teacher CF/teacher_tt.php"><i class="fas fa-sliders-h"></i>Time-Table</a></li>
    </ul>
  </div>
  <br>
  <br>
  <br>
  <center>
    <h1>Coding Submission</h1>
  </center>
  <!-- Table Projects -->
  <center>
    <div class="container m-4">
      <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">File Name</th>
            <th scope="col">Marks</th>
            <th scope="col">Submited By</th>
            <th scope="col">Class</th>
            <th scope="col">Sem</th>
            <th scope="col">Date</th>
            <th scope="col">Update Marks</th>
            <th scope="colgroup">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `coding_submission`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
        <th scope='row'>" . $sno . "</th>
        <td data-label='File Name'>" . $row['File_Name'] . "</td>
        <td data-label='Question Number'>" . $row['Marks'] . "</td>
        <td data-label='Submitted by'>" . $row['Submitted_By'] . "</td>
        <td data-label='Question Number'>" . $row['Class'] . "</td>
        <td data-label='Submitted by'>" . $row['Sem'] . "</td>
        <td data-label='Date'>" . $row['Date'] . "</td>
        <td data-leble='Actions'><button class='btn btn-secondary'><a href='update_marks.php?fn=$row[Id]'>Update Marks</a></button></td>
        <td data-leble='Actions'><button class='btn btn-primary'><a href='download.php?fn=$row[File_Name]'>DOWNLOAD</a></button></td>

      </tr>";
          }
          ?>


        </tbody>
      </table>
    </div>
    </div>
  </center>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>