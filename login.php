<!doctype html>
<html lang = "en">
	<head>
		<title>Login Page</title>

		<link rel="stylesheet" href="loginStyleSheet.css">
		<meta charset="utf-8">
	</head>

	<body>
			<h1>UMD Buy & Sell Login</h1>

			<form action="marketplace.php" method="POST" autocomplete="on">

				<label for="email">Email: </label>
				<input type="text" id="email" name="email" placeholder="example@notreal.notreal">
				<br>

				<label for="password">Password: </label>
				<input type="email" id="email" name="email" placeholder="testudo@terpmail.umd.edu">
				<br>

				<input type= "submit" name ="login" value= "Login">
				<input type= "button" onclick="location.href='register.php';" name = "register" value= "Register">	
			
			</form>

		</div>	

	</body>
</html>