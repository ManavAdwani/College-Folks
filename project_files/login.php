<!-- PHP STARTS HERE -->
<?php
$conn = mysqli_connect('localhost','','','college_folks');
if($conn){
	echo "Connected";
}
else{
	echo "Not Connected";
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
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>


	<div class="form-container sign-in-form">
		<div class="form-box sign-in-box">
			<h2>LOGIN</h2>
			<form action="">
				<div class="field">
					<i class="uil uil-at"></i>
					<input type="email" name="email" id="email" placeholder="Enter Your Email-ID" required>
				</div>
				<div class="field">
					<i class="uil uil-lock-alt"></i>
					<input class="password-input" type="password" name="password" id="password"
						placeholder="Enter Your Password" required>
					<div class="eye-btn">
						<i class="uil uil-eye-slash"></i>
					</div>
				</div>
				<div class="forget-link">
					<a href="">Forget Password ?</a>
				</div>
				<button class="Lsubmit-btn"><a href="/main.html">Login</a></button>
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
				<div class="admin-link">
					<p>Are you <a href="/login/admin-login/admin-login.html"><span class="admin-btn">Admin ?</span></a>
					</p>

				</div>
			</div>
		</div>

		<div class="imgBox sign-in-imgBox">
			<div class="sliding-link">
				<p>Don't have an account ?</p>
				<span class="sign-up-btn">Sign-up</span>
			</div>
			<img src="login_img/signin-img.png" alt="">
		</div>
	</div>

	<!-- Sign up Form -->

	<div class="form-container sign-up-form">
		<div class="imgBox sign-up-imgBox">
			<div class="sliding-link">
				<p>Already a member?</p>
				<span class="sign-in-btn">Login</span>
			</div>
			<img src="login_img/signup-img.png" alt="">
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
			<form action="">
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
				<button class="Ssubmit-btn"><a href="/main.html">Sign-Up</a></button>
				<!-- <input class="submit-btn" type="submit" value="Sign-up"> -->
			</form>

		</div>

	</div>
	<script type="text/javascript" src="/login/login.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>