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
    <title>College Folks - Your Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <?php
    // $name = $_SESSION['Name'];
    $email = $_SESSION['Email'];
    // $last_name = $_POST['lname'];
    $sql = "SELECT * FROM `registration` WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    $chk = mysqli_fetch_assoc($result);
    // echo "Your Name is : " . $chk['Name'];

    // echo "Your Email is : " . $email;
    // echo $last_name;

    // RETRIVE DATA
    $sql2 = "SELECT * FROM `profiles` WHERE Email='$email'";
    $result2 = mysqli_query($conn, $sql2);
    $upd = mysqli_fetch_assoc($result2);

    ?>

    <nav id="nav">
        <div class="menu-icon">
            <span class="fa fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <div class="nav-items">
            <li><a href="../main.php">Home</a></li>
            <li><a href="main.php">Your Profile</a></li>
            <li><a href="../projects/main.php">Assignment</a></li>
            <li><a href="../CodeFest/choice.php">CodeFest</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fa fa-times"></span>
        </div>
    </nav>
    <!-- PROFILE -->
    <!-- Bootstrap -->


    <!-- HTML Body -->

    <div class="container">
        <div class="row">
            <div class="">
                <div class="header mt-1 shadow ">
                    <h5 id="personalData" class="bg-success text-white p-3">Personal Data</h5>
                    <!-- <hr class="text-muted"> -->
                    <div class="p-3">
                        <div class="row">
                            <div class="col">
                                <table class="details">
                                    <tr>
                                        <td><small class="fw-bold">Name</small></td>

                                        <td><small id="name" class="text-center border-0 px-2 ms-2"></small><?php echo $chk['Name']; ?></td>
                                    </tr>
                                    <tr class="dob">
                                        <td><small class="fw-bold">Date of birth </small></td>
                                        <td><small id="dob" class=" text-center border-0 px-2 ms-2"></small><?php
                                                                                                            if ($upd) {
                                                                                                                echo $upd['DOB'];
                                                                                                            } else {
                                                                                                                echo "NOT AVAILABLE";
                                                                                                            }

                                                                                                            ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col">
                                <table class="details">
                                    <tr class="contact">
                                        <td><small class="fw-bold">Mobile </small></td>
                                        <td><small id="mobile" class=" text-center border-0 px-2 ms-2"><?php
                                                                                                        if ($upd) {
                                                                                                            echo $upd['Phone'];
                                                                                                        } else {
                                                                                                            echo "NOT AVAILABLE";
                                                                                                        }
                                                                                                        ?></small>
                                        </td>
                                    </tr>
                                    <tr class="email">
                                        <td><small class="fw-bold">Email </small></td>
                                        <td><small id="email" class=" text-center border-0 px-2 ms-2"></small><?php echo $email; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="myObjective" class="row mt-4">
            <div class="col">
                <div class="mt-1 shadow">
                    <h5 class="bg-secondary text-white p-3">Course</h5>
                    <!-- <hr class="text-muted"> -->
                    <div id="" class="p-3 row">
                        <p id="objective">
                        <div class="col">
                            <table class="details">
                                <tr>
                                    <td><small class="fw-bold">Course Name</small></td>

                                    <td><small id="name" class="text-center border-0 px-2 ms-2"></small><?php
                                                                                                        if ($upd) {
                                                                                                            echo $upd['Course'];
                                                                                                        } else {
                                                                                                            echo "NOT AVAILABLE";
                                                                                                        }
                                                                                                        ?></td>
                                </tr>
                                <tr class="dob">
                                    <td><small class="fw-bold">Year</small></td>
                                    <td><small id="dob" class=" text-center border-0 px-2 ms-2"></small><?php
                                                                                                        if ($upd) {
                                                                                                            echo $upd['Year'];
                                                                                                        } else {
                                                                                                            echo "NOT AVAILABLE";
                                                                                                        }

                                                                                                        ?></td>
                                </tr>
                                <tr class="place">
                                    <td><small class="fw-bold">Enrollment Number </small></td>
                                    <td><small id="place" class=" text-center border-0 px-2 ms-2"></small><?php
                                                                                                            if ($upd) {
                                                                                                                echo $upd['Enrollment'];
                                                                                                            } else {
                                                                                                                echo "NOT AVAILABLE";
                                                                                                            }

                                                                                                            ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col">
                            <table class="details">
                                <tr class="contact">
                                    <td><small class="fw-bold">Roll Number </small></td>
                                    <td><small id="mobile" class=" text-center border-0 px-2 ms-2"><?php
                                                                                                    if ($upd) {
                                                                                                        echo $upd['Roll'];
                                                                                                    } else {
                                                                                                        echo "NOT AVAILABLE";
                                                                                                    }

                                                                                                    ?></small>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="mySkills" class="row mt-4">
            <div class="col">
                <div class="mt-1 shadow">
                    <h5 class="bg-secondary text-white p-3">Skills</h5>
                    <!-- <hr class="text-muted"> -->
                    <div id="skills" class="p-3 row"></div>
                    <td><small id="mobile" class=" text-center border-0 px-2 ms-2"><?php
                                                                                    if ($upd) {
                                                                                        echo $upd['Skills'];
                                                                                    } else {
                                                                                        echo "NOT AVAILABLE";
                                                                                    }

                                                                                    ?></small>
                </div>
            </div>
        </div>

        <div id="academicProject" class="row mt-4">
            <div class="col">
                <div class="mt-1 shadow">
                    <h5 class="bg-secondary text-white p-3">CodeFest Attended !</h5>
                    <!-- <hr class="text-muted"> -->
                    <div class="p-3">
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
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1;
                                        echo "<tr>
        <th scope='row'>" . $sno . "</th>
        <td data-label='Title'>" . $row['Submitted_By'] . "</td>
        <td data-label='File Name'>" . $row['File_Name'] . "</td>
        <td data-leble='Actions'><button class='btn btn-danger'><a href='delete.php?sb=$row[Submitted_By]'>Delete</a></button></td>

      </tr>";
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <center>
            <br><br>
            <a href="../Profile/update profile/main.php"> <button class="btn btn-success" type="button">Update Profile</button></a>
        </center>
        <hr>

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
</body>
<script src="script.js"></script>

</html>