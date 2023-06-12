<!-- PHP STARTS HERE -->
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
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<title>College Folks - LOGIN</title>
	<link rel="stylesheet" href="style.css" media="screen">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>

	<div class="form-container sign-in-form">
		<div class="form-box sign-in-box">
			<h2>LOGIN</h2>
			<form action="login.php" method="POST">
				<div class="field">
					<i class="uil uil-at"></i>
					<input type="email" name="email" id="email" placeholder="Enter Your Email-ID" required>
				</div>
				<div class="field">
					<i class="uil uil-lock-alt"></i>
					<input class="password-input" type="password" name="password" id="password" placeholder="Enter Your Password" required>
					<div class="eye-btn">
						<i class="uil uil-eye-slash"></i>
					</div>
				</div>
				<div class="forget-link">
					<a href="">Forget Password ?</a>
				</div>
				<button class="Lsubmit-btn" name="login">LOGIN</button>
				<!-- <input class="submit-btn" type="submit" value="Login"></a> -->
			</form>
			<div class="login-options">
				<p class="text">Or, login with...</p>
				<div class="other-logins">
					<a href="www.google.com"><img src="login_img/google.png" alt=""></a>
					<a href="www.facebook.com"><img src="login_img/facebook.png" alt=""></a>
					<a href="www.apple.in"><img src="login_img/apple.png" alt=""></a>
				</div>
				<br>
				<!-- <div class="admin-link">
					<p>Are you <a href="../login/admin-login/admin-login.html"><span class="admin-btn">Admin ?</span></a>
					</p>

				</div> -->
			</div>
		</div>

		<div class="imgBox sign-in-imgBox">
			<div class="sliding-link">
				<!-- <p>Don't have an account ?</p> -->
				<!-- <span class="sign-up-btn"><a href="../registration/registration.php">Sign-up</a></span> -->
			</div>
			<img src="../images/logo.png" alt="">
		</div>
	</div>

	<!-- Sign up Form -->
	<?php
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['password'];
		// $_SESSION['email'] = $email;

		// Admin Login
		$admin = "SELECT * FROM `admin` WHERE `Email` LIKE '$email'";
		$admin_res = mysqli_query($conn, $admin);
		$admin_exists = mysqli_num_rows($admin_res);
		// Teacher login
		$teacher = "SELECT * FROM `teacher` where `Email` LIKE '$email'";
		$teacher_res = mysqli_query($conn, $teacher);
		$teacher_exists = mysqli_num_rows($teacher_res);
		// Student login
		$sql = "SELECT *  FROM `registration` WHERE `Email` LIKE '$email'";
		$resultt = mysqli_query($conn, $sql);
		$exists = mysqli_num_rows($resultt);
		if ($admin_exists > 0) {
			$pass_checker = "SELECT * FROM `admin` WHERE `Email` LIKE '$email' AND `password` LIKE '$pass'";
			$pass_resultts = mysqli_query($conn, $pass_checker);
			$pass_existss = mysqli_num_rows($pass_resultts);
			if ($pass_existss) {
				$_SESSION['email'] = $email;
				header("location: /Mini Project/Admin CF/TiimeTable/teacher.php");
			} else {
				echo "<div class='container'>
			<div class='alert alert-warning alert-dismissible fade show' role='danger'>
			<strong>OOOPPPSSS !!</strong> Wrong Password !!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>
			</div>";
			}
		}
		else if ($teacher_exists > 0) {
			$pass_checker = "SELECT * FROM `teacher` WHERE `Email` LIKE '$email' AND `password` LIKE '$pass'";
			$pass_resultts = mysqli_query($conn, $pass_checker);
			$pass_existss = mysqli_num_rows($pass_resultts);
			if ($pass_existss) {
				$_SESSION['email'] = $email;
				header("location: /Mini Project/Teacher CF/admin.php");
			} else {
				echo "<div class='container'>
			<div class='alert alert-warning alert-dismissible fade show' role='danger'>
			<strong>OOOPPPSSS !!</strong> Wrong Password !!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>
			</div>";
			}
		} else if ($exists > 0) {
			$pass_check = "SELECT * FROM `registration` WHERE `Email` LIKE '$email' AND `password` LIKE '$pass'";
			$pass_resultt = mysqli_query($conn, $pass_check);
			$existss = mysqli_num_rows($pass_resultt);
			if ($existss > 0) {
				$login = true;
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['Email'] = $email;
				header("location: ../main.php");
			} else {
				echo "<div class='container'>
			<div class='alert alert-warning alert-dismissible fade show' role='danger'>
			<strong>OOOPPPSSS !!</strong> Wrong Password !!
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			</div>
			</div>";
			}
		} else {
			echo "<div class='container'>
		<div class='alert alert-warning alert-dismissible fade show' role='danger'>
		<strong>OOOPPPSSS !!</strong> We Don't have any account with this email. Please Register to create account
		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	  </div>
		</div>";
		}
	}

	?>

	<script type="text/javascript" src="../login/login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>