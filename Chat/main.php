<?php

session_start();
error_reporting(0);
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}
// session_start();
$email = $_SESSION['Email'];
// echo $email;
// echo $_SESSION['uniqueid'];
$sql = "SELECT * FROM `registration` WHERE Email='$email'";
$result = mysqli_query($conn, $sql);
$chk = mysqli_fetch_assoc($result);
$_SESSION['unique_idd']=$chk['Unique_id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- NAV BAR -->
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
            <li><a href="../Quiz/main.php">Quiz</a></li>
            <li><a href="main.php">Chat</a></li>
            <li><a href="../TiimeTable/student.php">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fa fa-times"></span>
        </div>
    </nav>




    <!-- CHAT -->
    <div class="main-wrapper">
        <div class="wrapper">
            <section class="form signup">
                <header>RealTime Chat</header>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="error-txt"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label for="">First Name</label>
                            <input type="text" name="name" id="" value="<?php echo $chk['Name']; ?>" placeholder="Enter Your Name" required>
                        </div>
                        <div class="field input">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" value="<?php if ($chk) {
                                                                                echo $chk['Email'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>" placeholder="Enter Your Email" required>
                        </div>
                        <div class="field image">
                            <label for="">Select Image</label>
                            <input type="file" name="dp" id="">
                        </div>
                        <div class="field button">
                            <input type="submit" value="Continue to chat">
                        </div>
                </form>
            </section>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script src="signup.js"></script>

</html>