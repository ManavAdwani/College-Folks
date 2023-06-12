<?php
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}
$e = $_GET['e'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <center>
        <h2>Verify Your Answers !</h2>
    <button class="btn btn-danger"><a href="/Mini Project/College Folks/Programming quiz/java_mcqs.php">Logout<a><button>
    </center>
    <br>
    <br>
    <center>
    <div class="container m-4">
      <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Email</th>
            <th scope="col">Question</th>
            <th scope="col">Option You Selected</th>
            <th scope="col">Correct Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `user_selected_options2` WHERE Email = '$e'";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
        <th scope='row'>" . $sno . "</th>
        <td data-label='Question Number'>" . $row['Email'] . "</td>
        <td data-label='File Name'>" . $row['Question'] . "</td>
        <td data-label='Question Number'>" . $row['Option_by_user'] . "</td>
        <td data-label='Submitted by'>" . $row['Correct_Option'] . "</td>

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

</html>