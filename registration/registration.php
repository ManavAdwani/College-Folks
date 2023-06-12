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
    <title>College Folks - REGISTRATION</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        $_SESSION['name'] = $name;

        $_SESSION['email'] = $email;

        $ccheck = "SELECT *  FROM `registration` WHERE `Email` LIKE '$email';";
        $resultt = mysqli_query($conn, $ccheck);
        // $result = mysqli_query($conn, $chq);
        $exists = mysqli_num_rows($resultt);
        if ($exists > 0) {

            echo "<div class='container'>
            <div class='alert alert-warning alert-dismissible fade show' role='danger'>
            <strong>OOOPPPSSS !!</strong> This Email Already Exist. Please login.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
                  </div>";
        } else {
            if ($pass == $cpass) {
                session_start();
                $random_id = rand(time(), 1000000);
                $_SESSION['loggedin'] = true;
                $_SESSION['Email'] = $email;
                if(isset($_POST['submit'])){
                    $_SESSION['uniqueid']=$random_id;
                 }else {
                     //No go back button will be displayed.
                     echo "PROBLEM";
                 }
                // $_SESSION['uniqueid'] = $random_id;
                $sql = "INSERT INTO `registration` (`Unique_id`,`Name`, `Email`, `password`) VALUES ('$random_id','$name', '$email', '$pass')";
                $result = mysqli_query($conn, $sql);
                $login = true;


                header("location: ../main.php");
            } else {
                echo "<div class='container'>
                <div class='alert alert-warning alert-dismissible fade show' role='danger'>
                <strong>OOOPPPSSS !!</strong> Password doesn't match !
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
                      </div>";
            }
        }
    }

    ?>

    <div class="form-container sign-up-form">
        <div class="imgBox sign-up-imgBox">
            <div class="sliding-link">
                <p>Already a member?</p>
                <span class="sign-in-btn"><a href="../login/login.php">LOGIN</a></span>
            </div>
            <img src="../images/logo.png" alt="">
            <!-- <img src="/registration/login_img/signup-img.png" alt=""> -->
        </div>
        <div class="form-box sign-up-box">
            <h2>SIGN-UP</h2>
            <div class="login-options">
                <div class="other-logins">
                    <a href="www.google.com"><img src="login_img/google.png" alt=""></a>
                    <a href="www.facebook.com"><img src="login_img/facebook.png" alt=""></a>
                    <a href="www.apple.in"><img src="login_img/apple.png" alt=""></a>
                </div>
                <p class="text">Or, Sign-up with Email...</p>
            </div>
            <form action="registration.php" method="post">
                <div class="field">
                    <i class="uil uil-user"></i>
                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name" required>
                </div>
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email-ID" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-access"></i>
                    <input type="password" name="cpassword" id="password" placeholder="Confirm Your Password" required>
                </div>
                <button class="Ssubmit-btn" name="submit">Sign-Up</button>
            </form>
            <br>
            <!-- <div class="admin-link">
                <p>Are you <a href="../login/admin-login/admin-login.html"><span class="admin-btn">Admin ?</span></a>
                </p>

            </div> -->

        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>