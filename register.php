<!doctype html>
<html lang = "en">
	<head>
		<title>Registration Page</title>

		<link rel="stylesheet" href="loginStyleSheet.css">
		<meta charset="utf-8">
	</head>

	<body>
			<h1>Register</h1>

			<form action="register.php" method="POST" autocomplete="on">

				<label for="email">Email: </label>
				<input type="text" id="email" name="email">
				<br>

				<label for="password">Password: </label>
				<input type="email" id="email" name="email">
				<br>

				<label for="password">Confirm Password: </label>
				<input type="email" id="email" name="email">
				<br>

				<input type= "submit" name ="sign_up" value= "Sign Up">
				<input type= "button" onclick="location.href='login.php';"name = "to_login_page" value= "Back">	
			
			</form>

		</div>	

	</body>
</html>