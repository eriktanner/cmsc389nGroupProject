<!doctype html>
<?php
require("../database.php");

session_start();

	$middle = "";
	$bottom =
	<<<EOBODY2
		<div class = "box">
			<form action = "login.php" method="POST">
				<label for="email">Email: </label><br>
					<input type="email" name="email" placeholder="ligma@notreal.notreal" required>
					<br>
					<label for="password">Password: </label><br>
					<input type="password" name="password" placeholder="sugma" required>
					<br>
					<input type= "submit" name = "login" value="Login"><br>
					<input type = "button" onclick="location.href='signUp.php';" id="sign_up" value="Sign Up"><br>
			</form>
		</div>
	</div>
	</body>
	</html>
EOBODY2;

if (isset($_POST['login'])) {
	$db_connection = connectDatabase();
	$email = $_POST['email'];
	$password =  $_POST['password'];

	$sql = "SELECT *
		FROM Profile WHERE Email = '$email' AND Password = '$password'";
		$result = $db_connection->query($sql);
		if ($result !== FALSE) {
			$_POST = array();
			$_SESSION['user_id'] = $result->UID;
			header('Location: ../Marketplace/marketplace.php');
		}
		else {
			$middle =	"<br><div class = 'class1'>
			Username or Password Invalid.
			</div><br>";
		}
}
if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}
	$body =
	<<<EOBODY
	<html lang = "en">
		<head>
			<title>UmdHub</title>
			<link rel="stylesheet" href="loginStyleSheet.css">
			<meta charset="utf-8">
		</head>
	  <div>
	    <img src="../Images/umd_hub_red.jpg" alt = "UmdHub" height = 75>
	    </div>
		<body>
			<div class = "main">
		    <h1> Login </h1>
EOBODY;

echo $body.$middle.$bottom;
?>
