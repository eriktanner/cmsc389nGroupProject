<!doctype html>
	<?php
	require("../database.php");
	$middle = "";
	$bottom =
	<<<EOBODY2
	<div class = "box">
		<form action="{$_SERVER['PHP_SELF']}" method="post">
			<text class = "subtext"> Email must contain @umd.edu address.
			Password must contain 8-13 alphanumeric characters. Fields with an asterisk
			are required. </text><br>
			<br>
			<label for="first_name">* First Name: </label>
			<br>
			<input type="text" name="first_name" pattern="[A-Za-z]+" placeholder="John" required
			title="Names cannot contain numbers.">
			<br>
			<label for="last_name">* Last Name: </label>
			<br>
			<input type="text" name="last_name" pattern="[A-Za-z]+" placeholder="Smith" required
			title="Names cannot contain numbers.">
			<br>
			<label for = "email_signUp">* Email: </label>
			<br>
			<input type="email" name = "email_signUp"
			placeholder="johnsmith@umd.edu" required>
			<br>
			<label for ="password_signUp">* Password:</label>
			<input type="password" name="password_signUp"
			pattern="[A-Za-z0-9]{8-13}"required>
			<label for ="profile_pic">Profile Picture:</label>
			<br>
			<input type="file" name="profile_pic" accept="image/*">
			<input type = "submit" name="continue" value="Continue"><br>
			<input type= "button" onclick="location.href='login.php';" id="cancel" value="Cancel"><br>
		</form>
	</div>
</div>
</body>
</html>
EOBODY2;
	if (isset($_POST["continue"])) {
	  $db_connection = connectDatabase();
	  $firstName = $_POST['first_name'];
	  $lastName = $_POST['last_name'];
	  $full_name = $firstName." ".$lastName;
	  $email = $_POST['email_signUp'];
	  $password =  $_POST['password_signUp'];
	  $image = $_POST['profile_pic'];
	  if (strpos($email, "umd.edu") !== false) {
	    $sql = "INSERT INTO profile (Name, Email, Password)
	    VALUES ('$full_name', '$email', '$password')";

	    if ($db_connection->query($sql) === TRUE) {
			header('Location: login.php');
			}
		}
	  else {
			$middle =	"<br><div class = 'class1'>
			You must have an email address of the form umd.edu. Please try again by
			entering an email address that is associated with the University of Maryland.
			</div><br>";
	  }
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
      <h1> SignUp </h1>
EOBODY;
echo $body.$middle.$bottom;