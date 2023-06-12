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
    <title>College Folks - Project Upload</title>
    <link rel="stylesheet" href="style.css">
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
            <li><a href="../Quiz/main.html">Quiz</a></li>
            <li><a href="#online-compiler">CodeFest</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fa fa-search"></button>
        </form>
    </nav>

    <?php
    if (isset($_POST['upload'])) {
        $title = $_POST['name'];
        $subject = $_POST['subject'];
        // $date = "2992";
        $desc = $_POST['desc'];
        $filename = $_FILES["fileupload"]["name"];

        $temp_name = $_FILES["fileupload"]["tmp_name"];
        // print_r($_FILES["uploadfile"]); 
        $folder = "../project_files/" . $filename;
        $_SESSION['location'] = $folder;

        move_uploaded_file($temp_name, $folder);

        $type = $_POST['radiogroup1'];
        $course = $_POST['course'];

        $sql = "INSERT INTO `projects` (title, File_Name, file, description ,course, Type, subject) VALUES ('$title','$filename' ,'$folder' ,'$desc' ,'$course', '$type', '$subject')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert alert-primary' role='alert' id='liveAlertPlaceholder'>
       <center> Project Uploaded Successfully !</center>
       </div>";
        } else {
            echo "EERROORR";
        }
    }
    ?>

    <!-- Uploading Form -->
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Upload Assignments / Projects !</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-folder"></i></span>
                            <input type="text" name="name" placeholder="Name of Projects" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input type="text" name="subject" placeholder="Enter Subject" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-folder"></i></span>
                            <input type="text" name="desc" placeholder="Description" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-file"></i></span>
                            <input type="file" name="fileupload" id="" class="fileupload">
                        </div>
                        <label for="">Type : </label>
                        <div class="input_field radio_option">
                            <input type="radio" name="radiogroup1" value="Practical" id="rd1">
                            <label for="rd1">Practical</label>
                            <input type="radio" name="radiogroup1" value="Theory" id="rd2">
                            <label for="rd2">Theory</label>
                        </div>
                        <div class="input_field select_option">
                            <select name="course">
                                <option>Select a course</option>
                                <option>iMSC-IT</option>
                                <option>BCA</option>
                                <option>MCA</option>
                                <option>BBA</option>
                            </select>
                            <div class="select_arrow"></div>
                        </div>
                        <div class="input_field checkbox_option">
                            <input type="checkbox" id="cb1">
                            <label for="cb1">I agree with terms and conditions</label>
                        </div>
                        <input class="button" type="submit" name="upload" value="Upload" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="main.js"></script>

</html>