<!doctype html>
<html lang = "en">
	<head>
		<title>Sell Item</title>
		<link rel="stylesheet" href="marketplaceStyleSheet.css">
		<meta charset="utf-8">
	</head>

	<body>
		<div class="header">
			<div class="containerHeader">
				<div class="logo">
					<img src="../Images/umd_hub_red.jpg" alt = "UmdHub" height = 75>
				</div>
			</div>
		</div>
		<div class="containerBody">	
			<h1>Edit Profile</h1>
			<!--Need to add Image and Category-->
			<form action="editProfile.php" method="post" enctype="multipart/form-data">
				<label for="userName">Name:</label>
 				<input required type="text" name="userName" id="userName">
				<br>
				<label for="profile_picture">Profile Picture:</label><br>
				<input required type="file" name="profile_picture">
				<br>
				<input type="submit" value="Submit" name="editProfile">
				<input type="reset" value="Reset">
				<input type="button" onclick="location.href='profile.php';" value="Go back">
			</form>
		</div>
	</body>
</html>

<?php
	session_start();
	$host = "localhost";
	$user = "admin";
	$password = "EoqNS14knT98sak6";
	$database = "marketplace";

	$session_userid = $_SESSION['user_id'];

	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die("Connection failed: " . $db_connection->connect_error);
	}

	if (isset($_POST['editProfile'])) {
		$userName = $_POST['userName'];
		$userImage = addslashes(file_get_contents($_FILES['profile_picture']['tmp_name']));
		$query = 'UPDATE profile SET Name = "' . $userName . '", ProPic = "' . $userImage . '" WHERE UID = "' . $session_userid .'"';
		$userResult = mysqli_query($db_connection, $query);
	}
?>